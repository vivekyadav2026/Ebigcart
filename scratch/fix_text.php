<?php
$file = 'resources/views/frontend/home.blade.php';
$content = file_get_contents($file);

// Replace stars
$content = preg_replace('/<div class="stars">.*?<\/div>/i', '<div class="stars">⭐⭐⭐⭐⭐</div>', $content);

// Replace video testimonial title
$content = preg_replace('/<h2 class="section-title">[^<]*?[^<]*?<\/h2>/i', '<h2 class="section-title">✨ Video Testimonials ✨</h2>', $content);

// If there's another heading with corrupted chars in it:
$content = preg_replace('/<h2 class="section-title">[^A-Za-z0-9<]*?<\/h2>/i', '<h2 class="section-title">✨ Video Testimonials ✨</h2>', $content);

// Just to be safe, find any section-title that doesn't contain standard ascii and replace it
$content = preg_replace_callback('/<h2 class="section-title">(.*?)<\/h2>/is', function($matches) {
    $text = $matches[1];
    // If text contains lots of non-ascii weird characters
    if (preg_match('/[^\x20-\x7E]{5,}/', $text)) {
        return '<h2 class="section-title" style="font-size: 1.5rem; text-align: center; margin: 30px 0;">✨ Customer Video Reviews ✨</h2>';
    }
    return $matches[0];
}, $content);


file_put_contents($file, $content);
echo "Fixed!\n";
