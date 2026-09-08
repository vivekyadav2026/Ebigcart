<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Stripe\Webhook;
use Stripe\Exception\SignatureVerificationException;

class CheckoutController extends Controller
{
    // Auto-detect reverse geocoding API
    public function reverseGeocode(Request $request)
    {
        $lat = $request->query('lat');
        $lon = $request->query('lon');

        // 1. Try GPS reverse geocoding if lat and lon provided
        if ($lat && $lon) {
            // Attempt 1: OpenStreetMap Nominatim
            try {
                $response = \Illuminate\Support\Facades\Http::withoutVerifying()
                    ->withHeaders([
                        'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) EbigcartApp/1.0',
                        'Accept-Language' => 'en'
                    ])
                    ->timeout(6)
                    ->get("https://nominatim.openstreetmap.org/reverse?format=json&lat={$lat}&lon={$lon}&addressdetails=1");

                if ($response->successful()) {
                    $data = $response->json();
                    $addr = $data['address'] ?? [];

                    $houseNumber = $addr['house_number'] ?? '';
                    $building    = $addr['building'] ?? '';
                    $road        = $addr['road'] ?? '';
                    $line1       = implode(', ', array_filter([$houseNumber, $building, $road]));

                    $suburb        = $addr['suburb'] ?? '';
                    $neighbourhood = $addr['neighbourhood'] ?? '';
                    $village       = $addr['village'] ?? '';
                    $district      = $addr['city_district'] ?? '';
                    $line2         = implode(', ', array_filter([$neighbourhood, $suburb, $village, $district]));

                    $city  = $addr['city'] ?? $addr['town'] ?? $addr['village'] ?? $addr['county'] ?? $addr['state_district'] ?? '';
                    $state = $addr['state'] ?? '';
                    $zip   = $addr['postcode'] ?? '';

                    if ($city || $state || $line1 || $line2) {
                        return response()->json([
                            'success'  => true,
                            'address'  => $line1,
                            'address2' => $line2,
                            'city'     => $city,
                            'state'    => $state,
                            'zip'      => $zip,
                        ]);
                    }
                }
            } catch (\Exception $e) {
                Log::warning('OSM Reverse geocode error: ' . $e->getMessage());
            }

            // Attempt 2: BigDataCloud Reverse Geocoder
            try {
                $bdcResponse = \Illuminate\Support\Facades\Http::withoutVerifying()
                    ->timeout(6)
                    ->get("https://api.bigdatacloud.net/data/reverse-geocode-client?latitude={$lat}&longitude={$lon}&localityLanguage=en");

                if ($bdcResponse->successful()) {
                    $bdcData = $bdcResponse->json();
                    $city    = $bdcData['city'] ?? $bdcData['locality'] ?? '';
                    $state   = $bdcData['principalSubdivision'] ?? '';
                    $zip     = $bdcData['postcode'] ?? '';

                    if ($city || $state) {
                        return response()->json([
                            'success'  => true,
                            'address'  => '',
                            'address2' => '',
                            'city'     => $city,
                            'state'    => $state,
                            'zip'      => $zip,
                        ]);
                    }
                }
            } catch (\Exception $e) {
                Log::warning('BigDataCloud Reverse geocode error: ' . $e->getMessage());
            }
        }

        // 2. IP-based Geolocation Fallback 1: ip-api.com (HTTP - bypasses local cURL SSL issues)
        try {
            $ipApiResponse = \Illuminate\Support\Facades\Http::timeout(5)->get('http://ip-api.com/json/');
            if ($ipApiResponse->successful()) {
                $ipData = $ipApiResponse->json();
                if (($ipData['status'] ?? '') === 'success') {
                    return response()->json([
                        'success'  => true,
                        'address'  => '',
                        'address2' => '',
                        'city'     => $ipData['city'] ?? '',
                        'state'    => $ipData['regionName'] ?? '',
                        'zip'      => $ipData['zip'] ?? '',
                    ]);
                }
            }
        } catch (\Exception $e) {
            Log::warning('ip-api geocode error: ' . $e->getMessage());
        }

        // 3. IP-based Geolocation Fallback 2: ipwho.is
        try {
            $ipwhoResponse = \Illuminate\Support\Facades\Http::withoutVerifying()->timeout(5)->get('https://ipwho.is/');
            if ($ipwhoResponse->successful()) {
                $ipData = $ipwhoResponse->json();
                if ($ipData['success'] ?? false) {
                    return response()->json([
                        'success'  => true,
                        'address'  => '',
                        'address2' => '',
                        'city'     => $ipData['city'] ?? '',
                        'state'    => $ipData['region'] ?? '',
                        'zip'      => $ipData['postal'] ?? '',
                    ]);
                }
            }
        } catch (\Exception $e) {
            Log::warning('ipwho geocode error: ' . $e->getMessage());
        }

        // 4. IP-based Geolocation Fallback 3: ipapi.co
        try {
            $ipapiResponse = \Illuminate\Support\Facades\Http::withoutVerifying()->timeout(5)->get('https://ipapi.co/json/');
            if ($ipapiResponse->successful()) {
                $ipData = $ipapiResponse->json();
                return response()->json([
                    'success'  => true,
                    'address'  => '',
                    'address2' => '',
                    'city'     => $ipData['city'] ?? '',
                    'state'    => $ipData['region'] ?? $ipData['region_code'] ?? '',
                    'zip'      => $ipData['postal'] ?? '',
                ]);
            }
        } catch (\Exception $e) {
            Log::warning('ipapi geocode error: ' . $e->getMessage());
        }

        return response()->json([
            'success' => false,
            'message' => 'Unable to detect location automatically.'
        ]);
    }

