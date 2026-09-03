@extends('layouts.frontend')

@section('title', 'Shop Collection')

@section('content')
<div class="container" style="padding-top: 15px; padding-bottom: 40px;">
    <!-- Compact Header & Breadcrumbs -->
    <div style="margin-bottom: 15px; border-bottom: 1px solid #eee; padding-bottom: 10px; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 10px;">
        <div>
            <h1 style="font-size: 1.5rem; font-weight: 700; color: #222; margin: 0; font-family: 'Outfit', sans-serif;">Shop Collection</h1>
            <p style="font-size: 0.8rem; color: #777; margin: 4px 0 0 0;">
                <a href="/" style="color: #b71c1c; text-decoration: none;">Home</a> 
                <span style="margin: 0 5px; color: #ccc;">/</span> 
                <span style="color: #333; font-weight: 600;">Shop</span>
                @if(request('cat'))
                    <span style="margin: 0 5px; color: #ccc;">/</span>
                    <span style="color: #b71c1c; font-weight: 700; text-transform: uppercase;">{{ request('cat') }}</span>
                @endif
            </p>
        </div>

        <!-- Mobile Filter Toggle Button -->
        <button type="button" onclick="toggleMobileFilter()" class="md-hide-btn" style="background: #b71c1c; color: #fff; border: none; padding: 8px 16px; border-radius: 6px; font-weight: 600; font-size: 0.85rem; cursor: pointer; display: none;">
            <i class="bi bi-funnel-fill"></i> Filter & Refine
        </button>
    </div>

    <div class="shop-layout-grid" style="display: grid; grid-template-columns: 260px 1fr; gap: 25px; align-items: start;">
        <!-- Sidebar Filters -->
        <div id="shopSidebar" class="shop-sidebar-box">
            <form action="{{ route('shop') }}" method="GET" id="filterForm" style="background: #fff; padding: 18px; border-radius: 10px; border: 1px solid #e8e8e8; box-shadow: 0 2px 8px rgba(0,0,0,0.03);">
                @if(request('search'))
                    <input type="hidden" name="search" value="{{ request('search') }}">
                @endif

                                <!-- Category Section with Checkboxes -->
                <div style="margin-bottom: 20px;">
                    <h3 style="font-size: 1rem; font-weight: 700; color: #222; margin-bottom: 12px; border-bottom: 1px solid #eee; padding-bottom: 8px; display: flex; justify-content: space-between; align-items: center;">
                        <span>Categories</span>
                        @if(!empty($selectedCategories) || request('cat'))
                            <a href="{{ route('shop') }}" style="font-size: 0.75rem; color: #b71c1c; text-decoration: underline;">Clear</a>
                        @endif
                    </h3>
                    <div style="display: flex; flex-direction: column; gap: 10px; font-size: 0.85rem; max-height: 220px; overflow-y: auto;">
                        @foreach($categories as $cat)
                            @php
                                $isChecked = (isset($selectedCategories) && in_array($cat->id, $selectedCategories)) || (request('cat') == $cat->slug);
                            @endphp
                            <label style="display: flex; align-items: center; justify-content: space-between; cursor: pointer; color: #444;">
                                <div style="display: flex; align-items: center; gap: 8px;">
                                    <input type="checkbox" name="categories[]" value="{{ $cat->id }}" {{ $isChecked ? 'checked' : '' }} onchange="this.form.submit()" style="width: 16px; height: 16px; accent-color: #b71c1c; cursor: pointer;">
                                    <span style="{{ $isChecked ? 'font-weight: 700; color: #b71c1c;' : '' }}">{{ $cat->name }}</span>
                                </div>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Highlights / Collections -->
                <div style="margin-bottom: 20px;">
                    <h3 style="font-size: 1rem; font-weight: 700; color: #222; margin-bottom: 12px; border-bottom: 1px solid #eee; padding-bottom: 8px;">Collection</h3>
                    <div style="display: flex; flex-direction: column; gap: 8px; font-size: 0.85rem;">
                        <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; color: #444;">
                            <input type="radio" name="highlight" value="" {{ !request('highlight') ? 'checked' : '' }} onchange="this.form.submit()" style="accent-color: #b71c1c;">
                            <span>All Items</span>
                        </label>
                        <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; color: #444;">
                            <input type="radio" name="highlight" value="bestseller" {{ request('highlight') == 'bestseller' ? 'checked' : '' }} onchange="this.form.submit()" style="accent-color: #b71c1c;">
                            <span>&#11088; Best Sellers</span>
                        </label>
                        <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; color: #444;">
                            <input type="radio" name="highlight" value="sale" {{ request('highlight') == 'sale' ? 'checked' : '' }} onchange="this.form.submit()" style="accent-color: #b71c1c;">
                            <span>&#128293; On Sale</span>
                        </label>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div style="padding-top: 10px;">
                    <button type="submit" style="width: 100%; background: #b71c1c; color: #fff; border: none; padding: 10px; border-radius: 6px; font-weight: 700; font-size: 0.8rem; text-transform: uppercase; cursor: pointer;">
                        Apply Filters
                    </button>
                    @if(request()->hasAny(['cat', 'max_price', 'search', 'highlight']))
                        <a href="{{ route('shop') }}" style="display: block; text-align: center; width: 100%; background: #f0f0f0; color: #444; text-decoration: none; padding: 8px; border-radius: 6px; font-weight: 600; font-size: 0.8rem; margin-top: 8px;">
                            Clear All Filters
                        </a>
                    @endif
                </div>
            </form>
        </div>

        <!-- Product Grid Column -->
        <div class="shop-products-column">
            @if(isset($products) && $products->count() > 0)
                <ul class="products" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 20px; list-style: none; padding: 0; margin: 0;">
                    @foreach($products as $product)
                        <li class="product" style="list-style:none;">
                            <div class="rs-product-card">
                                <div class="rs-card-img-box">
                                    @if($product->sale_price)
                                        <span class="rs-card-badge">SALE</span>
                                    @endif
                                    <a href="/wishlist" class="rs-wishlist-heart" title="Add to Wishlist"><i class="bi bi-heart"></i></a>
                                    <a href="{{ route('product.show', $product->slug) }}">
                                        <img src="{{ asset($product->primary_image_url) }}" alt="{{ $product->name }}" loading="lazy">
                                    </a>
                                </div>
                                <div class="rs-card-body">
                                    <a href="{{ route('product.show', $product->slug) }}" class="rs-card-title">{{ $product->name }}</a>
                                    <div class="rs-card-price">
                                        @if($product->sale_price)
                                            <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ number_format($product->sale_price, 2) }}</bdi></span>
                                            <span class="rs-card-price-old">&#8377;{{ number_format($product->price, 2) }}</span>
                                        @else
                                            <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ number_format($product->price, 2) }}</bdi></span>
                                        @endif
                                    </div>
                                    <div class="rs-card-actions">
                                        <a href="{{ route('product.show', $product->slug) }}" class="rs-btn-buynow">Buy Now</a>
                                        <a href="{{ route('product.show', $product->slug) }}" class="rs-btn-carticon"><i class="bi bi-cart-plus-fill"></i></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>

                <!-- Infinite Scroll Loader -->
                <div id="infiniteLoader" style="display: none; justify-content: center; align-items: center; padding: 30px 0;">
                    <div class="spinner" style="width: 30px; height: 30px; border: 3px solid #f3f3f3; border-top: 3px solid #b71c1c; border-radius: 50%; animation: spin 0.8s linear infinite;"></div>
                    <span style="margin-left: 10px; font-size: 0.85rem; font-weight: 600; color: #666;">Loading more products...</span>
                </div>
            @else
                <div style="text-align: center; padding: 50px 20px; background: #fff; border-radius: 10px; border: 1px solid #e8e8e8;">
                    <i class="bi bi-basket" style="font-size: 3rem; color: #ccc; margin-bottom: 12px; display: block;"></i>
                    <h2 style="font-size: 1.3rem; font-weight: 700; color: #333; margin-bottom: 6px;">No products found</h2>
                    <p style="font-size: 0.85rem; color: #777; margin-bottom: 20px;">We couldn't find any products matching your selected filter criteria.</p>
                    <a href="{{ route('shop') }}" style="display: inline-block; background: #b71c1c; color: #fff; padding: 10px 24px; border-radius: 6px; font-size: 0.8rem; font-weight: 700; text-transform: uppercase; text-decoration: none;">Clear All Filters</a>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Infinite Scroll Script -->
