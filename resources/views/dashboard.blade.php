@extends('layouts.frontend')

@section('title', 'My Dashboard')

@section('content')
    <!-- Dashboard Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <!-- Breadcrumb & Title Inline -->
        <div class="mb-4 pb-3.5 border-b border-slate-100" style="display: flex !important; align-items: center !important; justify-content: space-between !important; flex-wrap: wrap !important; gap: 12px !important;">
            <div>
                <h1 class="text-xl sm:text-2xl font-extrabold text-slate-900 tracking-tight" style="font-family: 'Outfit', sans-serif; margin: 0 !important; padding: 0 !important;">My Account</h1>
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-wider" style="margin: 4px 0 0 0 !important; display: flex !important; align-items: center !important; gap: 6px !important;">
                    <a href="/" class="hover:text-primary transition-colors" style="text-decoration: none !important;">Home</a> 
                    <span class="text-slate-300">/</span> 
                    <span class="text-slate-800">Dashboard</span>
                </p>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row gap-6">
            
            @include('frontend.partials.customer_sidebar')

            <!-- Content Area: Dashboard Overview -->
            <div class="w-full lg:w-3/4">
                <div class="space-y-5">
                    
                    <!-- Welcome Banner -->
                    <div class="relative overflow-hidden rounded-2xl p-5 sm:p-6 shadow-sm border border-slate-200/80 bg-gradient-to-r from-red-50/70 via-rose-50/30 to-slate-50">
                        <div class="relative z-10" style="display: flex !important; flex-direction: row !important; align-items: center !important; justify-content: space-between !important; flex-wrap: wrap !important; gap: 16px !important;">
                            <div style="display: flex !important; align-items: center !important; gap: 16px !important;">
                                <!-- Avatar -->
                                <div class="flex-shrink-0 rounded-xl text-white shadow-md bg-gradient-to-tr from-primary to-primary-dark" style="width: 48px !important; height: 48px !important; min-width: 48px !important; display: flex !important; align-items: center !important; justify-content: center !important; font-weight: 800 !important; font-size: 1.25rem !important;">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                                <div style="margin: 0 !important; padding: 0 !important;">
                                    <div style="display: flex !important; align-items: center !important; gap: 8px !important; flex-wrap: wrap !important; margin-bottom: 6px !important;">
                                        <span class="text-[9px] font-extrabold uppercase tracking-widest px-2.5 py-0.5 rounded-full bg-primary text-white" style="display: inline-block !important; line-height: 1.2 !important;">Welcome Back</span>
                                        <span class="text-[9px] font-bold uppercase tracking-wider px-2.5 py-0.5 rounded-full bg-primary/10 text-primary border border-primary/20" style="display: inline-block !important; line-height: 1.2 !important;">Member Since {{ Auth::user()->created_at ? Auth::user()->created_at->format('M Y') : 'Aug 2026' }}</span>
                                    </div>
                                    <h2 class="text-lg sm:text-xl font-extrabold tracking-tight text-slate-900" style="font-family: 'Outfit', sans-serif; margin: 0 !important; padding: 0 !important; line-height: 1.2 !important;">Hello, {{ Auth::user()->name }}! 👋</h2>
                                    <p class="text-xs text-slate-500 font-medium" style="margin: 4px 0 0 0 !important; padding: 0 !important;">Manage your orders, wishlist, addresses, and settings — all in one place.</p>
                                </div>
                            </div>

                            <!-- Quick Summary Pill -->
                            <div class="hidden md:flex items-center gap-3" style="display: flex !important; align-items: center !important; gap: 12px !important;">
                                <div class="text-center px-4 py-2.5 rounded-xl bg-white/90 border border-slate-200 shadow-2xs">
                                    <span class="text-[9px] font-bold text-slate-400 uppercase tracking-wider block" style="margin-bottom: 2px !important; display: block !important;">Total Spent</span>
                                    <span class="text-sm font-extrabold text-slate-900" style="font-family: 'Outfit', sans-serif;">&#8377;{{ number_format($orders->where('payment_status', 'completed')->sum('total_amount'), 2) }}</span>
                                </div>
                                <div class="text-center px-4 py-2.5 rounded-xl bg-white/90 border border-slate-200 shadow-2xs">
                                    <span class="text-[9px] font-bold text-slate-400 uppercase tracking-wider block" style="margin-bottom: 2px !important; display: block !important;">Total Orders</span>
                                    <span class="text-sm font-extrabold text-slate-900" style="font-family: 'Outfit', sans-serif;">{{ count($orders) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Stats Summary Grid -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <!-- Total Orders -->
                        <div class="group bg-white border border-slate-200/80 rounded-2xl p-4 shadow-2xs hover:shadow-md hover:border-slate-300 transition-all duration-300 flex flex-col justify-between h-28">
                            <div style="display: flex !important; align-items: center !important; justify-content: space-between !important;">
                                <span class="text-[9px] font-extrabold text-slate-400 uppercase tracking-wider">Total Orders</span>
                                <div class="w-8 h-8 rounded-xl bg-slate-50 border border-slate-100 flex items-center justify-center group-hover:bg-primary/10 transition-colors" style="display: flex !important; align-items: center !important; justify-content: center !important;">
                                    <i class="fa-solid fa-box text-xs text-slate-500 group-hover:text-primary transition-colors"></i>
                                </div>
                            </div>
                            <div class="mt-2">
                                <span class="text-xl font-extrabold text-slate-900 tracking-tight" style="font-family: 'Outfit', sans-serif;">{{ count($orders) }}</span>
                                <div class="flex items-center gap-1 text-[8px] text-emerald-600 font-extrabold mt-1.5 bg-emerald-50 w-fit px-2 py-0.5 rounded-md" style="display: inline-flex !important; align-items: center !important;">
                                    <i class="fa-solid fa-circle-arrow-up text-[7px] mr-1"></i> {{ count($orders) > 0 ? count($orders).' Orders Placed' : 'No orders yet' }}
                                </div>
                            </div>
                        </div>

                        <!-- Total Spent -->
                        <div class="group bg-white border border-slate-200/80 rounded-2xl p-4 shadow-2xs hover:shadow-md hover:border-slate-300 transition-all duration-300 flex flex-col justify-between h-28">
                            <div style="display: flex !important; align-items: center !important; justify-content: space-between !important;">
                                <span class="text-[9px] font-extrabold text-slate-400 uppercase tracking-wider">Total Spent</span>
                                <div class="w-8 h-8 rounded-xl bg-slate-50 border border-slate-100 flex items-center justify-center group-hover:bg-primary/10 transition-colors" style="display: flex !important; align-items: center !important; justify-content: center !important;">
                                    <i class="fa-solid fa-wallet text-xs text-slate-500 group-hover:text-primary transition-colors"></i>
                                </div>
                            </div>
                            <div class="mt-2">
                                <span class="text-xl font-extrabold text-slate-900 tracking-tight" style="font-family: 'Outfit', sans-serif;">&#8377;{{ number_format($orders->where('payment_status', 'completed')->sum('total_amount'), 0) }}</span>
                                <div class="flex items-center gap-1 text-[8px] text-blue-600 font-extrabold mt-1.5 bg-blue-50 w-fit px-2 py-0.5 rounded-md" style="display: inline-flex !important; align-items: center !important;">
                                    <i class="fa-solid fa-shield text-[7px] mr-1"></i> Verified Payments
                                </div>
                            </div>
                        </div>

                        <!-- Wishlist Items -->
                        <div class="group bg-white border border-slate-200/80 rounded-2xl p-4 shadow-2xs hover:shadow-md hover:border-slate-300 transition-all duration-300 flex flex-col justify-between h-28">
                            <div style="display: flex !important; align-items: center !important; justify-content: space-between !important;">
                                <span class="text-[9px] font-extrabold text-slate-400 uppercase tracking-wider">Wishlist</span>
                                <div class="w-8 h-8 rounded-xl bg-slate-50 border border-slate-100 flex items-center justify-center group-hover:bg-primary/10 transition-colors" style="display: flex !important; align-items: center !important; justify-content: center !important;">
                                    <i class="fa-solid fa-heart text-xs text-slate-500 group-hover:text-primary transition-colors"></i>
                                </div>
                            </div>
                            <div class="mt-2">
                                <span class="text-xl font-extrabold text-slate-900 tracking-tight" style="font-family: 'Outfit', sans-serif;">{{ count(session()->get('wishlist', [])) }}</span>
                                <div class="flex items-center gap-1 text-[8px] text-rose-600 font-extrabold mt-1.5 bg-rose-50 w-fit px-2 py-0.5 rounded-md" style="display: inline-flex !important; align-items: center !important;">
                                    <i class="fa-solid fa-heart text-[7px] mr-1"></i> Saved Favorites
                                </div>
                            </div>
                        </div>

                        <!-- Last Order Date -->
                        <div class="group bg-white border border-slate-200/80 rounded-2xl p-4 shadow-2xs hover:shadow-md hover:border-slate-300 transition-all duration-300 flex flex-col justify-between h-28">
                            <div style="display: flex !important; align-items: center !important; justify-content: space-between !important;">
                                <span class="text-[9px] font-extrabold text-slate-400 uppercase tracking-wider">Last Order</span>
                                <div class="w-8 h-8 rounded-xl bg-slate-50 border border-slate-100 flex items-center justify-center group-hover:bg-primary/10 transition-colors" style="display: flex !important; align-items: center !important; justify-content: center !important;">
                                    <i class="fa-solid fa-clock-rotate-left text-xs text-slate-500 group-hover:text-primary transition-colors"></i>
                                </div>
                            </div>
                            <div class="mt-2">
                                <span class="text-xs font-extrabold text-slate-900 leading-none truncate block max-w-[120px]" style="font-family: 'Outfit', sans-serif;">
                                    {{ $orders->first() ? $orders->first()->created_at->format('M d, Y') : 'None' }}
                                </span>
                                <div class="flex items-center gap-1 text-[8px] text-slate-600 font-extrabold mt-1.5 bg-slate-100 w-fit px-2 py-0.5 rounded-md" style="display: inline-flex !important; align-items: center !important;">
                                    <i class="fa-solid fa-history text-[7px] mr-1"></i> Recent Activity
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Action Cards Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Shopping Cart Card -->
                        <div class="group relative bg-white border border-slate-200/80 rounded-2xl p-5 shadow-2xs hover:shadow-md hover:border-slate-300 transition-all duration-300 flex flex-col justify-between overflow-hidden">
                            <div class="relative z-10">
                                <div style="display: flex !important; align-items: center !important; justify-content: space-between !important;" class="mb-3">
                                    <div style="display: flex !important; align-items: center !important; gap: 10px !important;">
                                        <div class="w-9 h-9 rounded-xl bg-primary/10 border border-primary/20 flex items-center justify-center transition-colors" style="display: flex !important; align-items: center !important; justify-content: center !important;">
                                            <i class="fa-solid fa-cart-shopping text-primary text-sm transition-colors"></i>
                                        </div>
                                        <h5 class="text-xs font-extrabold text-slate-900 uppercase tracking-wider" style="margin: 0 !important; padding: 0 !important;">Shopping Cart</h5>
                                    </div>
                                    <span class="text-[8px] font-extrabold text-primary bg-primary/10 px-2 py-0.5 rounded border border-primary/20 uppercase tracking-wider">Cart Items</span>
                                </div>
                                <p class="text-xs text-slate-500 leading-relaxed mb-4" style="margin: 0 0 16px 0 !important;">Review items currently in your shopping cart, update item quantities, and proceed to checkout.</p>
                            </div>
                            <a href="{{ url('/cart') }}" class="relative z-10 inline-flex items-center gap-2 bg-primary hover:bg-primary-dark text-white shadow-xs px-4 py-2.5 rounded-xl text-xs font-extrabold w-fit transition-all duration-200 group-hover:-translate-y-0.5" style="display: inline-flex !important; align-items: center !important; text-decoration: none !important;">
                                View Shopping Cart <i class="fa-solid fa-arrow-right text-[9px] group-hover:translate-x-1 transition-transform"></i>
                            </a>
                        </div>

                        <!-- Wishlist Card -->
                        <div class="group relative bg-white border border-slate-200/80 rounded-2xl p-5 shadow-2xs hover:shadow-md hover:border-slate-300 transition-all duration-300 flex flex-col justify-between overflow-hidden">
                            <div class="relative z-10">
                                <div style="display: flex !important; align-items: center !important; justify-content: space-between !important;" class="mb-3">
                                    <div style="display: flex !important; align-items: center !important; gap: 10px !important;">
                                        <div class="w-9 h-9 rounded-xl bg-primary/10 border border-primary/20 flex items-center justify-center transition-colors" style="display: flex !important; align-items: center !important; justify-content: center !important;">
                                            <i class="fa-solid fa-heart text-primary text-sm transition-colors"></i>
                                        </div>
                                        <h5 class="text-xs font-extrabold text-slate-900 uppercase tracking-wider" style="margin: 0 !important; padding: 0 !important;">My Wishlist</h5>
                                    </div>
                                    <span class="text-[8px] font-extrabold text-primary bg-primary/10 px-2 py-0.5 rounded border border-primary/20 uppercase tracking-wider">Saved Items</span>
                                </div>
                                <p class="text-xs text-slate-500 leading-relaxed mb-4" style="margin: 0 0 16px 0 !important;">Browse your saved favorite dresses & accessories, check stock availability, and move them to cart.</p>
                            </div>
                            <a href="{{ url('/wishlist') }}" class="relative z-10 inline-flex items-center gap-2 bg-primary hover:bg-primary-dark text-white shadow-xs px-4 py-2.5 rounded-xl text-xs font-extrabold w-fit transition-all duration-200 group-hover:-translate-y-0.5" style="display: inline-flex !important; align-items: center !important; text-decoration: none !important;">
                                View Wishlist <i class="fa-solid fa-arrow-right text-[9px] group-hover:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Recent Orders Section -->
                    <div>
                        <div class="mb-3.5 border-b border-slate-100 pb-2.5" style="display: flex !important; align-items: center !important; justify-content: space-between !important;">
                            <div style="display: flex !important; align-items: center !important; gap: 8px !important;">
                                <i class="fa-solid fa-clock-rotate-left text-slate-400 text-xs"></i>
                                <h2 class="text-sm font-extrabold uppercase tracking-wider text-slate-900" style="font-family: 'Outfit', sans-serif; margin: 0 !important;">Recent Orders</h2>
                            </div>
                            <a href="{{ url('/orders') }}" class="text-[10px] text-primary font-extrabold hover:text-primary-dark transition-colors uppercase tracking-widest flex items-center gap-1" style="text-decoration: none !important; display: flex !important; align-items: center !important;">
                                View All Orders <i class="fa-solid fa-arrow-right text-[8px] ml-1"></i>
                            </a>
                        </div>
                        
                        @if($orders->isEmpty())
                            <div class="p-8 text-center bg-white border border-slate-200/80 rounded-2xl shadow-xs">
                                <div class="w-12 h-12 rounded-full bg-slate-50 border border-slate-100 flex items-center justify-center mx-auto mb-3" style="display: flex !important; align-items: center !important; justify-content: center !important;">
                                    <i class="fa-solid fa-basket-shopping text-slate-300 text-lg"></i>
                                </div>
                                <h4 class="font-bold text-slate-800 text-sm mb-1" style="margin: 0 0 4px 0 !important;">You haven't placed any orders yet.</h4>
                                <p class="text-slate-400 text-xs mb-4" style="margin: 0 0 16px 0 !important;">Your order history is currently empty.</p>
                                <a href="{{ url('/shop') }}" class="inline-flex items-center justify-center bg-primary hover:bg-primary-dark text-white px-5 py-2.5 rounded-xl text-xs font-bold transition-colors shadow-xs" style="text-decoration: none !important; display: inline-flex !important;">
                                     Explore Shop Catalog
                                </a>
                            </div>
                        @else
                            <div class="space-y-3.5">
                                @foreach($orders->take(5) as $order)
                                    <div x-data="{ open: false }" class="bg-white border border-slate-200/80 rounded-2xl overflow-hidden shadow-2xs hover:shadow-md transition-all duration-300">
                                        <!-- Header Row -->
                                        <div @click="open = !open" class="px-4 py-3 flex flex-col sm:flex-row sm:items-center justify-between gap-3 cursor-pointer hover:bg-slate-50/50 transition-colors select-none">
                                            @php
                                                $statusConfig = [
                                                    'pending' => ['bg' => 'bg-amber-50 text-amber-800 border-amber-300', 'dot' => 'bg-amber-500', 'pulse' => true],
                                                    'processing' => ['bg' => 'bg-blue-50 text-blue-800 border-blue-300', 'dot' => 'bg-blue-500', 'pulse' => true],
                                                    'shipped' => ['bg' => 'bg-indigo-50 text-indigo-800 border-indigo-300', 'dot' => 'bg-indigo-500', 'pulse' => true],
                                                    'completed' => ['bg' => 'bg-emerald-50 text-emerald-800 border-emerald-300', 'dot' => 'bg-emerald-500', 'pulse' => false],
                                                    'cancelled' => ['bg' => 'bg-rose-50 text-rose-800 border-rose-300', 'dot' => 'bg-rose-500', 'pulse' => false],
                                                    'failed' => ['bg' => 'bg-red-50 text-red-800 border-red-300', 'dot' => 'bg-red-500', 'pulse' => false]
                                                ];
                                                $config = $statusConfig[$order->status] ?? ['bg' => 'bg-slate-50 text-slate-800 border-slate-300', 'dot' => 'bg-slate-500', 'pulse' => false];
                                            @endphp
                                            
                                            <div class="flex items-center justify-between sm:justify-start gap-3 w-full sm:w-auto">
                                                <div style="display: flex !important; align-items: center !important; gap: 12px !important;">
                                                    <div class="h-9 w-9 rounded-xl bg-primary/10 flex items-center justify-center text-primary" style="display: flex !important; align-items: center !important; justify-content: center !important;">
                                                        <i class="fa-solid fa-box-open text-xs"></i>
                                                    </div>
                                                    <div class="flex flex-col">
                                                        <span class="font-extrabold text-slate-900 text-xs tracking-tight">#{{ $order->order_number }}</span>
                                                        <span class="text-[10px] text-slate-400 mt-0.5 flex items-center gap-1 font-semibold">
                                                             <i class="fa-regular fa-calendar text-[9px] mr-1"></i> {{ $order->created_at->format('M d, Y') }}
                                                        </span>
                                                    </div>
                                                </div>

                                                <!-- Mobile status pill -->
                                                <div class="sm:hidden text-right flex items-center gap-2">
                                                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[9px] font-bold border {{ $config['bg'] }}">
                                                         {{ ucfirst($order->status) }}
                                                    </span>
                                                    <i class="fa-solid fa-chevron-down text-slate-400 text-[10px] transition-transform duration-300" :class="open ? 'rotate-180 text-primary' : ''"></i>
                                                </div>
                                            </div>

                                            <div class="flex items-center justify-between sm:justify-end gap-4 w-full sm:w-auto mt-1 sm:mt-0 border-t border-slate-100 pt-2 sm:pt-0 sm:border-0" style="display: flex !important; align-items: center !important;">
                                                <!-- Product Avatars -->
                                                <div class="flex items-center -space-x-2 overflow-hidden" style="display: flex !important; align-items: center !important;">
                                                    @foreach($order->items->take(4) as $item)
                                                        @if($item->product)
                                                            <div class="w-7 h-7 rounded-full border border-white bg-slate-50 shadow-2xs overflow-hidden" title="{{ $item->product_name }}" style="display: flex !important; align-items: center !important; justify-content: center !important;">
                                                                <img src="{{ $item->product->primary_image_url }}" alt="{{ $item->product_name }}" class="w-full h-full object-contain">
                                                            </div>
                                                        @else
                                                            <div class="w-7 h-7 rounded-full border border-white bg-slate-50 shadow-2xs text-slate-400" style="display: flex !important; align-items: center !important; justify-content: center !important;">
                                                                <i class="fa-solid fa-box text-[8px]"></i>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                    @if($order->items->count() > 4)
                                                        <span class="w-7 h-7 rounded-full border border-white bg-slate-100 text-[8px] font-bold text-slate-600 shadow-2xs" style="display: flex !important; align-items: center !important; justify-content: center !important;">
                                                             +{{ $order->items->count() - 4 }}
                                                        </span>
                                                    @endif
                                                </div>

                                                <div style="display: flex !important; align-items: center !important; gap: 12px !important;">
                                                    <div class="text-right">
                                                         <span class="text-xs font-extrabold text-slate-900">&#8377;{{ number_format($order->total_amount, 2) }}</span>
                                                    </div>
                                                    <span class="hidden sm:inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[9px] font-bold border {{ $config['bg'] }}" style="display: inline-flex !important; align-items: center !important;">
                                                         <span class="relative flex h-1.5 w-1.5 mr-1">
                                                             @if($config['pulse'])
                                                                 <span class="animate-ping absolute inline-flex h-full w-full rounded-full opacity-75 {{ $config['dot'] }}"></span>
                                                             @endif
                                                             <span class="relative inline-flex rounded-full h-1.5 w-1.5 {{ $config['dot'] }}"></span>
                                                         </span>
                                                         {{ ucfirst($order->status) }}
                                                    </span>
                                                    <i class="hidden sm:block fa-solid fa-chevron-down text-slate-400 text-xs transition-transform duration-300" :class="open ? 'rotate-180 text-primary' : ''"></i>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Details Accordion -->
                                        <div x-show="open" x-transition class="border-t border-slate-100 bg-slate-50/50 px-4 py-3.5" style="display: none;">
                                            <div class="mb-3.5">
                                                <div style="display: flex !important; align-items: center !important; justify-content: space-between !important;" class="mb-2.5 border-b border-slate-200/60 pb-2">
                                                    <span class="text-[10px] font-extrabold text-slate-700 uppercase tracking-wider flex items-center gap-1.5" style="display: flex !important; align-items: center !important;">
                                                        <i class="fa-solid fa-basket-shopping text-slate-400 text-xs mr-1"></i> Order Items
                                                    </span>
                                                    <div x-data="{ copied: false, text: '#{{ $order->order_number }}' }" class="flex items-center gap-1.5 text-[10px] text-slate-500">
                                                        <span>Order ID: <strong class="text-slate-900 font-bold" x-text="text"></strong></span>
                                                        <button @click.stop="navigator.clipboard.writeText(text); copied = true; setTimeout(() => copied = false, 2000)" class="text-slate-400 hover:text-primary transition-colors p-1 cursor-pointer" title="Copy Order ID">
                                                            <i class="fa-regular fa-copy text-[10px]" x-show="!copied"></i>
                                                            <i class="fa-solid fa-check text-[10px] text-emerald-600" x-show="copied"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="divide-y divide-slate-100 space-y-2">
                                                    @foreach($order->items as $item)
                                                        <div style="display: flex !important; align-items: center !important; justify-content: space-between !important;" class="py-1.5 first:pt-0 last:pb-0">
                                                            <div style="display: flex !important; align-items: center !important; gap: 12px !important;">
                                                                @if($item->product)
                                                                    <div class="w-9 h-9 rounded-xl bg-white border border-slate-200 p-1 flex flex-shrink-0 items-center justify-center shadow-2xs overflow-hidden" style="display: flex !important; align-items: center !important; justify-content: center !important;">
                                                                        <img src="{{ $item->product->primary_image_url }}" alt="{{ $item->product_name }}" class="w-full h-full object-contain">
                                                                    </div>
                                                                @else
                                                                    <div class="w-9 h-9 rounded-xl bg-slate-100 border border-slate-200 flex items-center justify-center flex-shrink-0 text-slate-400" style="display: flex !important; align-items: center !important; justify-content: center !important;">
                                                                        <i class="fa-solid fa-box text-xs"></i>
                                                                    </div>
                                                                @endif
                                                                <div>
                                                                    <p class="text-xs font-bold text-slate-900 leading-tight" style="margin: 0 !important;">{{ $item->product_name }}</p>
                                                                    <p class="text-[10px] text-slate-500 font-semibold mt-0.5" style="margin: 2px 0 0 0 !important;">{{ $item->quantity }} × &#8377;{{ number_format($item->unit_price, 2) }}</p>
                                                                </div>
                                                            </div>
                                                            <span class="text-xs font-extrabold text-slate-900">&#8377;{{ number_format($item->total_price, 2) }}</span>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>

                                            <!-- Payment & Delivery Breakdown Grid -->
                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 border-t border-slate-200/60 pt-3 text-xs">
                                                <div>
                                                    <h6 class="text-[10px] font-extrabold text-slate-400 uppercase tracking-wider mb-2 flex items-center gap-1.5" style="display: flex !important; align-items: center !important;">
                                                        <i class="fa-solid fa-credit-card text-[10px] text-primary mr-1"></i> Payment Details
                                                    </h6>
                                                    <div class="space-y-1.5 text-xs text-slate-700">
                                                        <div style="display: flex !important; justify-content: space-between !important;">
                                                            <span class="text-slate-500 text-[10px]">Payment Method</span>
                                                            <span class="font-extrabold text-slate-800 uppercase text-[9px] bg-white px-2 py-0.5 rounded border border-slate-200">
                                                                {{ $order->payment_method === 'cod' ? 'Cash on Delivery (COD)' : strtoupper($order->payment_method) }}
                                                            </span>
                                                        </div>
                                                        <div style="display: flex !important; justify-content: space-between !important;">
                                                            <span class="text-slate-500 text-[10px]">Payment Status</span>
                                                            <span class="font-bold text-[9px] uppercase px-2 py-0.5 rounded border {{ $order->payment_status === 'completed' ? 'bg-emerald-50 text-emerald-800 border-emerald-200' : 'bg-amber-50 text-amber-800 border-amber-200' }}">
                                                                {{ $order->payment_status }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div>
                                                    <h6 class="text-[10px] font-extrabold text-slate-400 uppercase tracking-wider mb-2 flex items-center gap-1.5" style="display: flex !important; align-items: center !important;">
                                                        @if($order->delivery_type === 'self_pickup')
                                                            <i class="fa-solid fa-house-chimney text-[10px] text-amber-600 mr-1"></i> Pickup Information
                                                        @else
                                                            <i class="fa-solid fa-truck-fast text-[10px] text-primary mr-1"></i> Shipping Information
                                                        @endif
                                                    </h6>
                                                    <div class="text-[10px] text-slate-700 space-y-1.5">
                                                        <div style="display: flex !important; justify-content: space-between !important;">
                                                            <span class="text-slate-500 text-[10px]">Delivery Type</span>
                                                            <span class="font-extrabold text-right uppercase text-[9px] px-2 py-0.5 rounded-full {{ $order->delivery_type === 'self_pickup' ? 'bg-amber-50 text-amber-700 border border-amber-200' : 'bg-blue-50 text-blue-700 border border-blue-200' }}">
                                                                {{ $order->delivery_type === 'self_pickup' ? 'Self Pickup' : 'Online Shipping' }}
                                                            </span>
                                                        </div>
                                                        @if($order->delivery_type !== 'self_pickup')
                                                            <div style="display: flex !important; justify-content: space-between !important;">
                                                                <span class="text-slate-500 text-[10px]">Recipient</span>
                                                                <span class="font-extrabold text-slate-900 text-right">{{ $order->shipping_name }}</span>
                                                            </div>
                                                        @endif
                                                        <div style="display: flex !important; justify-content: space-between !important; gap: 8px !important; align-items: flex-start !important;">
                                                            <span class="text-slate-500 text-[10px] flex-shrink-0">Address</span>
                                                            <span class="font-bold text-slate-800 text-right leading-normal break-words max-w-[200px]">
                                                                @if($order->shipping_address)
                                                                    {{ $order->shipping_address }}, {{ $order->shipping_city }}, {{ $order->shipping_state }} - {{ $order->shipping_zip }}
                                                                @else
                                                                    {{ $order->shipping_city }} {{ $order->shipping_state ? ', ' . $order->shipping_state : '' }}
                                                                @endif
                                                            </span>
                                                        </div>
                                                        @if($order->delivery_type !== 'self_pickup' && $order->shipping_phone)
                                                            <div style="display: flex !important; justify-content: space-between !important;">
                                                                <span class="text-slate-500 text-[10px]">Contact Phone</span>
                                                                <span class="font-extrabold text-slate-900 text-right">{{ $order->shipping_phone }}</span>
                                                            </div>
                                                        @endif

                                                        @if($order->delivery_type === 'online_delivery' && $order->ups_tracking_number)
                                                            <div class="pt-2 border-t border-slate-200/60 space-y-1">
                                                                <div style="display: flex !important; justify-content: space-between !important; align-items: center !important;">
                                                                    <span class="text-slate-500 text-[10px]">UPS Tracking</span>
                                                                    <span class="font-mono font-bold text-slate-800">{{ $order->ups_tracking_number }}</span>
                                                                </div>
                                                                <a href="https://www.ups.com/track?tracknum={{ $order->ups_tracking_number }}" target="_blank"
                                                                   class="w-full text-center block text-white font-extrabold text-[9px] py-1.5 rounded-lg transition bg-primary hover:bg-primary-dark" style="text-decoration: none !important;">
                                                                    <i class="fa-solid fa-magnifying-glass text-[8px] mr-1"></i> Track Package on UPS.com
                                                                </a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Return Request Button/Form -->
                                            @if($order->status === 'completed' && $order->return_status === null)
                                                <div class="mt-4 pt-3 border-t border-slate-200/60" x-data="{ showReturnForm: false }">
                                                    <button type="button" @click.stop="showReturnForm = !showReturnForm" 
                                                            class="inline-flex items-center gap-1.5 bg-rose-50 hover:bg-rose-100 text-rose-700 border border-rose-200 px-3.5 py-1.5 rounded-xl text-xs font-bold transition-all cursor-pointer" style="display: inline-flex !important; align-items: center !important;">
                                                        <i class="fa-solid fa-arrow-rotate-left mr-1"></i>
                                                        <span>Request Return / Replacement</span>
                                                    </button>

                                                    <form x-show="showReturnForm" @click.stop="" action="{{ route('orders.return', $order->id) }}" method="POST" class="mt-3 bg-white border border-rose-200 rounded-xl p-4 space-y-3 shadow-2xs">
                                                        @csrf
                                                        <div>
                                                            <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Reason for Return <span class="text-red-500">*</span></label>
                                                            <select name="return_reason" required class="w-full border border-slate-200 focus:ring-1 focus:ring-rose-500 focus:border-rose-500 rounded-lg text-xs px-3 py-2 bg-slate-50">
                                                                <option value="">Select a reason</option>
                                                                <option value="Damaged Goods">Damaged / Defective Goods</option>
                                                                <option value="Incorrect Item">Incorrect Item Shipped</option>
                                                                <option value="Short Shipment">Short Shipment (Missing Units)</option>
                                                                <option value="Quality Issues">Quality Not Satisfactory</option>
                                                                <option value="Other">Other (Specify in comments)</option>
                                                            </select>
                                                        </div>
                                                        <div>
                                                            <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Comments / Details <span class="text-red-500">*</span></label>
                                                            <textarea name="return_comments" rows="2" required placeholder="Describe the issue in detail..." class="w-full bg-slate-50 border border-slate-200 rounded-lg px-3 py-2 text-xs text-gray-900 shadow-2xs focus:outline-none focus:border-rose-500 focus:ring-1 focus:ring-rose-500/20 transition"></textarea>
                                                        </div>
                                                        <div style="display: flex !important; gap: 8px !important;">
                                                            <button type="submit" class="bg-rose-600 hover:bg-rose-700 text-white font-bold px-4 py-2 rounded-lg text-xs transition cursor-pointer">Submit Request</button>
                                                            <button type="button" @click="showReturnForm = false" class="bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold px-4 py-2 rounded-lg text-xs transition cursor-pointer">Cancel</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
