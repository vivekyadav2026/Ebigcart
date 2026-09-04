@extends('layouts.frontend')

@section('title', 'My Account - Dashboard')

@section('content')
<style>
    /* Scoped Customer Portal CSS to override any legacy styles completely */
    .cp-wrapper {
        font-family: 'Outfit', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif !important;
        background-color: #f8fafc !important;
        color: #1e293b !important;
        padding: 24px 0 48px 0 !important;
        line-height: 1.5 !important;
    }
    .cp-wrapper * {
        box-sizing: border-box !important;
    }
    .cp-container {
        max-width: 1240px !important;
        margin: 0 auto !important;
        padding: 0 16px !important;
    }
    .cp-grid-main {
        display: grid !important;
        grid-template-columns: 280px 1fr !important;
        gap: 24px !important;
        align-items: start !important;
    }
    @media (max-width: 991px) {
        .cp-grid-main {
            grid-template-columns: 1fr !important;
        }
    }
    .cp-card {
        background: #ffffff !important;
        border: 1px solid #e2e8f0 !important;
        border-radius: 16px !important;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04) !important;
        overflow: hidden !important;
    }
    .cp-card-p {
        padding: 20px !important;
    }
    /* Hero Banner */
    .cp-hero {
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #334155 100%) !important;
        color: #ffffff !important;
        border-radius: 20px !important;
        padding: 24px 28px !important;
        position: relative !important;
        overflow: hidden !important;
        box-shadow: 0 10px 25px -5px rgba(15, 23, 42, 0.25) !important;
        border: 1px solid rgba(255, 255, 255, 0.1) !important;
    }
    .cp-hero-flex {
        display: flex !important;
        align-items: center !important;
        justify-content: space-between !important;
        flex-wrap: wrap !important;
        gap: 20px !important;
        position: relative !important;
        z-index: 2 !important;
    }
    .cp-hero-user {
        display: flex !important;
        align-items: center !important;
        gap: 16px !important;
    }
    .cp-avatar-large {
        width: 64px !important;
        height: 64px !important;
        min-width: 64px !important;
        background: linear-gradient(135deg, #b71c1c 0%, #e11d48 100%) !important;
        color: #ffffff !important;
        border-radius: 16px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        font-size: 24px !important;
        font-weight: 800 !important;
        box-shadow: 0 4px 12px rgba(183, 28, 28, 0.4) !important;
        border: 2px solid rgba(255, 255, 255, 0.2) !important;
    }
    .cp-hero-kpis {
        display: flex !important;
        align-items: center !important;
        gap: 12px !important;
    }
    .cp-hero-pill {
        background: rgba(255, 255, 255, 0.08) !important;
        border: 1px solid rgba(255, 255, 255, 0.15) !important;
        backdrop-filter: blur(8px) !important;
        border-radius: 14px !important;
        padding: 10px 18px !important;
        text-align: center !important;
        min-width: 110px !important;
    }
    .cp-hero-pill-label {
        font-size: 10px !important;
        font-weight: 700 !important;
        text-transform: uppercase !important;
        letter-spacing: 0.05em !important;
        color: #94a3b8 !important;
        display: block !important;
        margin-bottom: 2px !important;
    }
    .cp-hero-pill-val {
        font-size: 16px !important;
        font-weight: 800 !important;
        color: #ffffff !important;
        display: block !important;
    }
    /* Stats Grid */
    .cp-stats-grid {
        display: grid !important;
        grid-template-columns: repeat(4, 1fr) !important;
        gap: 16px !important;
    }
    @media (max-width: 991px) {
        .cp-stats-grid {
            grid-template-columns: repeat(2, 1fr) !important;
        }
    }
    @media (max-width: 575px) {
        .cp-stats-grid {
            grid-template-columns: 1fr !important;
        }
    }
    .cp-stat-card {
        background: #ffffff !important;
        border: 1px solid #e2e8f0 !important;
        border-radius: 16px !important;
        padding: 18px !important;
        display: flex !important;
        flex-direction: column !important;
        justify-content: space-between !important;
        transition: all 0.2s ease !important;
        box-shadow: 0 1px 3px rgba(0,0,0,0.03) !important;
    }
    .cp-stat-card:hover {
        border-color: #cbd5e1 !important;
        box-shadow: 0 6px 15px rgba(0,0,0,0.06) !important;
        transform: translateY(-2px) !important;
    }
    .cp-stat-top {
        display: flex !important;
        align-items: center !important;
        justify-content: space-between !important;
        margin-bottom: 12px !important;
    }
    .cp-stat-title {
        font-size: 11px !important;
        font-weight: 700 !important;
        text-transform: uppercase !important;
        letter-spacing: 0.05em !important;
        color: #64748b !important;
        margin: 0 !important;
    }
    .cp-stat-icon {
        width: 36px !important;
        height: 36px !important;
        border-radius: 10px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        font-size: 14px !important;
    }
    .cp-stat-num {
        font-size: 26px !important;
        font-weight: 800 !important;
        color: #0f172a !important;
        line-height: 1 !important;
        margin: 0 0 8px 0 !important;
    }
    .cp-stat-badge {
        display: inline-flex !important;
        align-items: center !important;
        gap: 6px !important;
        font-size: 11px !important;
        font-weight: 700 !important;
        padding: 3px 8px !important;
        border-radius: 6px !important;
        text-decoration: none !important;
    }
    /* Actions Grid */
    .cp-actions-grid {
        display: grid !important;
        grid-template-columns: repeat(2, 1fr) !important;
        gap: 16px !important;
    }
    @media (max-width: 640px) {
        .cp-actions-grid {
            grid-template-columns: 1fr !important;
        }
    }
    .cp-action-tile {
        background: #ffffff !important;
        border: 1px solid #e2e8f0 !important;
        border-radius: 16px !important;
        padding: 18px !important;
        display: flex !important;
        align-items: center !important;
        gap: 16px !important;
        text-decoration: none !important;
        transition: all 0.2s ease !important;
        box-shadow: 0 1px 3px rgba(0,0,0,0.03) !important;
    }
    .cp-action-tile:hover {
        border-color: #b71c1c !important;
        box-shadow: 0 6px 16px rgba(183, 28, 28, 0.08) !important;
        transform: translateY(-2px) !important;
    }
    .cp-action-icon {
        width: 46px !important;
        height: 46px !important;
        min-width: 46px !important;
        border-radius: 12px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        font-size: 18px !important;
        transition: all 0.2s ease !important;
    }
    /* Two-col overview */
    .cp-two-col {
        display: grid !important;
        grid-template-columns: repeat(2, 1fr) !important;
        gap: 16px !important;
    }
    @media (max-width: 768px) {
        .cp-two-col {
            grid-template-columns: 1fr !important;
        }
    }
    /* Order Item Card */
    .cp-order-card {
        border: 1px solid #e2e8f0 !important;
        border-radius: 14px !important;
        background: #ffffff !important;
        margin-bottom: 12px !important;
        overflow: hidden !important;
        transition: all 0.2s ease !important;
    }
    .cp-order-card:hover {
        border-color: #cbd5e1 !important;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05) !important;
    }
    .cp-order-head {
        padding: 14px 18px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: space-between !important;
        flex-wrap: wrap !important;
        gap: 12px !important;
        cursor: pointer !important;
        background: #f8fafc !important;
        border-bottom: 1px solid #e2e8f0 !important;
    }
</style>

<div class="cp-wrapper">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Flash Alert Messages -->
        @if(session('success'))
            <div style="background: #ecfdf5; border: 1px solid #a7f3d0; color: #065f46; padding: 14px 18px; border-radius: 12px; margin-bottom: 20px; display: flex; align-items: center; justify-content: space-between; gap: 12px;">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <i class="fa-solid fa-circle-check" style="font-size: 16px; color: #059669;"></i>
                    <span style="font-size: 13px; font-weight: 600;">{{ session('success') }}</span>
                </div>
                <button type="button" onclick="this.parentElement.remove()" style="background: none; border: none; color: #059669; cursor: pointer; font-size: 14px;">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        @endif

        @if(session('error'))
            <div style="background: #fef2f2; border: 1px solid #fecaca; color: #991b1b; padding: 14px 18px; border-radius: 12px; margin-bottom: 20px; display: flex; align-items: center; justify-content: space-between; gap: 12px;">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <i class="fa-solid fa-circle-exclamation" style="font-size: 16px; color: #dc2626;"></i>
                    <span style="font-size: 13px; font-weight: 600;">{{ session('error') }}</span>
                </div>
                <button type="button" onclick="this.parentElement.remove()" style="background: none; border: none; color: #dc2626; cursor: pointer; font-size: 14px;">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        @endif

        <!-- Breadcrumb & Top Bar -->
        <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px; margin-bottom: 20px; padding-bottom: 14px; border-bottom: 1px solid #e2e8f0;">
            <div>
                <div style="font-size: 12px; font-weight: 700; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 4px; display: flex; align-items: center; gap: 8px;">
                    <a href="{{ url('/') }}" style="color: #64748b; text-decoration: none;"><i class="fa-solid fa-house" style="font-size: 11px;"></i> Home</a>
                    <span style="color: #cbd5e1;">/</span>
                    <span style="color: #b71c1c;">My Account</span>
                </div>
                <h1 style="font-size: 24px; font-weight: 800; color: #0f172a; margin: 0; letter-spacing: -0.02em;">
                    Customer Dashboard
                </h1>
            </div>

            <div style="display: flex; align-items: center; gap: 10px;">
                <a href="{{ url('/shop') }}" style="display: inline-flex; align-items: center; gap: 8px; background: #ffffff; color: #334155; border: 1px solid #cbd5e1; padding: 8px 16px; border-radius: 10px; font-size: 12px; font-weight: 700; text-decoration: none; transition: all 0.2s;">
                    <i class="fa-solid fa-store" style="color: #b71c1c;"></i> Browse Shop
                </a>
                <a href="{{ url('/cart') }}" style="display: inline-flex; align-items: center; gap: 8px; background: #b71c1c; color: #ffffff; border: 1px solid #b71c1c; padding: 8px 16px; border-radius: 10px; font-size: 12px; font-weight: 700; text-decoration: none; box-shadow: 0 2px 6px rgba(183, 28, 28, 0.25);">
                    <i class="fa-solid fa-bag-shopping"></i> My Cart ({{ $cartCount }})
                </a>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row gap-6 items-start">
            
            <!-- Sidebar -->
            @include('frontend.partials.customer_sidebar')

            <!-- Main Content -->
            <div class="w-full lg:w-3/4" style="display: flex; flex-direction: column; gap: 20px;">

                <!-- 1. Hero Profile Banner -->
                <div class="cp-hero">
                    <div class="cp-hero-flex">
                        <!-- User Info -->
                        <div class="cp-hero-user">
                            <div class="cp-avatar-large">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <div>
                                <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 6px; flex-wrap: wrap;">
                                    <span style="background: #b71c1c; color: #ffffff; font-size: 10px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.06em; padding: 2px 8px; border-radius: 6px;">
                                        Verified Customer
                                    </span>
                                    <span style="background: rgba(255,255,255,0.12); color: #cbd5e1; font-size: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.04em; padding: 2px 8px; border-radius: 6px; border: 1px solid rgba(255,255,255,0.1);">
                                        Joined {{ Auth::user()->created_at ? Auth::user()->created_at->format('M Y') : 'Member' }}
                                    </span>
                                </div>
                                <h2 style="font-size: 22px; font-weight: 800; color: #ffffff; margin: 0 0 4px 0; letter-spacing: -0.01em;">
                                    Hello, {{ Auth::user()->name }}! 👋
                                </h2>
                                <p style="font-size: 12px; color: #94a3b8; margin: 0; display: flex; align-items: center; gap: 6px;">
                                    <i class="fa-regular fa-envelope" style="color: #cbd5e1;"></i> {{ Auth::user()->email }}
                                    @if(Auth::user()->phone)
                                        <span style="color: #64748b;">•</span>
                                        <i class="fa-solid fa-phone" style="color: #cbd5e1;"></i> {{ Auth::user()->phone }}
                                    @endif
                                </p>
                            </div>
                        </div>

                        <!-- Right Stats Summary -->
                        <div class="cp-hero-kpis">
                            <div class="cp-hero-pill">
                                <span class="cp-hero-pill-label">Total Spent</span>
                                <span class="cp-hero-pill-val" style="color: #fbbf24;">&#8377;{{ number_format($orders->where('payment_status', 'completed')->sum('total_amount'), 0) }}</span>
                            </div>
                            <div class="cp-hero-pill">
                                <span class="cp-hero-pill-label">Total Orders</span>
                                <span class="cp-hero-pill-val">{{ count($orders) }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 2. 4 Stat KPI Cards -->
                <div class="cp-stats-grid">
                    <!-- Total Orders -->
                    <div class="cp-stat-card">
                        <div class="cp-stat-top">
                            <span class="cp-stat-title">Total Orders</span>
                            <div class="cp-stat-icon" style="background: #fee2e2; color: #b71c1c;">
                                <i class="fa-solid fa-box"></i>
                            </div>
                        </div>
                        <div>
                            <div class="cp-stat-num">{{ count($orders) }}</div>
                            <span class="cp-stat-badge" style="background: #ecfdf5; color: #065f46;">
                                <i class="fa-solid fa-circle-check"></i> {{ $orders->where('status', 'completed')->count() }} Delivered
                            </span>
                        </div>
                    </div>

                    <!-- Active In-Progress -->
                    <div class="cp-stat-card">
                        <div class="cp-stat-top">
                            <span class="cp-stat-title">In Progress</span>
                            <div class="cp-stat-icon" style="background: #fef3c7; color: #d97706;">
                                <i class="fa-solid fa-truck-fast"></i>
                            </div>
                        </div>
                        <div>
                            <div class="cp-stat-num">{{ $activeOrders->count() }}</div>
                            @if($activeOrders->count() > 0)
                                <span class="cp-stat-badge" style="background: #fffbeb; color: #b45309;">
                                    <i class="fa-solid fa-circle-dot" style="color: #f59e0b;"></i> Active Delivery
                                </span>
                            @else
                                <span class="cp-stat-badge" style="background: #f1f5f9; color: #475569;">
                                    <i class="fa-solid fa-check-double"></i> All Caught Up
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Wishlist -->
                    <div class="cp-stat-card">
                        <div class="cp-stat-top">
                            <span class="cp-stat-title">My Wishlist</span>
                            <div class="cp-stat-icon" style="background: #fce7f3; color: #db2777;">
                                <i class="fa-solid fa-heart"></i>
                            </div>
                        </div>
                        <div>
                            <div class="cp-stat-num">{{ $wishlistCount }}</div>
                            <a href="{{ url('/wishlist') }}" class="cp-stat-badge" style="background: #fdf2f8; color: #be185d;">
                                View Items <i class="fa-solid fa-arrow-right" style="font-size: 9px;"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Address Book -->
                    <div class="cp-stat-card">
                        <div class="cp-stat-top">
                            <span class="cp-stat-title">Address Book</span>
                            <div class="cp-stat-icon" style="background: #e0e7ff; color: #4f46e5;">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                        </div>
                        <div>
                            <div class="cp-stat-num">{{ count($addresses) }}</div>
                            <a href="{{ url('/addresses') }}" class="cp-stat-badge" style="background: #eef2ff; color: #4338ca;">
                                Manage <i class="fa-solid fa-arrow-right" style="font-size: 9px;"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- 3. Active Order Pipeline Tracker (If user has pending/processing/shipped order) -->
                @if($latestActiveOrder)
                    <div class="cp-card" style="border-color: #fde68a; background: linear-gradient(to right, #fffbeb, #ffffff);">
                        <div class="cp-card-p">
                            <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px; padding-bottom: 14px; border-bottom: 1px solid #fef3c7;">
                                <div style="display: flex; align-items: center; gap: 12px;">
                                    <div style="width: 40px; height: 40px; border-radius: 10px; background: #f59e0b; color: #ffffff; display: flex; align-items: center; justify-content: center; font-size: 16px;">
                                        <i class="fa-solid fa-box-open"></i>
                                    </div>
                                    <div>
                                        <div style="display: flex; align-items: center; gap: 8px;">
                                            <span style="background: #d97706; color: #ffffff; font-size: 9px; font-weight: 800; text-transform: uppercase; padding: 2px 6px; border-radius: 4px;">Live Tracking</span>
                                            <span style="font-size: 13px; font-weight: 800; color: #0f172a; font-family: monospace;">#{{ $latestActiveOrder->order_number }}</span>
                                        </div>
                                        <div style="font-size: 11px; color: #64748b; margin-top: 2px;">
                                            Placed on {{ $latestActiveOrder->created_at->format('M d, Y') }} • Total: <strong style="color: #0f172a;">&#8377;{{ number_format($latestActiveOrder->total_amount, 2) }}</strong>
                                        </div>
                                    </div>
                                </div>

                                <div style="display: flex; align-items: center; gap: 8px;">
                                    @if($latestActiveOrder->ups_tracking_number)
                                        <a href="https://www.ups.com/track?tracknum={{ $latestActiveOrder->ups_tracking_number }}" target="_blank" style="background: #d97706; color: #ffffff; padding: 6px 12px; border-radius: 8px; font-size: 11px; font-weight: 700; text-decoration: none;">
                                            <i class="fa-solid fa-truck-fast"></i> Track UPS
                                        </a>
                                    @endif
                                    <a href="{{ url('/orders') }}" style="background: #ffffff; border: 1px solid #cbd5e1; color: #334155; padding: 6px 12px; border-radius: 8px; font-size: 11px; font-weight: 700; text-decoration: none;">
                                        View Details
                                    </a>
                                </div>
                            </div>

                            @php
                                $step = match($latestActiveOrder->status) {
                                    'pending' => 1,
                                    'processing' => 2,
                                    'shipped' => 3,
                                    'completed' => 4,
                                    default => 1
                                };
                            @endphp
                            <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 8px; margin-top: 20px; text-align: center;">
                                <div>
                                    <div style="width: 32px; height: 32px; margin: 0 auto 6px auto; border-radius: 50%; background: {{ $step >= 1 ? '#d97706' : '#e2e8f0' }}; color: {{ $step >= 1 ? '#ffffff' : '#64748b' }}; display: flex; align-items: center; justify-content: center; font-size: 12px; font-weight: bold;">
                                        <i class="fa-solid fa-check"></i>
                                    </div>
                                    <div style="font-size: 11px; font-weight: 800; color: #0f172a; text-transform: uppercase;">1. Placed</div>
                                    <div style="font-size: 10px; color: #94a3b8;">{{ $latestActiveOrder->created_at->format('M d') }}</div>
                                </div>
                                <div>
                                    <div style="width: 32px; height: 32px; margin: 0 auto 6px auto; border-radius: 50%; background: {{ $step >= 2 ? '#d97706' : '#e2e8f0' }}; color: {{ $step >= 2 ? '#ffffff' : '#64748b' }}; display: flex; align-items: center; justify-content: center; font-size: 12px; font-weight: bold;">
                                        <i class="fa-solid fa-gear {{ $step == 2 ? 'fa-spin' : '' }}"></i>
                                    </div>
                                    <div style="font-size: 11px; font-weight: 800; color: {{ $step >= 2 ? '#0f172a' : '#94a3b8' }}; text-transform: uppercase;">2. Processing</div>
                                    <div style="font-size: 10px; color: #94a3b8;">{{ $step >= 2 ? 'In Warehouse' : 'Pending' }}</div>
                                </div>
                                <div>
                                    <div style="width: 32px; height: 32px; margin: 0 auto 6px auto; border-radius: 50%; background: {{ $step >= 3 ? '#d97706' : '#e2e8f0' }}; color: {{ $step >= 3 ? '#ffffff' : '#64748b' }}; display: flex; align-items: center; justify-content: center; font-size: 12px; font-weight: bold;">
                                        <i class="fa-solid fa-truck-fast"></i>
                                    </div>
                                    <div style="font-size: 11px; font-weight: 800; color: {{ $step >= 3 ? '#0f172a' : '#94a3b8' }}; text-transform: uppercase;">3. Shipped</div>
                                    <div style="font-size: 10px; color: #94a3b8;">{{ $step >= 3 ? 'On Route' : 'Dispatched' }}</div>
                                </div>
                                <div>
                                    <div style="width: 32px; height: 32px; margin: 0 auto 6px auto; border-radius: 50%; background: {{ $step >= 4 ? '#059669' : '#e2e8f0' }}; color: {{ $step >= 4 ? '#ffffff' : '#64748b' }}; display: flex; align-items: center; justify-content: center; font-size: 12px; font-weight: bold;">
                                        <i class="fa-solid fa-house-chimney"></i>
                                    </div>
                                    <div style="font-size: 11px; font-weight: 800; color: {{ $step >= 4 ? '#0f172a' : '#94a3b8' }}; text-transform: uppercase;">4. Delivered</div>
                                    <div style="font-size: 10px; color: #94a3b8;">Final Destination</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- 4. Quick Actions (4 Action Tiles) -->
                <div>
                    <h3 style="font-size: 12px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.05em; color: #64748b; margin: 0 0 12px 0; display: flex; align-items: center; gap: 8px;">
                        <i class="fa-solid fa-compass" style="color: #b71c1c;"></i> Quick Actions & Services
                    </h3>

                    <div class="cp-actions-grid">
                        <!-- Action 1: Orders -->
                        <a href="{{ url('/orders') }}" class="cp-action-tile">
                            <div class="cp-action-icon" style="background: #fee2e2; color: #b71c1c;">
                                <i class="fa-solid fa-receipt"></i>
                            </div>
                            <div style="flex: 1; min-width: 0;">
                                <div style="display: flex; align-items: center; justify-content: space-between;">
                                    <h4 style="font-size: 14px; font-weight: 800; color: #0f172a; margin: 0;">Order History</h4>
                                    <i class="fa-solid fa-chevron-right" style="font-size: 11px; color: #cbd5e1;"></i>
                                </div>
                                <p style="font-size: 12px; color: #64748b; margin: 4px 0 0 0; line-height: 1.4;">
                                    Track shipments, view detailed invoice receipts, and request returns.
                                </p>
                            </div>
                        </a>

                        <!-- Action 2: Wishlist -->
                        <a href="{{ url('/wishlist') }}" class="cp-action-tile">
                            <div class="cp-action-icon" style="background: #fce7f3; color: #db2777;">
                                <i class="fa-solid fa-heart"></i>
                            </div>
                            <div style="flex: 1; min-width: 0;">
                                <div style="display: flex; align-items: center; justify-content: space-between;">
                                    <h4 style="font-size: 14px; font-weight: 800; color: #0f172a; margin: 0;">Saved Wishlist</h4>
                                    <i class="fa-solid fa-chevron-right" style="font-size: 11px; color: #cbd5e1;"></i>
                                </div>
                                <p style="font-size: 12px; color: #64748b; margin: 4px 0 0 0; line-height: 1.4;">
                                    Browse favorite dresses and ornaments. Add directly to cart.
                                </p>
                            </div>
                        </a>

                        <!-- Action 3: Addresses -->
                        <a href="{{ url('/addresses') }}" class="cp-action-tile">
                            <div class="cp-action-icon" style="background: #e0e7ff; color: #4f46e5;">
                                <i class="fa-solid fa-map-location-dot"></i>
                            </div>
                            <div style="flex: 1; min-width: 0;">
                                <div style="display: flex; align-items: center; justify-content: space-between;">
                                    <h4 style="font-size: 14px; font-weight: 800; color: #0f172a; margin: 0;">Shipping Addresses</h4>
                                    <i class="fa-solid fa-chevron-right" style="font-size: 11px; color: #cbd5e1;"></i>
                                </div>
                                <p style="font-size: 12px; color: #64748b; margin: 4px 0 0 0; line-height: 1.4;">
                                    Manage delivery destinations, set default shipping address.
                                </p>
                            </div>
                        </a>

                        <!-- Action 4: Account Settings -->
                        <a href="{{ route('profile.edit') }}" class="cp-action-tile">
                            <div class="cp-action-icon" style="background: #f3e8ff; color: #9333ea;">
                                <i class="fa-solid fa-user-gear"></i>
                            </div>
                            <div style="flex: 1; min-width: 0;">
                                <div style="display: flex; align-items: center; justify-content: space-between;">
                                    <h4 style="font-size: 14px; font-weight: 800; color: #0f172a; margin: 0;">Account Settings</h4>
                                    <i class="fa-solid fa-chevron-right" style="font-size: 11px; color: #cbd5e1;"></i>
                                </div>
                                <p style="font-size: 12px; color: #64748b; margin: 4px 0 0 0; line-height: 1.4;">
                                    Update personal information, change password and security.
                                </p>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- 5. Two-Col Glance (Address & Security) -->
                <div class="cp-two-col">
                    <!-- Default Shipping Address -->
                    <div class="cp-card">
                        <div class="cp-card-p" style="display: flex; flex-direction: column; justify-content: space-between; height: 100%;">
                            <div>
                                <div style="display: flex; align-items: center; justify-content: space-between; padding-bottom: 12px; border-bottom: 1px solid #f1f5f9; margin-bottom: 12px;">
                                    <div style="display: flex; align-items: center; gap: 8px;">
                                        <i class="fa-solid fa-truck-ramp-box" style="color: #b71c1c; font-size: 14px;"></i>
                                        <h4 style="font-size: 12px; font-weight: 800; text-transform: uppercase; color: #0f172a; margin: 0;">Primary Shipping Address</h4>
                                    </div>
                                    @if($defaultAddress)
                                        <span style="background: #ecfdf5; color: #065f46; border: 1px solid #a7f3d0; font-size: 9px; font-weight: 800; text-transform: uppercase; padding: 2px 6px; border-radius: 4px;">Default</span>
                                    @endif
                                </div>

                                @if($defaultAddress)
                                    <div style="font-size: 13px; color: #334155; line-height: 1.5;">
                                        <strong style="color: #0f172a; font-size: 14px;">{{ Auth::user()->name }}</strong>
                                        <p style="margin: 4px 0 2px 0;">
                                            {{ $defaultAddress->address }}@if($defaultAddress->address2), {{ $defaultAddress->address2 }}@endif
                                        </p>
                                        <p style="margin: 0 0 4px 0; color: #64748b;">
                                            {{ $defaultAddress->city }}, {{ $defaultAddress->state }} - <strong style="color: #0f172a;">{{ $defaultAddress->zip }}</strong>
                                        </p>
                                        <p style="margin: 6px 0 0 0; font-size: 12px; color: #64748b;">
                                            <i class="fa-solid fa-phone" style="color: #94a3b8; font-size: 11px;"></i> {{ $defaultAddress->phone }}
                                        </p>
                                    </div>
                                @else
                                    <div style="text-align: center; padding: 20px 0; color: #94a3b8; font-size: 12px;">
                                        <i class="fa-solid fa-location-crosshairs" style="font-size: 24px; margin-bottom: 6px; color: #cbd5e1; display: block;"></i>
                                        No default delivery address set yet.
                                    </div>
                                @endif
                            </div>

                            <div style="margin-top: 16px; padding-top: 12px; border-top: 1px solid #f1f5f9;">
                                <a href="{{ url('/addresses') }}" style="font-size: 12px; font-weight: 700; color: #b71c1c; text-decoration: none; display: flex; align-items: center; gap: 6px;">
                                    <i class="fa-solid fa-map-pin"></i> Manage All Addresses ({{ count($addresses) }})
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Profile & Security Summary -->
                    <div class="cp-card">
                        <div class="cp-card-p" style="display: flex; flex-direction: column; justify-content: space-between; height: 100%;">
                            <div>
                                <div style="display: flex; align-items: center; justify-content: space-between; padding-bottom: 12px; border-bottom: 1px solid #f1f5f9; margin-bottom: 12px;">
                                    <div style="display: flex; align-items: center; gap: 8px;">
                                        <i class="fa-solid fa-shield-halved" style="color: #059669; font-size: 14px;"></i>
                                        <h4 style="font-size: 12px; font-weight: 800; text-transform: uppercase; color: #0f172a; margin: 0;">Account & Security</h4>
                                    </div>
                                    <span style="background: #ecfdf5; color: #065f46; border: 1px solid #a7f3d0; font-size: 9px; font-weight: 800; text-transform: uppercase; padding: 2px 6px; border-radius: 4px;">Verified</span>
                                </div>

                                <div style="font-size: 12px;">
                                    <div style="display: flex; justify-content: space-between; padding: 6px 0; border-bottom: 1px solid #f8fafc;">
                                        <span style="color: #64748b;">Full Name</span>
                                        <strong style="color: #0f172a;">{{ Auth::user()->name }}</strong>
                                    </div>
                                    <div style="display: flex; justify-content: space-between; padding: 6px 0; border-bottom: 1px solid #f8fafc;">
                                        <span style="color: #64748b;">Email Address</span>
                                        <strong style="color: #0f172a;">{{ Auth::user()->email }}</strong>
                                    </div>
                                    <div style="display: flex; justify-content: space-between; padding: 6px 0; border-bottom: 1px solid #f8fafc;">
                                        <span style="color: #64748b;">Account Status</span>
                                        <span style="color: #059669; font-weight: 700;"><i class="fa-solid fa-circle-check"></i> Active</span>
                                    </div>
                                    <div style="display: flex; justify-content: space-between; padding: 6px 0;">
                                        <span style="color: #64748b;">Password</span>
                                        <span style="color: #94a3b8; font-family: monospace;">••••••••••••</span>
                                    </div>
                                </div>
                            </div>

                            <div style="margin-top: 16px; padding-top: 12px; border-top: 1px solid #f1f5f9;">
                                <a href="{{ route('profile.edit') }}" style="font-size: 12px; font-weight: 700; color: #b71c1c; text-decoration: none; display: flex; align-items: center; gap: 6px;">
                                    <i class="fa-solid fa-user-pen"></i> Edit Profile & Password
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 6. Recent Orders Section -->
                <div class="cp-card">
                    <div class="cp-card-p">
                        <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px; padding-bottom: 14px; border-bottom: 1px solid #e2e8f0; margin-bottom: 16px;">
                            <div style="display: flex; align-items: center; gap: 10px;">
                                <div style="width: 36px; height: 36px; border-radius: 10px; background: #fee2e2; color: #b71c1c; display: flex; align-items: center; justify-content: center; font-size: 14px;">
                                    <i class="fa-solid fa-clock-rotate-left"></i>
                                </div>
                                <div>
                                    <h3 style="font-size: 16px; font-weight: 800; color: #0f172a; margin: 0;">Recent Orders</h3>
                                    <p style="font-size: 11px; color: #64748b; margin: 2px 0 0 0;">Review your recent purchases & tracking status</p>
                                </div>
                            </div>

                            <a href="{{ url('/orders') }}" style="display: inline-flex; align-items: center; gap: 6px; background: #f8fafc; border: 1px solid #cbd5e1; color: #334155; padding: 6px 14px; border-radius: 8px; font-size: 12px; font-weight: 700; text-decoration: none;">
                                View All Orders <i class="fa-solid fa-arrow-right" style="font-size: 10px;"></i>
                            </a>
                        </div>

                        @if($orders->isEmpty())
                            <div style="text-align: center; padding: 36px 16px;">
                                <div style="width: 56px; height: 56px; border-radius: 16px; background: #f1f5f9; color: #94a3b8; display: flex; align-items: center; justify-content: center; font-size: 24px; margin: 0 auto 12px auto;">
                                    <i class="fa-solid fa-bag-shopping"></i>
                                </div>
                                <h4 style="font-size: 16px; font-weight: 800; color: #0f172a; margin: 0 0 4px 0;">No Orders Placed Yet</h4>
                                <p style="font-size: 12px; color: #64748b; max-width: 380px; margin: 0 auto 16px auto;">
                                    Explore our exclusive collection of Laddu Gopal dresses, mukut, jewelry, and spiritual accessories.
                                </p>
                                <a href="{{ url('/shop') }}" style="display: inline-flex; align-items: center; gap: 8px; background: #b71c1c; color: #ffffff; padding: 10px 20px; border-radius: 10px; font-size: 12px; font-weight: 800; text-decoration: none; box-shadow: 0 2px 6px rgba(183, 28, 28, 0.25);">
                                    <i class="fa-solid fa-gem"></i> Explore Shop Catalog
                                </a>
                            </div>
                        @else
                            <div>
                                @foreach($orders->take(4) as $order)
                                    @php
                                        $badgeBg = match($order->status) {
                                            'pending'    => 'background: #fef3c7; color: #92400e; border: 1px solid #fde68a;',
                                            'processing' => 'background: #dbeafe; color: #1e40af; border: 1px solid #bfdbfe;',
                                            'shipped'    => 'background: #e0e7ff; color: #3730a3; border: 1px solid #c7d2fe;',
                                            'completed'  => 'background: #ecfdf5; color: #065f46; border: 1px solid #a7f3d0;',
                                            'cancelled'  => 'background: #fef2f2; color: #991b1b; border: 1px solid #fecaca;',
                                            default      => 'background: #f1f5f9; color: #334155; border: 1px solid #e2e8f0;'
                                        };
                                    @endphp

                                    <div x-data="{ open: false }" class="cp-order-card">
                                        <!-- Header Row -->
                                        <div @click="open = !open" class="cp-order-head">
                                            <div style="display: flex; align-items: center; gap: 12px;">
                                                <div style="width: 36px; height: 36px; border-radius: 10px; background: #ffffff; border: 1px solid #e2e8f0; color: #b71c1c; display: flex; align-items: center; justify-content: center; font-size: 14px;">
                                                    <i class="fa-solid fa-box-archive"></i>
                                                </div>
                                                <div>
                                                    <div style="display: flex; align-items: center; gap: 8px;">
                                                        <span style="font-size: 13px; font-weight: 800; color: #0f172a; font-family: monospace;">#{{ $order->order_number }}</span>
                                                        <span style="{{ $badgeBg }} font-size: 10px; font-weight: 800; text-transform: uppercase; padding: 2px 8px; border-radius: 6px;">
                                                            {{ ucfirst($order->status) }}
                                                        </span>
                                                        @if($order->return_status)
                                                            <span style="background: #f3e8ff; color: #6b21a8; font-size: 9px; font-weight: 800; text-transform: uppercase; padding: 2px 6px; border-radius: 4px;">
                                                                Return: {{ ucfirst($order->return_status) }}
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div style="font-size: 11px; color: #64748b; margin-top: 2px;">
                                                        {{ $order->created_at->format('M d, Y') }} • {{ $order->items->count() }} {{ \Illuminate\Support\Str::plural('Item', $order->items->count()) }}
                                                    </div>
                                                </div>
                                            </div>

                                            <div style="display: flex; align-items: center; gap: 16px;">
                                                <div style="text-align: right;">
                                                    <span style="font-size: 10px; font-weight: 700; color: #94a3b8; text-transform: uppercase; display: block;">Total</span>
                                                    <span style="font-size: 14px; font-weight: 800; color: #0f172a;">&#8377;{{ number_format($order->total_amount, 2) }}</span>
                                                </div>
                                                <div style="width: 28px; height: 28px; border-radius: 8px; background: #ffffff; border: 1px solid #cbd5e1; display: flex; align-items: center; justify-content: center; font-size: 11px; color: #64748b; transition: transform 0.2s;" :style="open ? 'transform: rotate(180deg); color: #b71c1c;' : ''">
                                                    <i class="fa-solid fa-chevron-down"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Accordion Details -->
                                        <div x-show="open" x-transition style="padding: 18px; background: #ffffff; border-top: 1px solid #e2e8f0; display: none;">
                                            <div style="margin-bottom: 14px;">
                                                <h5 style="font-size: 11px; font-weight: 800; text-transform: uppercase; color: #64748b; margin: 0 0 8px 0;">Ordered Items</h5>
                                                <div style="border: 1px solid #e2e8f0; border-radius: 10px; overflow: hidden;">
                                                    @foreach($order->items as $item)
                                                        <div style="display: flex; align-items: center; justify-content: space-between; padding: 10px 14px; border-bottom: 1px solid #f1f5f9; background: #fafafa;">
                                                            <div style="display: flex; align-items: center; gap: 10px;">
                                                                @if($item->product && $item->product->primary_image_url)
                                                                    <img src="{{ $item->product->primary_image_url }}" alt="{{ $item->product_name }}" style="width: 36px; height: 36px; object-fit: contain; background: #ffffff; border: 1px solid #e2e8f0; border-radius: 6px; padding: 2px;">
                                                                @else
                                                                    <div style="width: 36px; height: 36px; background: #e2e8f0; border-radius: 6px; display: flex; align-items: center; justify-content: center; color: #64748b; font-size: 14px;">
                                                                        <i class="fa-solid fa-gem"></i>
                                                                    </div>
                                                                @endif
                                                                <div>
                                                                    <div style="font-size: 12px; font-weight: 700; color: #0f172a;">{{ $item->product_name }}</div>
                                                                    <div style="font-size: 11px; color: #64748b;">{{ $item->quantity }} × &#8377;{{ number_format($item->unit_price, 2) }}</div>
                                                                </div>
                                                            </div>
                                                            <div style="font-size: 13px; font-weight: 800; color: #0f172a;">
                                                                &#8377;{{ number_format($item->total_price, 2) }}
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>

                                            <!-- Shipping & Payment Breakdown -->
                                            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px; font-size: 12px; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; padding: 12px;">
                                                <div>
                                                    <div style="font-weight: 700; color: #64748b; font-size: 10px; text-transform: uppercase; margin-bottom: 4px;">Payment</div>
                                                    <div style="color: #0f172a;">Method: <strong>{{ strtoupper($order->payment_method) }}</strong></div>
                                                    <div style="color: #0f172a;">Status: <strong>{{ ucfirst($order->payment_status) }}</strong></div>
                                                </div>
                                                <div>
                                                    <div style="font-weight: 700; color: #64748b; font-size: 10px; text-transform: uppercase; margin-bottom: 4px;">Delivery Destination</div>
                                                    <div style="color: #0f172a;">{{ $order->shipping_address ?? $order->shipping_city }}</div>
                                                    <div style="color: #64748b; font-size: 11px;">{{ $order->shipping_phone }}</div>
                                                </div>
                                            </div>

                                            <!-- Action Buttons -->
                                            <div style="display: flex; align-items: center; justify-content: space-between; margin-top: 14px; padding-top: 12px; border-top: 1px solid #f1f5f9;">
                                                @if($order->delivery_type === 'online_delivery' && $order->ups_tracking_number)
                                                    <a href="https://www.ups.com/track?tracknum={{ $order->ups_tracking_number }}" target="_blank" style="background: #b71c1c; color: #ffffff; font-size: 11px; font-weight: 700; padding: 6px 12px; border-radius: 8px; text-decoration: none;">
                                                        <i class="fa-solid fa-truck-fast"></i> Track on UPS ({{ $order->ups_tracking_number }})
                                                    </a>
                                                @else
                                                    <span></span>
                                                @endif

                                                <a href="{{ url('/orders') }}" style="font-size: 12px; font-weight: 700; color: #b71c1c; text-decoration: none;">
                                                    View Full Order Details <i class="fa-solid fa-arrow-right" style="font-size: 10px;"></i>
                                                </a>
                                            </div>
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
</div>
@endsection
