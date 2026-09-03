@extends('layouts.frontend')

@section('content')

<!-- End Header-->


<div class="sale-banner" style="position: relative; overflow: hidden; margin-bottom: 25px; box-shadow: 0 8px 25px rgba(0,0,0,0.1);">
    <div class="owl-carousel hero-slider owl-theme">
        <a href="/shop" style="display: block; width: 100%;">
            <img src="/mahashringar_assets/new_hero_banner_v2.jpg" alt="Ebigcart Special Festival Collection" class="desktop-hero" style="width: 100%; height: auto; max-height: 520px; object-fit: cover; display: block;">
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
/* Universal Owl Slider Nav (Next / Prev) Styling - Transparent & Compact */
.owl-carousel {
    position: relative !important;
}

.owl-carousel .owl-nav {
    display: block !important;
}

.owl-carousel .owl-nav button.owl-prev,
.owl-carousel .owl-nav button.owl-next {
    position: absolute !important;
    top: 50% !important;
    transform: translateY(-50%) !important;
    width: 32px !important;
    height: 32px !important;
    background: transparent !important;
    color: #b71c1c !important;
    border-radius: 0 !important;
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    box-shadow: none !important;
    z-index: 99 !important;
    border: none !important;
    outline: none !important;
    cursor: pointer !important;
    transition: all 0.3s ease !important;
    margin: 0 !important;
    padding: 0 !important;
    opacity: 0.85 !important;
    text-shadow: 0 0 4px rgba(255,255,255,0.8);
}

.owl-carousel .owl-nav button.owl-prev {
    left: 8px !important;
}

.owl-carousel .owl-nav button.owl-next {
    right: 8px !important;
}

.owl-carousel .owl-nav button.owl-prev:hover,
.owl-carousel .owl-nav button.owl-next:hover {
    background: transparent !important;
    color: #000000 !important;
    opacity: 1 !important;
    transform: translateY(-50%) scale(1.15) !important;
    box-shadow: none !important;
}

.owl-carousel .owl-nav button.owl-prev i,
.owl-carousel .owl-nav button.owl-next i {
    font-size: 1rem !important;
    line-height: 1 !important;
    font-weight: 700 !important;
}

/* Full Width Banners - Zero Left & Right Padding */
.sale-banner, .winter-bnr, .middle-banner-full {
    width: 100% !important;
    max-width: 100% !important;
    padding-left: 0 !important;
    padding-right: 0 !important;
    margin-left: 0 !important;
    margin-right: 0 !important;
}
.sale-banner img, .winter-bnr img, .middle-banner-full img {
    width: 100% !important;
    height: auto !important;
    display: block !important;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .owl-carousel .owl-nav button.owl-prev,
    .owl-carousel .owl-nav button.owl-next {
        width: 26px !important;
        height: 26px !important;
    }
    .owl-carousel .owl-nav button.owl-prev { left: 4px !important; }
    .owl-carousel .owl-nav button.owl-next { right: 4px !important; }
    .owl-carousel .owl-nav button.owl-prev i,
    .owl-carousel .owl-nav button.owl-next i { font-size: 0.9rem !important; }
}

/* Category Item Vertical Layout (Image Top, Name Below) */
.owl-carousel-product .category-item-card {
    display: flex !important;
    flex-direction: column !important;
    align-items: center !important;
    justify-content: center !important;
    text-align: center !important;
    padding: 10px 5px !important;
}

.owl-carousel-product .banner-item {
    width: 100% !important;
    max-width: 160px !important;
    margin: 0 auto !important;
    flex: 0 0 auto !important;
}

.owl-carousel-product .banner-item img.category-img {
    width: 100% !important;
    height: 130px !important;
    object-fit: contain !important;
    border-radius: 12px !important;
    display: block !important;
    margin: 0 auto !important;
}

.owl-carousel-product .leftpart-banner {
    width: 100% !important;
    flex: 0 0 auto !important;
    padding: 0 !important;
    margin-top: 10px !important;
    text-align: center !important;
}

.owl-carousel-product .leftpart-banner .bann-title {
    margin: 0 !important;
    padding: 0 !important;
    font-size: 0.95rem !important;
    text-align: center !important;
}

.owl-carousel-product .leftpart-banner .bann-title a {
    color: #222222 !important;
    font-weight: 700 !important;
    text-decoration: none !important;
    display: block !important;
    text-align: center !important;
}

