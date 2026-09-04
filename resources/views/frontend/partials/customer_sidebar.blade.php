<!-- Sidebar Navigation (Desktop only) -->
<div class="hidden lg:block w-full lg:w-1/4 flex-shrink-0">
    <div class="bg-white border border-slate-200/80 rounded-2xl p-4 shadow-sm space-y-1 sticky top-24">
        <!-- User Profile Card -->
        <div style="display: flex !important; align-items: center !important; gap: 12px !important;" class="mb-4 pb-4 border-b border-slate-100">
            <div class="relative flex-shrink-0" style="width: 44px; height: 44px; min-width: 44px;">
                <div class="bg-gradient-to-tr from-primary to-primary-dark text-white rounded-xl font-extrabold text-base shadow-sm select-none" style="width: 44px; height: 44px; display: flex !important; align-items: center !important; justify-content: center !important;">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <span class="absolute -bottom-0.5 -right-0.5 block h-3 w-3 rounded-full bg-emerald-500 ring-2 ring-white"></span>
            </div>
            <div class="min-w-0 flex-1" style="margin: 0 !important; padding: 0 !important;">
                <h4 class="font-extrabold text-slate-900 text-sm tracking-tight truncate" style="margin: 0 !important; padding: 0 !important; line-height: 1.2 !important; font-size: 0.9rem !important;">{{ Auth::user()->name }}</h4>
                <span class="text-[10px] text-slate-500 font-extrabold uppercase tracking-wider block whitespace-nowrap" style="margin-top: 3px !important; display: block !important; line-height: 1 !important;">
                    <i class="fa-solid fa-shield-check text-primary text-[10px] mr-1"></i> Customer Account
                </span>
            </div>
        </div>
        
        <!-- Nav Links -->
        <a href="{{ url('/dashboard') }}" 
           class="group relative w-full px-3.5 py-2.5 rounded-xl text-xs font-bold transition-all {{ request()->is('dashboard') ? 'bg-primary text-white shadow-sm font-extrabold' : 'text-slate-700 hover:bg-slate-50 hover:text-slate-900' }}"
           style="display: flex !important; align-items: center !important; justify-content: space-between !important; text-decoration: none !important;">
            <span style="display: flex !important; align-items: center !important;">
                <i class="fa-solid fa-chart-line mr-3 text-sm {{ request()->is('dashboard') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}"></i>
                Dashboard Overview
            </span>
            <i class="fa-solid fa-chevron-right text-[8px] {{ request()->is('dashboard') ? 'text-white' : 'text-slate-300' }}"></i>
        </a>

        <a href="{{ url('/orders') }}" 
           class="group relative w-full px-3.5 py-2.5 rounded-xl text-xs font-bold transition-all {{ request()->is('orders*') ? 'bg-primary text-white shadow-sm font-extrabold' : 'text-slate-700 hover:bg-slate-50 hover:text-slate-900' }}"
           style="display: flex !important; align-items: center !important; justify-content: space-between !important; text-decoration: none !important;">
            <span style="display: flex !important; align-items: center !important;">
                <i class="fa-solid fa-box mr-3 text-sm {{ request()->is('orders*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}"></i>
                My Orders
            </span>
            <i class="fa-solid fa-chevron-right text-[8px] {{ request()->is('orders*') ? 'text-white' : 'text-slate-300' }}"></i>
        </a>
        
        <a href="{{ url('/wishlist') }}" 
           class="group relative w-full px-3.5 py-2.5 rounded-xl text-xs font-bold transition-all {{ request()->is('wishlist') ? 'bg-primary text-white shadow-sm font-extrabold' : 'text-slate-700 hover:bg-slate-50 hover:text-slate-900' }}"
           style="display: flex !important; align-items: center !important; justify-content: space-between !important; text-decoration: none !important;">
            <span style="display: flex !important; align-items: center !important;">
                <i class="fa-solid fa-heart mr-3 text-sm {{ request()->is('wishlist') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}"></i>
                My Wishlist
            </span>
            <i class="fa-solid fa-chevron-right text-[8px] {{ request()->is('wishlist') ? 'text-white' : 'text-slate-300' }}"></i>
        </a>
        
        <a href="{{ url('/cart') }}" 
           class="group relative w-full px-3.5 py-2.5 rounded-xl text-xs font-bold transition-all {{ request()->is('cart') ? 'bg-primary text-white shadow-sm font-extrabold' : 'text-slate-700 hover:bg-slate-50 hover:text-slate-900' }}"
           style="display: flex !important; align-items: center !important; justify-content: space-between !important; text-decoration: none !important;">
            <span style="display: flex !important; align-items: center !important;">
                <i class="fa-solid fa-cart-shopping mr-3 text-sm {{ request()->is('cart') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}"></i>
                My Shopping Cart
            </span>
            <i class="fa-solid fa-chevron-right text-[8px] {{ request()->is('cart') ? 'text-white' : 'text-slate-300' }}"></i>
        </a>
        
        <a href="{{ route('profile.edit') }}" 
           class="group relative w-full px-3.5 py-2.5 rounded-xl text-xs font-bold transition-all {{ request()->is('profile') ? 'bg-primary text-white shadow-sm font-extrabold' : 'text-slate-700 hover:bg-slate-50 hover:text-slate-900' }}"
           style="display: flex !important; align-items: center !important; justify-content: space-between !important; text-decoration: none !important;">
            <span style="display: flex !important; align-items: center !important;">
                <i class="fa-solid fa-user-gear mr-3 text-sm {{ request()->is('profile') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}"></i>
                Account Settings
            </span>
            <i class="fa-solid fa-chevron-right text-[8px] {{ request()->is('profile') ? 'text-white' : 'text-slate-300' }}"></i>
        </a>

        <a href="{{ url('/addresses') }}" 
           class="group relative w-full px-3.5 py-2.5 rounded-xl text-xs font-bold transition-all {{ request()->is('addresses*') ? 'bg-primary text-white shadow-sm font-extrabold' : 'text-slate-700 hover:bg-slate-50 hover:text-slate-900' }}"
           style="display: flex !important; align-items: center !important; justify-content: space-between !important; text-decoration: none !important;">
            <span style="display: flex !important; align-items: center !important;">
                <i class="fa-solid fa-map-location-dot mr-3 text-sm {{ request()->is('addresses*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}"></i>
                My Addresses
            </span>
            <i class="fa-solid fa-chevron-right text-[8px] {{ request()->is('addresses*') ? 'text-white' : 'text-slate-300' }}"></i>
        </a>
        
        <a href="{{ url('/contact') }}" 
           class="group relative w-full px-3.5 py-2.5 rounded-xl text-xs font-bold transition-all {{ request()->is('contact') ? 'bg-primary text-white shadow-sm font-extrabold' : 'text-slate-700 hover:bg-slate-50 hover:text-slate-900' }}"
           style="display: flex !important; align-items: center !important; justify-content: space-between !important; text-decoration: none !important;">
            <span style="display: flex !important; align-items: center !important;">
                <i class="fa-solid fa-headset mr-3 text-sm {{ request()->is('contact') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}"></i>
                Support & Help
            </span>
            <i class="fa-solid fa-chevron-right text-[8px] {{ request()->is('contact') ? 'text-white' : 'text-slate-300' }}"></i>
        </a>
        
        <form method="POST" action="{{ route('logout') }}" class="pt-3 border-t border-slate-100 mt-2">
            @csrf
            <button type="submit" class="w-full text-left px-3.5 py-2.5 rounded-xl text-xs font-bold text-red-500 hover:bg-red-50 transition-all cursor-pointer group" style="display: flex !important; align-items: center !important;">
                <i class="fa-solid fa-arrow-right-from-bracket mr-3 text-sm text-red-400 group-hover:translate-x-0.5 transition-transform"></i> Log Out
            </button>
        </form>

        <!-- Sidebar Promo Card -->
        <div class="mt-5 p-4 bg-gradient-to-br from-slate-900 to-slate-800 text-white rounded-xl relative overflow-hidden shadow-sm">
            <div class="absolute -right-4 -bottom-4 w-20 h-20 bg-primary/20 rounded-full blur-xl"></div>
            <span class="text-[9px] font-extrabold text-amber-400 uppercase tracking-widest block mb-1">Customer Support</span>
            <p class="text-[11px] text-slate-300 leading-snug font-medium mb-3" style="margin: 0 0 10px 0 !important;">Need assistance with your order or account?</p>
            <a href="{{ url('/contact') }}" class="inline-flex items-center justify-center bg-primary hover:bg-primary-dark text-white rounded-lg px-3 py-1.5 text-[10px] font-extrabold transition-all shadow-xs gap-1.5" style="text-decoration: none !important; display: inline-flex !important;">
                <i class="fa-solid fa-comments text-[9px]"></i> Contact Us
            </a>
        </div>
    </div>