    // Show Checkout Form
    public function index()
    {
        if (auth()->user() && auth()->user()->is_admin) {
            return redirect()->route('cart.index')->with('error', 'Admins are not allowed to place orders.');
        }

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('warning', 'Your cart is empty! Please add products before checking out.');
        }

        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }

        $coupon = session()->get('coupon');
        $discountAmount = 0;
        if ($coupon) {
            if ($coupon['type'] == 'fixed') {
                $discountAmount = $coupon['value'];
            } else {
                $discountAmount = $subtotal * ($coupon['value'] / 100);
            }
        }
        $total = max(0, $subtotal - $discountAmount);

        return view('frontend.checkout', compact('cart', 'subtotal', 'discountAmount', 'total'));
    }

    // Place Order
    public function store(Request $request)
    {
        if (auth()->user() && auth()->user()->is_admin) {
            return redirect()->route('cart.index')->with('error', 'Admins are not allowed to place orders.');
        }

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        // Validate stock availability for all cart items
        foreach ($cart as $productId => $item) {
            $product = Product::find($productId);
            if (!$product || $product->quantity < $item['quantity']) {
                $available = $product ? $product->quantity : 0;
                return redirect()->route('cart.index')->with('error', "Cannot complete order: '{$item['name']}' only has {$available} unit(s) left in stock.");
            }
        }

        // Validate basic info
        $validated = $request->validate([
            'shipping_name'    => 'required|string|max:255',
            'shipping_email'   => 'required|email|max:255',
            'shipping_phone'   => 'required|string|max:20',
            'delivery_type'    => 'required|string|in:online_delivery,self_pickup',
            'payment_method'   => 'required|string|in:cod,razorpay',
            'notes'            => 'nullable|string',
        ]);

        $selectedAddressId = $request->input('selected_address_id');
        $drivingLicensePath = null;
        $salesTaxPermitPath = null;

        if ($validated['delivery_type'] === 'self_pickup') {
            $shippingAddress  = \App\Models\Setting::get('ups_ship_from_address', '12800 Northborough Dr');
            $shippingAddress2 = '';
            $shippingCity     = \App\Models\Setting::get('ups_ship_from_city', 'Houston');
            $shippingState    = \App\Models\Setting::get('ups_ship_from_state', 'TX');
            $shippingZip      = \App\Models\Setting::get('ups_ship_from_zip', '77067');
        } else {
            // Check if user selected a saved address
            if (auth()->check() && $selectedAddressId && $selectedAddressId !== 'new') {
                $savedAddress = auth()->user()->addresses()->find($selectedAddressId);
                if ($savedAddress) {
                    $shippingAddress    = $savedAddress->address;
                    $shippingAddress2   = $savedAddress->address2;
                    $shippingCity       = $savedAddress->city;
                    $shippingState      = $savedAddress->state;
                    $shippingZip        = $savedAddress->zip;
                    $drivingLicensePath = $savedAddress->driving_license;
                    $salesTaxPermitPath = $savedAddress->sales_tax_permit;
                } else {
                    abort(400, 'Invalid address selection.');
                }
            } else {
                // Validate address details if online delivery
                $rules = [
                    'shipping_address'  => 'required|string',
                    'shipping_address2' => 'nullable|string',
                    'shipping_city'     => 'required|string|max:100',
                    'shipping_state'    => 'required|string|max:100',
                    'shipping_zip'      => 'required|string|max:10',
                ];

                if (auth()->check()) {
                    $rules['driving_license'] = 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120';
                    $rules['sales_tax_permit'] = 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120';
                }

                $addressValidated = $request->validate($rules);

                $shippingAddress  = $addressValidated['shipping_address'];
                $shippingAddress2 = $addressValidated['shipping_address2'] ?? '';
                $shippingCity     = $addressValidated['shipping_city'];
                $shippingState    = $addressValidated['shipping_state'];
                $shippingZip      = $addressValidated['shipping_zip'];

                if (auth()->check()) {
                    if ($request->hasFile('driving_license')) {
                        $file = $request->file('driving_license');
                        $filename = time() . '_dl_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/documents'), $filename);
                        $drivingLicensePath = 'uploads/documents/' . $filename;
                    }

                    if ($request->hasFile('sales_tax_permit')) {
                        $file = $request->file('sales_tax_permit');
                        $filename = time() . '_st_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/documents'), $filename);
                        $salesTaxPermitPath = 'uploads/documents/' . $filename;
                    }

                    // Save as a new saved address for the user
                    $isFirst = auth()->user()->addresses()->count() === 0;
                    $newAddr = auth()->user()->addresses()->create([
                        'phone' => $validated['shipping_phone'],
                        'address' => $shippingAddress,
                        'address2' => $shippingAddress2,
                        'city' => $shippingCity,
                        'state' => $shippingState,
                        'zip' => $shippingZip,
                        'driving_license' => $drivingLicensePath,
                        'sales_tax_permit' => $salesTaxPermitPath,
                        'is_default' => $isFirst || $request->has('is_default'),
                    ]);

                    if ($newAddr->is_default) {
                        auth()->user()->addresses()->where('id', '!=', $newAddr->id)->update(['is_default' => false]);
                    }
                }
            }
        }

        // Merge address lines for legacy fields
        $fullAddress = trim($shippingAddress . ($shippingAddress2 ? ', ' . $shippingAddress2 : ''));

        // Auto-save user profile address if logged in and it's online delivery
        if (auth()->check() && $validated['delivery_type'] === 'online_delivery') {
            auth()->user()->update([
                'phone'   => $validated['shipping_phone'],
                'address' => $fullAddress,
                'city'    => $shippingCity,
                'state'   => $shippingState,
                'zip'     => $shippingZip,
            ]);
        }

        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }

        $coupon = session()->get('coupon');
        $discountAmount = 0;
        if ($coupon) {
            if ($coupon['type'] == 'fixed') {
                $discountAmount = $coupon['value'];
            } else {
                $discountAmount = $subtotal * ($coupon['value'] / 100);
            }
            \App\Models\Coupon::where('code', $coupon['code'])->increment('used');
        }
        $total = max(0, $subtotal - $discountAmount);

        $orderNumber = 'ORD-' . date('Ymd') . '-' . strtoupper(Str::random(4));

        // Create Order
        $order = Order::create([
            'user_id'          => auth()->id(),
            'order_number'     => $orderNumber,
            'total_amount'     => $total,
            'status'           => 'pending',
            'payment_status'   => 'pending',
            'payment_method'   => $validated['payment_method'],
            'delivery_type'    => $validated['delivery_type'],
            'notes'            => $validated['notes'] ?? null,
            'shipping_name'    => $validated['shipping_name'],
            'shipping_email'   => $validated['shipping_email'],
            'shipping_phone'   => $validated['shipping_phone'],
            'shipping_address' => $fullAddress,
            'shipping_city'    => $shippingCity,
            'shipping_state'   => $shippingState,
            'shipping_zip'     => $shippingZip,
            'driving_license'  => $drivingLicensePath,
            'sales_tax_permit' => $salesTaxPermitPath,
        ]);

        // Create Order Items and decrement stock
        foreach ($cart as $productId => $item) {
            $product = Product::find($productId);
            if ($product) {
                $product->decrement('quantity', $item['quantity']);
            }
            OrderItem::create([
                'order_id'     => $order->id,
                'product_id'   => $productId,
                'product_name' => $item['name'],
                'quantity'     => $item['quantity'],
                'unit_price'   => $item['price'],
                'total_price'  => $item['price'] * $item['quantity'],
            ]);
        }

        // --- RAZORPAY PAYMENT ---
        if ($validated['payment_method'] === 'razorpay') {
            $key = config('services.razorpay.key');
            $secret = config('services.razorpay.secret');

            if (empty($key) || empty($secret)) {
                $this->restoreCartAndCancelOrder($order, 'Razorpay credentials missing in .env file.');
                return redirect()->route('checkout.index')->with('error', 'Razorpay payment is not configured yet (RAZORPAY_KEY & RAZORPAY_SECRET missing in .env). Please select Cash on Delivery (COD) to place your order.');
            }

            try {
                $api = new \Razorpay\Api\Api($key, $secret);

                $receiptId = 'rcpt_' . Str::random(10);
                $orderData = [
                    'receipt'         => $receiptId,
                    'amount'          => (int) round($total * 100), // rupees in paise
                    'currency'        => 'INR',
                    'payment_capture' => 1 // auto capture
                ];

                $razorpayOrder = $api->order->create($orderData);

                $order->update([
                    'razorpay_order_id' => $razorpayOrder['id'],
                ]);

                return view('frontend.razorpay_payment', [
                    'order'           => $order,
                    'razorpayOrderId' => $razorpayOrder['id'],
                    'amount'          => $orderData['amount'],
                    'razorpayKey'     => $key,
                ]);

            } catch (\Exception $e) {
                $this->restoreCartAndCancelOrder($order, 'Razorpay Order creation failed: ' . $e->getMessage());
                return redirect()->route('checkout.index')->with('error', 'Unable to initiate payment (' . $e->getMessage() . '). Your cart has been restored. Please select Cash on Delivery (COD) or check your Razorpay API keys.');
            }
        }

        // --- COD FLOW ---
        session()->forget('cart');
        session()->forget('coupon');
        return redirect()->route('checkout.success', ['order_number' => $order->order_number])
            ->with('success', 'Thank you! Your order has been placed successfully.');
    }

    // Handle Razorpay payment success callback
    public function handleRazorpayCallback(Request $request)
    {
        $razorpayPaymentId = $request->input('razorpay_payment_id');
        $razorpayOrderId   = $request->input('razorpay_order_id');
        $razorpaySignature = $request->input('razorpay_signature');

        if (!$razorpayPaymentId || !$razorpayOrderId || !$razorpaySignature) {
            return redirect()->route('checkout.index')->with('error', 'Invalid payment response.');
        }

        $order = Order::where('razorpay_order_id', $razorpayOrderId)->first();

        if (!$order) {
            return redirect()->route('checkout.index')->with('error', 'Order not found.');
        }

        try {
            $api = new \Razorpay\Api\Api(config('services.razorpay.key'), config('services.razorpay.secret'));
            
            $attributes = array(
                'razorpay_order_id' => $razorpayOrderId,
                'razorpay_payment_id' => $razorpayPaymentId,
                'razorpay_signature' => $razorpaySignature
            );
            
            $api->utility->verifyPaymentSignature($attributes);

            $order->update([
                'payment_status' => 'completed',
                'status'         => 'processing',
                'razorpay_payment_id' => $razorpayPaymentId,
                'razorpay_signature' => $razorpaySignature,
            ]);

            session()->forget('cart');
            session()->forget('coupon');

            return redirect()->route('checkout.success', ['order_number' => $order->order_number])
                ->with('success', 'Payment successful! Your order has been placed.');

        } catch (\Razorpay\Api\Errors\SignatureVerificationError $e) {
            $this->restoreCartAndCancelOrder($order, 'Payment signature verification failed.');
            return redirect()->route('checkout.index')->with('error', 'Payment verification failed. Your cart has been restored.');
        } catch (\Exception $e) {
            $this->restoreCartAndCancelOrder($order, 'Payment failed or was cancelled: ' . $e->getMessage());
            return redirect()->route('checkout.index')->with('error', 'Payment was not completed. Your cart has been restored.');
        }
    }

    // Cancel payment — restore cart
    public function cancelRazorpayPayment(Request $request)
    {
        $orderId = $request->query('order_id');
        if ($orderId) {
            $order = Order::where('id', $orderId)->where('payment_status', 'pending')->with('items.product')->first();
            if ($order) {
                $this->restoreCartAndCancelOrder($order, 'Payment cancelled by user.');
            }
        }

        return redirect()->route('checkout.index')->with('warning', 'Payment was cancelled. Your cart has been restored — please try again.');
    }

    // Razorpay Webhook — server-to-server event
    public function razorpayWebhook(Request $request)
    {
        $payload = $request->getContent();
        $sigHeader = $request->header('X-Razorpay-Signature');
        $secret = config('services.razorpay.webhook_secret'); // You may need to add this in services.php if using webhooks

        if (!$secret || !$sigHeader) {
            return response()->json(['error' => 'Webhook secret or signature missing'], 400);
        }

        try {
            $api = new \Razorpay\Api\Api(config('services.razorpay.key'), config('services.razorpay.secret'));
            $api->utility->verifyWebhookSignature($payload, $sigHeader, $secret);
        } catch (\Razorpay\Api\Errors\SignatureVerificationError $e) {
            Log::warning('Razorpay Webhook: Invalid signature — ' . $e->getMessage());
            return response()->json(['error' => 'Invalid signature'], 400);
        }

        $event = json_decode($payload, true);
        Log::info('Razorpay Webhook received: ' . $event['event']);

        if ($event['event'] === 'payment.captured') {
            $payment = $event['payload']['payment']['entity'];
            $order = Order::where('razorpay_order_id', $payment['order_id'])->first();
            
            if ($order && $order->payment_status !== 'completed') {
                $order->update([
                    'payment_status' => 'completed',
                    'status'         => 'processing',
                ]);
                Log::info('Razorpay Webhook: Order ' . $order->order_number . ' marked completed.');
            }
        }

        if ($event['event'] === 'payment.failed') {
            $payment = $event['payload']['payment']['entity'];
            $order = Order::where('razorpay_order_id', $payment['order_id'])->first();
            
            if ($order && $order->payment_status === 'pending') {
                $order->update([
                    'payment_status' => 'failed',
                    'status'         => 'failed',
                    'notes'          => 'Razorpay payment failed via webhook.',
                ]);
            }
        }

        return response()->json(['status' => 'ok'], 200);
    }

    // Order Success page
    public function success($order_number)
    {
        $query = Order::where('order_number', $order_number)->with('items');
        if (auth()->check()) {
            $query->where('user_id', auth()->id());
        }
        $order = $query->firstOrFail();
        return view('frontend.order_success', compact('order'));
    }

    // Helper: restore session cart from order items and cancel the order
    private function restoreCartAndCancelOrder(Order $order, string $reason = ''): void
    {
        $cart = session()->get('cart', []);
        foreach ($order->items as $item) {
            $cart[$item->product_id] = [
                'name'     => $item->product_name,
                'price'    => $item->unit_price,
                'quantity' => $item->quantity,
                'image'    => $item->product ? $item->product->primary_image_url : asset('images/logo.jpeg'),
            ];
            // Restore stock
            if ($item->product) {
                $item->product->increment('quantity', $item->quantity);
            }
        }
        session()->put('cart', $cart);

        $order->update([
            'status'         => 'cancelled',
            'payment_status' => 'failed',
            'notes'          => $reason,
        ]);
    }
}
