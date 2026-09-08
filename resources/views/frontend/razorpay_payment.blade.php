@extends('layouts.frontend')

@section('title', 'Complete Payment — Ebigcart')

@section('content')
<div class="min-h-[75vh] flex items-center justify-center px-4 py-8 bg-slate-50">
    <div class="w-full max-w-xl">

        {{-- Header / Trust Title --}}
        <div class="text-center mb-6">
            <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl mb-3 shadow-md text-white" style="background: linear-gradient(135deg, #f08038, #cc5500);">
                <i class="fa-solid fa-shield-halved text-2xl"></i>
            </div>
            <h1 class="text-2xl font-bold text-slate-900 tracking-tight" style="font-family: 'Outfit', sans-serif;">Complete Your Order</h1>
            <p class="text-xs text-slate-500 mt-1">Order <span class="font-semibold text-slate-700">#{{ $order->order_number }}</span> is reserved for you</p>
        </div>

        <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden mb-6">
            
            {{-- Delivery & Order Quick Info --}}
            <div class="bg-slate-50/80 px-6 py-4 border-b border-slate-100 flex flex-wrap items-center justify-between gap-3">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center text-orange-600 font-semibold text-sm">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Deliver To</p>
                        <p class="text-sm font-bold text-slate-800">{{ $order->shipping_name }}</p>
                        <p class="text-xs text-slate-500 truncate max-w-[260px]">
                            {{ $order->shipping_address }}, {{ $order->shipping_city }} ({{ $order->shipping_zip }})
                        </p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Phone</p>
                    <p class="text-xs font-bold text-slate-700">{{ $order->shipping_phone }}</p>
                </div>
            </div>

            {{-- Items Preview --}}
            <div class="px-6 py-4 border-b border-slate-100 max-h-40 overflow-y-auto">
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Order Items ({{ $order->items->count() }})</p>
                <div class="space-y-2">
                    @foreach($order->items as $item)
                        <div class="flex items-center justify-between text-xs py-1">
                            <span class="text-slate-700 font-medium truncate max-w-[280px]">
                                {{ $item->product_name }} <span class="text-slate-400 font-normal">x {{ $item->quantity }}</span>
                            </span>
                            <span class="font-semibold text-slate-900">&#8377;{{ number_format($item->total_price, 2) }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Amount Summary --}}
            <div class="px-6 py-5 bg-orange-50/40 border-b border-slate-100 flex items-center justify-between">
                <div>
                    <span class="text-xs font-bold text-orange-800 uppercase tracking-wider">Total Amount Payable</span>
                    <p class="text-[11px] text-orange-600 font-medium">Includes all taxes & delivery charges</p>
                </div>
                <div class="text-right">
                    <span class="text-2xl font-black text-slate-900" style="font-family: 'Outfit', sans-serif;">&#8377;{{ number_format($order->total_amount, 2) }}</span>
                </div>
            </div>

            {{-- Payment Actions & Options --}}
            <div class="p-6">
                
                {{-- Supported Methods Badges (UPI, Cards, NetBanking) --}}
                <div class="mb-5">
                    <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-2.5 text-center">Accepted Payment Methods</p>
                    <div class="flex flex-wrap items-center justify-center gap-2">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-slate-100 text-slate-700 text-xs font-semibold border border-slate-200">
                            <i class="fa-solid fa-mobile-screen-button text-xs text-orange-500"></i> UPI (GPay/PhonePe/Paytm)
                        </span>
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-slate-100 text-slate-700 text-xs font-semibold border border-slate-200">
                            <i class="fa-solid fa-credit-card text-xs text-blue-500"></i> Credit / Debit Cards
                        </span>
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-slate-100 text-slate-700 text-xs font-semibold border border-slate-200">
                            <i class="fa-solid fa-building-columns text-xs text-emerald-500"></i> Net Banking
                        </span>
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-slate-100 text-slate-700 text-xs font-semibold border border-slate-200">
                            <i class="fa-solid fa-wallet text-xs text-purple-500"></i> Wallets
                        </span>
                    </div>
                </div>

                {{-- Hidden Form for submission --}}
                <form action="{{ route('checkout.razorpay.callback') }}" method="POST" id="razorpay-payment-form">
                    @csrf
                    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
                    <input type="hidden" name="razorpay_order_id" id="razorpay_order_id" value="{{ $razorpayOrderId }}">
                    <input type="hidden" name="razorpay_signature" id="razorpay_signature">

                    <button id="rzp-button1" type="button"
                        class="w-full text-white font-bold py-3.5 px-6 rounded-xl text-base tracking-wide transition-all duration-300 shadow-md hover:shadow-xl hover:opacity-95 flex items-center justify-center gap-2 cursor-pointer border-0"
                        style="background: linear-gradient(135deg, #f08038, #cc5500);">
                        <span id="btn-text" class="flex items-center gap-2">
                            <i class="fa-solid fa-lock text-sm"></i>
                            Pay &#8377;{{ number_format($order->total_amount, 2) }} Now
                        </span>
                        <span id="btn-spinner" class="hidden flex items-center gap-2">
                            <i class="fa-solid fa-spinner fa-spin"></i> Processing Payment...
                        </span>
                    </button>
                </form>

                {{-- Cancel option --}}
                <div class="text-center mt-4">
                    <a href="{{ route('checkout.razorpay.cancel', ['order_id' => $order->id]) }}"
                       class="text-xs text-slate-400 hover:text-red-600 transition-colors font-medium inline-flex items-center gap-1"
                       onclick="return confirm('Are you sure you want to cancel payment? Your cart items will be restored.')">
                        <i class="fa-solid fa-arrow-left text-[10px]"></i> Cancel and return to cart
                    </a>
                </div>

            </div>

        </div>

        {{-- Security Badges --}}
        <div class="flex items-center justify-center gap-4 text-slate-400 text-xs font-medium">
            <div class="flex items-center gap-1.5">
                <i class="fa-solid fa-shield-halved text-emerald-500"></i>
                <span>256-Bit Encryption</span>
            </div>
            <span>•</span>
            <div class="flex items-center gap-1.5">
                <i class="fa-solid fa-circle-check text-blue-500"></i>
                <span>Razorpay Secured</span>
            </div>
        </div>

    </div>
</div>
@endsection

@push('scripts')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var options = {
            "key": "{{ $razorpayKey }}", 
            "amount": "{{ $amount }}", 
            "currency": "INR",
            "name": "Ebigcart",
            "description": "Order #{{ $order->order_number }}",
            "image": "{{ asset('images/logo.jpeg') }}",
            "order_id": "{{ $razorpayOrderId }}", 
            "handler": function (response) {
                document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
                document.getElementById('razorpay_signature').value = response.razorpay_signature;
                
                // Show loading spinner
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
                "ondismiss": function() {
                    // Reset spinner if dismissed
                    document.getElementById('btn-text').classList.remove('hidden');
                    document.getElementById('btn-spinner').classList.add('hidden');
                    document.getElementById('rzp-button1').disabled = false;
                }
            }
        };

        var rzp1 = new Razorpay(options);

        // Manual click listener
        document.getElementById('rzp-button1').onclick = function(e){
            rzp1.open();
            e.preventDefault();
        };

        // Auto-open Razorpay modal on page load
        setTimeout(function() {
            rzp1.open();
        }, 400);
    });
</script>
@endpush
