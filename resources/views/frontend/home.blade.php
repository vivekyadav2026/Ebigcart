@extends('layouts.frontend')

@section('content')

<!-- End Header-->


<div class="sale-banner" style="position: relative; overflow: hidden; margin-bottom: 25px; box-shadow: 0 8px 25px rgba(0,0,0,0.1);">
    <div class="owl-carousel hero-slider owl-theme">
        <a href="/shop" style="display: block; width: 100%;">
            <img src="/mahashringar_assets/new_hero_banner_v2.jpg" alt="Maha Shringar Special Festival Collection" class="desktop-hero" style="width: 100%; height: auto; max-height: 520px; object-fit: cover; display: block;">
        </a>
        <a href="/shop?cat=ornaments" style="display: block; width: 100%;">
            <img src="/mahashringar_assets/hero_slider_2.jpg" alt="Premium Mukut and Ornaments" class="desktop-hero" style="width: 100%; height: auto; max-height: 520px; object-fit: cover; display: block;">
        </a>
        <a href="/shop?cat=laddu-gopal-dresses" style="display: block; width: 100%;">
            <img src="/mahashringar_assets/hero_slider_3.jpg" alt="Beautiful Designer Poshak" class="desktop-hero" style="width: 100%; height: auto; max-height: 520px; object-fit: cover; display: block;">
        </a>
    </div>
