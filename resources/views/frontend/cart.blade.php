@extends('layouts.frontend')

@section('title', 'Shopping Cart')

@section('content')
<div style="max-width: 1200px; margin: 0 auto; padding: 25px 15px 60px 15px;">
    <!-- Breadcrumb & Page Header -->
    <div style="margin-bottom: 25px; border-bottom: 1px solid #eeeeee; padding-bottom: 15px; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 10px;">
        <div>
            <h1 style="font-size: 1.75rem; font-weight: 800; color: #1e293b; margin: 0; font-family: 'Outfit', sans-serif;">Shopping Cart</h1>
            <p style="font-size: 0.82rem; color: #64748b; margin: 4px 0 0 0;">
                <a href="/" style="color: #b71c1c; text-decoration: none; font-weight: 600;">Home</a> 
                <span style="margin: 0 6px; color: #cbd5e1;">/</span> 
                <span style="color: #334155; font-weight: 700;">Cart</span>
            </p>
        </div>
        <a href="/shop" style="font-size: 0.85rem; font-weight: 700; color: #b71c1c; text-decoration: none; display: inline-flex; align-items: center; gap: 5px;">
            <i class="bi bi-arrow-left"></i> Continue Shopping
        </a>
    </div>

    @if(empty($cart))
        <div style="text-align: center; padding: 70px 20px; background: #ffffff; border-radius: 14px; border: 1px dashed #cbd5e1; margin: 20px 0;">
            <i class="bi bi-bag-x" style="font-size: 4rem; color: #cbd5e1; margin-bottom: 15px; display: block;"></i>
            <h2 style="font-size: 1.5rem; font-weight: 800; color: #1e293b; margin-bottom: 8px; font-family: 'Outfit', sans-serif;">Your Cart is Currently Empty</h2>
            <p style="font-size: 0.88rem; color: #64748b; margin-bottom: 25px; max-width: 400px; margin-left: auto; margin-right: auto; line-height: 1.5;">Browse our handcrafted Laddu Gopal dresses, mukuts, and ornaments collection to add your favorite divine items.</p>
            <a href="/shop" style="display: inline-block; background: #b71c1c; color: #ffffff; padding: 13px 32px; border-radius: 8px; font-size: 0.85rem; font-weight: 800; text-transform: uppercase; text-decoration: none; box-shadow: 0 4px 14px rgba(183,28,28,0.25);">
                Explore Collection
            </a>
        </div>
    @else
        <div style="display: flex; gap: 30px; align-items: flex-start; flex-wrap: wrap;" class="cart-flex-wrapper">
            <!-- Left: Cart Items List -->
            <div style="flex: 1; min-width: 300px; background: #ffffff; border-radius: 14px; border: 1px solid #e2e8f0; padding: 25px; box-shadow: 0 4px 15px rgba(0,0,0,0.03);">
                <h2 style="font-size: 1.1rem; font-weight: 800; color: #1e293b; margin-top: 0; margin-bottom: 20px; padding-bottom: 12px; border-bottom: 1px solid #f1f5f9; font-family: 'Outfit', sans-serif;">
                    Items in Your Cart ({{ count($cart) }})
                </h2>

                <div style="display: flex; flex-direction: column; gap: 20px;">
                    @foreach($cart as $id => $item)
                        @php
                            $liveProduct = \App\Models\Product::find($id);
                            $itemName = $liveProduct ? $liveProduct->name : $item['name'];
                            $itemPrice = $liveProduct ? ($liveProduct->sale_price ?? $liveProduct->price) : $item['price'];
                            $itemImage = $liveProduct ? $liveProduct->primary_image_url : $item['image'];
                            $itemSlug = $liveProduct ? $liveProduct->slug : ($item['slug'] ?? '');
                        @endphp

                        <div id="cart-item-row-{{ $id }}" style="display: flex; gap: 18px; align-items: center; padding-bottom: 20px; border-bottom: 1px solid #f1f5f9;">
                            <!-- Thumbnail with Direct Product Link -->
                            <a href="{{ route('product.show', $itemSlug) }}" style="width: 85px; height: 85px; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; padding: 6px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; text-decoration: none; transition: border-color 0.2s ease;">
                                <img src="{{ asset($itemImage) }}" alt="{{ $itemName }}" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                            </a>

                            <!-- Details Column -->
                            <div style="flex: 1; min-width: 0;">
                                <div style="display: flex; justify-content: space-between; align-items: flex-start; gap: 12px; margin-bottom: 4px;">
                                    <a href="{{ route('product.show', $itemSlug) }}" style="font-size: 1rem; font-weight: 700; color: #1e293b; text-decoration: none; display: block; line-height: 1.3; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                                        {{ $itemName }}
                                    </a>
                                    <span style="font-size: 1.1rem; font-weight: 800; color: #b71c1c; white-space: nowrap;">
                                        &#8377;{{ number_format($itemPrice * $item['quantity'], 2) }}
                                    </span>
                                </div>

                                <p style="font-size: 0.8rem; color: #64748b; margin: 0 0 12px 0; font-weight: 600;">
                                    &#8377;{{ number_format($itemPrice, 2) }} each
                                </p>

                                <!-- Stepper & Remove Action Row -->
                                <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px;">
                                    <!-- Stepper -->
                                    <div style="display: inline-flex; align-items: center; border: 1px solid #cbd5e1; border-radius: 8px; overflow: hidden; background: #ffffff; height: 34px;">
                                        <button type="button" style="width: 34px; height: 100%; background: #f8fafc; border: none; font-weight: 800; cursor: pointer; color: #334155; font-size: 1rem; display: flex; align-items: center; justify-content: center;" onclick="updateCartQty('{{ $id }}', {{ $item['quantity'] - 1 }})">
                                            <i class="bi bi-dash"></i>
                                        </button>
                                        <span style="width: 40px; text-align: center; font-size: 0.9rem; font-weight: 800; color: #0f172a;">{{ $item['quantity'] }}</span>
                                        <button type="button" style="width: 34px; height: 100%; background: #f8fafc; border: none; font-weight: 800; cursor: pointer; color: #334155; font-size: 1rem; display: flex; align-items: center; justify-content: center;" onclick="updateCartQty('{{ $id }}', {{ $item['quantity'] + 1 }})">
                                            <i class="bi bi-plus"></i>
                                        </button>
                                    </div>

                                    <!-- Remove Button -->
                                    <button type="button" style="background: none; border: none; color: #ef4444; font-size: 0.82rem; font-weight: 700; cursor: pointer; display: inline-flex; align-items: center; gap: 4px; padding: 4px 8px; border-radius: 6px; transition: background 0.2s ease;" onclick="removeCartItem('{{ $id }}')">
                                        <i class="bi bi-trash3" style="font-size: 0.9rem;"></i> Remove
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Right: Order Summary Sidebar -->
            @php 
                $subtotal = array_sum(array_map(function($item) { return $item['price'] * $item['quantity']; }, $cart));
                $total = $subtotal;
            @endphp
            <div style="width: 360px; max-width: 100%; background: #ffffff; border-radius: 14px; border: 1px solid #e2e8f0; padding: 25px; box-shadow: 0 4px 15px rgba(0,0,0,0.03); position: sticky; top: 90px;" class="cart-summary-card">
                <h3 style="font-size: 1.15rem; font-weight: 800; color: #1e293b; margin-top: 0; margin-bottom: 18px; border-bottom: 1px solid #f1f5f9; padding-bottom: 12px; font-family: 'Outfit', sans-serif;">
                    Order Summary
                </h3>

                <div style="display: flex; flex-direction: column; gap: 14px; margin-bottom: 22px; font-size: 0.9rem;">
                    <div style="display: flex; justify-content: space-between; color: #475569;">
                        <span>Subtotal</span>
                        <span style="font-weight: 700; color: #0f172a;">&#8377;{{ number_format($subtotal, 2) }}</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; color: #475569;">
                        <span>Delivery Charge</span>
                        <span style="font-weight: 800; color: #16a34a; text-transform: uppercase; font-size: 0.8rem; background: #dcfce7; padding: 2px 8px; border-radius: 6px;">FREE</span>
                    </div>
                    <div style="border-top: 1px solid #e2e8f0; padding-top: 14px; display: flex; justify-content: space-between; font-size: 1.15rem; font-weight: 800; color: #b71c1c;">
                        <span>Total Payable</span>
                        <span>&#8377;{{ number_format($total, 2) }}</span>
                    </div>
                </div>

                <a href="{{ route('checkout.index') }}" style="display: flex; align-items: center; justify-content: center; gap: 8px; width: 100%; background: #b71c1c; color: #ffffff; text-decoration: none; padding: 14px; border-radius: 10px; font-weight: 800; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.5px; box-shadow: 0 4px 14px rgba(183,28,28,0.3); transition: transform 0.2s ease;">
                    Proceed to Checkout <i class="bi bi-arrow-right" style="font-size: 1rem;"></i>
                </a>
            </div>
        </div>
    @endif
</div>

<!-- AJAX Stepper & Item Removal Scripts -->
<script>
function updateCartQty(productId, qty) {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    fetch('/cart/update', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({ product_id: productId, quantity: qty })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            if (window.Ebigcart) window.Ebigcart.updateHeaderCounts();
            location.reload();
        } else {
            alert(data.message || 'Error updating cart quantity.');
        }
    })
    .catch(err => console.error(err));
}

function removeCartItem(productId) {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    if (confirm('Are you sure you want to remove this item from your cart?')) {
        fetch('/cart/remove', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({ product_id: productId })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                if (window.Ebigcart) window.Ebigcart.updateHeaderCounts();
                location.reload();
            } else {
                alert(data.message || 'Error removing item.');
            }
        })
        .catch(err => console.error(err));
    }
}
</script>

<style>
@media (max-width: 900px) {
    .cart-flex-wrapper {
        flex-direction: column !important;
    }
    .cart-summary-card {
        width: 100% !important;
        position: static !important;
    }
}
</style>
@endsection