</div>

<!-- Mobile Collapsible Navigation (Mobile only) -->
<div class="block lg:hidden w-full mb-4" x-data="{ expanded: false }">
    <!-- Header trigger bar -->
    <div class="flex items-center justify-between bg-white border border-slate-200 rounded-xl p-3 shadow-xs" style="display: flex !important; align-items: center !important; justify-content: space-between !important;">
        <div class="flex items-center gap-3" style="display: flex !important; align-items: center !important;">
            <div class="bg-primary text-white h-8 w-8 rounded-lg font-extrabold text-xs shadow-xs" style="display: flex !important; align-items: center !important; justify-content: center !important;">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
            <div>
                <span class="text-[9px] text-slate-400 font-bold uppercase tracking-wider block" style="margin: 0 !important;">Current Page</span>
                <span class="text-xs font-bold text-slate-800 flex items-center gap-1.5" style="margin: 0 !important;">
                    @if(request()->is('dashboard'))
                        <i class="fa-solid fa-chart-line text-[10px] text-primary"></i> Dashboard Overview
                    @elseif(request()->is('orders*'))
                        <i class="fa-solid fa-box text-[10px] text-primary"></i> My Orders
                    @elseif(request()->is('wishlist'))
                        <i class="fa-solid fa-heart text-[10px] text-primary"></i> My Wishlist
                    @elseif(request()->is('cart'))
                        <i class="fa-solid fa-cart-shopping text-[10px] text-primary"></i> Shopping Cart
                    @elseif(request()->is('profile'))
                        <i class="fa-solid fa-user-gear text-[10px] text-primary"></i> Account Settings
                    @elseif(request()->is('addresses*'))
                        <i class="fa-solid fa-map-location-dot text-[10px] text-primary"></i> My Addresses
                    @elseif(request()->is('contact'))
                        <i class="fa-solid fa-headset text-[10px] text-primary"></i> Support & Help
                    @else
                        <i class="fa-solid fa-circle text-[10px] text-primary"></i> Account Navigation
                    @endif
                </span>
            </div>
        </div>
        
        <!-- Toggle Button -->
        <button type="button" @click="expanded = !expanded" class="flex items-center gap-1.5 bg-slate-50 border border-slate-200 hover:bg-slate-100 rounded-lg px-3 py-1.5 text-xs font-bold text-slate-700 transition cursor-pointer" style="display: flex !important; align-items: center !important;">
            <i class="fa-solid fa-bars text-[10px]" x-show="!expanded"></i>
            <i class="fa-solid fa-xmark text-[10px]" x-show="expanded"></i>
            <span>Menu</span>
            <i class="fa-solid fa-chevron-down text-[8px] transition-transform duration-200" :class="expanded ? 'rotate-180' : ''"></i>
        </button>
    </div>

    <!-- Collapsible Vertical Links Menu -->
    <div x-show="expanded" 
         x-transition:enter="transition ease-out duration-150"
         x-transition:enter-start="opacity-0 transform -translate-y-2"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-100"
         x-transition:leave-start="opacity-100 transform translate-y-0"
         x-transition:leave-end="opacity-0 transform -translate-y-2"
         class="mt-2 bg-white border border-slate-200 rounded-xl p-2 shadow-sm space-y-1"
         style="display: none;">
        
        <a href="{{ url('/dashboard') }}" class="group w-full px-3 py-2 rounded-lg text-xs font-bold transition-all {{ request()->is('dashboard') ? 'bg-primary text-white font-bold' : 'text-slate-700 hover:bg-slate-50' }}" style="display: flex !important; align-items: center !important; justify-content: space-between !important; text-decoration: none !important;">
            <span style="display: flex !important; align-items: center !important;">
                <i class="fa-solid fa-chart-line mr-2.5 text-xs {{ request()->is('dashboard') ? 'text-white' : 'text-slate-400' }}"></i>
                Dashboard Overview
            </span>
            @if(request()->is('dashboard'))
                <span class="w-1.5 h-1.5 bg-white rounded-full"></span>
            @endif
        </a>

        <a href="{{ url('/orders') }}" class="group w-full px-3 py-2 rounded-lg text-xs font-bold transition-all {{ request()->is('orders*') ? 'bg-primary text-white font-bold' : 'text-slate-700 hover:bg-slate-50' }}" style="display: flex !important; align-items: center !important; justify-content: space-between !important; text-decoration: none !important;">
            <span style="display: flex !important; align-items: center !important;">
                <i class="fa-solid fa-box mr-2.5 text-xs {{ request()->is('orders*') ? 'text-white' : 'text-slate-400' }}"></i>
                My Orders
            </span>
            @if(request()->is('orders*'))
                <span class="w-1.5 h-1.5 bg-white rounded-full"></span>
            @endif
        </a>
        
        <a href="{{ url('/wishlist') }}" class="group w-full px-3 py-2 rounded-lg text-xs font-bold transition-all {{ request()->is('wishlist') ? 'bg-primary text-white font-bold' : 'text-slate-700 hover:bg-slate-50' }}" style="display: flex !important; align-items: center !important; justify-content: space-between !important; text-decoration: none !important;">
            <span style="display: flex !important; align-items: center !important;">
                <i class="fa-solid fa-heart mr-2.5 text-xs {{ request()->is('wishlist') ? 'text-white' : 'text-slate-400' }}"></i>
                My Wishlist
            </span>
            @if(request()->is('wishlist'))
                <span class="w-1.5 h-1.5 bg-white rounded-full"></span>
            @endif
        </a>
        
        <a href="{{ url('/cart') }}" class="group w-full px-3 py-2 rounded-lg text-xs font-bold transition-all {{ request()->is('cart') ? 'bg-primary text-white font-bold' : 'text-slate-700 hover:bg-slate-50' }}" style="display: flex !important; align-items: center !important; justify-content: space-between !important; text-decoration: none !important;">
            <span style="display: flex !important; align-items: center !important;">
                <i class="fa-solid fa-cart-shopping mr-2.5 text-xs {{ request()->is('cart') ? 'text-white' : 'text-slate-400' }}"></i>
                My Shopping Cart
            </span>
            @if(request()->is('cart'))
                <span class="w-1.5 h-1.5 bg-white rounded-full"></span>
            @endif
        </a>
        
        <a href="{{ route('profile.edit') }}" class="group w-full px-3 py-2 rounded-lg text-xs font-bold transition-all {{ request()->is('profile') ? 'bg-primary text-white font-bold' : 'text-slate-700 hover:bg-slate-50' }}" style="display: flex !important; align-items: center !important; justify-content: space-between !important; text-decoration: none !important;">
            <span style="display: flex !important; align-items: center !important;">
                <i class="fa-solid fa-user-gear mr-2.5 text-xs {{ request()->is('profile') ? 'text-white' : 'text-slate-400' }}"></i>
                Account Settings
            </span>
            @if(request()->is('profile'))
                <span class="w-1.5 h-1.5 bg-white rounded-full"></span>
            @endif
        </a>

        <a href="{{ url('/addresses') }}" class="group w-full px-3 py-2 rounded-lg text-xs font-bold transition-all {{ request()->is('addresses*') ? 'bg-primary text-white font-bold' : 'text-slate-700 hover:bg-slate-50' }}" style="display: flex !important; align-items: center !important; justify-content: space-between !important; text-decoration: none !important;">
            <span style="display: flex !important; align-items: center !important;">
                <i class="fa-solid fa-map-location-dot mr-2.5 text-xs {{ request()->is('addresses*') ? 'text-white' : 'text-slate-400' }}"></i>
                My Addresses
            </span>
            @if(request()->is('addresses*'))
                <span class="w-1.5 h-1.5 bg-white rounded-full"></span>
            @endif
        </a>
        
        <a href="{{ url('/contact') }}" class="group w-full px-3 py-2 rounded-lg text-xs font-bold transition-all {{ request()->is('contact') ? 'bg-primary text-white font-bold' : 'text-slate-700 hover:bg-slate-50' }}" style="display: flex !important; align-items: center !important; justify-content: space-between !important; text-decoration: none !important;">
            <span style="display: flex !important; align-items: center !important;">
                <i class="fa-solid fa-headset mr-2.5 text-xs {{ request()->is('contact') ? 'text-white' : 'text-slate-400' }}"></i>
                Support & Help
            </span>
            @if(request()->is('contact'))
                <span class="w-1.5 h-1.5 bg-white rounded-full"></span>
            @endif
        </a>
        
        <form method="POST" action="{{ route('logout') }}" class="pt-2 border-t border-slate-100 mt-2">
            @csrf
            <button type="submit" class="w-full text-left px-3 py-2 rounded-lg text-xs font-bold text-red-500 hover:bg-red-50 transition-all cursor-pointer" style="display: flex !important; align-items: center !important;">
                <i class="fa-solid fa-arrow-right-from-bracket mr-2.5 text-xs text-red-400"></i> Log Out
            </button>
        </form>
    </div>
</div>
