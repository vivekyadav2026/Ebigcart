@extends('layouts.frontend')

@section('title', $product->name)

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-6 border-b border-gray-200 pb-4">
        <p class="text-sm text-gray-500 mt-2">
            <a href="/" class="hover:text-[#b71c1c]">Home</a> <span class="mx-2">/</span> 
            <a href="/shop" class="hover:text-[#b71c1c]">Shop</a> <span class="mx-2">/</span> 
            {{ $product->name }}
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
        <!-- Product Images -->
        <div class="product-gallery">
            <div class="main-image bg-white rounded-xl border border-gray-100 shadow-sm p-4 mb-4">
                <img src="{{ asset($product->primary_image_url) }}" alt="{{ $product->name }}" class="w-full h-auto rounded-lg object-contain" style="max-height: 500px;">
            </div>
            @php
                $allImages = $product->all_image_urls ?? [];
            @endphp
            @if(count($allImages) > 1)
            <div class="grid grid-cols-4 gap-4 mt-4">
                @foreach($allImages as $imgUrl)
                <div class="bg-white rounded-lg border border-gray-100 p-2 cursor-pointer hover:border-[#b71c1c]">
                    <img src="{{ $imgUrl }}" alt="{{ $product->name }}" class="w-full h-24 object-contain rounded">
                </div>
                @endforeach
            </div>
            @endif
        </div>

        <!-- Product Details -->
        <div class="product-info">
            <h1 class="text-3xl font-bold text-gray-900 mb-2" style="font-family: 'Outfit', sans-serif;">{{ $product->name }}</h1>
            
            <div class="flex items-center mb-4">
                <div class="text-[#f39c12] text-sm mr-2">?????</div>
                <span class="text-sm text-gray-500">(5 Customer Reviews)</span>
            </div>
            
            <div class="price text-2xl font-bold text-[#b71c1c] mb-6">
                @if($product->sale_price)
                    <del class="text-gray-400 text-lg mr-2">?{{ $product->price }}</del> <span>?{{ $product->sale_price }}</span>
                @else
                    <span>?{{ $product->price }}</span>
                @endif
            </div>

            <div class="description text-gray-600 mb-8 leading-relaxed">
                {!! $product->short_description ?? $product->description !!}
            </div>

            <form action="{{ route('cart.add') }}" method="POST" class="mb-8">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div class="flex items-center gap-4">
                    <div class="quantity-selector flex items-center border border-gray-300 rounded-lg overflow-hidden">
                        <button type="button" class="px-4 py-2 bg-gray-50 hover:bg-gray-100 text-gray-600 font-bold" onclick="document.getElementById('qty').value = Math.max(1, parseInt(document.getElementById('qty').value) - 1)">-</button>
                        <input type="number" id="qty" name="quantity" value="1" min="1" class="w-16 text-center border-0 focus:ring-0">
                        <button type="button" class="px-4 py-2 bg-gray-50 hover:bg-gray-100 text-gray-600 font-bold" onclick="document.getElementById('qty').value = parseInt(document.getElementById('qty').value) + 1">+</button>
                    </div>
                    <button type="submit" class="flex-1 bg-[#b71c1c] text-white py-3 px-6 rounded-lg font-bold text-lg hover:bg-[#8e1515] transition-colors shadow-lg shadow-red-900/20">
                        <i class="bi bi-cart-plus mr-2"></i> Add to Cart
                    </button>
                </div>
            </form>

            <div class="meta border-t border-gray-200 pt-6 mt-6">
                @if($product->sku)
                <p class="text-sm text-gray-600 mb-2"><span class="font-bold text-gray-900">SKU:</span> {{ $product->sku }}</p>
                @endif
                @if($product->category)
                <p class="text-sm text-gray-600"><span class="font-bold text-gray-900">Category:</span> <a href="/shop?cat={{ $product->category->slug }}" class="text-[#b71c1c] hover:underline">{{ $product->category->name }}</a></p>
                @endif
            </div>
        </div>
    </div>
    
    <!-- Full Description Tabs -->
    <div class="mt-16 bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="flex border-b border-gray-200 bg-gray-50">
            <button class="px-8 py-4 font-bold text-[#b71c1c] border-b-2 border-[#b71c1c] bg-white">Description</button>
            <button class="px-8 py-4 font-bold text-gray-500 hover:text-gray-700">Additional Information</button>
            <button class="px-8 py-4 font-bold text-gray-500 hover:text-gray-700">Reviews (5)</button>
        </div>
        <div class="p-8 text-gray-600 leading-relaxed">
            {!! $product->description !!}
        </div>
    </div>
</div>
@endsection