<script>
let currentPage = 1;
let lastPage = {{ isset($products) ? $products->lastPage() : 1 }};
let isLoading = false;

window.addEventListener('scroll', function() {
    if (isLoading || currentPage >= lastPage) return;
    
    // Trigger infinite scroll when within 500px from bottom
    if ((window.innerHeight + window.scrollY) >= (document.body.offsetHeight - 500)) {
        loadMoreProducts();
    }
});

function loadMoreProducts() {
    isLoading = true;
    currentPage++;
    
    const loader = document.getElementById('infiniteLoader');
    if (loader) loader.style.display = 'flex';
    
    const currentUrl = new URL(window.location.href);
    currentUrl.searchParams.set('page', currentPage);
    
    fetch(currentUrl.toString(), {
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
    })
    .then(response => response.text())
    .then(html => {
        const parser = new DOMParser();
        const doc = parser.parseFromString(html, 'text/html');
        const newProducts = doc.querySelectorAll('ul.products > li');
        const productGrid = document.querySelector('ul.products');
        
        if (productGrid && newProducts.length > 0) {
            newProducts.forEach(item => {
                productGrid.appendChild(item);
            });
        }
        
        isLoading = false;
        if (loader) loader.style.display = 'none';
    })
    .catch(err => {
        console.error('Error fetching page:', err);
        isLoading = false;
        if (loader) loader.style.display = 'none';
    });
}

function toggleMobileFilter() {
    const sidebar = document.getElementById('shopSidebar');
    if (sidebar.style.display === 'block') {
        sidebar.style.display = 'none';
    } else {
        sidebar.style.display = 'block';
    }
}
</script>

<style>
@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

@media (max-width: 768px) {
    .shop-layout-grid {
        grid-template-columns: 1fr !important;
        gap: 15px !important;
    }

    .md-hide-btn {
        display: inline-flex !important;
    }

    .shop-sidebar-box {
        display: none;
    }

    ul.products {
        display: grid !important;
        grid-template-columns: repeat(2, 1fr) !important;
        gap: 10px !important;
        padding: 0 !important;
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
@endsection