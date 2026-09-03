<?php
$directory = new RecursiveDirectoryIterator('resources/views');
$iterator = new RecursiveIteratorIterator($directory);
$regex = new RegexIterator($iterator, '/^.+\.blade\.php$/i', RecursiveRegexIterator::GET_MATCH);

$replacements = [
    'Maha Shringar' => 'Ebigcart',
    'Mahashringar' => 'Ebigcart',
    'MahaShingar' => 'Ebigcart',
    'mahashringar' => 'ebigcart',
];

$count = 0;
foreach ($regex as $file) {
    $filePath = $file[0];
    $content = file_get_contents($filePath);
    $original = $content;

    foreach ($replacements as $search => $replace) {
        // We will keep 'mahashringar_assets' intact because that's where the CSS/JS files live!
        // We need to be careful not to break image or asset paths.
        // Let's temporarily protect 'mahashringar_assets' and 'mahashringar.s3'
        $content = str_replace('mahashringar_assets', '@@ASSETS@@', $content);
        $content = str_replace('mahashringar.s3', '@@S3@@', $content);
        
        $content = str_ireplace($search, $replace, $content);
        
        $content = str_replace('@@ASSETS@@', 'mahashringar_assets', $content);
        $content = str_replace('@@S3@@', 'mahashringar.s3', $content);
    }

    if ($original !== $content) {
        file_put_contents($filePath, $content);
        $count++;
    }
}

echo "Updated $count view files!\n";
