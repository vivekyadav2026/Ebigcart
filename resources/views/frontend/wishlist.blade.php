@extends('layouts.frontend')

@section('title', 'My Wishlist')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
    <!-- Breadcrumb & Title Inline -->
    <div class="mb-4 flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-3.5 border-b border-slate-100">
        <div>
            <h1 class="text-xl sm:text-2xl font-extrabold text-slate-900 tracking-tight" style="font-family: 'Outfit', sans-serif;">My Account</h1>
            <p class="text-[10px] text-slate-400 mt-1 flex items-center gap-1.5 font-bold uppercase tracking-wider">
                <a href="/" class="hover:text-primary transition-colors">Home</a> 
                <span class="text-slate-300">/</span> 
                @if(Auth::check())
                    <a href="/dashboard" class="hover:text-primary transition-colors">Dashboard</a>
                    <span class="text-slate-300">/</span>
                @endif
                <span class="text-slate-800">My Wishlist</span>
            </p>
        </div>
    </div>

    <div class="flex flex-col lg:flex-row gap-6">
        @if(Auth::check())
            @include('frontend.partials.customer_sidebar')
        @endif

        <div class="w-full {{ Auth::check() ? 'lg:w-3/4' : 'w-full' }}">
            @if(isset($products) && $products->count() > 0)
                <div class="grid grid-cols-2 sm:grid-cols-3 xl:grid-cols-4 gap-4">
                    @foreach($products as $product)
                        <div id="wishlist-item-{{ $product->id }}" class="group bg-white border border-slate-200/80 rounded-2xl overflow-hidden shadow-2xs hover:shadow-md transition-all duration-300 flex flex-col justify-between relative">
                            <!-- Image Box -->
                            <div class="relative w-full aspect-square bg-slate-50 p-3 flex items-center justify-center overflow-hidden border-b border-slate-100">
                                @if($product->sale_price)
                                    <span class="absolute top-2.5 left-2.5 z-10 bg-primary text-white text-[9px] font-extrabold uppercase px-2 py-0.5 rounded-md shadow-2xs">SALE</span>
                                @endif
                                <button type="button" 
                                        class="absolute top-2.5 right-2.5 z-10 w-8 h-8 rounded-full bg-white/90 shadow-2xs hover:bg-white text-rose-500 flex items-center justify-center transition-all cursor-pointer hover:scale-110" 
                                        onclick="Ebigcart.toggleWishlist('{{ $product->id }}', this, event); document.getElementById('wishlist-item-{{ $product->id }}').remove();" 
                                        title="Remove from Wishlist">
                                    <i class="fa-solid fa-heart text-sm"></i>
                                </button>
                                <a href="{{ route('product.show', $product->slug) }}" class="w-full h-full flex items-center justify-center">
                                    <img src="{{ asset($product->primary_image_url) }}" alt="{{ $product->name }}" loading="lazy" class="max-w-full max-h-full object-contain group-hover:scale-105 transition-transform duration-300">
                                </a>
                            </div>

                            <!-- Product Info -->
                            <div class="p-3.5 flex flex-col justify-between flex-1">
                                <div>
                                    <a href="{{ route('product.show', $product->slug) }}" class="text-xs font-bold text-slate-900 hover:text-primary transition-colors line-clamp-2 leading-snug mb-2">
                                        {{ $product->name }}
                                    </a>
                                </div>

                                <div>
                                    <div class="flex items-baseline gap-2 mb-3">
                                        @if($product->sale_price)
                                            <span class="text-sm font-extrabold text-primary">&#8377;{{ number_format($product->sale_price, 2) }}</span>
                                            <span class="text-xs text-slate-400 line-through font-medium">&#8377;{{ number_format($product->price, 2) }}</span>
                                        @else
                                            <span class="text-sm font-extrabold text-slate-900">&#8377;{{ number_format($product->price, 2) }}</span>
                                        @endif
                                    </div>

                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('product.show', $product->slug) }}" class="flex-1 bg-slate-900 hover:bg-slate-800 text-white text-center text-[10px] font-extrabold py-2 rounded-xl uppercase tracking-wider transition shadow-2xs">
                                            Buy Now
                                        </a>
                                        <button type="button" class="w-8 h-8 rounded-xl bg-primary/10 hover:bg-primary text-primary hover:text-white flex items-center justify-center transition-all cursor-pointer flex-shrink-0" onclick="Ebigcart.addToCart('{{ $product->id }}', 1, event)" title="Add to Cart">
                                            <i class="fa-solid fa-cart-plus text-xs"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="p-10 text-center bg-white border border-slate-200/80 rounded-2xl shadow-sm my-2">
                    <div class="w-16 h-16 rounded-full bg-slate-50 border border-slate-100 flex items-center justify-center mx-auto mb-4">
                        <i class="fa-regular fa-heart text-slate-300 text-2xl"></i>
                    </div>
                    <h3 class="text-base font-extrabold text-slate-800 mb-1" style="font-family: 'Outfit', sans-serif;">Your Wishlist is Empty</h3>
                    <p class="text-xs text-slate-400 mb-5 max-w-sm mx-auto leading-relaxed">Save your favorite dresses, mukuts, and accessories here to easily find and purchase them later.</p>
                    <a href="/shop" class="inline-flex items-center gap-2 bg-primary hover:bg-primary-dark text-white px-6 py-2.5 rounded-xl text-xs font-bold uppercase tracking-wider transition-colors shadow-sm">
                        <i class="fa-solid fa-store text-xs"></i> Explore Products
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection