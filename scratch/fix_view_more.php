<?php
$file = 'resources/views/frontend/home.blade.php';
$content = file_get_contents($file);

// Fix "View More" link
$content = str_replace('<a href="#" class="view-more-btn">', '<a href="{{ route(\'shop\') }}" class="view-more-btn">', $content);

// Fix banner height
$oldBanner = '<img src="/mahashringar_assets/middle-gopi-dresses.jpg" width="1440" height="700" alt="Laddu Golpal Summer Dress">';
$newBanner = '<img src="/mahashringar_assets/middle-gopi-dresses.jpg" alt="Laddu Gopal Summer Dress" style="width: 100%; height: auto; max-height: 350px; object-fit: cover; border-radius: 12px; margin: 20px 0;">';
$content = str_replace($oldBanner, $newBanner, $content);

// Ensure there isn't another banner with a different spelling
$oldBanner2 = '<img src="/mahashringar_assets/middle-gopi-dresses.jpg" width="1440" height="700" alt="Laddu Gopal Summer Dress">';
$content = str_replace($oldBanner2, $newBanner, $content);

file_put_contents($file, $content);
echo "View more link and banner height fixed!\n";
