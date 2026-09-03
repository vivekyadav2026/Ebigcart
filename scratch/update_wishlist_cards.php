<?php
$file = 'resources/views/frontend/wishlist.blade.php';
$content = file_get_contents($file);

$replacement = <<<HTML
                      <div class="rs-product-card" style="height: 100%;">
                        <div class="rs-card-img-box">
                          @if(\$product->sale_price)
                              <span class="rs-card-badge">SALE</span>
                          @endif
                          @if(\$product->quantity <= 0)
                              <span class="rs-card-badge" style="background:#ef4444; top:auto; bottom:8px;">OUT OF STOCK</span>
                          @endif
                          <button class="rs-wishlist-heart" style="border:none; cursor:pointer; color:#ff4757;" onclick="PL.toggleWishlist('{{ \$product->id }}')"><i class="bi bi-heart-fill"></i></button>
                          <a href="{{ route('product.show', \$product->slug) }}">
                            <img src="{{ \$product->primary_image_url }}" alt="{{ \$product->name }}" loading="lazy">
                          </a>
                        </div>
                        <div class="rs-card-body">
                          <a href="{{ route('product.show', \$product->slug) }}" class="rs-card-title">{{ \$product->name }}</a>
                          <div class="rs-card-price">
                            @if(\$product->sale_price)
                              <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₹</span>{{ number_format(\$product->sale_price, 2) }}</bdi></span>
                              <span class="rs-card-price-old">₹{{ number_format(\$product->price, 2) }}</span>
                            @else
                              <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₹</span>{{ number_format(\$product->price, 2) }}</bdi></span>
                            @endif
                          </div>
                          <div class="rs-card-actions">
                            @if(\$product->quantity > 0)
                              <button class="rs-btn-buynow" style="cursor:pointer;" onclick="PL.buyNow('{{ \$product->id }}')">Buy Now</button>
                              <button class="rs-btn-carticon" style="cursor:pointer;" onclick="PL.addToCartById('{{ \$product->id }}')"><i class="bi bi-cart-plus-fill"></i></button>
                            @else
                              <button class="rs-btn-buynow" style="background:#f1f5f9;color:#94a3b8;cursor:not-allowed;" disabled>Out of Stock</button>
                            @endif
                          </div>
                        </div>
                      </div>
HTML;

$content = preg_replace('/<div class="pl-product-card">.*?<\/div>\s*<\/div>\s*<\/div>/is', $replacement . "\n</div>\n", $content);
file_put_contents($file, $content);
echo "Wishlist items updated!\n";
