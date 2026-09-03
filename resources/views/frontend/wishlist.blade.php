@extends('layouts.frontend')

@section('title', 'My Wishlist')

@section('content')
<div class="container" style="padding-top: 20px; padding-bottom: 50px;">
    <!-- Breadcrumb & Title Inline -->
    <div style="margin-bottom: 20px; border-bottom: 1px solid #eee; padding-bottom: 12px; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 10px;">
        <div>
            <h1 style="font-size: 1.6rem; font-weight: 700; color: #222; margin: 0; font-family: 'Outfit', sans-serif;">My Wishlist</h1>
            <p style="font-size: 0.8rem; color: #777; margin: 4px 0 0 0;">
                <a href="/" style="color: #b71c1c; text-decoration: none;">Home</a> 
                <span style="margin: 0 5px; color: #ccc;">/</span> 
                <span style="color: #333; font-weight: 600;">Wishlist</span>
            </p>
        </div>
    </div>

    @if(isset($products) && $products->count() > 0)
        <ul class="products" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 20px; list-style: none; padding: 0; margin: 0;">
            @foreach($products as $product)
                <li class="product" id="wishlist-item-{{ $product->id }}" style="list-style:none;">
                    <div class="rs-product-card" onclick="if (!event.target.closest('.rs-wishlist-heart, .rs-btn-carticon')) window.location.href='{{ route('product.show', $product->slug) }}';" style="cursor: pointer;">
                        <div class="rs-card-img-box">
                            @if($product->sale_price)
                                <span class="rs-card-badge">SALE</span>
                            @endif
                            <button type="button" class="rs-wishlist-heart" style="border:none; background:none; cursor:pointer; color:#ff4757;" onclick="Ebigcart.toggleWishlist('{{ $product->id }}', this, event); document.getElementById('wishlist-item-{{ $product->id }}').remove();" title="Remove from Wishlist">
                                <i class="bi bi-heart-fill"></i>
                            </button>
                            <a href="{{ route('product.show', $product->slug) }}">
                                <img src="{{ asset($product->primary_image_url) }}" alt="{{ $product->name }}" loading="lazy">
                            </a>
                        </div>
                        <div class="rs-card-body">
                            <a href="{{ route('product.show', $product->slug) }}" class="rs-card-title">{{ $product->name }}</a>
                            <div class="rs-card-price">
                                @if($product->sale_price)
                                    <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ number_format($product->sale_price, 2) }}</bdi></span>
                                    <span class="rs-card-price-old">&#8377;{{ number_format($product->price, 2) }}</span>
                                @else
                                    <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ number_format($product->price, 2) }}</bdi></span>
                                @endif
                            </div>
                            <div class="rs-card-actions">
                                <a href="{{ route('product.show', $product->slug) }}" class="rs-btn-buynow">Buy Now</a>
                                <button type="button" class="rs-btn-carticon" style="border:none; cursor:pointer;" onclick="Ebigcart.addToCart('{{ $product->id }}', 1, event)" title="Add to Cart">
                                    <i class="bi bi-cart-plus-fill"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    @else
        <div style="text-align: center; padding: 60px 20px; background: #fff; border-radius: 12px; border: 1px solid #e8e8e8; margin: 20px 0;">
            <i class="bi bi-heart" style="font-size: 3.5rem; color: #ccc; margin-bottom: 12px; display: block;"></i>
            <h2 style="font-size: 1.4rem; font-weight: 700; color: #333; margin-bottom: 6px;">Your Wishlist is Empty</h2>
            <p style="font-size: 0.85rem; color: #777; margin-bottom: 25px; max-width: 380px; margin-left: auto; margin-right: auto;">Save your favorite Laddu Gopal dresses and accessories here to easily find and purchase them later.</p>
            <a href="/shop" style="display: inline-block; background: #b71c1c; color: #fff; padding: 12px 28px; border-radius: 6px; font-size: 0.8rem; font-weight: 700; text-transform: uppercase; text-decoration: none; box-shadow: 0 4px 12px rgba(183,28,28,0.2);">
                Explore Products
            </a>
        </div>
    @endif
</div>

<style>
@media (max-width: 768px) {
    ul.products {
        display: grid !important;
        grid-template-columns: repeat(2, 1fr) !important;
        gap: 10px !important;
        padding: 0 !important;
    }

    .rs-product-card {
        margin: 0 !important;
        width: 100% !important;
    }

    .rs-card-img-box {
        height: 140px !important;
    }

    .rs-card-title {
        font-size: 0.8rem !important;
        line-height: 1.2 !important;
        height: 2.4em !important;
    }

    .rs-card-actions {
        flex-direction: row !important;
        gap: 6px !important;
    }

    .rs-btn-buynow {
        font-size: 0.7rem !important;
        padding: 6px 8px !important;
        flex: 1 !important;
        text-align: center !important;
    }

    .rs-btn-carticon {
        width: 30px !important;
        height: 30px !important;
        font-size: 0.85rem !important;
    }
}
</style>
@endsection