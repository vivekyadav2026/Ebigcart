<?php
$file = 'resources/views/layouts/frontend.blade.php';
$content = file_get_contents($file);

// Extract the header and body content from <div id="page" class="site"... to </div><!-- #page -->
preg_match('/<div id="page" class="site".*?<\/div><!-- #page -->/is', $content, $matches);
$pageContent = $matches[0] ?? '';

$newContent = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Maha Shringar - Buy Best Laddu Gopal Dresses, Accessories and Ornaments</title>
    <meta name="description" content="Explore beautiful Laddu Gopal dresses and accessories to adorn your divine idol with elegance and charm. Shop the best selection today!">
    
    <!-- Vite CSS/JS (Tailwind, app.js) -->
    @vite([\'resources/css/app.css\', \'resources/js/app.js\'])

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <!-- Legacy CSS (Will be phased out later) -->
    <link rel="stylesheet" href="/mahashringar_assets/custom.css">
    <link rel="stylesheet" href="/mahashringar_assets/responsive-new.css">
    <link rel="stylesheet" href="/mahashringar_assets/owl.carousel.min.css">
    <link rel="stylesheet" href="/mahashringar_assets/style.css"> <!-- Megamenu / Theme -->

    <style>
        /* Ultra aggressive top space removal */
        :root, html, body {
            margin: 0 !important;
            padding: 0 !important;
            top: 0 !important;
        }
        .admin-bar, .admin-bar html, .admin-bar body, .admin-bar #page {
            margin-top: 0 !important;
            padding-top: 0 !important;
        }
        #page, .site, header, .site-header, .rs-top-bar, .site-main {
            margin-top: 0 !important;
            padding-top: 0 !important;
            top: 0 !important;
        }

        /* Banner image responsive fix */
        .sale-banner img.desktop-hero { width: 100% !important; height: auto !important; max-height: 520px !important; object-fit: cover !important; display: block !important; }
        
        /* Owl Dots Styling */
        .sale-banner { position: relative !important; overflow: hidden !important; }
        .sale-banner .owl-dots { position: absolute !important; bottom: 20px !important; left: 50% !important; transform: translateX(-50%) !important; display: flex !important; gap: 10px !important; z-index: 20 !important; margin: 0 !important; }
        .sale-banner .owl-dots .owl-dot { background: none !important; border: none !important; padding: 0 !important; outline: none !important; }
        .sale-banner .owl-dots .owl-dot span { width: 14px !important; height: 14px !important; background: rgba(255, 255, 255, 0.5) !important; border: 2px solid #ffffff !important; border-radius: 50% !important; display: block !important; transition: all 0.3s ease !important; margin: 0 !important; box-shadow: 0 2px 5px rgba(0,0,0,0.3); }
        .sale-banner .owl-dots .owl-dot.active span { background: #d32f2f !important; border-color: #ffffff !important; transform: scale(1.25) !important; }

        /* Custom Reference Product Card Styling */
        .rs-product-card {
            background: #ffffff !important;
            border-radius: 14px !important;
            border: 1px solid #eeeeee !important;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05) !important;
            padding: 10px !important;
            display: flex !important;
            flex-direction: column !important;
            height: 100% !important;
            position: relative !important;
            transition: transform 0.3s ease, box-shadow 0.3s ease !important;
            margin-bottom: 15px !important;
        }
        .rs-product-card:hover {
            transform: translateY(-4px) !important;
            box-shadow: 0 8px 22px rgba(0, 0, 0, 0.09) !important;
        }
        .rs-card-img-box {
            background: #f8f9fa !important;
            border-radius: 10px !important;
            position: relative !important;
            aspect-ratio: 1 / 1 !important;
            width: 100% !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            overflow: hidden !important;
            padding: 6px !important;
        }
        .rs-card-img-box a {
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            width: 100% !important;
            height: 100% !important;
        }
        .rs-card-img-box img {
            max-width: 100% !important;
            max-height: 100% !important;
            width: auto !important;
            height: auto !important;
            object-fit: contain !important;
            display: block !important;
            transition: transform 0.35s ease !important;
        }
        .rs-product-card:hover .rs-card-img-box img {
            transform: scale(1.06) !important;
        }
        .rs-card-badge {
            position: absolute !important;
            top: 8px !important;
            left: 8px !important;
            background: #ff4757 !important;
            color: #ffffff !important;
            font-size: 0.65rem !important;
            font-weight: 800 !important;
            padding: 3px 8px !important;
            border-radius: 12px !important;
            text-transform: uppercase !important;
            z-index: 10 !important;
            line-height: 1 !important;
        }
        .rs-wishlist-heart {
            position: absolute !important;
            top: 8px !important;
            right: 8px !important;
            width: 30px !important;
            height: 30px !important;
            border-radius: 50% !important;
            background: #ffffff !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            color: #999999 !important;
            font-size: 1.1rem !important;
            text-decoration: none !important;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08) !important;
            z-index: 10 !important;
            transition: all 0.2s ease !important;
        }
        .rs-wishlist-heart:hover {
            color: #ff4757 !important;
            transform: scale(1.1) !important;
        }
        .rs-card-body {
            padding: 12px 5px 5px 5px !important;
            display: flex !important;
            flex-direction: column !important;
            flex-grow: 1 !important;
        }
        .rs-card-title {
            font-size: 0.95rem !important;
            font-weight: 500 !important;
            color: #333333 !important;
            text-decoration: none !important;
            margin-bottom: 8px !important;
            line-height: 1.3 !important;
            display: -webkit-box !important;
            -webkit-line-clamp: 2 !important;
            -webkit-box-orient: vertical !important;
            overflow: hidden !important;
            flex-grow: 1 !important;
        }
        .rs-card-title:hover {
            color: #b71c1c !important;
        }
        .rs-card-price {
            font-size: 1.1rem !important;
            font-weight: 700 !important;
            color: #e65100 !important;
            margin-bottom: 12px !important;
            display: flex !important;
            align-items: center !important;
            gap: 6px !important;
        }
        .rs-card-price-old {
            font-size: 0.85rem !important;
            font-weight: 400 !important;
            color: #999999 !important;
            text-decoration: line-through !important;
        }
        .rs-card-actions {
            display: flex !important;
            gap: 8px !important;
            margin-top: auto !important;
        }
        .rs-btn-buynow {
            flex-grow: 1 !important;
            background: #ffffff !important;
            color: #b71c1c !important;
            border: 1.5px solid #b71c1c !important;
            font-weight: 700 !important;
            font-size: 0.85rem !important;
            text-transform: uppercase !important;
            padding: 8px 10px !important;
            border-radius: 6px !important;
            text-align: center !important;
            text-decoration: none !important;
            transition: all 0.2s ease !important;
        }
        .rs-btn-buynow:hover {
            background: #b71c1c !important;
            color: #ffffff !important;
        }
        .rs-btn-carticon {
            flex-shrink: 0 !important;
            width: 38px !important;
            height: 38px !important;
            background: #e65100 !important;
            color: #ffffff !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            border-radius: 6px !important;
            text-decoration: none !important;
            font-size: 1.2rem !important;
            transition: background 0.2s ease !important;
        }
        .rs-btn-carticon:hover {
            background: #cc4800 !important;
            color: #ffffff !important;
        }
    </style>
</head>
<body class="home singular">

    ' . $pageContent . '

    <!-- Essential Scripts -->
    <script src="/mahashringar_assets/jquery.min.js.download"></script>
    <script src="/mahashringar_assets/bootstrap.min.js.download"></script>
    <script src="/mahashringar_assets/owl.carousel.min.js.download"></script>

    <!-- Header mega menu script -->
    <script>
        jQuery(document).ready(function($) {
            $(".mega-menu-toggle").on("click", function() {
                $("#mega-menu-wrap-primary").toggleClass("mega-menu-open");
            });
        });
    </script>
    
    <!-- Initialize Owl Carousels -->
    <script>
        jQuery(document).ready(function ($) {
            // Main Hero Slider
            $(".owl-carousel.sale-banner").owlCarousel({
                items: 1,
                loop: true,
                autoplay: true,
                autoplayTimeout: 5000,
                nav: false,
                dots: true
            });
            
            // Product Carousels
            $(".owl-carousel-product").owlCarousel({
                loop: true,
                margin: 20,
                nav: false,
                dots: false,
                autoplay: true,
                autoplayTimeout: 4000,
                responsive: {
                    0: { items: 2 },
                    600: { items: 3 },
                    1000: { items: 4 },
                    1200: { items: 5 }
                }
            });
        });
    </script>
</body>
</html>';

file_put_contents($file, $newContent);
echo "Frontend layout completely sanitized!\n";
