<?php
$file = 'resources/views/layouts/frontend.blade.php';
$content = file_get_contents($file);
$content = preg_replace('/<style>\s*\/\* Clean E-commerce Product Card Styling \*\/.*?<\/style>/is', '', $content);
file_put_contents($file, $content);
echo 'Removed CSS';

