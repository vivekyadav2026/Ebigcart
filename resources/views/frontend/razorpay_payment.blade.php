@extends('layouts.frontend')

@section('title', 'Complete Payment — Ebigcart')

@section('content')
<div class="min-h-[70vh] flex items-center justify-center px-4 py-10 bg-slate-50">
    <div class="w-full max-w-md">

        {{-- Header --}}
        <div class="text-center mb-6">
            <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl mb-3 shadow-md" style="background: linear-gradient(135deg, #f08038, #cc5500);">
                <i class="fa-solid fa-lock text-white text-lg"></i>
            </div>
            <h1 class="text-xl font-bold text-slate-900" style="font-family: 'Outfit', sans-serif;">Secure Payment</h1>
            <p class="text-xs text-slate-500 mt-1">Your payment is encrypted and secure</p>
        </div>

        {{-- Order Summary Card --}}
        <div class="bg-white border border-slate-200 rounded-2xl p-4 mb-4 shadow-sm">
            <div class="flex items-center justify-between mb-3 pb-2 border-b border-slate-100">
                <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Order</span>
                <span class="text-xs font-extrabold text-slate-900">#{{ $order->order_number }}</span>
            </div>
            <div class="flex items-center justify-between">
                <span class="text-sm text-slate-600 font-medium">Total Amount</span>
                <span class="text-lg font-extrabold text-slate-900" style="font-family: 'Outfit', sans-serif;">&#8377;{{ number_format($order->total_amount, 2) }}</span>
            </div>
        </div>

        {{-- Razorpay Payment Form --}}
        <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm">
            <div class="flex items-center gap-2 mb-4">
                <i class="fa-solid fa-credit-card text-slate-400 text-sm"></i>
                <span class="text-xs font-bold text-slate-700 uppercase tracking-wider">Payment Options</span>
                <div class="ml-auto flex items-center gap-1.5">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/4/41/Visa_Logo.png" alt="Visa" class="h-4 object-contain opacity-70">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Mastercard-logo.svg" alt="Mastercard" class="h-4 object-contain opacity-70">
                </div>
            </div>

            <form action="{{ route('checkout.razorpay.callback') }}" method="POST" id="razorpay-payment-form">
                @csrf
                <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
                <input type="hidden" name="razorpay_order_id" id="razorpay_order_id" value="{{ $razorpayOrderId }}">
                <input type="hidden" name="razorpay_signature" id="razorpay_signature">

                <button id="rzp-button1" type="button"
                    class="w-full text-white font-bold py-3 rounded-xl text-sm tracking-wide transition-all duration-300 shadow-md hover:shadow-lg flex items-center justify-center gap-2 cursor-pointer"
                    style="background: linear-gradient(135deg, #f08038, #cc5500);">
                    <span id="btn-text">
                        <i class="fa-solid fa-lock text-xs mr-1"></i>
                        Pay &#8377;{{ number_format($order->total_amount, 2) }} with Razorpay
                    </span>
                    <span id="btn-spinner" class="hidden">
                        <i class="fa-solid fa-spinner fa-spin"></i> Processing...
                    </span>
                </button>
            </form>

            {{-- Cancel link --}}
            <div class="text-center mt-4">
                <a href="{{ route('checkout.razorpay.cancel', ['order_id' => $order->id]) }}"
                   class="text-[11px] text-slate-400 hover:text-red-500 transition-colors font-medium"
                   onclick="return confirm('Cancel payment? Your cart will be restored.')">
                    <i class="fa-solid fa-xmark mr-1"></i>Cancel and go back to cart
                </a>
            </div>
        </div>

        {{-- Security badge --}}
        <div class="flex items-center justify-center gap-2 mt-4 text-[10px] text-slate-400 font-medium">
            <i class="fa-solid fa-shield-halved text-slate-300"></i>
            <span>Secured by <strong>Razorpay</strong> · 256-bit SSL Encryption</span>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    var options = {
        "key": "{{ $razorpayKey }}", 
        "amount": "{{ $amount }}", 
        "currency": "INR",
        "name": "Ebigcart",
        "description": "Order #{{ $order->order_number }}",
        "image": "{{ asset('images/logo.jpeg') }}", // Ensure this path is correct for your logo
        "order_id": "{{ $razorpayOrderId }}", 
        "handler": function (response){
            document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
            document.getElementById('razorpay_signature').value = response.razorpay_signature;
            
            // Show loading
            document.getElementById('btn-text').classList.add('hidden');
            document.getElementById('btn-spinner').classList.remove('hidden');
            document.getElementById('rzp-button1').disabled = true;

            // Submit form
            document.getElementById('razorpay-payment-form').submit();
        },
        "prefill": {
            "name": "{{ $order->shipping_name }}",
            "email": "{{ $order->shipping_email }}",
            "contact": "{{ $order->shipping_phone }}"
        },
        "theme": {
            "color": "#f08038"
        },
        "modal": {
            "ondismiss": function(){
                // User closed the popup
            }
        }
    };
    var rzp1 = new Razorpay(options);
    
    document.getElementById('rzp-button1').onclick = function(e){
        rzp1.open();
        e.preventDefault();
    }
</script>
@endpush
