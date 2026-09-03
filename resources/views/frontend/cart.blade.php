@extends('layouts.frontend')

@section('title', 'Shopping Cart')

@section('content')
<div class="container" style="padding-top: 20px; padding-bottom: 50px;">
    <!-- Breadcrumb & Title Inline -->
    <div style="margin-bottom: 20px; border-bottom: 1px solid #eee; padding-bottom: 12px; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 10px;">
        <div>
            <h1 style="font-size: 1.6rem; font-weight: 700; color: #222; margin: 0; font-family: 'Outfit', sans-serif;">Shopping Cart</h1>
            <p style="font-size: 0.8rem; color: #777; margin: 4px 0 0 0;">
                <a href="/" style="color: #b71c1c; text-decoration: none;">Home</a> 
                <span style="margin: 0 5px; color: #ccc;">/</span> 
                <span style="color: #333; font-weight: 600;">Cart</span>
            </p>
        </div>
        <a href="/shop" style="font-size: 0.8rem; font-weight: 700; color: #b71c1c; text-decoration: none;">
            <i class="bi bi-arrow-left"></i> Continue Shopping
        </a>
    </div>

    @if(empty($cart))
        <div style="text-align: center; padding: 60px 20px; background: #fff; border-radius: 12px; border: 1px solid #e8e8e8; margin: 20px 0;">
            <i class="bi bi-bag-x" style="font-size: 3.5rem; color: #ccc; margin-bottom: 12px; display: block;"></i>
            <h2 style="font-size: 1.4rem; font-weight: 700; color: #333; margin-bottom: 6px;">Your Cart is Empty</h2>
            <p style="font-size: 0.85rem; color: #777; margin-bottom: 25px; max-width: 380px; margin-left: auto; margin-right: auto;">Explore our exclusive Laddu Gopal dresses, mukuts, and divine accessories to add items to your cart.</p>
            <a href="/shop" style="display: inline-block; background: #b71c1c; color: #fff; padding: 12px 28px; border-radius: 6px; font-size: 0.8rem; font-weight: 700; text-transform: uppercase; text-decoration: none; box-shadow: 0 4px 12px rgba(183,28,28,0.2);">
                Start Shopping
            </a>
        </div>
    @else
        <div class="cart-layout-grid" style="display: grid; grid-template-columns: 1fr 340px; gap: 30px; align-items: start;">
            <!-- Cart Items Column -->
            <div style="background: #fff; border-radius: 12px; border: 1px solid #e8e8e8; padding: 20px; box-shadow: 0 2px 10px rgba(0,0,0,0.03);">
                <div style="display: flex; flex-direction: column; gap: 20px;">
                    @foreach($cart as $id => $item)
                        @php
                            $liveProduct = \App\Models\Product::find($id);
                            $itemName = $liveProduct ? $liveProduct->name : $item['name'];
                            $itemPrice = $liveProduct ? ($liveProduct->sale_price ?? $liveProduct->price) : $item['price'];
                            $itemImage = $liveProduct ? $liveProduct->primary_image_url : $item['image'];
                        @endphp
                        <div style="display: flex; gap: 15px; align-items: center; padding-bottom: 18px; border-bottom: 1px solid #f0f0f0;" id="cart-row-{{ $id }}">
                            <!-- Thumbnail -->
                            <div style="width: 75px; height: 75px; background: #fafafa; border: 1px solid #eee; border-radius: 8px; padding: 4px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                <img src="{{ asset($itemImage) }}" alt="{{ $itemName }}" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                            </div>

                            <!-- Details -->
                            <div style="flex: 1; min-width: 0;">
                                <div style="display: flex; justify-content: space-between; align-items: flex-start; gap: 10px;">
                                    <a href="/shop" style="font-size: 0.95rem; font-weight: 700; color: #222; text-decoration: none; display: block; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                        {{ $itemName }}
                                    </a>
                                    <span style="font-size: 1rem; font-weight: 800; color: #b71c1c; white-space: nowrap;">
                                        &#8377;{{ number_format($itemPrice * $item['quantity'], 2) }}
                                    </span>
                                </div>

                                <p style="font-size: 0.78rem; color: #888; margin: 3px 0 10px 0;">&#8377;{{ number_format($itemPrice, 2) }} each</p>

                                <!-- Stepper & Remove -->
                                <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 10px;">
                                    <div style="display: inline-flex; align-items: center; border: 1px solid #ddd; border-radius: 6px; overflow: hidden; background: #fdfdfd;">
                                        <button type="button" style="width: 30px; height: 30px; background: none; border: none; font-weight: 700; cursor: pointer; color: #444;" onclick="updateCartQty('{{ $id }}', {{ $item['quantity'] - 1 }})">
                                            <i class="bi bi-dash"></i>
                                        </button>
                                        <span style="width: 36px; text-align: center; font-size: 0.85rem; font-weight: 700; color: #222;">{{ $item['quantity'] }}</span>
                                        <button type="button" style="width: 30px; height: 30px; background: none; border: none; font-weight: 700; cursor: pointer; color: #444;" onclick="updateCartQty('{{ $id }}', {{ $item['quantity'] + 1 }})">
                                            <i class="bi bi-plus"></i>
                                        </button>
                                    </div>

                                    <button type="button" style="background: none; border: none; color: #dc3545; font-size: 0.8rem; font-weight: 600; cursor: pointer; display: flex; align-items: center; gap: 4px;" onclick="removeCartItem('{{ $id }}')">
                                        <i class="bi bi-trash3"></i> Remove
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Summary Sidebar -->
            @php 
                $subtotal = array_sum(array_map(function($item) { return $item['price'] * $item['quantity']; }, $cart));
                $total = $subtotal;
            @endphp
            <div style="background: #fff; border-radius: 12px; border: 1px solid #e8e8e8; padding: 22px; box-shadow: 0 2px 10px rgba(0,0,0,0.03); position: sticky; top: 100px;">
                <h3 style="font-size: 1.1rem; font-weight: 700; color: #222; margin-top: 0; margin-bottom: 15px; border-bottom: 1px solid #eee; padding-bottom: 10px; font-family: 'Outfit', sans-serif;">Order Summary</h3>
                
                <div style="display: flex; flex-direction: column; gap: 12px; margin-bottom: 20px; font-size: 0.88rem;">
                    <div style="display: flex; justify-content: space-between; color: #555;">
                        <span>Subtotal</span>
                        <span style="font-weight: 700; color: #222;">&#8377;{{ number_format($subtotal, 2) }}</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; color: #555;">
                        <span>Shipping Fee</span>
                        <span style="font-weight: 700; color: #28a745; text-transform: uppercase; font-size: 0.78rem;">FREE</span>
                    </div>
                    <div style="border-top: 1px solid #eee; padding-top: 10px; display: flex; justify-content: space-between; font-size: 1.05rem; font-weight: 800; color: #b71c1c;">
                        <span>Total Payable</span>
                        <span>&#8377;{{ number_format($total, 2) }}</span>
                    </div>
                </div>

                <a href="{{ route('checkout.index') }}" style="display: flex; align-items: center; justify-content: center; gap: 8px; width: 100%; background: #b71c1c; color: #fff; text-decoration: none; padding: 12px; border-radius: 8px; font-weight: 700; font-size: 0.85rem; text-transform: uppercase; box-shadow: 0 4px 12px rgba(183,28,28,0.25);">
                    Proceed to Checkout <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    @endif
</div>

<!-- Cart Scripts -->
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
            alert(data.message || 'Error updating cart.');
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
@media (max-width: 850px) {
    .cart-layout-grid {
        grid-template-columns: 1fr !important;
        gap: 20px !important;
    }
}
</style>
@endsection