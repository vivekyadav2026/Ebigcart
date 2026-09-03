<?php
$file = 'resources/views/frontend/home.blade.php';
$content = file_get_contents($file);

// Find all <li>...</li> blocks
preg_match_all('/<li>(.*?)<\/li>/is', $content, $matches);

$count = 0;
foreach ($matches[0] as $match) {
    if (strpos($match, 'class="product-img"') !== false && strpos($match, 'class="product-content"') !== false) {
        
        // Extract Image Src
        preg_match('/<img[^>]*src="([^"]+)"/is', $match, $imgMatch);
        $imgSrc = $imgMatch[1] ?? '/images/placeholder.jpg';
        
        // Extract Title
        preg_match('/<div class="product-content">.*?<a[^>]*>(.*?)<\/a>/is', $match, $titleMatch);
        $title = isset($titleMatch[1]) ? trim(strip_tags($titleMatch[1])) : 'Product Title';
        
        // Build new card HTML
        $newCard = '<li>
    <div class="rs-product-card">
        <div class="rs-card-img-box">
            <span class="rs-card-badge">60% OFF</span>
            <a href="/wishlist" class="rs-wishlist-heart" title="Add to Wishlist"><i class="bi bi-heart"></i></a>
            <a href="/shop">
                <img src="' . $imgSrc . '" alt="' . htmlspecialchars($title) . '" loading="lazy">
            </a>
        </div>
        <div class="rs-card-body">
            <a href="/shop" class="rs-card-title">' . htmlspecialchars($title) . '</a>
            <div class="rs-card-price">
                <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₹</span>' . rand(99, 999) . '.00</bdi></span>
                <span class="rs-card-price-old">₹' . rand(1000, 2000) . '.00</span>
            </div>
            <div class="rs-card-actions">
                <a href="/shop" class="rs-btn-buynow">Buy Now</a>
                <a href="/shop" class="rs-btn-carticon"><i class="bi bi-cart-plus-fill"></i></a>
            </div>
        </div>
    </div>
</li>';
        
        $content = str_replace($match, $newCard, $content);
        $count++;
    }
}

file_put_contents($file, $content);
echo "Updated $count old cards to new layout.\n";
