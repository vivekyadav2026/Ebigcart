@extends('layouts.frontend')

@section('title', $product->name)

@section('content')
<div class="container" style="padding-top: 20px; padding-bottom: 60px;">
    <!-- Breadcrumb -->
    <div style="margin-bottom: 25px; border-bottom: 1px solid #eee; padding-bottom: 12px;">
        <p style="font-size: 0.82rem; color: #666; margin: 0;">
            <a href="/" style="color: #b71c1c; text-decoration: none;">Home</a> 
            <span style="margin: 0 6px; color: #ccc;">/</span> 
            <a href="/shop" style="color: #b71c1c; text-decoration: none;">Shop</a> 
            @if($product->category)
                <span style="margin: 0 6px; color: #ccc;">/</span> 
                <a href="/shop?cat={{ $product->category->slug }}" style="color: #b71c1c; text-decoration: none;">{{ $product->category->name }}</a>
            @endif
            <span style="margin: 0 6px; color: #ccc;">/</span> 
            <span style="color: #333; font-weight: 600;">{{ $product->name }}</span>
        </p>
    </div>

    <!-- Main Product Section -->
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px; align-items: start;" class="rs-product-detail-grid">
        <!-- Left: Image Gallery -->
        <div>
            <div style="background: #ffffff; border: 1px solid #e8e8e8; border-radius: 14px; padding: 15px; display: flex; align-items: center; justify-content: center; height: 440px; box-shadow: 0 4px 15px rgba(0,0,0,0.03); overflow: hidden;">
                <img id="mainProductImg" src="{{ asset($product->primary_image_url) }}" alt="{{ $product->name }}" style="max-width: 100%; max-height: 100%; object-fit: contain; transition: all 0.3s ease;">
            </div>
            
            @php
                $allImages = $product->all_image_urls ?? [];
            @endphp
            @if(count($allImages) > 1)
                <div style="display: flex; gap: 12px; margin-top: 15px; overflow-x: auto; padding-bottom: 5px;">
                    @foreach($allImages as $index => $imgUrl)
                        <div onclick="switchMainImage('{{ asset($imgUrl) }}', this)" style="width: 75px; height: 75px; background: #fff; border: 2px solid {{ $loop->first ? '#b71c1c' : '#eee' }}; border-radius: 8px; padding: 4px; cursor: pointer; flex-shrink: 0; display: flex; align-items: center; justify-content: center; transition: border-color 0.2s ease;" class="rs-thumb-box">
                            <img src="{{ asset($imgUrl) }}" alt="{{ $product->name }}" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Right: Product Info & Actions -->
        <div>
            <h1 style="font-size: 1.8rem; font-weight: 800; color: #1e293b; margin-top: 0; margin-bottom: 10px; line-height: 1.3; font-family: 'Outfit', sans-serif;">
                {{ $product->name }}
            </h1>

            <!-- Rating & Category -->
            <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 18px; font-size: 0.85rem;">
                <div style="color: #f39c12; display: flex; align-items: center; gap: 2px;">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <span style="color: #64748b; margin-left: 6px; font-weight: 600;">(5 Customer Reviews)</span>
                </div>
                <span style="color: #cbd5e1;">|</span>
                <span style="color: #28a745; font-weight: 700; display: flex; align-items: center; gap: 4px;">
                    <i class="bi bi-check-circle-fill"></i> In Stock
                </span>
            </div>

            <!-- Price Box -->
            <div style="background: #fdf2f2; border: 1px solid #fecaca; border-radius: 10px; padding: 15px 20px; margin-bottom: 20px; display: flex; align-items: baseline; gap: 12px;">
                @if($product->sale_price)
                    <span style="font-size: 2rem; font-weight: 800; color: #b71c1c;">&#8377;{{ number_format($product->sale_price, 2) }}</span>
                    <span style="font-size: 1.1rem; color: #94a3b8; text-decoration: line-through;">&#8377;{{ number_format($product->price, 2) }}</span>
                    @php
                        $discount = round((($product->price - $product->sale_price) / $product->price) * 100);
                    @endphp
                    <span style="background: #b71c1c; color: #fff; font-size: 0.72rem; font-weight: 800; padding: 3px 8px; border-radius: 12px; text-transform: uppercase;">
                        SAVE {{ $discount }}%
                    </span>
                @else
                    <span style="font-size: 2rem; font-weight: 800; color: #b71c1c;">&#8377;{{ number_format($product->price, 2) }}</span>
                @endif
            </div>

            <!-- Short Description -->
            <div style="font-size: 0.92rem; color: #475569; line-height: 1.6; margin-bottom: 25px;">
                {!! $product->short_description ?? $product->description !!}
            </div>

            <!-- Quantity & Actions -->
            <div style="display: flex; flex-direction: column; gap: 15px; margin-bottom: 30px;">
                <div style="display: flex; items-center; gap: 15px; flex-wrap: wrap;">
                    <!-- Stepper -->
                    <div style="display: inline-flex; align-items: center; border: 1px solid #cbd5e1; border-radius: 8px; overflow: hidden; background: #fff; height: 46px;">
                        <button type="button" style="width: 40px; height: 100%; background: #f8fafc; border: none; font-weight: 700; cursor: pointer; color: #334155; font-size: 1.1rem;" onclick="let q = document.getElementById('productQty'); q.value = Math.max(1, parseInt(q.value) - 1);">-</button>
                        <input type="number" id="productQty" value="1" min="1" readonly style="width: 50px; text-align: center; border: none; font-size: 1rem; font-weight: 800; color: #0f172a; outline: none;">
                        <button type="button" style="width: 40px; height: 100%; background: #f8fafc; border: none; font-weight: 700; cursor: pointer; color: #334155; font-size: 1.1rem;" onclick="let q = document.getElementById('productQty'); q.value = parseInt(q.value) + 1;">+</button>
                    </div>

                    <!-- Add to Cart Button -->
                    <button type="button" onclick="Ebigcart.addToCart('{{ $product->id }}', parseInt(document.getElementById('productQty').value), event)" style="flex: 1; min-width: 160px; background: #b71c1c; color: #fff; border: none; padding: 12px 24px; border-radius: 8px; font-weight: 700; font-size: 0.95rem; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 8px; box-shadow: 0 4px 12px rgba(183,28,28,0.25); transition: background 0.2s ease;">
                        <i class="bi bi-cart-plus-fill" style="font-size: 1.1rem;"></i> Add to Cart
                    </button>

                    <!-- Wishlist Button -->
                    @php $inWishlist = in_array($product->id, session()->get('wishlist', [])); @endphp
                    <button type="button" onclick="Ebigcart.toggleWishlist('{{ $product->id }}', this, event)" style="width: 46px; height: 46px; background: #f1f5f9; border: 1px solid #e2e8f0; border-radius: 8px; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: all 0.2s ease; {{ $inWishlist ? 'color:#ff4757;' : 'color:#64748b;' }}" title="Add to Wishlist">
                        <i class="bi {{ $inWishlist ? 'bi-heart-fill' : 'bi-heart' }}" style="font-size: 1.2rem;"></i>
                    </button>
                </div>

                <!-- Buy Now Direct Checkout Button -->
                <button type="button" onclick="Ebigcart.addToCart('{{ $product->id }}', parseInt(document.getElementById('productQty').value), event); setTimeout(function(){ window.location.href='/checkout'; }, 500);" style="width: 100%; background: #d35400; color: #fff; border: none; padding: 13px; border-radius: 8px; font-weight: 800; font-size: 0.95rem; cursor: pointer; text-transform: uppercase; letter-spacing: 0.5px; box-shadow: 0 4px 12px rgba(211,84,0,0.25); display: flex; align-items: center; justify-content: center; gap: 8px;">
                    <i class="bi bi-lightning-charge-fill"></i> Buy It Now
                </button>
            </div>

            <!-- Trust Badges -->
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; border-top: 1px solid #e2e8f0; padding-top: 20px; margin-top: 20px; font-size: 0.82rem; color: #475569;">
                <div style="display: flex; align-items: center; gap: 8px;">
                    <i class="bi bi-truck text-[#b71c1c]" style="font-size: 1.2rem; color: #b71c1c;"></i> Free Express Delivery
                </div>
                <div style="display: flex; align-items: center; gap: 8px;">
                    <i class="bi bi-cash-coin" style="font-size: 1.2rem; color: #b71c1c;"></i> Cash on Delivery
                </div>
                <div style="display: flex; align-items: center; gap: 8px;">
                    <i class="bi bi-gem" style="font-size: 1.2rem; color: #b71c1c;"></i> Vrindavan Handcrafted
                </div>
                <div style="display: flex; align-items: center; gap: 8px;">
                    <i class="bi bi-shield-check" style="font-size: 1.2rem; color: #b71c1c;"></i> 100% Quality Guaranteed
                </div>
            </div>
        </div>
    </div>

    <!-- Description & Additional Info Tabs -->
    <div style="margin-top: 50px; background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.02);">
        <div style="display: flex; border-bottom: 1px solid #e2e8f0; background: #f8fafc;">
            <button type="button" onclick="showTab('desc')" id="tabBtn-desc" style="padding: 14px 25px; font-weight: 700; font-size: 0.9rem; border: none; background: #fff; color: #b71c1c; border-bottom: 2px solid #b71c1c; cursor: pointer;">Description</button>
            <button type="button" onclick="showTab('info')" id="tabBtn-info" style="padding: 14px 25px; font-weight: 700; font-size: 0.9rem; border: none; background: transparent; color: #64748b; cursor: pointer;">Additional Details</button>
            <button type="button" onclick="showTab('reviews')" id="tabBtn-reviews" style="padding: 14px 25px; font-weight: 700; font-size: 0.9rem; border: none; background: transparent; color: #64748b; cursor: pointer;">Customer Reviews (5)</button>
        </div>

        <div id="tabContent-desc" style="padding: 25px; font-size: 0.92rem; color: #334155; line-height: 1.7;">
            {!! $product->description !!}
        </div>

        <div id="tabContent-info" style="padding: 25px; font-size: 0.9rem; color: #334155; display: none;">
            <table style="width: 100%; border-collapse: collapse;">
                <tr style="border-bottom: 1px solid #f1f5f9;">
                    <td style="padding: 10px 0; font-weight: 700; width: 180px; color: #0f172a;">SKU</td>
                    <td style="padding: 10px 0; color: #475569;">{{ $product->sku ?? 'N/A' }}</td>
                </tr>
                <tr style="border-bottom: 1px solid #f1f5f9;">
                    <td style="padding: 10px 0; font-weight: 700; width: 180px; color: #0f172a;">Category</td>
                    <td style="padding: 10px 0; color: #475569;">{{ $product->category ? $product->category->name : 'Uncategorized' }}</td>
                </tr>
                <tr>
                    <td style="padding: 10px 0; font-weight: 700; width: 180px; color: #0f172a;">Origin</td>
                    <td style="padding: 10px 0; color: #475569;">Vrindavan Dham, India</td>
                </tr>
            </table>
        </div>

        <div id="tabContent-reviews" style="padding: 25px; display: none;">
            <div style="display: flex; flex-direction: column; gap: 15px;">
                <div style="background: #f8fafc; border-radius: 8px; padding: 15px; border: 1px solid #f1f5f9;">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                        <span style="font-weight: 700; color: #1e293b;">Pooja Sharma</span>
                        <span style="color: #f39c12; font-size: 0.85rem;"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></span>
                    </div>
                    <p style="font-size: 0.85rem; color: #475569; margin: 0;">Bahut hi sundar poshak hai. Laddu gopal ji par bahut acchi lag rahi hai. Fast delivery in Vrindavan quality!</p>
                </div>
                <div style="background: #f8fafc; border-radius: 8px; padding: 15px; border: 1px solid #f1f5f9;">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                        <span style="font-weight: 700; color: #1e293b;">Radhika Verma</span>
                        <span style="color: #f39c12; font-size: 0.85rem;"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></span>
                    </div>
                    <p style="font-size: 0.85rem; color: #475569; margin: 0;">Fabric quality and embroidery work is top notch. Highly recommended Ebigcart!</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Products -->
    @if(isset($relatedProducts) && $relatedProducts->count() > 0)
        <div style="margin-top: 60px;">
            <h2 style="font-size: 1.4rem; font-weight: 800; color: #1e293b; margin-bottom: 20px; font-family: 'Outfit', sans-serif;">
                You May Also Like
            </h2>
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 20px;">
                @foreach($relatedProducts as $relProduct)
                    <div class="rs-product-card" onclick="if (!event.target.closest('.rs-wishlist-heart, .rs-btn-carticon')) window.location.href='{{ route('product.show', $relProduct->slug) }}';" style="cursor: pointer;">
                        <div class="rs-card-img-box">
                            @if($relProduct->sale_price)
                                <span class="rs-card-badge">SALE</span>
                            @endif
                            @php $relWish = in_array($relProduct->id, session()->get('wishlist', [])); @endphp
                            <button type="button" class="rs-wishlist-heart" style="border:none; background:none; cursor:pointer; {{ $relWish ? 'color:#ff4757;' : '' }}" onclick="Ebigcart.toggleWishlist('{{ $relProduct->id }}', this, event)" title="Add to Wishlist">
                                <i class="bi {{ $relWish ? 'bi-heart-fill' : 'bi-heart' }}"></i>
                            </button>
                            <a href="{{ route('product.show', $relProduct->slug) }}">
                                <img src="{{ asset($relProduct->primary_image_url) }}" alt="{{ $relProduct->name }}" loading="lazy">
                            </a>
                        </div>
                        <div class="rs-card-body">
                            <a href="{{ route('product.show', $relProduct->slug) }}" class="rs-card-title">{{ $relProduct->name }}</a>
                            <div class="rs-card-price">
                                @if($relProduct->sale_price)
                                    <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ number_format($relProduct->sale_price, 2) }}</bdi></span>
                                    <span class="rs-card-price-old">&#8377;{{ number_format($relProduct->price, 2) }}</span>
                                @else
                                    <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">&#8377;</span>{{ number_format($relProduct->price, 2) }}</bdi></span>
                                @endif
                            </div>
                            <div class="rs-card-actions">
                                <a href="{{ route('product.show', $relProduct->slug) }}" class="rs-btn-buynow">Buy Now</a>
                                <button type="button" class="rs-btn-carticon" style="border:none; cursor:pointer;" onclick="Ebigcart.addToCart('{{ $relProduct->id }}', 1, event)" title="Add to Cart">
                                    <i class="bi bi-cart-plus-fill"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>

<!-- Page Scripts -->
<script>
function switchMainImage(imgUrl, thumbElement) {
    document.getElementById('mainProductImg').src = imgUrl;
    document.querySelectorAll('.rs-thumb-box').forEach(el => {
        el.style.borderColor = '#eee';
    });
    if (thumbElement) {
        thumbElement.style.borderColor = '#b71c1c';
    }
}

function showTab(tabName) {
    ['desc', 'info', 'reviews'].forEach(t => {
        document.getElementById('tabContent-' + t).style.display = (t === tabName) ? 'block' : 'none';
        let btn = document.getElementById('tabBtn-' + t);
        if (t === tabName) {
            btn.style.background = '#fff';
            btn.style.color = '#b71c1c';
            btn.style.borderBottom = '2px solid #b71c1c';
        } else {
            btn.style.background = 'transparent';
            btn.style.color = '#64748b';
            btn.style.borderBottom = 'none';
        }
    });
}
</script>

<style>
@media (max-width: 768px) {
    .rs-product-detail-grid {
        grid-template-columns: 1fr !important;
        gap: 25px !important;
    }
}
</style>
@endsection