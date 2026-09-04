<style>
    .cp-sidebar {
        background: #ffffff !important;
        border: 1px solid #e2e8f0 !important;
        border-radius: 18px !important;
        padding: 20px !important;
        box-shadow: 0 1px 3px rgba(0,0,0,0.03) !important;
    }
    .cp-sidebar-user {
        display: flex !important;
        align-items: center !important;
        gap: 14px !important;
        padding-bottom: 16px !important;
        margin-bottom: 16px !important;
        border-bottom: 1px solid #f1f5f9 !important;
    }
    .cp-sidebar-avatar {
        width: 48px !important;
        height: 48px !important;
        min-width: 48px !important;
        border-radius: 14px !important;
        background: linear-gradient(135deg, #b71c1c 0%, #e11d48 100%) !important;
        color: #ffffff !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        font-size: 18px !important;
        font-weight: 800 !important;
        box-shadow: 0 3px 8px rgba(183, 28, 28, 0.3) !important;
    }
    .cp-nav-list {
        display: flex !important;
        flex-direction: column !important;
        gap: 6px !important;
    }
    .cp-nav-item {
        display: flex !important;
        align-items: center !important;
        justify-content: space-between !important;
        padding: 10px 14px !important;
        border-radius: 12px !important;
        font-size: 13px !important;
        font-weight: 700 !important;
        color: #334155 !important;
        text-decoration: none !important;
        transition: all 0.15s ease !important;
    }
    .cp-nav-item:hover {
        background: #f8fafc !important;
        color: #b71c1c !important;
    }
    .cp-nav-item.active {
        background: #b71c1c !important;
        color: #ffffff !important;
        box-shadow: 0 4px 10px rgba(183, 28, 28, 0.25) !important;
    }
    .cp-nav-item.active i {
        color: #ffffff !important;
    }
</style>

<!-- Sidebar Navigation (Desktop) -->
<div class="hidden lg:block w-full lg:w-1/4 flex-shrink-0">
    <div class="cp-sidebar">
        <!-- User Info -->
        <div class="cp-sidebar-user">
            <div class="cp-sidebar-avatar">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
            <div style="flex: 1; min-width: 0;">
                <h4 style="font-size: 14px; font-weight: 800; color: #0f172a; margin: 0; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                    {{ Auth::user()->name }}
                </h4>
                <div style="font-size: 10px; font-weight: 800; color: #059669; text-transform: uppercase; letter-spacing: 0.05em; margin-top: 3px; display: flex; align-items: center; gap: 4px;">
                    <i class="fa-solid fa-circle-check"></i> Customer Account
                </div>
            </div>
        </div>
        
        <!-- Nav Links -->
        <div class="cp-nav-list">
            <a href="{{ url('/dashboard') }}" class="cp-nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
                <span style="display: flex; align-items: center; gap: 10px;">
                    <i class="fa-solid fa-chart-pie" style="font-size: 14px; color: {{ request()->is('dashboard') ? '#ffffff' : '#64748b' }}; width: 16px;"></i>
                    Dashboard
                </span>
                <i class="fa-solid fa-chevron-right" style="font-size: 10px; opacity: 0.6;"></i>
            </a>

            <a href="{{ url('/orders') }}" class="cp-nav-item {{ request()->is('orders*') ? 'active' : '' }}">
                <span style="display: flex; align-items: center; gap: 10px;">
                    <i class="fa-solid fa-box-archive" style="font-size: 14px; color: {{ request()->is('orders*') ? '#ffffff' : '#64748b' }}; width: 16px;"></i>
                    My Orders
                </span>
                <i class="fa-solid fa-chevron-right" style="font-size: 10px; opacity: 0.6;"></i>
            </a>
            
            <a href="{{ url('/wishlist') }}" class="cp-nav-item {{ request()->is('wishlist') ? 'active' : '' }}">
                <span style="display: flex; align-items: center; gap: 10px;">
                    <i class="fa-solid fa-heart" style="font-size: 14px; color: {{ request()->is('wishlist') ? '#ffffff' : '#64748b' }}; width: 16px;"></i>
                    My Wishlist
                </span>
                <i class="fa-solid fa-chevron-right" style="font-size: 10px; opacity: 0.6;"></i>
            </a>
            
            <a href="{{ url('/cart') }}" class="cp-nav-item {{ request()->is('cart') ? 'active' : '' }}">
                <span style="display: flex; align-items: center; gap: 10px;">
                    <i class="fa-solid fa-bag-shopping" style="font-size: 14px; color: {{ request()->is('cart') ? '#ffffff' : '#64748b' }}; width: 16px;"></i>
                    Shopping Cart
                </span>
                <i class="fa-solid fa-chevron-right" style="font-size: 10px; opacity: 0.6;"></i>
            </a>
            
            <a href="{{ route('profile.edit') }}" class="cp-nav-item {{ request()->is('profile') ? 'active' : '' }}">
                <span style="display: flex; align-items: center; gap: 10px;">
                    <i class="fa-solid fa-user-gear" style="font-size: 14px; color: {{ request()->is('profile') ? '#ffffff' : '#64748b' }}; width: 16px;"></i>
                    Account Settings
                </span>
                <i class="fa-solid fa-chevron-right" style="font-size: 10px; opacity: 0.6;"></i>
            </a>

            <a href="{{ url('/addresses') }}" class="cp-nav-item {{ request()->is('addresses*') ? 'active' : '' }}">
                <span style="display: flex; align-items: center; gap: 10px;">
                    <i class="fa-solid fa-map-location-dot" style="font-size: 14px; color: {{ request()->is('addresses*') ? '#ffffff' : '#64748b' }}; width: 16px;"></i>
                    My Addresses
                </span>
                <i class="fa-solid fa-chevron-right" style="font-size: 10px; opacity: 0.6;"></i>
            </a>
            
            <a href="{{ url('/contact') }}" class="cp-nav-item {{ request()->is('contact') ? 'active' : '' }}">
                <span style="display: flex; align-items: center; gap: 10px;">
                    <i class="fa-solid fa-headset" style="font-size: 14px; color: {{ request()->is('contact') ? '#ffffff' : '#64748b' }}; width: 16px;"></i>
                    Support & Help
                </span>
                <i class="fa-solid fa-chevron-right" style="font-size: 10px; opacity: 0.6;"></i>
            </a>
            
            <form method="POST" action="{{ route('logout') }}" style="margin-top: 10px; padding-top: 10px; border-top: 1px solid #f1f5f9;">
                @csrf
                <button type="submit" style="width: 100%; text-align: left; background: none; border: none; padding: 10px 14px; border-radius: 12px; font-size: 13px; font-weight: 700; color: #dc2626; cursor: pointer; display: flex; align-items: center; gap: 10px; transition: background 0.15s;">
                    <i class="fa-solid fa-arrow-right-from-bracket" style="font-size: 14px;"></i> Log Out
                </button>
            </form>
        </div>

        <!-- Sidebar Promo / Help Box -->
        <div style="margin-top: 18px; padding: 14px; border-radius: 14px; background: #0f172a; color: #ffffff; position: relative; overflow: hidden;">
            <div style="font-size: 10px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.05em; color: #fbbf24; margin-bottom: 4px;">Need Assistance?</div>
            <p style="font-size: 11px; color: #94a3b8; margin: 0 0 10px 0; line-height: 1.4;">Contact our support team for quick order help.</p>
            <a href="{{ url('/contact') }}" style="display: inline-flex; align-items: center; gap: 6px; background: #b71c1c; color: #ffffff; padding: 6px 12px; border-radius: 8px; font-size: 11px; font-weight: 800; text-decoration: none;">
                <i class="fa-solid fa-comments"></i> Get Support
            </a>
        </div>
    </div>
</div>

<!-- Mobile Drawer Navigation -->
<div class="block lg:hidden w-full mb-4" x-data="{ openMenu: false }">
    <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 14px; padding: 12px 16px; display: flex; align-items: center; justify-content: space-between;">
        <div style="display: flex; align-items: center; gap: 10px;">
            <div class="cp-sidebar-avatar" style="width: 38px; height: 38px; min-width: 38px; font-size: 14px; border-radius: 10px;">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
            <div>
                <div style="font-size: 10px; font-weight: 700; color: #94a3b8; text-transform: uppercase;">Active Menu</div>
                <div style="font-size: 13px; font-weight: 800; color: #0f172a;">
                    @if(request()->is('dashboard')) Dashboard
                    @elseif(request()->is('orders*')) My Orders
                    @elseif(request()->is('wishlist')) My Wishlist
                    @elseif(request()->is('cart')) Shopping Cart
                    @elseif(request()->is('profile')) Account Settings
                    @elseif(request()->is('addresses*')) My Addresses
                    @else Account Menu @endif
                </div>
            </div>
        </div>

        <button type="button" @click="openMenu = !openMenu" style="background: #f8fafc; border: 1px solid #cbd5e1; padding: 8px 14px; border-radius: 10px; font-size: 12px; font-weight: 700; color: #334155; cursor: pointer; display: flex; align-items: center; gap: 6px;">
            <i class="fa-solid fa-bars"></i> Menu
        </button>
    </div>

    <!-- Dropdown list for mobile -->
    <div x-show="openMenu" x-transition style="margin-top: 8px; background: #ffffff; border: 1px solid #e2e8f0; border-radius: 14px; padding: 10px; display: none;">
        <div class="cp-nav-list">
            <a href="{{ url('/dashboard') }}" class="cp-nav-item {{ request()->is('dashboard') ? 'active' : '' }}">Dashboard</a>
            <a href="{{ url('/orders') }}" class="cp-nav-item {{ request()->is('orders*') ? 'active' : '' }}">My Orders</a>
            <a href="{{ url('/wishlist') }}" class="cp-nav-item {{ request()->is('wishlist') ? 'active' : '' }}">My Wishlist</a>
            <a href="{{ url('/cart') }}" class="cp-nav-item {{ request()->is('cart') ? 'active' : '' }}">Shopping Cart</a>
            <a href="{{ route('profile.edit') }}" class="cp-nav-item {{ request()->is('profile') ? 'active' : '' }}">Account Settings</a>
            <a href="{{ url('/addresses') }}" class="cp-nav-item {{ request()->is('addresses*') ? 'active' : '' }}">My Addresses</a>
            <a href="{{ url('/contact') }}" class="cp-nav-item {{ request()->is('contact') ? 'active' : '' }}">Support & Help</a>
        </div>
    </div>
</div>