/* Mobile View 2 Columns Per Row for Products */
@media (max-width: 768px) {
    ul.products {
        display: grid !important;
        grid-template-columns: repeat(2, 1fr) !important;
        gap: 10px !important;
        padding: 0 5px !important;
    }

    .rs-product-card {
        margin: 0 !important;
        width: 100% !important;
    }

    .rs-card-img-box {
        height: 140px !important;
    }

    .rs-card-title {
        font-size: 0.8rem !important;
        line-height: 1.2 !important;
        height: 2.4em !important;
    }

    .rs-card-actions {
        flex-direction: row !important;
        gap: 6px !important;
    }

    .rs-btn-buynow {
        font-size: 0.7rem !important;
        padding: 6px 8px !important;
        flex: 1 !important;
        text-align: center !important;
    }

    .rs-btn-carticon {
        width: 30px !important;
        height: 30px !important;
        font-size: 0.85rem !important;
    }
}
</style>
<script>
document.addEventListener("DOMContentLoaded", function() {
    setTimeout(function() {
        if(window.jQuery && jQuery().owlCarousel) {
            var navBtns = ['<i class="bi bi-chevron-left"></i>', '<i class="bi bi-chevron-right"></i>'];

            jQuery('.hero-slider').owlCarousel({
                loop: true,
                margin: 0,
                nav: true,
                navText: navBtns,
                dots: true,
                autoplay: true,
                autoplayTimeout: 3500,
                autoplayHoverPause: true,
                items: 1
            });

            jQuery('.owl-carousel-product').owlCarousel({
                loop: true,
                margin: 15,
                nav: true,
                navText: navBtns,
                dots: false,
                autoplay: true,
                autoplayTimeout: 3500,
                responsive: { 0: { items: 2 }, 600: { items: 3 }, 1000: { items: 4 } }
            });

            jQuery('.owl-carousel-testimonials').owlCarousel({
                loop: true,
                margin: 20,
                nav: true,
                navText: navBtns,
                dots: true,
                autoplay: true,
                responsive: { 0: { items: 1 }, 768: { items: 2 }, 1000: { items: 3 } }
            });

            jQuery('.owl-carousel-video-testimonials').owlCarousel({
                loop: true,
                margin: 15,
                nav: true,
                navText: navBtns,
                dots: true,
                autoplay: false,
                responsive: { 0: { items: 1 }, 600: { items: 2 }, 1000: { items: 4 } }
            });
        }
    }, 300);
});
</script>
<div class="home-banner-new">
    <div class="container">
        <div class="section-heading-ornament">
            <span class="ornament-line"></span>
            <h2>SHOP BY CATEGORIES</h2>
            <span class="ornament-line"></span>
        </div>
                        <div class="owl-carousel owl-carousel-product owl-theme">
            @foreach($categories as $cat)
            <div class="category-item-card">
                <div class="banner-item">
                    <a href="{{ route('shop', ['cat' => $cat->slug]) }}">
                        <img src="{{ $cat->image ? asset($cat->image) : asset('images/ebigcart_logo.png') }}" class="category-img" alt="{{ $cat->name }}" loading="lazy">
                    </a>
                </div>
                <div class="leftpart-banner">
                    <div class="bann-title"> 
                        <a href="{{ route('shop', ['cat' => $cat->slug]) }}">{{ $cat->name }}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
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
        
    <ul class="products" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 20px; list-style: none; padding: 0; margin: 0;">
    @foreach($bestSellers as $product)
        <li style="list-style:none;">
            <div class="rs-product-card" onclick="if (!event.target.closest('.rs-wishlist-heart, .rs-btn-carticon')) window.location.href='{{ route('product.show', $product->slug) }}';" style="cursor: pointer;">
                <div class="rs-card-img-box">
                    @if($product->sale_price)
                        <span class="rs-card-badge">SALE</span>
                    @endif
                    @php $inWishlist = in_array($product->id, session()->get('wishlist', [])); @endphp<button type="button" class="rs-wishlist-heart" style="border:none; background:none; cursor:pointer; {{ $inWishlist ? 'color:#ff4757;' : '' }}" onclick="Ebigcart.toggleWishlist('{{ $product->id }}', this, event)" title="Add to Wishlist"><i class="bi {{ $inWishlist ? 'bi-heart-fill' : 'bi-heart' }}"></i></button>
                    <a href="{{ route('product.show', $product->slug) }}">
                        <img src="{{ asset($product->primary_image_url) }}" alt="{{ $product->name }}" loading="lazy">
                    </a>
                </div>
                <div class="rs-card-body">
                    <a href="{{ route('product.show', $product->slug) }}" class="rs-card-title">{{ $product->name }}</a>
                    <div class="rs-card-price">
                        @if($product->sale_price)
                            <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₹</span>{{ $product->sale_price }}</bdi></span>
                            <span class="rs-card-price-old">₹{{ $product->price }}</span>
                        @else
                            <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₹</span>{{ $product->price }}</bdi></span>
                        @endif
                    </div>
                    <div class="rs-card-actions">
                        <a href="{{ route('product.show', $product->slug) }}" class="rs-btn-buynow">Buy Now</a>
                        <button type="button" class="rs-btn-carticon" style="border:none; cursor:pointer;" onclick="Ebigcart.addToCart('{{ $product->id }}', 1, event)" title="Add to Cart"><i class="bi bi-cart-plus-fill"></i></button>
                    </div>
                </div>
            </div>
        </li>
    @endforeach
