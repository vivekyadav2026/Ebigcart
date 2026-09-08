@extends('layouts.frontend')

@section('title', 'Checkout')

@section('content')
    @php
        $address1 = '';
        $address2 = '';
        if (auth()->check() && auth()->user()->address) {
            $parts = explode("\n", auth()->user()->address, 2);
            $address1 = $parts[0] ?? '';
            $address2 = $parts[1] ?? '';
            
            if (empty($address2) && str_contains($address1, ',')) {
                $parts = explode(',', $address1, 2);
                $address1 = trim($parts[0]);
                $address2 = trim($parts[1]);
            }
        }
    @endphp

    <div class="bg-slate-50/70 py-6 md:py-10 min-h-screen relative z-0">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Flash Messages -->
            @if(session('warning'))
                <div class="mb-6 flex items-center gap-3 bg-amber-50 border border-amber-200 text-amber-900 rounded-2xl px-4.5 py-3 text-xs font-medium shadow-xs">
                    <div class="w-7 h-7 rounded-xl bg-amber-100 flex items-center justify-center text-amber-700 flex-shrink-0">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                    </div>
                    <span class="flex-1">{{ session('warning') }}</span>
                </div>
            @endif
            @if(session('error'))
                <div class="mb-6 flex items-center gap-3 bg-rose-50 border border-rose-200 text-rose-900 rounded-2xl px-4.5 py-3 text-xs font-medium shadow-xs">
                    <div class="w-7 h-7 rounded-xl bg-rose-100 flex items-center justify-center text-rose-700 flex-shrink-0">
                        <i class="fa-solid fa-circle-xmark"></i>
                    </div>
                    <span class="flex-1">{{ session('error') }}</span>
                </div>
            @endif

            <!-- Top Header & Checkout Steps -->
            <div class="mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs">
                <div>
                    <h1 class="text-2xl md:text-3xl font-extrabold text-slate-900 tracking-tight" style="font-family: 'Outfit', sans-serif;">Checkout</h1>
                    <nav class="flex text-xs text-slate-400 mt-1 space-x-2">
                        <a href="/" class="hover:text-primary transition-colors font-medium">Home</a>
                        <span>/</span>
                        <a href="{{ route('cart.index') }}" class="hover:text-primary transition-colors font-medium">Cart</a>
                        <span>/</span>
                        <span class="text-slate-800 font-bold">Checkout</span>
                    </nav>
                </div>
                
                <!-- Steps Indicator -->
                <div class="flex items-center gap-2 self-start sm:self-auto text-xs">
                    <span class="flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-primary/10 text-primary font-extrabold border border-primary/20">
                        <span class="w-5 h-5 rounded-full bg-primary text-white text-[10px] flex items-center justify-center font-bold">1</span>
                        Shipping & Address
                    </span>
                    <span class="text-slate-300"><i class="fa-solid fa-chevron-right text-[10px]"></i></span>
                    <span class="flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-slate-100 text-slate-600 font-semibold">
                        <span class="w-5 h-5 rounded-full bg-slate-300 text-slate-700 text-[10px] flex items-center justify-center font-bold">2</span>
                        Payment
                    </span>
                </div>
            </div>

            @if ($errors->any())
                <div class="bg-rose-50 border border-rose-200 text-rose-700 px-4.5 py-3 rounded-2xl mb-6 shadow-xs">
                    <div class="flex items-center gap-2 font-bold text-xs mb-1">
                        <i class="fa-solid fa-triangle-exclamation text-rose-500"></i> Please fix the following errors:
                    </div>
                    <ul class="list-disc list-inside text-xs space-y-0.5 ml-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @guest
                <div class="mb-6 p-4 bg-gradient-to-r from-primary/5 via-primary/10 to-transparent border border-primary/20 rounded-2xl flex items-center gap-4 shadow-xs">
                    <div class="h-10 w-10 rounded-2xl bg-primary/15 flex items-center justify-center text-primary flex-shrink-0">
                        <i class="fa-regular fa-user text-base"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="text-xs font-bold text-slate-900">Guest Checkout</h4>
                        <p class="text-[11px] text-slate-600">Have an account? <a href="{{ route('login') }}" class="text-primary font-bold hover:underline">Log in here</a> to use saved addresses and fast checkout.</p>
                    </div>
                </div>
            @endguest

            @php
                $defaultAddress = auth()->check() ? auth()->user()->addresses()->where('is_default', true)->first() : null;
                $defaultAddressId = $defaultAddress ? $defaultAddress->id : 'new';
            @endphp

            <form action="{{ route('checkout.store') }}" method="POST" enctype="multipart/form-data" 
                  x-data="{ deliveryType: 'online_delivery', selectedAddressId: '{{ $defaultAddressId }}', paymentMethod: 'cod' }">
                @csrf

                <div class="flex flex-col lg:flex-row gap-6 lg:gap-8 items-start">
                    
                    <!-- Left Column: Customer Details, Address & Payment -->
                    <div class="w-full lg:w-2/3 space-y-6">
                        <input type="hidden" name="delivery_type" value="online_delivery">

                        <!-- Section 1: Customer Contact Info -->
                        <div class="bg-white border border-slate-200/90 rounded-2xl p-5 md:p-6 shadow-xs hover:shadow-sm transition-shadow">
                            <div class="flex items-center gap-3 mb-5 pb-3.5 border-b border-slate-100">
                                <div class="w-9 h-9 rounded-xl bg-primary/10 text-primary flex items-center justify-center font-bold text-sm flex-shrink-0">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                                <div>
                                    <h2 class="text-base font-bold text-slate-900 leading-tight" style="font-family: 'Outfit', sans-serif;">Customer & Contact Info</h2>
                                    <p class="text-[11px] text-slate-400">Order updates will be sent to this email & phone</p>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label class="block text-[11px] font-bold text-slate-700 uppercase tracking-wider mb-1.5">Full Name <span class="text-rose-500">*</span></label>
                                    <input type="text" name="shipping_name" value="{{ old('shipping_name', auth()->check() ? auth()->user()->name : '') }}" required 
                                           class="w-full bg-white border @error('shipping_name') border-rose-500 @else border-slate-300 @enderror rounded-xl px-3.5 py-2.5 text-xs text-slate-900 font-medium focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition duration-200 shadow-2xs" placeholder="Enter full name">
                                    @error('shipping_name')
                                        <span class="text-rose-500 text-[10px] mt-1 block font-medium">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-[11px] font-bold text-slate-700 uppercase tracking-wider mb-1.5">Email Address <span class="text-rose-500">*</span></label>
                                    <input type="email" name="shipping_email" value="{{ old('shipping_email', auth()->check() ? auth()->user()->email : '') }}" required 
                                           class="w-full bg-white border @error('shipping_email') border-rose-500 @else border-slate-300 @enderror rounded-xl px-3.5 py-2.5 text-xs text-slate-900 font-medium focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition duration-200 shadow-2xs" placeholder="name@example.com">
                                    @error('shipping_email')
                                        <span class="text-rose-500 text-[10px] mt-1 block font-medium">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label class="block text-[11px] font-bold text-slate-700 uppercase tracking-wider mb-1.5">Phone Number <span class="text-rose-500">*</span></label>
                                <input type="text" name="shipping_phone" value="{{ old('shipping_phone', auth()->check() ? auth()->user()->phone : '') }}" required 
                                       class="w-full bg-white border @error('shipping_phone') border-rose-500 @else border-slate-300 @enderror rounded-xl px-3.5 py-2.5 text-xs text-slate-900 font-medium focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition duration-200 shadow-2xs" placeholder="10-digit Mobile Number">
                                @error('shipping_phone')
                                    <span class="text-rose-500 text-[10px] mt-1 block font-medium">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Section 2: Delivery Address -->
                        <div class="bg-white border border-slate-200/90 rounded-2xl p-5 md:p-6 shadow-xs hover:shadow-sm transition-shadow">
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-5 pb-3.5 border-b border-slate-100">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-xl bg-primary/10 text-primary flex items-center justify-center font-bold text-sm flex-shrink-0">
                                        <i class="fa-solid fa-location-dot"></i>
                                    </div>
                                    <div>
                                        <h2 class="text-base font-bold text-slate-900 leading-tight" style="font-family: 'Outfit', sans-serif;">Shipping Address</h2>
                                        <p class="text-[11px] text-slate-400">Where should we deliver your order?</p>
                                    </div>
                                </div>

                                <button type="button" id="detect-location-btn" onclick="detectUserLocation(this)" 
                                        class="self-start sm:self-auto text-xs text-primary bg-primary/10 hover:bg-primary/20 border border-primary/25 rounded-xl px-3.5 py-2 font-bold flex items-center gap-2 cursor-pointer transition shadow-2xs whitespace-nowrap active:scale-95">
                                    <i class="fa-solid fa-location-crosshairs text-xs"></i> Auto-Detect Location
                                </button>
                            </div>

                            @auth
                                @php
                                    $userAddresses = auth()->user()->addresses;
                                @endphp
                                @if($userAddresses->isNotEmpty())
                                    <div class="mb-5 space-y-3">
                                        <label class="block text-[11px] font-bold text-slate-700 uppercase tracking-wider">Saved Addresses</label>
                                        <div class="grid grid-cols-1 gap-3 max-h-60 overflow-y-auto pr-1">
                                            @foreach($userAddresses as $addr)
                                                <label class="relative flex items-start p-4 border-2 transition-all cursor-pointer rounded-2xl bg-white shadow-2xs hover:border-slate-300"
                                                       :class="selectedAddressId == '{{ $addr->id }}' ? 'border-primary bg-primary/2 ring-1 ring-primary/20 shadow-xs' : 'border-slate-200/90'">
                                                    <input type="radio" name="selected_address_id" value="{{ $addr->id }}" {{ $addr->is_default ? 'checked' : '' }}
                                                           @click="selectedAddressId = '{{ $addr->id }}';"
                                                           class="mt-1 h-4 w-4 text-primary border-slate-300 focus:ring-primary">
                                                    <div class="ml-3.5 flex-1">
                                                        <div class="flex items-center gap-2 mb-1">
                                                            <p class="text-xs font-bold text-slate-900">{{ $addr->address }}@if($addr->address2), {{ $addr->address2 }}@endif</p>
                                                            @if($addr->is_default)
                                                                <span class="text-[9px] font-extrabold bg-emerald-500 text-white px-2 py-0.5 rounded-full uppercase tracking-wider">Default</span>
                                                            @endif
                                                        </div>
                                                        <p class="text-[11px] text-slate-600 font-medium">{{ $addr->city }}, {{ $addr->state }} - {{ $addr->zip }}</p>
                                                        <p class="text-[10px] text-slate-400 mt-0.5">Phone: {{ $addr->phone }}</p>
                                                    </div>
                                                </label>
                                            @endforeach
                                            
                                            <label class="flex items-center p-3.5 border-2 transition-all cursor-pointer rounded-2xl bg-slate-50/70 hover:bg-white hover:border-slate-300"
                                                   :class="selectedAddressId == 'new' ? 'border-primary bg-primary/2 ring-1 ring-primary/20 shadow-xs' : 'border-slate-200/90'">
                                                <input type="radio" name="selected_address_id" value="new" {{ !$defaultAddress ? 'checked' : '' }}
                                                       @click="selectedAddressId = 'new';"
                                                       class="h-4 w-4 text-primary border-slate-300 focus:ring-primary">
                                                <div class="ml-3 flex items-center gap-2">
                                                    <i class="fa-solid fa-plus-circle text-primary text-sm"></i>
                                                    <p class="text-xs font-bold text-slate-900">Add New Address / Custom Location</p>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                @endif
                            @endauth

                            <div x-show="selectedAddressId === 'new'" class="space-y-4 pt-1">
                                <div>
                                    <label class="block text-[11px] font-bold text-slate-700 uppercase tracking-wider mb-1.5">Flat / House No. / Building <span class="text-rose-500">*</span></label>
                                    <input type="text" name="shipping_address" value="{{ old('shipping_address', $address1) }}" :required="selectedAddressId === 'new'" 
                                           class="w-full bg-white border @error('shipping_address') border-rose-500 @else border-slate-300 @enderror rounded-xl px-3.5 py-2.5 text-xs text-slate-900 font-medium focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition duration-200 shadow-2xs" placeholder="e.g. Flat 302, Green Apartments">
                                    @error('shipping_address')
                                        <span class="text-rose-500 text-[10px] mt-1 block font-medium">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-[11px] font-bold text-slate-700 uppercase tracking-wider mb-1.5">Area / Colony / Street / Landmark</label>
                                    <input type="text" name="shipping_address2" value="{{ old('shipping_address2', $address2) }}" 
                                           class="w-full bg-white border border-slate-300 rounded-xl px-3.5 py-2.5 text-xs text-slate-900 font-medium focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition duration-200 shadow-2xs" placeholder="e.g. Near Kalideh Police Chowk, Vrindavan">
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div>
                                        <label class="block text-[11px] font-bold text-slate-700 uppercase tracking-wider mb-1.5">City <span class="text-rose-500">*</span></label>
                                        <input type="text" name="shipping_city" value="{{ old('shipping_city', auth()->check() ? auth()->user()->city : '') }}" :required="selectedAddressId === 'new'" 
                                               class="w-full bg-white border @error('shipping_city') border-rose-500 @else border-slate-300 @enderror rounded-xl px-3.5 py-2.5 text-xs text-slate-900 font-medium focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition duration-200 shadow-2xs" placeholder="City">
                                        @error('shipping_city')
                                            <span class="text-rose-500 text-[10px] mt-1 block font-medium">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label class="block text-[11px] font-bold text-slate-700 uppercase tracking-wider mb-1.5">State <span class="text-rose-500">*</span></label>
                                        <input type="text" name="shipping_state" value="{{ old('shipping_state', auth()->check() ? auth()->user()->state : '') }}" :required="selectedAddressId === 'new'" 
                                               class="w-full bg-white border @error('shipping_state') border-rose-500 @else border-slate-300 @enderror rounded-xl px-3.5 py-2.5 text-xs text-slate-900 font-medium focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition duration-200 uppercase shadow-2xs" placeholder="State">
                                        @error('shipping_state')
                                            <span class="text-rose-500 text-[10px] mt-1 block font-medium">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label class="block text-[11px] font-bold text-slate-700 uppercase tracking-wider mb-1.5">ZIP / Pincode <span class="text-rose-500">*</span></label>
                                        <input type="text" name="shipping_zip" value="{{ old('shipping_zip', auth()->check() ? auth()->user()->zip : '') }}" :required="selectedAddressId === 'new'" 
                                               class="w-full bg-white border @error('shipping_zip') border-rose-500 @else border-slate-300 @enderror rounded-xl px-3.5 py-2.5 text-xs text-slate-900 font-medium focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition duration-200 shadow-2xs" placeholder="e.g. 281121">
                                        @error('shipping_zip')
                                            <span class="text-rose-500 text-[10px] mt-1 block font-medium">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                @auth
                                    <div class="flex items-center gap-2 pt-1">
                                        <input type="checkbox" name="is_default" id="is_default" value="1" class="rounded border-slate-300 text-primary focus:ring-primary/25 h-4 w-4 cursor-pointer">
                                        <label for="is_default" class="text-xs font-bold text-slate-700 select-none cursor-pointer">Save as default address</label>
                                    </div>
                                @endauth
                            </div>

                            <div class="mt-5 pt-3 border-t border-slate-100">
                                <label class="block text-[11px] font-bold text-slate-700 uppercase tracking-wider mb-1.5">Delivery Notes (Optional)</label>
                                <textarea name="notes" rows="2" class="w-full bg-white border border-slate-300 rounded-xl px-3.5 py-2.5 text-xs text-slate-900 font-medium focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition duration-200 shadow-2xs" placeholder="Special delivery instructions or landmark details.">{{ old('notes') }}</textarea>
                            </div>
                        </div>

                        <!-- Section 3: Payment Method -->
                        <div class="bg-white border border-slate-200/90 rounded-2xl p-5 md:p-6 shadow-xs hover:shadow-sm transition-shadow">
                            <div class="flex items-center gap-3 mb-5 pb-3.5 border-b border-slate-100">
                                <div class="w-9 h-9 rounded-xl bg-primary/10 text-primary flex items-center justify-center font-bold text-sm flex-shrink-0">
                                    <i class="fa-solid fa-credit-card"></i>
                                </div>
                                <div>
                                    <h2 class="text-base font-bold text-slate-900 leading-tight" style="font-family: 'Outfit', sans-serif;">Payment Method</h2>
                                    <p class="text-[11px] text-slate-400">Select your preferred payment method</p>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <!-- Cash On Delivery Card -->
                                <label class="relative flex items-start p-4 border-2 rounded-2xl cursor-pointer transition-all duration-200 bg-white"
                                       :class="paymentMethod === 'cod' ? 'border-primary bg-primary/2 ring-1 ring-primary/20 shadow-xs' : 'border-slate-200 hover:border-slate-300'">
                                    <input type="radio" name="payment_method" value="cod" checked @click="paymentMethod = 'cod'" class="mt-1 h-4 w-4 text-primary focus:ring-primary border-slate-300">
                                    <div class="ml-3.5 flex-1">
                                        <div class="flex items-center gap-2 mb-0.5">
                                            <span class="font-extrabold text-slate-900 text-xs">Cash on Delivery</span>
                                            <span class="text-[9px] bg-emerald-500 text-white font-extrabold px-2 py-0.5 rounded-full uppercase tracking-wider">Popular</span>
                                        </div>
                                        <span class="text-[11px] text-slate-500 font-medium block">Pay with cash upon arrival at your door</span>
                                    </div>
                                    <div class="ml-2 w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center flex-shrink-0 text-sm">
                                        <i class="fa-solid fa-money-bill-wave"></i>
                                    </div>
                                </label>

                                <!-- Razorpay Card -->
                                <label class="relative flex items-start p-4 border-2 rounded-2xl cursor-pointer transition-all duration-200 bg-white"
                                       :class="paymentMethod === 'razorpay' ? 'border-primary bg-primary/2 ring-1 ring-primary/20 shadow-xs' : 'border-slate-200 hover:border-slate-300'">
                                    <input type="radio" name="payment_method" value="razorpay" @click="paymentMethod = 'razorpay'" class="mt-1 h-4 w-4 text-primary focus:ring-primary border-slate-300">
                                    <div class="ml-3.5 flex-1">
                                        <div class="flex items-center gap-2 mb-0.5">
                                            <span class="font-extrabold text-slate-900 text-xs">Razorpay Online</span>
                                            <span class="text-[9px] bg-blue-600 text-white font-extrabold px-2 py-0.5 rounded-full uppercase tracking-wider">Instant</span>
                                        </div>
                                        <span class="text-[11px] text-slate-500 font-medium block">UPI (GPay, PhonePe), Cards & NetBanking</span>
                                    </div>
                                    <div class="ml-2 w-9 h-9 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center flex-shrink-0 text-sm">
                                        <i class="fa-solid fa-bolt"></i>
                                    </div>
                                </label>
                            </div>
                        </div>

                    </div>

                    <!-- Right Column: Enhanced "Your Order" Sticky Card -->
                    <div class="w-full lg:w-1/3">
                        <div class="bg-white border border-slate-200/90 rounded-2xl p-5 sm:p-6 sticky top-28 shadow-lg shadow-slate-200/40 transition-all z-10">
                            
                            <!-- Card Header -->
                            <div class="flex items-center justify-between pb-4 mb-4 border-b border-slate-100">
                                <div class="flex items-center gap-2.5">
                                    <div class="w-8 h-8 rounded-xl bg-primary/10 text-primary flex items-center justify-center text-xs font-bold">
                                        <i class="fa-solid fa-bag-shopping"></i>
                                    </div>
                                    <h3 class="text-base font-extrabold text-slate-900 tracking-tight" style="font-family: 'Outfit', sans-serif;">Your Order</h3>
                                </div>
                                <span class="bg-slate-100 text-slate-700 font-extrabold text-[10px] px-2.5 py-1 rounded-full uppercase">
                                    {{ count($cart) }} {{ count($cart) === 1 ? 'Item' : 'Items' }}
                                </span>
                            </div>
                            
                            <!-- Order Items List -->
                            <div class="divide-y divide-slate-100 max-h-72 overflow-y-auto pr-1 mb-4">
                                @foreach($cart as $id => $item)
                                    @php
                                        $liveProduct = \App\Models\Product::find($id);
                                        $itemName = $liveProduct ? $liveProduct->name : $item['name'];
                                        $itemPrice = $liveProduct ? ($liveProduct->sale_price ?? $liveProduct->price) : $item['price'];
                                        $itemImage = $liveProduct ? $liveProduct->primary_image_url : $item['image'];
                                    @endphp
                                    <div class="flex items-center justify-between py-3 group">
                                        <div class="flex items-center space-x-3 min-w-0">
                                            <div class="w-12 h-12 flex-shrink-0 bg-slate-50 border border-slate-100 rounded-xl p-1 flex items-center justify-center group-hover:scale-105 transition-transform duration-200">
                                                <img src="{{ $itemImage }}" alt="{{ $itemName }}" class="max-w-full max-h-full object-contain">
                                            </div>
                                            <div class="min-w-0 flex-1">
                                                <h4 class="font-bold text-slate-800 text-xs leading-snug truncate group-hover:text-primary transition-colors" title="{{ $itemName }}">{{ $itemName }}</h4>
                                                <div class="flex items-center gap-2 text-[11px] text-slate-400 mt-0.5">
                                                    <span>Qty: <strong class="text-slate-800">{{ $item['quantity'] }}</strong></span>
                                                    <span>•</span>
                                                    <span>&#8377;{{ number_format($itemPrice, 2) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <span class="font-extrabold text-slate-900 text-xs pl-2 flex-shrink-0" style="font-family: 'Outfit', sans-serif;">
                                            &#8377;{{ number_format($itemPrice * $item['quantity'], 2) }}
                                        </span>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Cost Breakdown -->
                            <div class="space-y-2.5 py-4 border-t border-slate-100 bg-slate-50/70 rounded-2xl p-4 mb-5 border border-slate-100">
                                <div class="flex justify-between text-slate-600 text-xs">
                                    <span>Subtotal</span>
                                    <span class="font-bold text-slate-900 font-sans">&#8377;{{ number_format($subtotal, 2) }}</span>
                                </div>

                                @if(isset($discountAmount) && $discountAmount > 0)
                                    <div class="flex justify-between text-emerald-600 text-xs font-bold">
                                        <span class="flex items-center gap-1"><i class="fa-solid fa-ticket text-[10px]"></i> Coupon Discount</span>
                                        <span>-&#8377;{{ number_format($discountAmount, 2) }}</span>
                                    </div>
                                @endif

                                <div class="flex justify-between text-slate-600 text-xs items-center">
                                    <span>Delivery Charge</span>
                                    <span class="text-emerald-700 font-extrabold bg-emerald-100 px-2 py-0.5 rounded-md text-[10px] uppercase tracking-wider">FREE</span>
                                </div>

                                <div class="border-t border-slate-200/80 pt-3 mt-1 flex justify-between items-baseline">
                                    <div>
                                        <span class="text-sm font-extrabold text-slate-900 block" style="font-family: 'Outfit', sans-serif;">Total Amount</span>
                                        <span class="text-[10px] text-slate-400 font-medium">Includes all taxes</span>
                                    </div>
                                    <span class="text-xl font-black text-slate-900 tracking-tight" style="font-family: 'Outfit', sans-serif;">
                                        &#8377;{{ number_format(isset($total) ? $total : $subtotal, 2) }}
                                    </span>
                                </div>
                            </div>

                            <!-- Place Order Button -->
                            <button type="submit" class="w-full bg-primary hover:bg-primary-dark text-white font-extrabold py-3.5 px-4 rounded-xl tracking-wider text-xs transition-all duration-300 shadow-md hover:shadow-xl transform active:scale-98 flex items-center justify-center gap-2 cursor-pointer group">
                                <i class="fa-solid fa-shield-halved text-sm group-hover:scale-110 transition-transform"></i>
                                <span>PLACE ORDER NOW</span>
                                <span class="bg-white/20 px-2.5 py-0.5 rounded-md text-[10px] ml-1">&#8377;{{ number_format(isset($total) ? $total : $subtotal, 2) }}</span>
                            </button>

                            <!-- Trust Badges -->
                            <div class="mt-4 pt-4 border-t border-slate-100">
                                <div class="flex items-center justify-center gap-3 text-[10px] text-slate-400 font-bold">
                                    <span class="flex items-center gap-1 text-emerald-600">
                                        <i class="fa-solid fa-lock"></i> SSL Encrypted
                                    </span>
                                    <span>•</span>
                                    <span class="flex items-center gap-1 text-primary">
                                        <i class="fa-solid fa-truck-fast"></i> Fast Shipping
                                    </span>
                                    <span>•</span>
                                    <span class="flex items-center gap-1 text-blue-600">
                                        <i class="fa-solid fa-rotate-left"></i> Easy Returns
                                    </span>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    window.detectUserLocation = function(buttonElem) {
        const btn = buttonElem || document.getElementById('detect-location-btn');
        if (!btn) return;
        const originalText = btn.innerHTML;
        
        btn.disabled = true;
        btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Detecting...';

        // Auto-select "Add New Address" radio if saved addresses exist so input fields are visible
        const newAddrRadio = document.querySelector('input[name="selected_address_id"][value="new"]');
        if (newAddrRadio && !newAddrRadio.checked) {
            newAddrRadio.click();
        }

        function populate(data) {
            btn.disabled = false;
            btn.innerHTML = originalText;
            if (data && data.success) {
                const addrInput  = document.querySelector('input[name="shipping_address"]');
                const addr2Input = document.querySelector('input[name="shipping_address2"]');
                const cityInput  = document.querySelector('input[name="shipping_city"]');
                const stateInput = document.querySelector('input[name="shipping_state"]');
                const zipInput   = document.querySelector('input[name="shipping_zip"]');

                if (addrInput)  addrInput.value  = data.address  || '';
                if (addr2Input) addr2Input.value = data.address2 || '';
                if (cityInput)  cityInput.value  = data.city     || '';
                if (stateInput) stateInput.value = data.state    || '';
                if (zipInput)   zipInput.value   = data.zip      || '';

                alert('Location detected successfully! Please enter your house/flat number if required.');
            } else {
                alert('Could not auto-detect location. Please enter your address details manually.');
            }
        }

        function fetchLocation(url) {
            fetch(url)
                .then(res => res.json())
                .then(data => populate(data))
                .catch(() => {
                    btn.disabled = false;
                    btn.innerHTML = originalText;
                    alert('Could not auto-detect location. Please enter your address details manually.');
                });
        }

        if (!navigator.geolocation) {
            fetchLocation('/api/reverse-geocode');
            return;
        }

        navigator.geolocation.getCurrentPosition(
            function(position) {
                const lat = position.coords.latitude;
                const lon = position.coords.longitude;
                fetchLocation(`/api/reverse-geocode?lat=${lat}&lon=${lon}`);
            },
            function(error) {
                fetchLocation('/api/reverse-geocode');
            },
            {
                enableHighAccuracy: true,
                timeout: 8000
            }
        );
    };
</script>
@endpush
