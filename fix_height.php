<?php
$file = 'resources/views/layouts/frontend.blade.php';
$content = file_get_contents($file);
$content = str_replace('height: 100% !important;', '/* height removed */', $content);
file_put_contents($file, $content);
echo 'Removed 100% height';