</ul>
    
    <div class="view-more-wrapper">
        <a href="{{ route('shop') }}" class="view-more-btn">
            View More
        </a>
    </div>



    </div>
</div>
<div class="middle-banner-full" style="width: 100%; margin: 25px 0; padding: 0;">
      <a href="/shop"><img src="/mahashringar_assets/middle-gopi-dresses.jpg" alt="Laddu Gopal Summer Dress" style="width: 100%; height: auto; display: block;"></a>
  </div>

<div class="latest-dress products-list text-center padt60 padtb80" id="latest_collection">
    <div class="container">
        <h2 class="site-title">Featured Collection</h2>
        <p class="mini-discription">Featured collection dresses for your Laddu Gopal! Give them a new and attractive look.</p>
        
<ul class="products" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 20px; list-style: none; padding: 0; margin: 0;">
    @foreach($featuredProducts as $product)
        <li style="list-style:none;">
            <div class="rs-product-card" onclick="if (!event.target.closest('.rs-wishlist-heart, .rs-btn-carticon')) window.location.href='{{ route('product.show', $product->slug) }}';" style="cursor: pointer;">
                <div class="rs-card-img-box">
                    @if($product->sale_price)
                        <span class="rs-card-badge">SALE</span>
                    @endif
                    @php $inWishlist = in_array($product->id, session()->get('wishlist', [])); @endphp<button type="button" class="rs-wishlist-heart" style="border:none; background:none; cursor:pointer; {{ $inWishlist ? 'color:#ff4757;' : '' }}" onclick="Ebigcart.toggleWishlist('{{ $product->id }}', this, event)" title="Add to Wishlist"><i class="bi {{ $inWishlist ? 'bi-heart-fill' : 'bi-heart' }}"></i></button>
                    <a href="{{ route('product.show', $product->slug) }}">
                        <img src="{{ asset($product->primary_image_url) }}" alt="{{ $product->name }}" loading="lazy">
                    </a>
                </div>
                <div class="rs-card-body">
                    <a href="{{ route('product.show', $product->slug) }}" class="rs-card-title">{{ $product->name }}</a>
                    <div class="rs-card-price">
                        @if($product->sale_price)
                            <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₹</span>{{ $product->sale_price }}</bdi></span>
                            <span class="rs-card-price-old">₹{{ $product->price }}</span>
                        @else
                            <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₹</span>{{ $product->price }}</bdi></span>
                        @endif
                    </div>
                    <div class="rs-card-actions">
                        <a href="{{ route('product.show', $product->slug) }}" class="rs-btn-buynow">Buy Now</a>
                        <button type="button" class="rs-btn-carticon" style="border:none; cursor:pointer;" onclick="Ebigcart.addToCart('{{ $product->id }}', 1, event)" title="Add to Cart"><i class="bi bi-cart-plus-fill"></i></button>
                    </div>
                </div>
            </div>
        </li>
    @endforeach
</ul>

    </div>
</div>


<!--Shop Banner -->
<div class="shop-banner">
    <div class="container">
      <video autoplay="" muted="" loop="" playsinline="" controls="">
        <source src="#/wp-content/themes/Ebigcart/assets/images/home-video.mp4" type="video/mp4">
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
        "My Laddu Gopal dresses always get noticed &amp; compliments. Grateful to Ebigcart!"
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
        "My Laddu Gopal dresses always get noticed &amp; compliments. Grateful to Ebigcart!"
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
        "My Laddu Gopal dresses always get noticed &amp; compliments. Grateful to Ebigcart!"
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

