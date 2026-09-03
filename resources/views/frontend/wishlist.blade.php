@extends('layouts.frontend')

@section('title', 'My Wishlist')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
        <!-- Breadcrumb & Title Inline -->
        <div class="mb-1 flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-3.5 border-b border-slate-100">
            <div>
                <h1 class="text-xl sm:text-2xl font-extrabold text-slate-900 tracking-tight" style="font-family: 'Outfit', sans-serif;">My Account</h1>
                <p class="text-[10px] text-slate-450 mt-1 flex items-center gap-1.5 font-bold uppercase tracking-wider">
                    <a href="/" class="hover:text-primary transition-colors">Home</a> 
                    <span class="text-slate-300">/</span> 
                    @auth
                        <a href="/dashboard" class="hover:text-primary transition-colors">Dashboard</a> 
                        <span class="text-slate-300">/</span> 
                    @endauth
                    <span class="text-slate-800">Wishlist</span>
                </p>
            </div>
        </div>

        @auth
        <div class="flex flex-col lg:flex-row gap-4">
            @include('frontend.partials.customer_sidebar')
            
            <div class="w-full lg:w-3/4">
        @else
            <div class="w-full">
        @endauth
            @if($products->count() > 0)
                <div class="row g-3 row-cols-2 row-cols-md-3 row-cols-lg-3 mb-3">
                    @foreach($products as $product)
                    <div class="col" data-product>
                                            <div class="rs-product-card" style="height: 100%;">
                        <div class="rs-card-img-box">
                          @if($product->sale_price)
                              <span class="rs-card-badge">SALE</span>
                          @endif
                          @if($product->quantity <= 0)
                              <span class="rs-card-badge" style="background:#ef4444; top:auto; bottom:8px;">OUT OF STOCK</span>
                          @endif
                          <button class="rs-wishlist-heart" style="border:none; cursor:pointer; color:#ff4757;" onclick="PL.toggleWishlist('{{ $product->id }}')"><i class="bi bi-heart-fill"></i></button>
                          <a href="{{ route('product.show', $product->slug) }}">
                            <img src="{{ $product->primary_image_url }}" alt="{{ $product->name }}" loading="lazy">
                          </a>
                        </div>
                        <div class="rs-card-body">
                          <a href="{{ route('product.show', $product->slug) }}" class="rs-card-title">{{ $product->name }}</a>
                          <div class="rs-card-price">
                            @if($product->sale_price)
                              <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₹</span>{{ number_format($product->sale_price, 2) }}</bdi></span>
                              <span class="rs-card-price-old">₹{{ number_format($product->price, 2) }}</span>
                            @else
                              <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₹</span>{{ number_format($product->price, 2) }}</bdi></span>
                            @endif
                          </div>
                          <div class="rs-card-actions">
                            @if($product->quantity > 0)
                              <button class="rs-btn-buynow" style="cursor:pointer;" onclick="PL.buyNow('{{ $product->id }}')">Buy Now</button>
                              <button class="rs-btn-carticon" style="cursor:pointer;" onclick="PL.addToCartById('{{ $product->id }}')"><i class="bi bi-cart-plus-fill"></i></button>
                            @else
                              <button class="rs-btn-buynow" style="background:#f1f5f9;color:#94a3b8;cursor:not-allowed;" disabled>Out of Stock</button>
                            @endif
                          </div>
                        </div>
                      </div>
</div>

                    </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-16 bg-[#f5faf7]/40 rounded-xl border border-dashed border-primary/20">
                    <i class="fa-regular fa-heart text-5xl text-gray-300 mb-4"></i>
                    <h2 class="text-base sm:text-lg font-bold text-slate-800 tracking-tight mb-1" style="font-family: 'Outfit', sans-serif;">Your Wishlist is Empty</h2>
                    <p class="text-slate-500 text-xs mb-6 max-w-xs mx-auto">Add items that you like to your wishlist so you can find them easily later.</p>
                    <a href="/shop" class="inline-block bg-primary hover:bg-primary-dark text-white font-semibold px-6 py-2.5 rounded-lg text-xs tracking-wider transition">
                        BROWSE PRODUCTS
                    </a>
                </div>
            @endif
        </div>

        @auth
        </div>
        </div>
        @endauth
    </div>
@endsection
