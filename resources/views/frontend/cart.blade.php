@extends('layouts.frontend')

@section('title', 'Shopping Cart')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
    <!-- Breadcrumb & Page Header -->
    <div class="mb-4 flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-3.5 border-b border-slate-100">
        <div>
            <h1 class="text-xl sm:text-2xl font-extrabold text-slate-900 tracking-tight" style="font-family: 'Outfit', sans-serif;">Shopping Cart</h1>
            <p class="text-[10px] text-slate-400 mt-1 flex items-center gap-1.5 font-bold uppercase tracking-wider">
                <a href="/" class="hover:text-primary transition-colors">Home</a> 
                <span class="text-slate-300">/</span> 
                @if(Auth::check())
                    <a href="/dashboard" class="hover:text-primary transition-colors">Dashboard</a>
                    <span class="text-slate-300">/</span>
                @endif
                <span class="text-slate-800">Cart</span>
            </p>
        </div>
        <a href="/shop" class="text-xs font-bold text-primary hover:text-primary-dark transition-colors inline-flex items-center gap-1.5">
            <i class="fa-solid fa-arrow-left text-[10px]"></i> Continue Shopping
        </a>
    </div>

    <div class="flex flex-col lg:flex-row gap-6">
        @if(Auth::check())
            @include('frontend.partials.customer_sidebar')
        @endif

        <div class="w-full {{ Auth::check() ? 'lg:w-3/4' : 'w-full' }}">
            @if(empty($cart))
                <div class="p-10 text-center bg-white border border-slate-200/80 rounded-2xl shadow-sm my-2">
                    <div class="w-16 h-16 rounded-full bg-slate-50 border border-slate-100 flex items-center justify-center mx-auto mb-4">
                        <i class="fa-solid fa-bag-shopping text-slate-300 text-2xl"></i>
                    </div>
                    <h2 class="text-base font-extrabold text-slate-800 mb-1" style="font-family: 'Outfit', sans-serif;">Your Cart is Currently Empty</h2>
                    <p class="text-xs text-slate-400 mb-5 max-w-sm mx-auto leading-relaxed">Browse our collection of divine items, dresses, and accessories to add your favorite items.</p>
                    <a href="/shop" class="inline-flex items-center gap-2 bg-primary hover:bg-primary-dark text-white px-6 py-2.5 rounded-xl text-xs font-bold uppercase tracking-wider transition-colors shadow-sm">
                        <i class="fa-solid fa-store text-xs"></i> Explore Collection
                    </a>
                </div>
            @else
                <div class="flex flex-col lg:flex-row gap-6 items-start">
                    <!-- Left: Cart Items List -->
                    <div class="flex-1 bg-white border border-slate-200/80 rounded-2xl p-4 sm:p-5 shadow-2xs w-full">
                        <h2 class="text-xs font-extrabold text-slate-800 uppercase tracking-wider mb-4 pb-3 border-b border-slate-100 flex items-center gap-2" style="font-family: 'Outfit', sans-serif;">
                            <i class="fa-solid fa-cart-shopping text-primary"></i> Cart Items ({{ count($cart) }})
                        </h2>

                        <div class="space-y-4">
                            @foreach($cart as $id => $item)
                                @php
                                    $liveProduct = \App\Models\Product::find($id);
                                    $itemName = $liveProduct ? $liveProduct->name : $item['name'];
                                    $itemPrice = $liveProduct ? ($liveProduct->sale_price ?? $liveProduct->price) : $item['price'];
                                    $itemImage = $liveProduct ? $liveProduct->primary_image_url : $item['image'];
                                    $itemSlug = $liveProduct ? $liveProduct->slug : ($item['slug'] ?? '');
                                @endphp

                                <div id="cart-item-row-{{ $id }}" class="flex flex-col sm:flex-row items-start sm:items-center gap-4 pb-4 border-b border-slate-100 last:pb-0 last:border-b-0">
                                    <!-- Thumbnail -->
                                    <a href="{{ route('product.show', $itemSlug) }}" class="w-20 h-20 bg-slate-50 border border-slate-200/80 rounded-xl p-1.5 flex items-center justify-center flex-shrink-0 hover:border-slate-300 transition-all">
                                        <img src="{{ asset($itemImage) }}" alt="{{ $itemName }}" class="max-w-full max-h-full object-contain">
                                    </a>

                                    <!-- Details Column -->
                                    <div class="flex-1 min-w-0 w-full">
                                        <div class="flex items-start justify-between gap-3 mb-1">
                                            <a href="{{ route('product.show', $itemSlug) }}" class="text-xs sm:text-sm font-bold text-slate-900 hover:text-primary transition-colors line-clamp-2 leading-snug">
                                                {{ $itemName }}
                                            </a>
                                            <span class="text-sm font-extrabold text-primary flex-shrink-0">
                                                &#8377;{{ number_format($itemPrice * $item['quantity'], 2) }}
                                            </span>
                                        </div>

                                        <p class="text-[11px] text-slate-400 font-semibold mb-3">
                                            &#8377;{{ number_format($itemPrice, 2) }} each
                                        </p>

                                        <!-- Stepper & Remove Action Row -->
                                        <div class="flex items-center justify-between flex-wrap gap-3">
                                            <!-- Stepper -->
                                            <div class="inline-flex items-center border border-slate-200 rounded-xl overflow-hidden bg-slate-50 h-8 shadow-2xs">
                                                <button type="button" class="w-8 h-full bg-white hover:bg-slate-100 border-r border-slate-200 font-extrabold cursor-pointer text-slate-700 text-xs flex items-center justify-center transition" onclick="updateCartQty('{{ $id }}', {{ $item['quantity'] - 1 }})">
                                                    <i class="fa-solid fa-minus text-[10px]"></i>
                                                </button>
                                                <span class="w-10 text-center text-xs font-extrabold text-slate-900">{{ $item['quantity'] }}</span>
                                                <button type="button" class="w-8 h-full bg-white hover:bg-slate-100 border-l border-slate-200 font-extrabold cursor-pointer text-slate-700 text-xs flex items-center justify-center transition" onclick="updateCartQty('{{ $id }}', {{ $item['quantity'] + 1 }})">
                                                    <i class="fa-solid fa-plus text-[10px]"></i>
                                                </button>
                                            </div>

                                            <!-- Remove Button -->
                                            <button type="button" class="text-rose-500 hover:text-rose-700 text-xs font-bold flex items-center gap-1.5 px-2.5 py-1 rounded-lg hover:bg-rose-50 transition cursor-pointer" onclick="removeCartItem('{{ $id }}')">
                                                <i class="fa-regular fa-trash-can text-xs"></i> Remove
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Right: Order Summary Sidebar -->
                    @php 
                        $subtotal = array_sum(array_map(function($item) { return $item['price'] * $item['quantity']; }, $cart));
                        $coupon = session()->get('coupon');
                        $discount = 0;
                        if ($coupon) {
                            if ($coupon['type'] == 'fixed') {
                                $discount = $coupon['value'];
                            } else {
                                $discount = $subtotal * ($coupon['value'] / 100);
                            }
                        }
                        $total = max(0, $subtotal - $discount);
                    @endphp
                    <div class="w-full lg:w-80 bg-white border border-slate-200/80 rounded-2xl p-5 shadow-2xs sticky top-24">
                        <h3 class="text-xs font-extrabold text-slate-900 uppercase tracking-wider mb-4 pb-3 border-b border-slate-100" style="font-family: 'Outfit', sans-serif;">
                            Order Summary
                        </h3>

                        <!-- Coupon Form -->
                        <div class="mb-5 pb-4 border-b border-slate-100">
                            @if(session('coupon'))
                                <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-3 py-2 rounded-xl text-xs font-bold flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <i class="fa-solid fa-tag"></i>
                                        <span>Code: {{ session('coupon')['code'] }} applied!</span>
                                    </div>
                                    <form action="{{ route('cart.removeCoupon') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="text-rose-500 hover:text-rose-700 p-1 cursor-pointer" title="Remove Coupon">
                                            <i class="fa-solid fa-xmark"></i>
                                        </button>
                                    </form>
                                </div>
                            @else
                                <form action="{{ route('cart.applyCoupon') }}" method="POST" class="flex items-center">
                                    @csrf
                                    <input type="text" name="code" placeholder="Enter coupon code" required class="flex-1 bg-slate-50 border border-slate-200 rounded-l-xl px-3 py-2.5 text-xs font-semibold focus:outline-none focus:border-primary">
                                    <button type="submit" class="bg-slate-800 hover:bg-slate-950 text-white px-4 py-2.5 rounded-r-xl text-xs font-extrabold uppercase tracking-wider transition-colors cursor-pointer border border-slate-800">
                                        Apply
                                    </button>
                                </form>
                            @endif
                        </div>

                        <div class="space-y-3 mb-5 text-xs">
                            <div class="flex justify-between text-slate-600 font-medium">
                                <span>Subtotal</span>
                                <span class="font-extrabold text-slate-900">&#8377;{{ number_format($subtotal, 2) }}</span>
                            </div>
                            @if($discount > 0)
                            <div class="flex justify-between text-emerald-600 font-bold">
                                <span>Coupon Discount</span>
                                <span>-&#8377;{{ number_format($discount, 2) }}</span>
                            </div>
                            @endif
                            <div class="flex justify-between text-slate-600 font-medium items-center">
                                <span>Delivery Charge</span>
                                <span class="font-extrabold text-emerald-600 uppercase text-[9px] bg-emerald-50 px-2 py-0.5 rounded-md border border-emerald-200">FREE</span>
                            </div>
                            <div class="border-t border-slate-100 pt-3 flex justify-between text-sm font-extrabold text-slate-900">
                                <span>Total Payable</span>
                                <span class="text-primary text-base">&#8377;{{ number_format($total, 2) }}</span>
                            </div>
                        </div>

                        <a href="{{ route('checkout.index') }}" class="w-full bg-primary hover:bg-primary-dark text-white flex items-center justify-center gap-2 py-3 rounded-xl font-extrabold text-xs uppercase tracking-wider shadow-md hover:shadow-lg transition duration-200">
                            Proceed to Checkout <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- AJAX Stepper & Item Removal Scripts -->
<script>
function updateCartQty(productId, qty) {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    fetch('/cart/update', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({ product_id: productId, quantity: qty })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            if (window.Ebigcart) window.Ebigcart.updateHeaderCounts();
            location.reload();
        } else {
            alert(data.message || 'Error updating cart quantity.');
        }
    })
    .catch(err => console.error(err));
}

function removeCartItem(productId) {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    if (confirm('Are you sure you want to remove this item from your cart?')) {
        fetch('/cart/remove', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({ product_id: productId })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                if (window.Ebigcart) window.Ebigcart.updateHeaderCounts();
                location.reload();
            } else {
                alert(data.message || 'Error removing item.');
            }
        })
        .catch(err => console.error(err));
    }
}
</script>
@endsection