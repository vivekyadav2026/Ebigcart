<?php
$file = 'resources/views/frontend/shop.blade.php';
$content = file_get_contents($file);

$oldLoop = <<<HTML
                        <li class="product">
                            <div class="product-img">
                                <a href="{{ route('product.show', \$product->slug) }}">
                                    <img src="{{ asset(\$product->primary_image_url) }}" alt="{{ \$product->name }}">
                                </a>
                                <div class="cart-button">
                                    <div class="cart-button-inner">
                                        <a href="{{ route('product.show', \$product->slug) }}" class="button">Buy Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="rating-star">⭐⭐⭐⭐⭐</div>
                                <a href="{{ route('product.show', \$product->slug) }}">{{ \$product->name }}</a>
                                <div class="price">
                                    @if(\$product->discount_price)
                                        <del>₹{{ \$product->price }}</del> <span>₹{{ \$product->discount_price }}</span>
                                    @else
                                        <span>₹{{ \$product->price }}</span>
                                    @endif
                                </div>
                            </div>
                        </li>
HTML;

// Note: In the file, the old loop has question marks for stars and rupee symbol because of charset issues. Let's use regex to replace the inner content of <li class="product">
$replacement = <<<HTML
<li class="product" style="list-style:none;">
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
HTML;

$content = preg_replace('/<li class="product">.*?<\/li>/is', $replacement, $content);
file_put_contents($file, $content);
echo "Shop items updated!\n";
