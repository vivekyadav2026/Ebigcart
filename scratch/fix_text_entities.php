<?php
$file = 'resources/views/frontend/home.blade.php';
$content = file_get_contents($file);

// Replace stars
$content = preg_replace('/<div class="stars">.*?<\/div>/i', '<div class="stars">&#11088;&#11088;&#11088;&#11088;&#11088;</div>', $content);

// Replace video testimonial title
$content = preg_replace('/<h2 class="section-title">\? Video Testimonials \?<\/h2>/i', '<h2 class="section-title" style="font-size: 1.5rem; text-align: center; margin: 30px 0;">&#10024; Customer Video Reviews &#10024;</h2>', $content);

// Replace any remaining weird headings
$content = preg_replace('/<h2 class="section-title">[^a-zA-Z0-9<]*?<\/h2>/i', '<h2 class="section-title" style="font-size: 1.5rem; text-align: center; margin: 30px 0;">&#10024; Customer Video Reviews &#10024;</h2>', $content);

file_put_contents($file, $content);
echo "HTML entities applied!\n";
