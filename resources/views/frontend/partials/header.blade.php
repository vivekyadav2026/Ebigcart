@php
    $headerCategories = \App\Models\Category::where('is_active', true)->get();
@endphp
<header class="ranisahab-header">
  <style>
html, body, #page, .site, header, .site-header, .ranisahab-header { margin-top: 0 !important; padding-top: 0 !important; top: 0 !important; }
html { margin-top: 0px !important; }
body { margin-top: 0px !important; padding-top: 0px !important; }
    body, html, #page, .ranisahab-header { margin-top: 0 !important; padding-top: 0 !important; }
    .ranisahab-header { background: #ffffff; color: #222222; font-family: 'Cinzel', 'Outfit', sans-serif; position: sticky; top: 0; z-index: 1000; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border-bottom: 1px solid #eaeaea; }
    
    /* Top Announcement Bar */
    .rs-top-bar { background: #b71c1c; color: #ffffff; padding: 7px 15px; text-align: center; font-size: 0.78rem; letter-spacing: 1.5px; font-weight: 600; text-transform: uppercase; margin: 0; display: block; width: 100%; }
    .rs-top-bar span { margin: 0 10px; opacity: 0.8; }

    /* Middle Main Bar */
    .rs-main-bar { display: flex; align-items: center; justify-content: space-between; padding: 14px 30px; max-width: 1500px; margin: 0 auto; gap: 15px; }
    
    /* Left Search Box */
    .rs-search-box { position: relative; flex: 1; max-width: 320px; }
    .rs-search-input { width: 100%; background: #f8f9fa; border: 1px solid #e0e0e0; border-radius: 30px; padding: 8px 40px 8px 18px; color: #222; font-size: 0.85rem; font-family: 'Outfit', sans-serif; outline: none; transition: all 0.3s ease; }
    .rs-search-input::placeholder { color: #888888; font-style: italic; }
    .rs-search-input:focus { border-color: #b71c1c; background: #ffffff; box-shadow: 0 0 10px rgba(183,28,28,0.15); }
    .rs-search-btn { position: absolute; right: 14px; top: 50%; transform: translateY(-50%); background: none; border: none; color: #b71c1c; font-size: 0.95rem; cursor: pointer; }

    /* Center Logo */
    .rs-logo-container { flex: 1; display: flex; justify-content: center; align-items: center; text-align: center; }
    .rs-logo { display: inline-flex; align-items: center; justify-content: center; text-decoration: none; }
    .rs-logo img { height: 75px; width: auto; object-fit: contain; transition: transform 0.3s ease; }
    .rs-logo:hover img { transform: scale(1.03); }

    /* Right Action Items */
    .rs-actions { display: flex; align-items: center; gap: 22px; flex: 1; justify-content: flex-end; }
    .rs-action-link { display: flex; align-items: center; gap: 6px; color: #222222; text-decoration: none !important; font-size: 0.8rem; font-weight: 700; letter-spacing: 1px; text-transform: uppercase; transition: all 0.3s ease; position: relative; }
    .rs-action-link:hover { color: #b71c1c; transform: translateY(-1px); }
    .rs-action-icon { font-size: 1.25rem; color: #b71c1c; }
    .rs-badge { position: absolute; top: -7px; left: 10px; background: #b71c1c; color: #fff; font-size: 0.65rem; font-weight: 800; width: 16px; height: 16px; border-radius: 50%; display: flex; align-items: center; justify-content: center; border: 1.5px solid #fff; }

    /* Bottom Navigation Bar */
    .rs-nav-bar { background: #ffffff; border-top: 1px solid #f0f0f0; border-bottom: 1px solid #f0f0f0; }
    .rs-nav-list { display: flex; align-items: center; justify-content: center; flex-wrap: wrap; list-style: none; padding: 0; margin: 0; max-width: 1500px; margin: 0 auto; }
    .rs-nav-item { display: flex; align-items: center; }
    .rs-nav-item .sep { color: #b71c1c; font-size: 0.65rem; opacity: 0.5; padding: 0 12px; }
    .rs-nav-link { color: #333333; font-size: 0.85rem; font-weight: 700; text-decoration: none !important; text-transform: uppercase; letter-spacing: 1px; padding: 15px 0; transition: all 0.3s ease; position: relative; }
    .rs-nav-link:hover, .rs-nav-link.active { color: #b71c1c; }
    .rs-nav-link.active::after { content: ''; position: absolute; bottom: 0; left: 0; width: 100%; height: 2px; background: #b71c1c; }

    /* Mobile Drawer & Controls */
    .rs-mobile-toggle { display: none; background: none; border: 1px solid #b71c1c; color: #b71c1c; border-radius: 4px; padding: 4px 10px; cursor: pointer; align-items: center; gap: 5px; font-weight: 600; font-size: 0.85rem; letter-spacing: 1px; flex: 1; max-width: 90px; justify-content: flex-start; }
    .rs-mobile-toggle i { font-size: 1.4rem; }
    .rs-mobile-search-icon { display: none !important; }
    
    .rs-mobile-drawer { display: none; background: #ffffff; border-top: 1px solid #eee; padding: 15px 20px; }
    .rs-mobile-drawer.active { display: block; }
    .rs-mobile-drawer ul { list-style: none; padding: 0; margin: 0; }
    .rs-mobile-drawer li { margin-bottom: 12px; }
    .rs-mobile-drawer a { color: #333; text-decoration: none; font-size: 0.95rem; letter-spacing: 0.5px; text-transform: uppercase; font-weight: 700; display: block; }
    .rs-mobile-drawer a:hover { color: #b71c1c; }

    @media (max-width: 768px) {
      .rs-top-bar {
        padding: 4px 6px !important;
        font-size: 0.64rem !important;
        letter-spacing: 0.3px !important;
        white-space: nowrap !important;
        overflow: hidden !important;
        text-overflow: ellipsis !important;
        line-height: 1.2 !important;
        display: block !important;
      }
      .rs-top-bar span {
        margin: 0 3px !important;
      }
    }
    @media (max-width: 1100px) {
      .rs-nav-bar { display: none; }
      .rs-search-box { display: none; }
      .rs-mobile-toggle { display: flex; }
      .rs-mobile-search-icon { display: flex !important; }
      
      .rs-main-bar { padding: 12px 15px; flex-wrap: nowrap; justify-content: space-between; gap: 5px; position: relative; }
      
      .rs-logo-container { position: absolute; left: 50%; transform: translateX(-50%); flex: unset; z-index: 10; }
      .rs-logo img { height: 48px; }
      
      .rs-actions { flex: 1; justify-content: flex-end; gap: 15px; }
      .rs-action-link span:not(.rs-badge) { display: none; }
      .rs-action-icon { font-size: 1.3rem; }
      .rs-badge { top: -5px; right: -8px; left: unset; width: 16px; height: 16px; font-size: 0.6rem; border: 1px solid #fff; }
    }
  </style>

  <!-- Top Announcement Bar -->
  <div class="rs-top-bar">
    <span>👑</span> FREE EXPRESS SHIPPING ABOVE ₹499 <span>✦</span> PREMIUM QUALITY COLLECTION <span>✦</span> COD AVAILABLE <span>👑</span>
  </div>

  <!-- Main Middle Bar -->
  <div class="rs-main-bar">
    <!-- Mobile Hamburger Toggle -->
    <button class="rs-mobile-toggle" id="rsMobileToggle" aria-label="Toggle Navigation">
      <i class="bi bi-list"></i> <span>MENU</span>
    </button>

    <!-- Left Search Box (Desktop) -->
    <div class="rs-search-box">
      <form action="/shop" method="GET">
        <input type="text" name="search" class="rs-search-input" value="{{ request('search') }}" placeholder="Search dresses, mukut...">
        <button type="submit" class="rs-search-btn" aria-label="Search">
          <i class="bi bi-search"></i>
        </button>
      </form>
    </div>

    <!-- Center Logo -->
    <div class="rs-logo-container">
      <a href="/" class="rs-logo">
        <img src="/images/ebigcart_logo.png" alt="Ebigcart Logo - Shop More, Pay Less">
      </a>
    </div>

    <!-- Right Actions -->
    <div class="rs-actions">
      <!-- Mobile Search Icon -->
      <a href="javascript:void(0)" class="rs-action-link rs-mobile-search-icon" onclick="document.getElementById('rsMobileDrawer').classList.toggle('active');">
        <i class="bi bi-search rs-action-icon"></i>
      </a>

      <a href="/wishlist" class="rs-action-link">
        <span class="rs-badge">0</span>
        <i class="bi bi-heart rs-action-icon"></i>
        <span>WISHLIST</span>
      </a>

      <a href="/cart" class="rs-action-link">
        <span class="rs-badge">0</span>
        <i class="bi bi-bag rs-action-icon"></i>
        <span>BAG</span>
      </a>
    </div>
  </div>

  <!-- Bottom Navigation Bar (Dynamic Categories) -->
  <div class="rs-nav-bar">
    <ul class="rs-nav-list">
      <li class="rs-nav-item">
        <a href="/" class="rs-nav-link {{ request()->is('/') ? 'active' : '' }}">HOME</a>
      </li>
      <li class="rs-nav-item">
        <span class="sep">✦</span>
        <a href="/shop" class="rs-nav-link {{ request()->is('shop') && !request('cat') ? 'active' : '' }}">SHOP ALL</a>
      </li>

      @foreach($headerCategories as $hCat)
        <li class="rs-nav-item">
          <span class="sep">✦</span>
          <a href="{{ route('shop', ['cat' => $hCat->slug]) }}" class="rs-nav-link {{ request('cat') == $hCat->slug ? 'active' : '' }}">
            {{ strtoupper($hCat->name) }}
          </a>
        </li>
      @endforeach

      <li class="rs-nav-item">
        <span class="sep">✦</span>
        <a href="/about" class="rs-nav-link {{ request()->is('about') ? 'active' : '' }}">ABOUT US</a>
      </li>
      <li class="rs-nav-item">
        <span class="sep">✦</span>
        <a href="/contact" class="rs-nav-link {{ request()->is('contact') ? 'active' : '' }}">CONTACT</a>
      </li>
    </ul>
  </div>

  <!-- Mobile Drawer (Dynamic Categories) -->
  <div class="rs-mobile-drawer" id="rsMobileDrawer">
    <div class="mb-3">
      <form action="/shop" method="GET" style="display: flex; gap: 8px;">
        <input type="text" name="search" value="{{ request('search') }}" style="flex: 1; background: #f8f9fa; border: 1px solid #ccc; color: #222; padding: 8px 12px; border-radius: 20px; font-size: 0.85rem;" placeholder="Search products...">
        <button type="submit" style="background: #b71c1c; color: #fff; border: none; padding: 8px 16px; border-radius: 20px; font-weight: 700;"><i class="bi bi-search"></i></button>
      </form>
    </div>
    <ul>
      <li><a href="/" style="{{ request()->is('/') ? 'color: #b71c1c;' : '' }}">HOME</a></li>
      <li><a href="/shop" style="{{ request()->is('shop') && !request('cat') ? 'color: #b71c1c;' : '' }}">SHOP ALL</a></li>
      @foreach($headerCategories as $hCat)
        <li>
          <a href="{{ route('shop', ['cat' => $hCat->slug]) }}" style="{{ request('cat') == $hCat->slug ? 'color: #b71c1c;' : '' }}">
            {{ strtoupper($hCat->name) }}
          </a>
        </li>
      @endforeach
      <li><a href="/about" style="{{ request()->is('about') ? 'color: #b71c1c;' : '' }}">ABOUT US</a></li>
      <li><a href="/contact" style="{{ request()->is('contact') ? 'color: #b71c1c;' : '' }}">CONTACT</a></li>
    </ul>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const toggleBtn = document.getElementById("rsMobileToggle");
      const drawer = document.getElementById("rsMobileDrawer");
      if (toggleBtn && drawer) {
        toggleBtn.addEventListener("click", function() {
          drawer.classList.toggle("active");
        });
      }
    });
  </script>
</header>