<?php
$file = 'resources/views/frontend/partials/footer.blade.php';
$content = file_get_contents($file);

// Replace logo
$content = str_replace('<img src="/mahashringar_assets/maha-logo.png" width="120" height="91" alt="maha logo">', '<img src="/images/ebigcart_logo.png" width="180" style="max-width:100%; height:auto;" alt="Ebigcart Logo">', $content);

// Replace shop text data
$content = str_replace('contact@shop.com', 'support@ebigcart.com', $content);
$content = preg_replace('/Copyright Â©\s*2026, Shop, All rights reserved./', 'Copyright &copy; 2026 Ebigcart. All rights reserved.', $content);

// Add custom footer CSS to the top of the file
$css = '<style>
.padt70 { padding-top: 50px; background-color: #f9f9f9; border-top: 1px solid #e0e0e0; }
.footer-container { max-width: 1200px; margin: 0 auto; padding: 0 15px; }
.f-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px; margin-bottom: 40px; }
.f-col h2.widget-title { font-size: 1.2rem; font-weight: 700; color: #b71c1c; margin-bottom: 20px; text-transform: uppercase; }
.f-col p, .f-col .textwidget { color: #555; line-height: 1.6; font-size: 0.95rem; }
.f-col ul { list-style: none; padding: 0; margin: 0; }
.f-col ul li { margin-bottom: 12px; }
.f-col ul li a { color: #555; text-decoration: none; font-size: 0.95rem; transition: color 0.3s; }
.f-col ul li a:hover { color: #b71c1c; }
.social-icons ul { display: flex; gap: 15px; margin-top: 20px; }
.social-icons ul li a { display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; background: #e0e0e0; border-radius: 50%; color: #333; transition: all 0.3s; }
.social-icons ul li a:hover { background: #b71c1c; color: #fff; transform: translateY(-3px); }
.social-icons ul li a svg { width: 18px; height: 18px; fill: currentColor; }
.talk-to-us .f-call-us span { display: block; font-weight: 600; color: #333; margin-bottom: 5px; }
.talk-to-us .f-call-us a { color: #b71c1c; font-weight: 700; font-size: 1.1rem; text-decoration: none; }
.talk-to-us ul li { display: flex; align-items: flex-start; gap: 15px; margin-top: 15px; }
.talk-to-us ul li .tt-icon { color: #b71c1c; margin-top: 3px; }
.copy-col { border-top: 1px solid #ddd; padding: 20px 0; display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; font-size: 0.9rem; color: #666; }
.copy-col a { color: #b71c1c; text-decoration: none; font-weight: 600; }
@media (max-width: 768px) {
    .copy-col { flex-direction: column; text-align: center; gap: 10px; }
}
</style>
';

// Wrap the footer content with new classes
$content = str_replace('<div class="container">', $css . '<div class="footer-container">', $content);
$content = str_replace('<div class="d-grid grid-4">', '<div class="f-grid">', $content);
// Change Ebigcart Text
$content = str_replace('Mahashringar is a divine inspiration', 'Ebigcart is a divine inspiration', $content);

file_put_contents($file, $content);
echo "Footer updated!\n";
