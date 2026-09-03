<?php
$file = 'resources/views/frontend/home.blade.php';
$content = file_get_contents($file);

$content = str_replace('<h2 class="section-title">? Video Testimonials ?</h2>', '<h2 class="section-title" style="font-size: 1.5rem; text-align: center; margin: 30px 0;">&#10024; Customer Video Reviews &#10024;</h2>', $content);
$content = str_replace('<h2 class="section-title">? Video Testimonials ?</h2>', '<h2 class="section-title" style="font-size: 1.5rem; text-align: center; margin: 30px 0;">&#10024; Customer Video Reviews &#10024;</h2>', $content);
// Also just in case there are other corrupted headers:
$content = preg_replace('/<h2 class="section-title">[^a-zA-Z0-9<]*?<\/h2>/i', '<h2 class="section-title" style="font-size: 1.5rem; text-align: center; margin: 30px 0;">&#10024; Customer Video Reviews &#10024;</h2>', $content);

file_put_contents($file, $content);
echo "Done!\n";
