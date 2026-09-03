<?php
$file = 'resources/views/frontend/shop.blade.php';

$content = <<<HTML
@extends('layouts.frontend')

@section('title', 'Shop')

@section('content')
<div class="container" style="padding: 40px 15px;">
    <div style="margin-bottom: 20px; border-bottom: 1px solid #e0e0e0; padding-bottom: 15px;">
        <h1 style="font-size: 2rem; font-weight: 700; color: #333;">Shop Collection</h1>
        <p style="font-size: 0.9rem; color: #777; margin-top: 5px;"><a href="/" style="color: #b71c1c; text-decoration: none;">Home</a> <span style="margin: 0 10px;">/</span> Shop</p>
    </div>

    <div class="d-grid" style="grid-template-columns: 250px 1fr; gap: 30px; align-items: start;">
        
        <!-- Sidebar Filters -->
        <div class="shop-sidebar" style="background: #fff; padding: 20px; border-radius: 8px; border: 1px solid #f0f0f0; box-shadow: 0 2px 10px rgba(0,0,0,0.02);">
            <h3 style="font-size: 1.1rem; font-weight: 700; margin-bottom: 15px; border-bottom: 1px solid #eee; padding-bottom: 10px;">Categories</h3>
            <ul style="list-style: none; padding: 0; margin: 0;">
                <li style="margin-bottom: 10px;"><a href="/shop?cat=dresses" style="color: #555; text-decoration: none;">Laddu Gopal Dresses</a></li>
                <li style="margin-bottom: 10px;"><a href="/shop?cat=ornaments" style="color: #555; text-decoration: none;">Ornaments</a></li>
                <li style="margin-bottom: 10px;"><a href="/shop?cat=accessories" style="color: #555; text-decoration: none;">Accessories</a></li>
                <li style="margin-bottom: 10px;"><a href="/shop?cat=idols" style="color: #555; text-decoration: none;">Idols (Vigrah)</a></li>
                <li style="margin-bottom: 10px;"><a href="/shop?cat=combo" style="color: #555; text-decoration: none;">Combo Sets</a></li>
            </ul>

            <h3 style="font-size: 1.1rem; font-weight: 700; margin-top: 30px; margin-bottom: 15px; border-bottom: 1px solid #eee; padding-bottom: 10px;">Filter by Price</h3>
            <input type="range" style="width: 100%;" min="0" max="5000">
            <div style="display: flex; justify-content: space-between; font-size: 0.85rem; color: #777; margin-top: 5px;">
                <span>₹0</span>
                <span>₹5000+</span>
            </div>
            <button style="margin-top: 20px; width: 100%; background: #b71c1c; color: #fff; border: none; padding: 10px; border-radius: 6px; font-weight: 600; cursor: pointer;">Apply Filter</button>
        </div>

        <!-- Product Grid -->
        <div class="shop-products">
            @if(isset(\$products) && \$products->count() > 0)
                <ul class="products" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 20px; list-style: none; padding: 0; margin: 0;">
                    @foreach(\$products as \$product)
                        <li>
                            <div class="rs-product-card">
                                <div class="rs-card-img-box">
                                    @if(\$product->discount_price)
                                        <span class="rs-card-badge">SALE</span>
                                    @endif
                                    <a href="/wishlist" class="rs-wishlist-heart" title="Add to Wishlist"><i class="bi bi-heart"></i></a>
                                    <a href="{{ route('product.show', \$product->slug) }}">
                                        <img src="{{ asset(\$product->primary_image_url) }}" alt="{{ \$product->name }}" loading="lazy">
                                    </a>
                                </div>
                                <div class="rs-card-body">
                                    <a href="{{ route('product.show', \$product->slug) }}" class="rs-card-title">{{ \$product->name }}</a>
                                    <div class="rs-card-price">
                                        @if(\$product->discount_price)
                                            <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₹</span>{{ \$product->discount_price }}</bdi></span>
                                            <span class="rs-card-price-old">₹{{ \$product->price }}</span>
                                        @else
                                            <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₹</span>{{ \$product->price }}</bdi></span>
                                        @endif
                                    </div>
                                    <div class="rs-card-actions">
                                        <a href="{{ route('product.show', \$product->slug) }}" class="rs-btn-buynow">Buy Now</a>
                                        <a href="{{ route('product.show', \$product->slug) }}" class="rs-btn-carticon"><i class="bi bi-cart-plus-fill"></i></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div style="margin-top: 30px; display: flex; justify-content: center;">
                    {{ \$products->links() }}
                </div>
            @else
                <div style="text-align: center; padding: 50px 20px; background: #fff; border-radius: 8px; border: 1px solid #f0f0f0;">
                    <i class="bi bi-basket" style="font-size: 3rem; color: #ddd; margin-bottom: 15px; display: block;"></i>
                    <h2 style="font-size: 1.5rem; font-weight: 700; color: #444; margin-bottom: 10px;">No products found</h2>
                    <p style="color: #777; margin-bottom: 20px;">We couldn't find any products matching your criteria.</p>
                    <a href="{{ route('shop') }}" style="display: inline-block; background: #b71c1c; color: #fff; padding: 10px 25px; border-radius: 6px; text-decoration: none; font-weight: 600;">Clear Filters</a>
                </div>
            @endif
        </div>
    </div>
</div>

<style>
@media (max-width: 768px) {
    .d-grid { grid-template-columns: 1fr !important; }
    .shop-sidebar { display: none; } /* Could add a toggle button for mobile */
}
</style>
@endsection
HTML;

file_put_contents($file, $content);
echo "Shop page updated!\n";