</div>
<style>
/* Hero & Category Navigation Overrides */
.owl-nav button.owl-prev, .owl-nav button.owl-next {
    background: transparent !important;
    color: #b71c1c !important; /* Crimson color for the arrow itself */
    width: 40px !important;
    height: 40px !important;
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    box-shadow: none !important;
    position: absolute !important;
    top: 50% !important;
    transform: translateY(-50%) !important;
    opacity: 0.8 !important;
    transition: all 0.3s ease !important;
    text-shadow: 0 0 10px rgba(255,255,255,0.9);
    margin: 0 !important;
    padding: 0 !important;
}
.owl-nav button.owl-prev i, .owl-nav button.owl-next i { font-size: 2rem !important; margin: 0 !important; padding: 0 !important; line-height: 1 !important; }
.owl-nav button.owl-prev:hover, .owl-nav button.owl-next:hover { opacity: 1 !important; transform: translateY(-50%) scale(1.2) !important; color: #000 !important; }

/* Hero Slider specific */
.sale-banner .owl-nav button.owl-prev { left: 10px !important; }
.sale-banner .owl-nav button.owl-next { right: 10px !important; }

/* Category Slider specific */
.owl-carousel-product { position: relative !important; }
.owl-carousel-product .owl-nav button.owl-prev { left: 0px !important; }
.owl-carousel-product .owl-nav button.owl-next { right: 0px !important; }

/* Fix extra white space */
.sale-banner { margin-bottom: 0 !important; padding-bottom: 0 !important; display: block; }
.home-banner-new { margin-top: 0 !important; padding-top: 20px !important; }

/* Responsive adjustments */
@@media (max-width: 768px) {
    .sale-banner img.desktop-hero {
        height: auto !important;
        width: 100% !important;
        aspect-ratio: 16/9 !important;
        object-fit: cover !important;
    }
    .owl-nav button.owl-prev, .owl-nav button.owl-next {
        width: 30px !important;
        height: 30px !important;
    }
    .owl-nav button.owl-prev i, .owl-nav button.owl-next i { font-size: 1.5rem !important; }
}
</style>
<script>
document.addEventListener("DOMContentLoaded", function() {
    setTimeout(function() {
        if(window.jQuery && jQuery().owlCarousel) {
            jQuery('.hero-slider').owlCarousel({
                loop: true,
                margin: 0,
                nav: true,
                navText: ['<i class="bi bi-chevron-left" style="font-size: 1.2rem; margin-top:2px; font-weight:900;"></i>', '<i class="bi bi-chevron-right" style="font-size: 1.2rem; margin-top:2px; font-weight:900;"></i>'],
                dots: true,
                autoplay: true,
                autoplayTimeout: 3500,
                autoplayHoverPause: true,
                items: 1
            });

            // Overwrite existing category slider nav items with icons to fix broken chars
            jQuery('.owl-carousel-product .owl-nav .owl-prev').html('<i class="bi bi-chevron-left" style="font-size: 1.2rem; margin-top:2px; font-weight:900;"></i>');
            jQuery('.owl-carousel-product .owl-nav .owl-next').html('<i class="bi bi-chevron-right" style="font-size: 1.2rem; margin-top:2px; font-weight:900;"></i>');
        }
    }, 500);
});
</script>
<div class="home-banner-new">
    <div class="container">
        <div class="section-heading-ornament">
            <span class="ornament-line"></span>
            <h2>SHOP BY CATEGORIES</h2>
            <span class="ornament-line"></span>
        </div>
        <div class="owl-carousel owl-carousel-product owl-loaded owl-drag">
                    <!-- Let's show our custom fields here now -->                      
                      
                    <!-- Let's show our custom fields here now -->                      
                      
                    <!-- Let's show our custom fields here now -->                      
                      
                    <!-- Let's show our custom fields here now -->                      
                      
                    <!-- Let's show our custom fields here now -->                      
                      
                    <!-- Let's show our custom fields here now -->                      
                      
                    <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(-1234px, 0px, 0px); transition: 0.25s; width: 3951px;"><div class="owl-item cloned" style="width: 246.934px;"><div class="d-flex flex-wrap jsb aic">
                <div class="banner-item">
                    <a href="/shop">
                        <img width="600" height="600" src="/mahashringar_assets/summer.webp" class="attachment-full size-full wp-post-image" alt="summer" decoding="async" srcset="https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/04/04121443/summer.webp 600w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/04/04121443/summer-300x300.webp 300w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/04/04121443/summer-150x150.webp 150w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/04/04121443/summer-400x400.webp 400w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/04/04121443/summer-100x100.webp 100w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/04/04121443/summer-96x96.webp 96w" sizes="(max-width:767px) 100vw, 1200px" style="width:100%;height:100%;max-width:600px;" fetchpriority="high" loading="eager">                    </a>
                </div>
                <div class="leftpart-banner">
                    <div class="bann-title"> <a href="/shop">Summer Dresses </a></div>
                </div>
            </div></div><div class="owl-item cloned" style="width: 246.934px;"><div class="d-flex flex-wrap jsb aic">
                <div class="banner-item">
                    <a href="/shop">
                        <img width="600" height="600" src="/mahashringar_assets/mukut.webp" class="attachment-full size-full wp-post-image" alt="mukut" decoding="async" srcset="https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2026/05/04120040/mukut.webp 600w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2026/05/04120040/mukut-300x300.webp 300w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2026/05/04120040/mukut-150x150.webp 150w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2026/05/04120040/mukut-400x400.webp 400w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2026/05/04120040/mukut-100x100.webp 100w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2026/05/04120040/mukut-96x96.webp 96w" sizes="(max-width:767px) 100vw, 1200px" style="width:100%;height:100%;max-width:600px;" fetchpriority="high" loading="eager">                    </a>
                </div>
                <div class="leftpart-banner">
                    <div class="bann-title"> <a href="/shop">Mukuts/Pagadi </a></div>
                </div>
            </div></div><div class="owl-item cloned" style="width: 246.934px;"><div class="d-flex flex-wrap jsb aic">
                <div class="banner-item">
                    <a href="/shop">
                        <img width="600" height="600" src="/mahashringar_assets/aasan.webp" class="attachment-full size-full wp-post-image" alt="aasan" decoding="async" srcset="https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2026/05/04120035/aasan.webp 600w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2026/05/04120035/aasan-300x300.webp 300w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2026/05/04120035/aasan-150x150.webp 150w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2026/05/04120035/aasan-400x400.webp 400w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2026/05/04120035/aasan-100x100.webp 100w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2026/05/04120035/aasan-96x96.webp 96w" sizes="(max-width:767px) 100vw, 1200px" style="width:100%;height:100%;max-width:600px;" fetchpriority="high" loading="eager">                    </a>
                </div>
                <div class="leftpart-banner">
                    <div class="bann-title"> <a href="/shop">Quilts/Aasan </a></div>
                </div>
            </div></div><div class="owl-item cloned" style="width: 246.934px;"><div class="d-flex flex-wrap jsb aic">
                <div class="banner-item">
                    <a href="/shop">
                        <img width="500" height="500" src="/mahashringar_assets/Laddu-Gopal-Bansuri.webp" class="attachment-full size-full wp-post-image" alt="Laddu Gopal Bansuri" decoding="async" srcset="https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/04/18114043/Laddu-Gopal-Bansuri.webp 500w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/04/18114043/Laddu-Gopal-Bansuri-300x300.webp 300w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/04/18114043/Laddu-Gopal-Bansuri-150x150.webp 150w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/04/18114043/Laddu-Gopal-Bansuri-400x400.webp 400w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/04/18114043/Laddu-Gopal-Bansuri-100x100.webp 100w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/04/18114043/Laddu-Gopal-Bansuri-96x96.webp 96w" sizes="(max-width:767px) 100vw, 1200px" style="width:100%;height:100%;max-width:500px;" fetchpriority="high" loading="eager">                    </a>
                </div>
                <div class="leftpart-banner">
                    <div class="bann-title"> <a href="/shop">Bansuri </a></div>
                </div>
            </div></div><div class="owl-item cloned" style="width: 246.934px;"><div class="d-flex flex-wrap jsb aic">
                <div class="banner-item">
                    <a href="/shop">
                        <img width="500" height="500" src="/mahashringar_assets/best_pink_cotton_gopi_dress-removebg-preview.png" class="attachment-full size-full wp-post-image" alt="best pink cotton gopi dress" decoding="async" srcset="https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/04/28110329/best_pink_cotton_gopi_dress-removebg-preview.png 500w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/04/28110329/best_pink_cotton_gopi_dress-removebg-preview-300x300.png 300w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/04/28110329/best_pink_cotton_gopi_dress-removebg-preview-150x150.png 150w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/04/28110329/best_pink_cotton_gopi_dress-removebg-preview-400x400.png 400w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/04/28110329/best_pink_cotton_gopi_dress-removebg-preview-100x100.png 100w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/04/28110329/best_pink_cotton_gopi_dress-removebg-preview-96x96.png 96w" sizes="(max-width:767px) 100vw, 1200px" style="width:100%;height:100%;max-width:500px;" fetchpriority="high" loading="eager">                    </a>
                </div>
                <div class="leftpart-banner">
                    <div class="bann-title"> <a href="/shop">Gopi Dress </a></div>
                </div>
            </div></div><div class="owl-item active" style="width: 246.934px;"><div class="d-flex flex-wrap jsb aic">
                <div class="banner-item">
                    <a href="/shop">
                        <img width="600" height="600" src="/mahashringar_assets/3-768x768-1.png" class="attachment-full size-full wp-post-image" alt="Laddu Gopal designer dress" decoding="async" fetchpriority="high" srcset="https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/07/07193707/3-768x768-1.png 600w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/07/07193707/3-768x768-1-300x300.png 300w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/07/07193707/3-768x768-1-150x150.png 150w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/07/07193707/3-768x768-1-400x400.png 400w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/07/07193707/3-768x768-1-100x100.png 100w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/07/07193707/3-768x768-1-96x96.png 96w" sizes="(max-width:767px) 100vw, 1200px" style="width:100%;height:100%;max-width:600px;" loading="eager">                    </a>
                </div>
                <div class="leftpart-banner">
                    <div class="bann-title"> <a href="/shop">Designer Dresses </a></div>
                </div>
            </div></div><div class="owl-item active" style="width: 246.934px;"><div class="d-flex flex-wrap jsb aic">
                <div class="banner-item">
                    <a href="/shop">
                        <img width="600" height="600" src="/mahashringar_assets/summer.webp" class="attachment-full size-full wp-post-image" alt="summer" decoding="async" srcset="https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/04/04121443/summer.webp 600w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/04/04121443/summer-300x300.webp 300w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/04/04121443/summer-150x150.webp 150w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/04/04121443/summer-400x400.webp 400w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/04/04121443/summer-100x100.webp 100w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/04/04121443/summer-96x96.webp 96w" sizes="(max-width:767px) 100vw, 1200px" style="width:100%;height:100%;max-width:600px;" fetchpriority="high" loading="eager">                    </a>
                </div>
                <div class="leftpart-banner">
                    <div class="bann-title"> <a href="/shop">Summer Dresses </a></div>
                </div>
            </div></div><div class="owl-item active" style="width: 246.934px;"><div class="d-flex flex-wrap jsb aic">
                <div class="banner-item">
                    <a href="/shop">
                        <img width="600" height="600" src="/mahashringar_assets/mukut.webp" class="attachment-full size-full wp-post-image" alt="mukut" decoding="async" srcset="https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2026/05/04120040/mukut.webp 600w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2026/05/04120040/mukut-300x300.webp 300w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2026/05/04120040/mukut-150x150.webp 150w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2026/05/04120040/mukut-400x400.webp 400w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2026/05/04120040/mukut-100x100.webp 100w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2026/05/04120040/mukut-96x96.webp 96w" sizes="(max-width:767px) 100vw, 1200px" style="width:100%;height:100%;max-width:600px;" fetchpriority="high" loading="eager">                    </a>
                </div>
                <div class="leftpart-banner">
                    <div class="bann-title"> <a href="/shop">Mukuts/Pagadi </a></div>
                </div>
            </div></div><div class="owl-item active" style="width: 246.934px;"><div class="d-flex flex-wrap jsb aic">
                <div class="banner-item">
                    <a href="/shop">
                        <img width="600" height="600" src="/mahashringar_assets/aasan.webp" class="attachment-full size-full wp-post-image" alt="aasan" decoding="async" srcset="https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2026/05/04120035/aasan.webp 600w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2026/05/04120035/aasan-300x300.webp 300w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2026/05/04120035/aasan-150x150.webp 150w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2026/05/04120035/aasan-400x400.webp 400w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2026/05/04120035/aasan-100x100.webp 100w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2026/05/04120035/aasan-96x96.webp 96w" sizes="(max-width:767px) 100vw, 1200px" style="width:100%;height:100%;max-width:600px;" fetchpriority="high" loading="eager">                    </a>
                </div>
                <div class="leftpart-banner">
                    <div class="bann-title"> <a href="/shop">Quilts/Aasan </a></div>
                </div>
            </div></div><div class="owl-item active" style="width: 246.934px;"><div class="d-flex flex-wrap jsb aic">
                <div class="banner-item">
                    <a href="/shop">
                        <img width="500" height="500" src="/mahashringar_assets/Laddu-Gopal-Bansuri.webp" class="attachment-full size-full wp-post-image" alt="Laddu Gopal Bansuri" decoding="async" srcset="https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/04/18114043/Laddu-Gopal-Bansuri.webp 500w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/04/18114043/Laddu-Gopal-Bansuri-300x300.webp 300w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/04/18114043/Laddu-Gopal-Bansuri-150x150.webp 150w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/04/18114043/Laddu-Gopal-Bansuri-400x400.webp 400w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/04/18114043/Laddu-Gopal-Bansuri-100x100.webp 100w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/04/18114043/Laddu-Gopal-Bansuri-96x96.webp 96w" sizes="(max-width:767px) 100vw, 1200px" style="width:100%;height:100%;max-width:500px;" fetchpriority="high" loading="eager">                    </a>
                </div>
                <div class="leftpart-banner">
                    <div class="bann-title"> <a href="/shop">Bansuri </a></div>
                </div>
            </div></div><div class="owl-item" style="width: 246.934px;"><div class="d-flex flex-wrap jsb aic">
                <div class="banner-item">
                    <a href="/shop">
                        <img width="500" height="500" src="/mahashringar_assets/best_pink_cotton_gopi_dress-removebg-preview.png" class="attachment-full size-full wp-post-image" alt="best pink cotton gopi dress" decoding="async" srcset="https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/04/28110329/best_pink_cotton_gopi_dress-removebg-preview.png 500w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/04/28110329/best_pink_cotton_gopi_dress-removebg-preview-300x300.png 300w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/04/28110329/best_pink_cotton_gopi_dress-removebg-preview-150x150.png 150w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/04/28110329/best_pink_cotton_gopi_dress-removebg-preview-400x400.png 400w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/04/28110329/best_pink_cotton_gopi_dress-removebg-preview-100x100.png 100w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/04/28110329/best_pink_cotton_gopi_dress-removebg-preview-96x96.png 96w" sizes="(max-width:767px) 100vw, 1200px" style="width:100%;height:100%;max-width:500px;" fetchpriority="high" loading="eager">                    </a>
                </div>
                <div class="leftpart-banner">
                    <div class="bann-title"> <a href="/shop">Gopi Dress </a></div>
                </div>
            </div></div><div class="owl-item cloned" style="width: 246.934px;"><div class="d-flex flex-wrap jsb aic">
                <div class="banner-item">
                    <a href="/shop">
                        <img width="600" height="600" src="/mahashringar_assets/3-768x768-1.png" class="attachment-full size-full wp-post-image" alt="Laddu Gopal designer dress" decoding="async" fetchpriority="high" srcset="https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/07/07193707/3-768x768-1.png 600w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/07/07193707/3-768x768-1-300x300.png 300w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/07/07193707/3-768x768-1-150x150.png 150w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/07/07193707/3-768x768-1-400x400.png 400w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/07/07193707/3-768x768-1-100x100.png 100w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/07/07193707/3-768x768-1-96x96.png 96w" sizes="(max-width:767px) 100vw, 1200px" style="width:100%;height:100%;max-width:600px;" loading="eager">                    </a>
                </div>
                <div class="leftpart-banner">
                    <div class="bann-title"> <a href="/shop">Designer Dresses </a></div>
                </div>
            </div></div><div class="owl-item cloned" style="width: 246.934px;"><div class="d-flex flex-wrap jsb aic">
                <div class="banner-item">
                    <a href="/shop">
                        <img width="600" height="600" src="/mahashringar_assets/summer.webp" class="attachment-full size-full wp-post-image" alt="summer" decoding="async" srcset="https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/04/04121443/summer.webp 600w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/04/04121443/summer-300x300.webp 300w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/04/04121443/summer-150x150.webp 150w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/04/04121443/summer-400x400.webp 400w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/04/04121443/summer-100x100.webp 100w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/04/04121443/summer-96x96.webp 96w" sizes="(max-width:767px) 100vw, 1200px" style="width:100%;height:100%;max-width:600px;" fetchpriority="high" loading="eager">                    </a>
                </div>
                <div class="leftpart-banner">
                    <div class="bann-title"> <a href="/shop">Summer Dresses </a></div>
                </div>
            </div></div><div class="owl-item cloned" style="width: 246.934px;"><div class="d-flex flex-wrap jsb aic">
                <div class="banner-item">
                    <a href="/shop">
                        <img width="600" height="600" src="/mahashringar_assets/mukut.webp" class="attachment-full size-full wp-post-image" alt="mukut" decoding="async" srcset="https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2026/05/04120040/mukut.webp 600w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2026/05/04120040/mukut-300x300.webp 300w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2026/05/04120040/mukut-150x150.webp 150w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2026/05/04120040/mukut-400x400.webp 400w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2026/05/04120040/mukut-100x100.webp 100w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2026/05/04120040/mukut-96x96.webp 96w" sizes="(max-width:767px) 100vw, 1200px" style="width:100%;height:100%;max-width:600px;" fetchpriority="high" loading="eager">                    </a>
                </div>
                <div class="leftpart-banner">
                    <div class="bann-title"> <a href="/shop">Mukuts/Pagadi </a></div>
                </div>
            </div></div><div class="owl-item cloned" style="width: 246.934px;"><div class="d-flex flex-wrap jsb aic">
                <div class="banner-item">
                    <a href="/shop">
                        <img width="600" height="600" src="/mahashringar_assets/aasan.webp" class="attachment-full size-full wp-post-image" alt="aasan" decoding="async" srcset="https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2026/05/04120035/aasan.webp 600w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2026/05/04120035/aasan-300x300.webp 300w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2026/05/04120035/aasan-150x150.webp 150w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2026/05/04120035/aasan-400x400.webp 400w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2026/05/04120035/aasan-100x100.webp 100w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2026/05/04120035/aasan-96x96.webp 96w" sizes="(max-width:767px) 100vw, 1200px" style="width:100%;height:100%;max-width:600px;" fetchpriority="high" loading="eager">                    </a>
                </div>
                <div class="leftpart-banner">
                    <div class="bann-title"> <a href="/shop">Quilts/Aasan </a></div>
                </div>
            </div></div><div class="owl-item cloned" style="width: 246.934px;"><div class="d-flex flex-wrap jsb aic">
                <div class="banner-item">
                    <a href="/shop">
                        <img width="500" height="500" src="/mahashringar_assets/Laddu-Gopal-Bansuri.webp" class="attachment-full size-full wp-post-image" alt="Laddu Gopal Bansuri" decoding="async" srcset="https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/04/18114043/Laddu-Gopal-Bansuri.webp 500w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/04/18114043/Laddu-Gopal-Bansuri-300x300.webp 300w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/04/18114043/Laddu-Gopal-Bansuri-150x150.webp 150w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/04/18114043/Laddu-Gopal-Bansuri-400x400.webp 400w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/04/18114043/Laddu-Gopal-Bansuri-100x100.webp 100w, https://mahashringar.s3.ap-south-1.amazonaws.com/wp-content/uploads/2024/04/18114043/Laddu-Gopal-Bansuri-96x96.webp 96w" sizes="(max-width:767px) 100vw, 1200px" style="width:100%;height:100%;max-width:500px;" fetchpriority="high" loading="eager">                    </a>
                </div>
                <div class="leftpart-banner">
                    <div class="bann-title"> <a href="/shop">Bansuri </a></div>
                </div>
            </div></div></div></div><div class="owl-dots"><button role="button" class="owl-dot active"><span></span></button><button role="button" class="owl-dot"><span></span></button></div></div>
    </div>
</div>
<!--End banner -->
<div class="winter-bnr">
	<a href="/shop">
	<img src="/mahashringar_assets/holi-bnr-new.webp" alt="holi bnr new"></a>
</div>


<div class="latest-dress products-list text-center padtb80" id="latest_collection">
    <div class="container">
        <h2 class="site-title">Festival Collection</h2>
        <p class="mini-discription">Latest dresses for your Laddu Gopal! Give them a new and attractive look.</p>
        
    <ul>
                    <li>
    <div class="rs-product-card">
        <div class="rs-card-img-box">
            <span class="rs-card-badge">60% OFF</span>
            <a href="/wishlist" class="rs-wishlist-heart" title="Add to Wishlist"><i class="bi bi-heart"></i></a>
            <a href="/shop">
                <img src="/mahashringar_assets/sky-blue-butterfly-laddu-gopal-summer-dress.webp" alt="Laddu Gopal Summer Poshak in Sky Blue" loading="lazy">
            </a>
        </div>
        <div class="rs-card-body">
            <a href="/shop" class="rs-card-title">Laddu Gopal Summer Poshak in Sky Blue</a>
            <div class="rs-card-price">
                <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₹</span>728.00</bdi></span>
                <span class="rs-card-price-old">₹1671.00</span>
            </div>
            <div class="rs-card-actions">
                <a href="/shop" class="rs-btn-buynow">Buy Now</a>
                <a href="/shop" class="rs-btn-carticon"><i class="bi bi-cart-plus-fill"></i></a>
            </div>
        </div>
    </div>
</li>
                    <li>
    <div class="rs-product-card">
        <div class="rs-card-img-box">
            <span class="rs-card-badge">60% OFF</span>
            <a href="/wishlist" class="rs-wishlist-heart" title="Add to Wishlist"><i class="bi bi-heart"></i></a>
            <a href="/shop">
                <img src="/mahashringar_assets/red-purple-laddu-gopal-dress-front-view.webp" alt="Laddu Gopal Designer Poshak Set with Mukut Patka in Red" loading="lazy">
            </a>
        </div>
        <div class="rs-card-body">
            <a href="/shop" class="rs-card-title">Laddu Gopal Designer Poshak Set with Mukut Patka in Red</a>
            <div class="rs-card-price">
                <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₹</span>890.00</bdi></span>
                <span class="rs-card-price-old">₹1889.00</span>
            </div>
            <div class="rs-card-actions">
                <a href="/shop" class="rs-btn-buynow">Buy Now</a>
                <a href="/shop" class="rs-btn-carticon"><i class="bi bi-cart-plus-fill"></i></a>
            </div>
        </div>
    </div>
</li>
                    <li>
    <div class="rs-product-card">
        <div class="rs-card-img-box">
            <span class="rs-card-badge">60% OFF</span>
            <a href="/wishlist" class="rs-wishlist-heart" title="Add to Wishlist"><i class="bi bi-heart"></i></a>
            <a href="/shop">
                <img src="/mahashringar_assets/sky-blue-laddu-gopal-summer-dress-1.webp" alt="Laddu Gopal Summer Poshak in Sky Blue Cotton" loading="lazy">
            </a>
        </div>
        <div class="rs-card-body">
            <a href="/shop" class="rs-card-title">Laddu Gopal Summer Poshak in Sky Blue Cotton</a>
            <div class="rs-card-price">
                <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₹</span>282.00</bdi></span>
                <span class="rs-card-price-old">₹1454.00</span>
            </div>
            <div class="rs-card-actions">
                <a href="/shop" class="rs-btn-buynow">Buy Now</a>
                <a href="/shop" class="rs-btn-carticon"><i class="bi bi-cart-plus-fill"></i></a>
            </div>
        </div>
    </div>
</li>
                    <li>
    <div class="rs-product-card">
        <div class="rs-card-img-box">
            <span class="rs-card-badge">60% OFF</span>
            <a href="/wishlist" class="rs-wishlist-heart" title="Add to Wishlist"><i class="bi bi-heart"></i></a>
            <a href="/shop">
                <img src="/mahashringar_assets/multicolor-cotton-laddu-gopal-poshak.webp" alt="Laddu Gopal Summer Dress in Multicolour" loading="lazy">
            </a>
        </div>
        <div class="rs-card-body">
            <a href="/shop" class="rs-card-title">Laddu Gopal Summer Dress in Multicolour</a>
            <div class="rs-card-price">
                <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₹</span>235.00</bdi></span>
                <span class="rs-card-price-old">₹1019.00</span>
            </div>
            <div class="rs-card-actions">
                <a href="/shop" class="rs-btn-buynow">Buy Now</a>
                <a href="/shop" class="rs-btn-carticon"><i class="bi bi-cart-plus-fill"></i></a>
            </div>
        </div>
    </div>
</li>
                    <li>
    <div class="rs-product-card">
        <div class="rs-card-img-box">
            <span class="rs-card-badge">60% OFF</span>
            <a href="/wishlist" class="rs-wishlist-heart" title="Add to Wishlist"><i class="bi bi-heart"></i></a>
            <a href="/shop">
                <img src="/mahashringar_assets/laddu-gopal-summer-cotton-dress-pink-front.webp" alt="Laddu Gopal Summer Poshak in Pink with Pagri" loading="lazy">
            </a>
        </div>
        <div class="rs-card-body">
            <a href="/shop" class="rs-card-title">Laddu Gopal Summer Poshak in Pink with Pagri</a>
            <div class="rs-card-price">
                <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₹</span>455.00</bdi></span>
                <span class="rs-card-price-old">₹1729.00</span>
            </div>
            <div class="rs-card-actions">
                <a href="/shop" class="rs-btn-buynow">Buy Now</a>
                <a href="/shop" class="rs-btn-carticon"><i class="bi bi-cart-plus-fill"></i></a>
            </div>
        </div>
    </div>
</li>
                    <li>
    <div class="rs-product-card">
        <div class="rs-card-img-box">
            <span class="rs-card-badge">60% OFF</span>
            <a href="/wishlist" class="rs-wishlist-heart" title="Add to Wishlist"><i class="bi bi-heart"></i></a>
            <a href="/shop">
                <img src="/mahashringar_assets/Yellow-Floral-Cotton-Laddu-Gopal-Dress-“-Designer-Summer-Poshak.webp" alt="Bright Yellow Floral Laddu Gopal Summer Dress &amp;amp; Mukut Combo | Size 0,1,2,4,5" loading="lazy">
            </a>
        </div>
        <div class="rs-card-body">
            <a href="/shop" class="rs-card-title">Bright Yellow Floral Laddu Gopal Summer Dress &amp;amp; Mukut Combo | Size 0,1,2,4,5</a>
            <div class="rs-card-price">
                <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₹</span>461.00</bdi></span>
                <span class="rs-card-price-old">₹1215.00</span>
            </div>
            <div class="rs-card-actions">
                <a href="/shop" class="rs-btn-buynow">Buy Now</a>
                <a href="/shop" class="rs-btn-carticon"><i class="bi bi-cart-plus-fill"></i></a>
            </div>
        </div>
    </div>
</li>
                    <li>
    <div class="rs-product-card">
        <div class="rs-card-img-box">
            <span class="rs-card-badge">60% OFF</span>
            <a href="/wishlist" class="rs-wishlist-heart" title="Add to Wishlist"><i class="bi bi-heart"></i></a>
            <a href="/shop">
                <img src="/mahashringar_assets/Premium-Flower-Multicolor-Laddu-Gopal-Dress.webp" alt="Laddu Gopal Sunflower Summer Cotton Poshak | Size “ 0 to 5" loading="lazy">
            </a>
        </div>
        <div class="rs-card-body">
            <a href="/shop" class="rs-card-title">Laddu Gopal Sunflower Summer Cotton Poshak | Size “ 0 to 5</a>
            <div class="rs-card-price">
                <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₹</span>634.00</bdi></span>
                <span class="rs-card-price-old">₹1377.00</span>
            </div>
            <div class="rs-card-actions">
                <a href="/shop" class="rs-btn-buynow">Buy Now</a>
                <a href="/shop" class="rs-btn-carticon"><i class="bi bi-cart-plus-fill"></i></a>
            </div>
        </div>
    </div>
</li>
                    <li>
    <div class="rs-product-card">
        <div class="rs-card-img-box">
            <span class="rs-card-badge">60% OFF</span>
            <a href="/wishlist" class="rs-wishlist-heart" title="Add to Wishlist"><i class="bi bi-heart"></i></a>
            <a href="/shop">
                <img src="/mahashringar_assets/Traditional-Bandhani-Laddu-Gopal-Dress-with-Matching-Safa-“-Multicolor-Cotton-Poshak.webp" alt="Kanha ji Bandhani Print Cotton Dress with Patka | Size -2,4,5" loading="lazy">
            </a>
        </div>
        <div class="rs-card-body">
            <a href="/shop" class="rs-card-title">Kanha ji Bandhani Print Cotton Dress with Patka | Size -2,4,5</a>
            <div class="rs-card-price">
                <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₹</span>960.00</bdi></span>
                <span class="rs-card-price-old">₹1566.00</span>
            </div>
            <div class="rs-card-actions">
                <a href="/shop" class="rs-btn-buynow">Buy Now</a>
                <a href="/shop" class="rs-btn-carticon"><i class="bi bi-cart-plus-fill"></i></a>
            </div>
        </div>
    </div>
</li>
            </ul>
    
    <div class="view-more-wrapper">
        <a href="#" class="view-more-btn">
            View More
        </a>
    </div>



    </div>
</div>
<div class="container">
    <a href="/shop"><img src="/mahashringar_assets/middle-gopi-dresses.jpg" width="1440" height="700" alt="Laddu Golpal Summer Dress"></a>
</div>

<div class="latest-dress products-list text-center padt60 padtb80" id="latest_collection">
    <div class="container">
        <h2 class="site-title">Featured Collection</h2>
        <p class="mini-discription">Featured collection dresses for your Laddu Gopal! Give them a new and attractive look.</p>
        
<ul>
    <li>
    <div class="rs-product-card">
        <div class="rs-card-img-box">
            <span class="rs-card-badge">60% OFF</span>
            <a href="/wishlist" class="rs-wishlist-heart" title="Add to Wishlist"><i class="bi bi-heart"></i></a>
            <a href="/shop">
                <img src="/mahashringar_assets/laddu-gopal-blue-stone-designer-earrings.webp" alt="Mahashringar Laddu Gopal Bangles with Blue Stone &amp;amp; Diamond Design For Size 0-5" loading="lazy">
            </a>
        </div>
        <div class="rs-card-body">
            <a href="/shop" class="rs-card-title">Mahashringar Laddu Gopal Bangles with Blue Stone &amp;amp; Diamond Design For Size 0-5</a>
            <div class="rs-card-price">
                <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₹</span>734.00</bdi></span>
                <span class="rs-card-price-old">₹1173.00</span>
            </div>
            <div class="rs-card-actions">
                <a href="/shop" class="rs-btn-buynow">Buy Now</a>
                <a href="/shop" class="rs-btn-carticon"><i class="bi bi-cart-plus-fill"></i></a>
            </div>
        </div>
    </div>
</li>
    <li>
    <div class="rs-product-card">
        <div class="rs-card-img-box">
            <span class="rs-card-badge">60% OFF</span>
            <a href="/wishlist" class="rs-wishlist-heart" title="Add to Wishlist"><i class="bi bi-heart"></i></a>
            <a href="/shop">
                <img src="/mahashringar_assets/pink-laddu-gopal-summer-dress-front.webp" alt="Pink Laddu Gopal Summer Dress Set" loading="lazy">
            </a>
        </div>
        <div class="rs-card-body">
            <a href="/shop" class="rs-card-title">Pink Laddu Gopal Summer Dress Set</a>
            <div class="rs-card-price">
                <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₹</span>306.00</bdi></span>
                <span class="rs-card-price-old">₹1631.00</span>
            </div>
            <div class="rs-card-actions">
                <a href="/shop" class="rs-btn-buynow">Buy Now</a>
                <a href="/shop" class="rs-btn-carticon"><i class="bi bi-cart-plus-fill"></i></a>
            </div>
        </div>
    </div>
</li>
    <li>
    <div class="rs-product-card">
        <div class="rs-card-img-box">
            <span class="rs-card-badge">60% OFF</span>
            <a href="/wishlist" class="rs-wishlist-heart" title="Add to Wishlist"><i class="bi bi-heart"></i></a>
            <a href="/shop">
                <img src="/mahashringar_assets/laddu-gopal-designer-dress-heavy-blue-front-view-size-2-4-5.webp" alt="Laddu Gopal Designer Dress Set in Blue" loading="lazy">
            </a>
        </div>
        <div class="rs-card-body">
            <a href="/shop" class="rs-card-title">Laddu Gopal Designer Dress Set in Blue</a>
            <div class="rs-card-price">
                <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₹</span>723.00</bdi></span>
                <span class="rs-card-price-old">₹1325.00</span>
            </div>
            <div class="rs-card-actions">
                <a href="/shop" class="rs-btn-buynow">Buy Now</a>
                <a href="/shop" class="rs-btn-carticon"><i class="bi bi-cart-plus-fill"></i></a>
            </div>
        </div>
    </div>
</li>
    <li>
    <div class="rs-product-card">
        <div class="rs-card-img-box">
            <span class="rs-card-badge">60% OFF</span>
            <a href="/wishlist" class="rs-wishlist-heart" title="Add to Wishlist"><i class="bi bi-heart"></i></a>
            <a href="/shop">
                <img src="/mahashringar_assets/royal-blue-butterfly-laddu-gopal-summer-dress.webp" alt="Laddu Gopal Summer Poshak in Blue" loading="lazy">
            </a>
        </div>
        <div class="rs-card-body">
            <a href="/shop" class="rs-card-title">Laddu Gopal Summer Poshak in Blue</a>
            <div class="rs-card-price">
                <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₹</span>521.00</bdi></span>
                <span class="rs-card-price-old">₹1131.00</span>
            </div>
            <div class="rs-card-actions">
                <a href="/shop" class="rs-btn-buynow">Buy Now</a>
                <a href="/shop" class="rs-btn-carticon"><i class="bi bi-cart-plus-fill"></i></a>
            </div>
        </div>
    </div>
</li>
    <li>
    <div class="rs-product-card">
        <div class="rs-card-img-box">
            <span class="rs-card-badge">60% OFF</span>
            <a href="/wishlist" class="rs-wishlist-heart" title="Add to Wishlist"><i class="bi bi-heart"></i></a>
            <a href="/shop">
                <img src="/mahashringar_assets/yellow-pink-laddu-gopal-dress-front.webp" alt="Laddu Gopal Designer Poshak Set with Mukut Patka Yellow" loading="lazy">
            </a>
        </div>
        <div class="rs-card-body">
            <a href="/shop" class="rs-card-title">Laddu Gopal Designer Poshak Set with Mukut Patka Yellow</a>
            <div class="rs-card-price">
                <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₹</span>384.00</bdi></span>
                <span class="rs-card-price-old">₹1566.00</span>
            </div>
            <div class="rs-card-actions">
                <a href="/shop" class="rs-btn-buynow">Buy Now</a>
                <a href="/shop" class="rs-btn-carticon"><i class="bi bi-cart-plus-fill"></i></a>
            </div>
        </div>
    </div>
</li>
    <li>
    <div class="rs-product-card">
        <div class="rs-card-img-box">
            <span class="rs-card-badge">60% OFF</span>
            <a href="/wishlist" class="rs-wishlist-heart" title="Add to Wishlist"><i class="bi bi-heart"></i></a>
            <a href="/shop">
                <img src="/mahashringar_assets/red-velvet-laddu-gopal-dress-front.webp" alt="Red Velvet Laddu Gopal Dress with Heavy Gold Embroidery &amp;amp; Mukut Set | Size “ 2,4,5,6" loading="lazy">
            </a>
        </div>
        <div class="rs-card-body">
            <a href="/shop" class="rs-card-title">Red Velvet Laddu Gopal Dress with Heavy Gold Embroidery &amp;amp; Mukut Set | Size “ 2,4,5,6</a>
            <div class="rs-card-price">
                <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₹</span>301.00</bdi></span>
                <span class="rs-card-price-old">₹1172.00</span>
            </div>
            <div class="rs-card-actions">
                <a href="/shop" class="rs-btn-buynow">Buy Now</a>
                <a href="/shop" class="rs-btn-carticon"><i class="bi bi-cart-plus-fill"></i></a>
            </div>
        </div>
    </div>
</li>
    <li>
    <div class="rs-product-card">
        <div class="rs-card-img-box">
            <span class="rs-card-badge">60% OFF</span>
            <a href="/wishlist" class="rs-wishlist-heart" title="Add to Wishlist"><i class="bi bi-heart"></i></a>
            <a href="/shop">
                <img src="/mahashringar_assets/Mahashringar-Radhe-Krishna-Bansuri-for-Laddu-Gopal-Kanha-Ji-Thakur-Ji-Radhe-Naam-Flute-Size-0-1.webp" alt="Mahashringar Radhe Bansuri for Laddu Gopal | Krishna Idol Flute | Size- 0,1" loading="lazy">
            </a>
        </div>
        <div class="rs-card-body">
            <a href="/shop" class="rs-card-title">Mahashringar Radhe Bansuri for Laddu Gopal | Krishna Idol Flute | Size- 0,1</a>
            <div class="rs-card-price">
                <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₹</span>677.00</bdi></span>
                <span class="rs-card-price-old">₹1672.00</span>
            </div>
            <div class="rs-card-actions">
                <a href="/shop" class="rs-btn-buynow">Buy Now</a>
                <a href="/shop" class="rs-btn-carticon"><i class="bi bi-cart-plus-fill"></i></a>
            </div>
        </div>
    </div>
</li>
    <li>
    <div class="rs-product-card">
        <div class="rs-card-img-box">
            <span class="rs-card-badge">60% OFF</span>
            <a href="/wishlist" class="rs-wishlist-heart" title="Add to Wishlist"><i class="bi bi-heart"></i></a>
            <a href="/shop">
                <img src="/mahashringar_assets/Laddu-Gopal-Earrings-Floral-Designer-Stone-Stud-Earrings-for-Kanha-Ji.webp" alt="Mahashringar Laddu Gopal ji Earrings | Stone Work Earring for Kanha Ji| Size-4,5" loading="lazy">
            </a>
        </div>
        <div class="rs-card-body">
            <a href="/shop" class="rs-card-title">Mahashringar Laddu Gopal ji Earrings | Stone Work Earring for Kanha Ji| Size-4,5</a>
            <div class="rs-card-price">
                <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₹</span>504.00</bdi></span>
                <span class="rs-card-price-old">₹1001.00</span>
            </div>
            <div class="rs-card-actions">
                <a href="/shop" class="rs-btn-buynow">Buy Now</a>
                <a href="/shop" class="rs-btn-carticon"><i class="bi bi-cart-plus-fill"></i></a>
            </div>
        </div>
    </div>
</li>
</ul>

    </div>
</div>


<!--Shop Banner -->
<div class="shop-banner">
    <div class="container">
      <video autoplay="" muted="" loop="" playsinline="" controls="">
        <source src="#/wp-content/themes/mahashringar/assets/images/home-video.mp4" type="video/mp4">
         Your browser does not support the video tag.
    </video>
    </div>
</div>
<!-- End Shop Banner -->

<section class="testimonials"><h2 class="section-title" style="font-size: 1.8rem; text-align: center; margin: 30px 0; font-weight: 700; color: #b71c1c;">&#10024; LOVED BY DEVOTEES &#10024;</h2>
<div class="container">
  <div class="owl-carousel owl-carousel-testimonials owl-loaded owl-drag">
    

    

    

    
    <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(-1852px, 0px, 0px); transition: 0.25s; width: 3705px;"><div class="owl-item cloned" style="width: 308.668px;"><div class="item card">
      <div class="stars">&#11088;&#11088;&#11088;&#11088;&#11088;</div>
      <p class="review">
        "The quality and detailing of the poshaks is amazing. You can feel the devotion in each piece."
      </p>
      <div class="user">
        <span class="user-initial">N</span>
        <div>
          <div class="testi-name">Neha Sharma</div>
          <span>Delhi</span>
        </div>
      </div>
    </div></div><div class="owl-item cloned" style="width: 308.668px;"><div class="item card">
      <div class="stars">&#11088;&#11088;&#11088;&#11088;&#11088;</div>
      <p class="review">
        "Beautiful collection and very soft fabric. My Laddu Gopal looks so adorable!"
      </p>
      <div class="user">
        <span class="user-initial">P</span>
        <div>
          <div class="testi-name">Priya Patel</div>
          <span>Vadodara</span>
        </div>
      </div>
    </div></div><div class="owl-item cloned" style="width: 308.668px;"><div class="item card">
      <div class="stars">&#11088;&#11088;&#11088;&#11088;&#11088;</div>
      <p class="review">
        "Timely delivery and excellent customer service. Highly recommended!"
      </p>
      <div class="user">
        <span class="user-initial">R</span>
        <div>
          <div class="testi-name">Ramesh Verma</div>
          <span>Jaipur</span>
        </div>
      </div>
    </div></div><div class="owl-item cloned" style="width: 308.668px;"><div class="item card">
      <div class="stars">&#11088;&#11088;&#11088;&#11088;&#11088;</div>
      <p class="review">
        "My Laddu Gopal dresses always get noticed &amp; compliments. Grateful to MahaShingar!"
      </p>
      <div class="user">
        <span class="user-initial">A</span>
        <div>
          <div class="testi-name">Anjali Mehta</div>
          <span>Mumbai</span>
        </div>
      </div>
    </div></div><div class="owl-item" style="width: 308.668px;"><div class="item card">
      <div class="stars">&#11088;&#11088;&#11088;&#11088;&#11088;</div>
      <p class="review">
        "The quality and detailing of the poshaks is amazing. You can feel the devotion in each piece."
      </p>
      <div class="user">
        <span class="user-initial">N</span>
        <div>
          <div class="testi-name">Neha Sharma</div>
          <span>Delhi</span>
        </div>
      </div>
    </div></div><div class="owl-item" style="width: 308.668px;"><div class="item card">
      <div class="stars">&#11088;&#11088;&#11088;&#11088;&#11088;</div>
      <p class="review">
        "Beautiful collection and very soft fabric. My Laddu Gopal looks so adorable!"
      </p>
      <div class="user">
        <span class="user-initial">P</span>
        <div>
          <div class="testi-name">Priya Patel</div>
          <span>Vadodara</span>
        </div>
      </div>
    </div></div><div class="owl-item active" style="width: 308.668px;"><div class="item card">
      <div class="stars">&#11088;&#11088;&#11088;&#11088;&#11088;</div>
      <p class="review">
        "Timely delivery and excellent customer service. Highly recommended!"
      </p>
      <div class="user">
        <span class="user-initial">R</span>
        <div>
          <div class="testi-name">Ramesh Verma</div>
          <span>Jaipur</span>
        </div>
      </div>
    </div></div><div class="owl-item active" style="width: 308.668px;"><div class="item card">
      <div class="stars">&#11088;&#11088;&#11088;&#11088;&#11088;</div>
      <p class="review">
        "My Laddu Gopal dresses always get noticed &amp; compliments. Grateful to MahaShingar!"
      </p>
      <div class="user">
        <span class="user-initial">A</span>
        <div>
          <div class="testi-name">Anjali Mehta</div>
          <span>Mumbai</span>
        </div>
      </div>
    </div></div><div class="owl-item cloned active" style="width: 308.668px;"><div class="item card">
      <div class="stars">&#11088;&#11088;&#11088;&#11088;&#11088;</div>
      <p class="review">
        "The quality and detailing of the poshaks is amazing. You can feel the devotion in each piece."
      </p>
      <div class="user">
        <span class="user-initial">N</span>
        <div>
          <div class="testi-name">Neha Sharma</div>
          <span>Delhi</span>
        </div>
      </div>
    </div></div><div class="owl-item cloned active" style="width: 308.668px;"><div class="item card">
      <div class="stars">&#11088;&#11088;&#11088;&#11088;&#11088;</div>
      <p class="review">
        "Beautiful collection and very soft fabric. My Laddu Gopal looks so adorable!"
      </p>
      <div class="user">
        <span class="user-initial">P</span>
        <div>
          <div class="testi-name">Priya Patel</div>
          <span>Vadodara</span>
        </div>
      </div>
    </div></div><div class="owl-item cloned" style="width: 308.668px;"><div class="item card">
      <div class="stars">&#11088;&#11088;&#11088;&#11088;&#11088;</div>
      <p class="review">
        "Timely delivery and excellent customer service. Highly recommended!"
      </p>
      <div class="user">
        <span class="user-initial">R</span>
        <div>
          <div class="testi-name">Ramesh Verma</div>
          <span>Jaipur</span>
        </div>
      </div>
    </div></div><div class="owl-item cloned" style="width: 308.668px;"><div class="item card">
      <div class="stars">&#11088;&#11088;&#11088;&#11088;&#11088;</div>
      <p class="review">
        "My Laddu Gopal dresses always get noticed &amp; compliments. Grateful to MahaShingar!"
      </p>
      <div class="user">
        <span class="user-initial">A</span>
        <div>
          <div class="testi-name">Anjali Mehta</div>
          <span>Mumbai</span>
        </div>
      </div>
    </div></div></div></div><div class="owl-dots disabled"></div></div>
  </div>
</section>

<section class="video-testi">
    <h2 class="section-title" style="font-size: 1.5rem; text-align: center; margin: 30px 0;">&#10024; Customer Video Reviews &#10024;</h2>
    <div class="container">
        <div class="reel-grid owl-carousel owl-carousel-video-testimonials owl-loaded owl-drag">
            
      <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(-1250px, 0px, 0px); transition: all; width: 5003px;"><div class="owl-item cloned" style="width: 296.668px; margin-right: 16px;"><div class="reel-item">
              <video src="#/wp-content/themes/mahashringar/assets/videos/video-testi-5.mp4" playsinline="" loop=""></video>
              <button class="reel-play" aria-label="Play reel">â–¶</button>
            </div></div><div class="owl-item cloned" style="width: 296.668px; margin-right: 16px;"><div class="reel-item">
              <video src="#/wp-content/themes/mahashringar/assets/videos/video-testi-6.mp4" playsinline="" loop=""></video>
              <button class="reel-play" aria-label="Play reel">â–¶</button>
            </div></div><div class="owl-item cloned" style="width: 296.668px; margin-right: 16px;"><div class="reel-item">
              <video src="#/wp-content/themes/mahashringar/assets/videos/video-testi-7.mp4" playsinline="" loop=""></video>
              <button class="reel-play" aria-label="Play reel">â–¶</button>
            </div></div><div class="owl-item cloned" style="width: 296.668px; margin-right: 16px;"><div class="reel-item">
              <video src="#/wp-content/themes/mahashringar/assets/videos/video-testi-8.mp4" playsinline="" loop=""></video>
              <button class="reel-play" aria-label="Play reel">â–¶</button>
            </div></div><div class="owl-item active" style="width: 296.668px; margin-right: 16px;"><div class="reel-item">
              <video src="#/wp-content/themes/mahashringar/assets/videos/video-testi-1.mp4" playsinline="" loop=""></video>
              <button class="reel-play" aria-label="Play reel">â–¶</button>
            </div></div><div class="owl-item active" style="width: 296.668px; margin-right: 16px;"><div class="reel-item">
              <video src="#/wp-content/themes/mahashringar/assets/videos/video-testi-2.mp4" playsinline="" loop=""></video>
              <button class="reel-play" aria-label="Play reel">â–¶</button>
            </div></div><div class="owl-item active" style="width: 296.668px; margin-right: 16px;"><div class="reel-item">
              <video src="#/wp-content/themes/mahashringar/assets/videos/video-testi-3.mp4" playsinline="" loop=""></video>
              <button class="reel-play" aria-label="Play reel">â–¶</button>
            </div></div><div class="owl-item active" style="width: 296.668px; margin-right: 16px;"><div class="reel-item">
              <video src="#/wp-content/themes/mahashringar/assets/videos/video-testi-4.mp4" playsinline="" loop=""></video>
              <button class="reel-play" aria-label="Play reel">â–¶</button>
            </div></div><div class="owl-item" style="width: 296.668px; margin-right: 16px;"><div class="reel-item">
              <video src="#/wp-content/themes/mahashringar/assets/videos/video-testi-5.mp4" playsinline="" loop=""></video>
              <button class="reel-play" aria-label="Play reel">â–¶</button>
            </div></div><div class="owl-item" style="width: 296.668px; margin-right: 16px;"><div class="reel-item">
              <video src="#/wp-content/themes/mahashringar/assets/videos/video-testi-6.mp4" playsinline="" loop=""></video>
              <button class="reel-play" aria-label="Play reel">â–¶</button>
            </div></div><div class="owl-item" style="width: 296.668px; margin-right: 16px;"><div class="reel-item">
              <video src="#/wp-content/themes/mahashringar/assets/videos/video-testi-7.mp4" playsinline="" loop=""></video>
              <button class="reel-play" aria-label="Play reel">â–¶</button>
            </div></div><div class="owl-item" style="width: 296.668px; margin-right: 16px;"><div class="reel-item">
              <video src="#/wp-content/themes/mahashringar/assets/videos/video-testi-8.mp4" playsinline="" loop=""></video>
              <button class="reel-play" aria-label="Play reel">â–¶</button>
            </div></div><div class="owl-item cloned" style="width: 296.668px; margin-right: 16px;"><div class="reel-item">
              <video src="#/wp-content/themes/mahashringar/assets/videos/video-testi-1.mp4" playsinline="" loop=""></video>
              <button class="reel-play" aria-label="Play reel">â–¶</button>
            </div></div><div class="owl-item cloned" style="width: 296.668px; margin-right: 16px;"><div class="reel-item">
              <video src="#/wp-content/themes/mahashringar/assets/videos/video-testi-2.mp4" playsinline="" loop=""></video>
              <button class="reel-play" aria-label="Play reel">â–¶</button>
            </div></div><div class="owl-item cloned" style="width: 296.668px; margin-right: 16px;"><div class="reel-item">
              <video src="#/wp-content/themes/mahashringar/assets/videos/video-testi-3.mp4" playsinline="" loop=""></video>
              <button class="reel-play" aria-label="Play reel">â–¶</button>
            </div></div><div class="owl-item cloned" style="width: 296.668px; margin-right: 16px;"><div class="reel-item">
              <video src="#/wp-content/themes/mahashringar/assets/videos/video-testi-4.mp4" playsinline="" loop=""></video>
              <button class="reel-play" aria-label="Play reel">â–¶</button>
            </div></div></div></div><div class="owl-dots"><button role="button" class="owl-dot active"><span></span></button><button role="button" class="owl-dot"><span></span></button></div></div>
    </div>
</section>
<style>
.video-testi{padding:0px 0px 50px; text-align: center;background: #f8f6f2;}
.reel-item{position:relative;border-radius:12px;overflow:hidden;background:#2b0d08;aspect-ratio:9/16;cursor:pointer;box-shadow:0 8px 24px rgba(95,0,20,.2)}
.reel-item video{width:100%;height:100%;object-fit:cover;display:block}
.reel-play{position:absolute;left:5%;bottom:5%;z-index:2;transform:translate(-50%,-50%);width:48px;height:48px;border-radius:50%;border:0;background:rgba(0,0,0,.55);color:#fff;font-size:18px;display:grid;place-items:center;cursor:pointer;box-shadow:0 0 0 8px rgba(255,255,255,.14);animation:pulse 1.9s ease-in-out infinite;transition:.25s}
.reel-play:hover{background:var(--wine);transform:translate(-50%,-50%) scale(1.08)}
.reel-play.playing{background:rgba(0,0,0,.45)}
.owl-carousel-video-testimonials .owl-item{padding:10px 0}
.owl-dot{ background:#000 !important; width:10px; height:10px; border-radius:50%; margin:5px; }
.owl-dot.active{ background:#6d5c45 !important; }


@@media (max-width: 767px) {

    .sale-banner {
        width: 100%;
        aspect-ratio: 16 / 9 !important;
        overflow: hidden;
    }

    .sale-banner .owl-carousel-hero:not(.owl-loaded) {
        display: block !important;
    }

    .sale-banner .owl-carousel-hero:not(.owl-loaded) > .item {
        display: none !important;
    }

    .sale-banner .owl-carousel-hero:not(.owl-loaded) > .item:first-child {
        display: block !important;
    }

}

</style>
<script>
document.addEventListener('click', function (event) {
  const btn = event.target.closest('.reel-play');

  if (!btn) {
    return;
  }

  const video = btn.closest('.reel-item').querySelector('video');

  if (video.paused) {
    video.play();
    btn.textContent = 'â¸';
    btn.classList.add('playing');
  } else {
    video.pause();
    btn.textContent = 'â–¶';
    btn.classList.remove('playing');
  }
});
</script>
</main><!-- #main -->
</div><!-- #primary -->
</div><!-- #content -->
<div class="shipping-footer padt80 padtb70 ">
    <div class="container d-flex jsb flex-wrap">
        <div class="shipping-list d-flex aic">
            <div class="ship-icon">
                <img src="/mahashringar_assets/shipping.png" width="70" height="70" alt="shipping">
            </div>
            <div class="ship-content">
                <h3> Free Shipping </h3>
                <p>
                    On all orders over <i class="fas fa-rupee-sign"></i> 499
                </p>
            </div>
        </div>

        <div class="shipping-list d-flex aic">
            <div class="ship-icon">
                <img src="/mahashringar_assets/gift.png" width="70" height="70" alt="gift">
            </div>
            <div class="ship-content">
                <h3> Special Gift Card </h3>
                <p> Offer special bonuses with gift </p>
            </div>
        </div>


        <div class="shipping-list d-flex aic">
            <div class="ship-icon">
                <img src="/mahashringar_assets/support.png" width="70" height="70" alt="support">
            </div>
            <div class="ship-content">
                <h3> 24/7 Customer Support </h3>
                <p> Email us : <a href="mailto:contact@@shop.com"> contact@@shop.com </a> </p>
            </div>
        </div>
         <div class="shipping-list d-flex aic">
            <div class="ship-icon">
                <img src="/mahashringar_assets/secure-paymnet.png" width="70" height="70" alt="secure-paymnet">
            </div>
            <div class="ship-content">
                <h3> Secure payment </h3>
                <p> Trusted checkout protection </p>
            </div>
        </div>
    </div>
</div>


@endsection