<section class="video-testi" style="padding: 40px 0; background: #fafafa;">
    <div class="container">
        <h2 class="section-title" style="font-size: 1.8rem; text-align: center; margin-bottom: 25px; font-weight: 700; color: #b71c1c;">✨ Customer Video Reviews ✨</h2>
        
        <div class="owl-carousel owl-carousel-video-testimonials owl-theme">
            <div class="reel-item" style="position: relative; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); background: #000; height: 360px;">
                <video src="https://assets.mixkit.co/videos/preview/mixkit-hand-holding-a-small-gold-cross-41557-large.mp4" poster="/mahashringar_assets/summer.webp" playsinline loop style="width: 100%; height: 100%; object-fit: cover;"></video>
                <button class="reel-play" aria-label="Play reel" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 50px; height: 50px; border-radius: 50%; background: rgba(183, 28, 28, 0.9); color: #fff; border: none; font-size: 1.3rem; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 4px 12px rgba(0,0,0,0.3);">
                    <i class="bi bi-play-fill" style="margin-left: 2px;"></i>
                </button>
            </div>
            <div class="reel-item" style="position: relative; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); background: #000; height: 360px;">
                <video src="https://assets.mixkit.co/videos/preview/mixkit-hands-holding-a-lit-candle-in-the-dark-41560-large.mp4" poster="/mahashringar_assets/janmasthmi-banner.webp" playsinline loop style="width: 100%; height: 100%; object-fit: cover;"></video>
                <button class="reel-play" aria-label="Play reel" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 50px; height: 50px; border-radius: 50%; background: rgba(183, 28, 28, 0.9); color: #fff; border: none; font-size: 1.3rem; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 4px 12px rgba(0,0,0,0.3);">
                    <i class="bi bi-play-fill" style="margin-left: 2px;"></i>
                </button>
            </div>
            <div class="reel-item" style="position: relative; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); background: #000; height: 360px;">
                <video src="https://assets.mixkit.co/videos/preview/mixkit-close-up-of-a-person-holding-a-small-statue-41558-large.mp4" poster="/mahashringar_assets/aasan.webp" playsinline loop style="width: 100%; height: 100%; object-fit: cover;"></video>
                <button class="reel-play" aria-label="Play reel" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 50px; height: 50px; border-radius: 50%; background: rgba(183, 28, 28, 0.9); color: #fff; border: none; font-size: 1.3rem; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 4px 12px rgba(0,0,0,0.3);">
                    <i class="bi bi-play-fill" style="margin-left: 2px;"></i>
                </button>
            </div>
            <div class="reel-item" style="position: relative; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); background: #000; height: 360px;">
                <video src="https://assets.mixkit.co/videos/preview/mixkit-hand-holding-a-small-gold-cross-41557-large.mp4" poster="/mahashringar_assets/home-hero-img2.webp" playsinline loop style="width: 100%; height: 100%; object-fit: cover;"></video>
                <button class="reel-play" aria-label="Play reel" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 50px; height: 50px; border-radius: 50%; background: rgba(183, 28, 28, 0.9); color: #fff; border: none; font-size: 1.3rem; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 4px 12px rgba(0,0,0,0.3);">
                    <i class="bi bi-play-fill" style="margin-left: 2px;"></i>
                </button>
            </div>
        </div>
    </div>
</section>
<style>
/* Universal Owl Slider Nav (Next / Prev) Styling - Transparent & Compact */
.owl-carousel {
    position: relative !important;
}

.owl-carousel .owl-nav {
    display: block !important;
}

.owl-carousel .owl-nav button.owl-prev,
.owl-carousel .owl-nav button.owl-next {
    position: absolute !important;
    top: 50% !important;
    transform: translateY(-50%) !important;
    width: 32px !important;
    height: 32px !important;
    background: transparent !important;
    color: #b71c1c !important;
    border-radius: 0 !important;
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    box-shadow: none !important;
    z-index: 99 !important;
    border: none !important;
    outline: none !important;
    cursor: pointer !important;
    transition: all 0.3s ease !important;
    margin: 0 !important;
    padding: 0 !important;
    opacity: 0.85 !important;
    text-shadow: 0 0 4px rgba(255,255,255,0.8);
}

.owl-carousel .owl-nav button.owl-prev {
    left: 8px !important;
}

.owl-carousel .owl-nav button.owl-next {
    right: 8px !important;
}

