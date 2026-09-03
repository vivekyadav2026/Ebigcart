<?php
$file = 'resources/views/frontend/home.blade.php';
$content = file_get_contents($file);

// Replace corrupted stars
$content = str_replace('~.~.~.~.~.', '⭐⭐⭐⭐⭐', $content);
$content = str_replace('â­...â­...â­...â­...â­...', '⭐⭐⭐⭐⭐', $content);

// Replace corrupted play button
$content = str_replace('ǽ?"', '▶', $content);

// Replace corrupted rupee symbol
$content = str_replace('ǽ?s', '₹', $content);
$content = str_replace('â‚¹', '₹', $content);

// Replace corrupted Hindi headings
// "϶σ??϶?σ?s σ?϶ ϶?϶϶϶"
$content = str_replace('϶σ??϶?σ?s σ?϶ ϶?϶϶϶', '✨ हमारे ग्राहकों का प्यार और भरोसा ✨', $content);
// "à¤à¤•à¥...à¤... "
$content = preg_replace('/âœ§.*?âœ§/s', '✨ भक्ति, प्रेम, और समर्पण का प्रतीक ✨', $content);
$content = preg_replace('/✨ à¤.*?✨/is', '✨ भक्ति, प्रेम, और समर्पण का प्रतीक ✨', $content);

file_put_contents($file, $content);
echo "Encoding issues fixed!\n";
