<?php
$dir = new RecursiveDirectoryIterator('resources/views/frontend');
$ite = new RecursiveIteratorIterator($dir);
foreach ($ite as $file) {
    if ($file->isFile() && $file->getExtension() === 'php') {
        $content = file_get_contents($file->getPathname());
        $content = str_replace('Mahadev Tractor', 'Maha Shringar', $content);
        $content = str_replace('tractor accessories, modification parts, fiber hoods', 'Laddu Gopal dresses, mukut, poshak, ornaments', $content);
        $content = str_replace('tractor', 'shringar', $content);
        file_put_contents($file->getPathname(), $content);
    }
}
echo 'Renamed successfully!';