.owl-carousel .owl-nav button.owl-prev:hover,
.owl-carousel .owl-nav button.owl-next:hover {
    background: transparent !important;
    color: #000000 !important;
    opacity: 1 !important;
    transform: translateY(-50%) scale(1.15) !important;
    box-shadow: none !important;
}

.owl-carousel .owl-nav button.owl-prev i,
.owl-carousel .owl-nav button.owl-next i {
    font-size: 1rem !important;
    line-height: 1 !important;
    font-weight: 700 !important;
}

/* Full Width Banners - Zero Left & Right Padding */
.sale-banner, .winter-bnr, .middle-banner-full {
    width: 100% !important;
    max-width: 100% !important;
    padding-left: 0 !important;
    padding-right: 0 !important;
    margin-left: 0 !important;
    margin-right: 0 !important;
}
.sale-banner img, .winter-bnr img, .middle-banner-full img {
    width: 100% !important;
    height: auto !important;
    display: block !important;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .owl-carousel .owl-nav button.owl-prev,
    .owl-carousel .owl-nav button.owl-next {
        width: 26px !important;
        height: 26px !important;
    }
    .owl-carousel .owl-nav button.owl-prev { left: 4px !important; }
    .owl-carousel .owl-nav button.owl-next { right: 4px !important; }
    .owl-carousel .owl-nav button.owl-prev i,
    .owl-carousel .owl-nav button.owl-next i { font-size: 0.9rem !important; }
}

/* Category Item Vertical Layout (Image Top, Name Below) */
.owl-carousel-product .category-item-card {
    display: flex !important;
    flex-direction: column !important;
    align-items: center !important;
    justify-content: center !important;
    text-align: center !important;
    padding: 10px 5px !important;
}

.owl-carousel-product .banner-item {
    width: 100% !important;
    max-width: 160px !important;
    margin: 0 auto !important;
    flex: 0 0 auto !important;
}

.owl-carousel-product .banner-item img.category-img {
    width: 100% !important;
    height: 130px !important;
    object-fit: contain !important;
    border-radius: 12px !important;
    display: block !important;
    margin: 0 auto !important;
}

.owl-carousel-product .leftpart-banner {
    width: 100% !important;
    flex: 0 0 auto !important;
    padding: 0 !important;
    margin-top: 10px !important;
    text-align: center !important;
}

.owl-carousel-product .leftpart-banner .bann-title {
    margin: 0 !important;
    padding: 0 !important;
    font-size: 0.95rem !important;
    text-align: center !important;
}

.owl-carousel-product .leftpart-banner .bann-title a {
    color: #222222 !important;
    font-weight: 700 !important;
    text-decoration: none !important;
    display: block !important;
    text-align: center !important;
}

/* Mobile View 2 Columns Per Row for Products */
@media (max-width: 768px) {
    ul.products {
        display: grid !important;
        grid-template-columns: repeat(2, 1fr) !important;
        gap: 10px !important;
        padding: 0 5px !important;
    }

    .rs-product-card {
        margin: 0 !important;
        width: 100% !important;
    }

    .rs-card-img-box {
        height: 140px !important;
    }

    .rs-card-title {
        font-size: 0.8rem !important;
        line-height: 1.2 !important;
        height: 2.4em !important;
    }

    .rs-card-actions {
        flex-direction: row !important;
        gap: 6px !important;
    }

    .rs-btn-buynow {
        font-size: 0.7rem !important;
        padding: 6px 8px !important;
        flex: 1 !important;
        text-align: center !important;
    }

    .rs-btn-carticon {
        width: 30px !important;
        height: 30px !important;
        font-size: 0.85rem !important;
    }
}
</style>
<script>
document.addEventListener('click', function (event) {
  const btn = event.target.closest('.reel-play');
  if (!btn) return;

  const container = btn.closest('.reel-item');
  const video = container ? container.querySelector('video') : null;
  if (!video) return;

  if (video.paused) {
    document.querySelectorAll('.video-testi video').forEach(function(v) {
      v.pause();
    });
    document.querySelectorAll('.video-testi .reel-play i').forEach(function(icon) {
      icon.className = 'bi bi-play-fill';
    });

    video.play();
    const icon = btn.querySelector('i');
    if (icon) icon.className = 'bi bi-pause-fill';
  } else {
    video.pause();
    const icon = btn.querySelector('i');
    if (icon) icon.className = 'bi bi-play-fill';
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


