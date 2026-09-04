@php
    $headerCategories = \App\Models\Category::parents()->with('children.children')->where('is_active', true)->get();
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
    .rs-main-bar { display: flex; align-items: center; justify-content: space-between; padding: 6px 30px; max-width: 1500px; margin: 0 auto; gap: 15px; position: relative !important; min-height: 60px; }
    
    /* Left Search Box */
    .rs-search-box { position: relative; flex: 1; max-width: 320px; z-index: 5; }
    .rs-search-input { width: 100%; background: #f8f9fa; border: 1px solid #e0e0e0; border-radius: 30px; padding: 8px 40px 8px 18px; color: #222; font-size: 0.85rem; font-family: 'Outfit', sans-serif; outline: none; transition: all 0.3s ease; }
    .rs-search-input::placeholder { color: #888888; font-style: italic; }
    .rs-search-input:focus { border-color: #b71c1c; background: #ffffff; box-shadow: 0 0 10px rgba(183,28,28,0.15); }
    .rs-search-btn { position: absolute; right: 14px; top: 50%; transform: translateY(-50%); background: none; border: none; color: #b71c1c; font-size: 0.95rem; cursor: pointer; }

    /* Center Logo (Dead Centered on Desktop & Mobile) */
    .rs-logo-container { position: absolute !important; left: 50% !important; top: 50% !important; transform: translate(-50%, -50%) !important; z-index: 20 !important; display: flex !important; justify-content: center !important; align-items: center !important; text-align: center !important; margin: 0 !important; }
    .rs-logo { display: inline-flex; align-items: center; justify-content: center; text-decoration: none; }
    .rs-logo img { height: 60px !important; width: auto !important; object-fit: contain !important; transition: transform 0.3s ease !important; margin: 0 !important; }
    .rs-logo:hover img { transform: scale(1.03); }

    /* Right Action Items */
    .rs-actions { display: flex; align-items: center; gap: 22px; flex: 1; justify-content: flex-end; }
    .rs-action-link { display: flex; align-items: center; gap: 6px; color: #222222; text-decoration: none !important; font-size: 0.8rem; font-weight: 700; letter-spacing: 1px; text-transform: uppercase; transition: all 0.3s ease; position: relative; }
    .rs-action-link:hover { color: #b71c1c; transform: translateY(-1px); }
    .rs-action-icon { font-size: 1.25rem; color: #b71c1c; }
    .rs-badge { position: absolute; top: -7px; left: 10px; background: #b71c1c; color: #fff; font-size: 0.65rem; font-weight: 800; width: 16px; height: 16px; border-radius: 50%; display: flex; align-items: center; justify-content: center; border: 1.5px solid #fff; }

    /* Bottom Navigation Bar */
    .rs-nav-bar { background: #ffffff; border-top: 1px solid #f0f0f0; border-bottom: 1px solid #f0f0f0; position: relative; z-index: 900; }
    .rs-nav-list { display: flex; align-items: center; justify-content: center; flex-wrap: wrap; list-style: none; padding: 0; margin: 0; max-width: 1500px; margin: 0 auto; }
    .rs-nav-item { display: flex; align-items: center; position: relative; }
    .rs-nav-item .sep { color: #b71c1c; font-size: 0.65rem; opacity: 0.5; padding: 0 10px; }
    .rs-nav-link { color: #333333; font-size: 0.82rem; font-weight: 700; text-decoration: none !important; text-transform: uppercase; letter-spacing: 0.8px; padding: 10px 0; transition: all 0.2s ease; position: relative; display: flex; align-items: center; gap: 4px; }
    .rs-nav-link:hover, .rs-nav-item:hover > .rs-nav-link, .rs-nav-link.active { color: #b71c1c; }
    .rs-nav-link.active::after { content: ''; position: absolute; bottom: 0; left: 0; width: 100%; height: 2px; background: #b71c1c; }

    /* Dropdown & Mega Menu */
    .rs-dropdown {
        position: absolute;
        top: 100%;
        left: 50%;
        transform: translateX(-50%) translateY(10px);
        background: #ffffff;
        border: 1px solid #eaeaea;
        border-radius: 12px;
        box-shadow: 0 12px 30px rgba(0,0,0,0.12);
        opacity: 0;
        visibility: hidden;
        transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
        z-index: 999;
        min-width: 220px;
        padding: 12px 0;
        pointer-events: none;
    }
    .rs-nav-item:hover > .rs-dropdown {
        opacity: 1;
        visibility: visible;
        transform: translateX(-50%) translateY(0);
        pointer-events: auto;
    }

    /* Mega Menu specifically for Laddu Gopal (Multi-column) */
    .rs-mega-menu {
        min-width: 780px !important;
        padding: 20px 24px !important;
        display: grid !important;
        grid-template-columns: repeat(4, 1fr) !important;
        gap: 20px !important;
    }
    .rs-mega-col-title {
        font-size: 0.82rem;
        font-weight: 800;
        color: #b71c1c;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding-bottom: 6px;
        margin-bottom: 8px;
        border-bottom: 1.5px solid #fee2e2;
        display: flex;
        align-items: center;
        gap: 6px;
        text-decoration: none !important;
    }
    .rs-mega-col-title:hover {
        color: #8e1515;
    }
    .rs-mega-list {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
        gap: 5px;
    }
    .rs-mega-item a {
        color: #475569;
        font-size: 0.8rem;
        font-weight: 600;
        text-decoration: none !important;
        padding: 3px 0;
        display: block;
        transition: all 0.15s ease;
    }
    .rs-mega-item a:hover {
        color: #b71c1c;
        padding-left: 4px;
    }

    /* Standard Single Column Dropdown */
    .rs-simple-menu {
        list-style: none;
        padding: 6px 0;
        margin: 0;
    }
    .rs-simple-item a {
        color: #334155;
        font-size: 0.82rem;
        font-weight: 600;
        text-decoration: none !important;
        padding: 8px 18px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        transition: all 0.15s ease;
        white-space: nowrap;
    }
    .rs-simple-item a:hover {
        background: #fdf2f2;
        color: #b71c1c;
        padding-left: 22px;
    }

    /* Mobile Drawer */
    .rs-mobile-toggle { display: none; background: none; border: 1px solid #b71c1c; color: #b71c1c; border-radius: 4px; padding: 4px 10px; cursor: pointer; align-items: center; gap: 5px; font-weight: 600; font-size: 0.85rem; letter-spacing: 1px; flex: 1; max-width: 90px; justify-content: flex-start; }
    .rs-mobile-toggle i { font-size: 1.4rem; }
    .rs-mobile-search-icon { display: none !important; }
    
    .rs-mobile-drawer { display: none; background: #ffffff; border-top: 1px solid #eee; padding: 15px 20px; max-height: 80vh; overflow-y: auto; }
    .rs-mobile-drawer.active { display: block; }
    .rs-mobile-drawer ul { list-style: none; padding: 0; margin: 0; }
    .rs-mobile-drawer li { margin-bottom: 8px; }
    .rs-mobile-drawer a { color: #333; text-decoration: none; font-size: 0.9rem; letter-spacing: 0.5px; text-transform: uppercase; font-weight: 700; display: block; }
    .rs-mobile-drawer a:hover { color: #b71c1c; }

    .rs-mobile-accordion {
        border-bottom: 1px solid #f1f5f9;
        padding-bottom: 8px;
    }
    .rs-mobile-acc-btn {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        background: none;
        border: none;
        padding: 6px 0;
        font-size: 0.9rem;
        font-weight: 700;
        color: #1e293b;
        text-transform: uppercase;
        cursor: pointer;
    }
    .rs-mobile-sublist {
        padding-left: 14px;
        margin-top: 6px;
        display: none;
    }
    .rs-mobile-sublist.open {
        display: block;
    }
    .rs-mobile-sublist a {
        font-size: 0.82rem;
        font-weight: 600;
        color: #64748b;
        padding: 4px 0;
        text-transform: capitalize;
    }

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
      .rs-desktop-account { display: none !important; }
      .rs-nav-bar { display: none; }
      .rs-search-box { display: none; }
      .rs-mobile-toggle { display: flex; }
      .rs-mobile-search-icon { display: flex !important; }
      
      .rs-main-bar { display: flex; align-items: center; justify-content: space-between; padding: 6px 30px; max-width: 1500px; margin: 0 auto; gap: 15px; position: relative !important; min-height: 60px; }
      
      .rs-logo-container { position: absolute; left: 50%; transform: translateX(-50%); flex: unset; z-index: 10; }
      .rs-logo img { height: 60px !important; width: auto !important; object-fit: contain !important; transition: transform 0.3s ease !important; margin: 0 !important; }
      
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
        <span class="rs-badge wishlist-count-badge">0</span><i class="bi bi-heart rs-action-icon"></i>
        <span>WISHLIST</span>
      </a>

      <a href="/cart" class="rs-action-link">
        <span class="rs-badge cart-count-badge">0</span><i class="bi bi-bag rs-action-icon"></i>
        <span>BAG</span>
      </a>

      @auth
        <a href="/dashboard" class="rs-action-link rs-desktop-account" title="My Account">
          <i class="bi bi-person-circle rs-action-icon"></i>
          <span>ACCOUNT</span>
        </a>
      @else
        <a href="/login" class="rs-action-link rs-desktop-account" title="Login / Register">
          <i class="bi bi-person rs-action-icon"></i>
          <span>LOGIN</span>
        </a>
      @endauth
    </div>
  </div>

  <!-- Bottom Navigation Bar (Dynamic Hierarchical Categories) -->
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
            @if($hCat->children && $hCat->children->count() > 0)
              <i class="bi bi-chevron-down" style="font-size: 0.65rem; opacity: 0.7; margin-left: 2px;"></i>
            @endif
          </a>

          @if($hCat->children && $hCat->children->count() > 0)
            @if($hCat->children->where('children', '!=', null)->count() > 0 && $hCat->slug === 'laddu-gopal')
              <!-- Multi-column Mega Menu for Laddu Gopal -->
              <div class="rs-dropdown rs-mega-menu">
                @foreach($hCat->children as $child)
                  <div class="rs-mega-col">
                    <a href="{{ route('shop', ['cat' => $child->slug]) }}" class="rs-mega-col-title">
                      {{ $child->name }}
                    </a>
                    @if($child->children && $child->children->count() > 0)
                      <ul class="rs-mega-list">
                        @foreach($child->children as $subChild)
                          <li class="rs-mega-item">
                            <a href="{{ route('shop', ['cat' => $subChild->slug]) }}">
                              {{ $subChild->name }}
                            </a>
                          </li>
                        @endforeach
                      </ul>
                    @endif
                  </div>
                @endforeach
              </div>
            @else
              <!-- Standard Dropdown Menu for Other Categories -->
              <div class="rs-dropdown">
                <ul class="rs-simple-menu">
                  @foreach($hCat->children as $child)
                    <li class="rs-simple-item">
                      <a href="{{ route('shop', ['cat' => $child->slug]) }}">
                        <span>{{ $child->name }}</span>
                        @if($child->children && $child->children->count() > 0)
                          <i class="bi bi-chevron-right" style="font-size: 0.65rem; opacity: 0.5;"></i>
                        @endif
                      </a>
                    </li>
                  @endforeach
                </ul>
              </div>
            @endif
          @endif
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

  <!-- Mobile Drawer (Hierarchical Categories with Collapsible Accordions) -->
  <div class="rs-mobile-drawer" id="rsMobileDrawer">
    @auth
      <div style="background: #fdf2f2; border: 1px solid #fecaca; border-radius: 10px; padding: 12px 15px; margin-bottom: 15px; display: flex; align-items: center; justify-content: space-between;">
        <div style="display: flex; align-items: center; gap: 10px;">
          <div style="width: 38px; height: 38px; background: #b71c1c; color: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 1.1rem;">
            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
          </div>
          <div>
            <h4 style="margin: 0; font-size: 0.85rem; font-weight: 800; color: #1e293b;">{{ Auth::user()->name }}</h4>
            <span style="font-size: 0.72rem; color: #64748b;">{{ Auth::user()->email }}</span>
          </div>
        </div>
        <a href="/dashboard" style="background: #b71c1c; color: #fff; text-decoration: none; padding: 6px 12px; border-radius: 6px; font-size: 0.72rem; font-weight: 800;">DASHBOARD</a>
      </div>
    @else
      <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; padding: 12px 15px; margin-bottom: 15px; display: flex; align-items: center; justify-content: space-between;">
        <div style="display: flex; align-items: center; gap: 10px;">
          <div style="width: 36px; height: 36px; background: #e2e8f0; color: #64748b; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.1rem;">
            <i class="bi bi-person"></i>
          </div>
          <div>
            <h4 style="margin: 0; font-size: 0.85rem; font-weight: 800; color: #1e293b;">Welcome Guest!</h4>
            <span style="font-size: 0.72rem; color: #64748b;">Log in for orders & checkout</span>
          </div>
        </div>
        <div style="display: flex; gap: 6px;">
          <a href="/login" style="background: #b71c1c; color: #fff; text-decoration: none; padding: 6px 12px; border-radius: 6px; font-size: 0.72rem; font-weight: 800;">LOGIN</a>
          <a href="/register" style="border: 1px solid #b71c1c; color: #b71c1c; text-decoration: none; padding: 5px 10px; border-radius: 6px; font-size: 0.72rem; font-weight: 800;">REGISTER</a>
        </div>
      </div>
    @endauth
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
        <li class="rs-mobile-accordion">
          @if($hCat->children && $hCat->children->count() > 0)
            <div style="display: flex; align-items: center; justify-content: space-between;">
              <a href="{{ route('shop', ['cat' => $hCat->slug]) }}" style="{{ request('cat') == $hCat->slug ? 'color: #b71c1c;' : '' }}">
                {{ strtoupper($hCat->name) }}
              </a>
              <button type="button" onclick="this.parentElement.nextElementSibling.classList.toggle('open'); this.querySelector('i').classList.toggle('bi-chevron-up'); this.querySelector('i').classList.toggle('bi-chevron-down');" style="background: none; border: none; padding: 6px 10px; cursor: pointer; color: #64748b;">
                <i class="bi bi-chevron-down"></i>
              </button>
            </div>
            <div class="rs-mobile-sublist">
              @foreach($hCat->children as $child)
                <div style="margin-bottom: 4px;">
                  <a href="{{ route('shop', ['cat' => $child->slug]) }}" style="font-weight: 700; color: #1e293b;">
                    • {{ $child->name }}
                  </a>
                  @if($child->children && $child->children->count() > 0)
                    <div style="padding-left: 12px; margin-top: 2px;">
                      @foreach($child->children as $subChild)
                        <a href="{{ route('shop', ['cat' => $subChild->slug]) }}" style="font-size: 0.78rem; color: #64748b; display: block; padding: 2px 0;">
                          - {{ $subChild->name }}
                        </a>
                      @endforeach
                    </div>
                  @endif
                </div>
              @endforeach
            </div>
          @else
            <a href="{{ route('shop', ['cat' => $hCat->slug]) }}" style="{{ request('cat') == $hCat->slug ? 'color: #b71c1c;' : '' }}">
              {{ strtoupper($hCat->name) }}
            </a>
          @endif
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