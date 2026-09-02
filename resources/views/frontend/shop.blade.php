@extends('layouts.frontend')

@section('title', 'Shop')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-6 border-b border-gray-200 pb-4">
        <h1 class="text-3xl font-bold text-gray-900" style="font-family: 'Outfit', sans-serif;">Shop Collection</h1>
        <p class="text-sm text-gray-500 mt-2"><a href="/" class="hover:text-[#b71c1c]">Home</a> <span class="mx-2">/</span> Shop</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <!-- Sidebar Filters -->
        <div class="hidden md:block col-span-1">
            <div class="bg-white p-5 rounded-xl border border-gray-100 shadow-sm">
                <h3 class="text-lg font-bold mb-4 border-b pb-2">Categories</h3>
                <ul class="space-y-2">
                    <li><a href="/shop?cat=dresses" class="text-gray-600 hover:text-[#b71c1c]">Laddu Gopal Dresses</a></li>
                    <li><a href="/shop?cat=ornaments" class="text-gray-600 hover:text-[#b71c1c]">Ornaments</a></li>
                    <li><a href="/shop?cat=accessories" class="text-gray-600 hover:text-[#b71c1c]">Accessories</a></li>
                    <li><a href="/shop?cat=idols" class="text-gray-600 hover:text-[#b71c1c]">Idols (Vigrah)</a></li>
                    <li><a href="/shop?cat=combo" class="text-gray-600 hover:text-[#b71c1c]">Combo Sets</a></li>
                </ul>

                <h3 class="text-lg font-bold mt-8 mb-4 border-b pb-2">Filter by Price</h3>
                <input type="range" class="w-full accent-[#b71c1c]" min="0" max="5000">
                <div class="flex justify-between text-sm text-gray-500 mt-2">
                    <span>?0</span>
                    <span>?5000+</span>
                </div>
                <button class="mt-4 w-full bg-[#b71c1c] text-white py-2 rounded-lg font-semibold hover:bg-[#8e1515] transition-colors">Apply Filter</button>
            </div>
        </div>

        <!-- Product Grid -->
        <div class="col-span-1 md:col-span-3">
            @if(isset($products) && $products->count() > 0)
                <ul class="grid grid-cols-2 lg:grid-cols-3 gap-6 products">
                    @foreach($products as $product)
                        <li class="product">
                            <div class="product-img">
                                <a href="{{ route('product.show', $product->slug) }}">
                                    <img src="{{ asset($product->primary_image_url) }}" alt="{{ $product->name }}">
                                </a>
                                <div class="cart-button">
                                    <div class="cart-button-inner">
                                        <a href="{{ route('product.show', $product->slug) }}" class="button">Buy Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="rating-star">?????</div>
                                <a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                                <div class="price">
                                    @if($product->discount_price)
                                        <del>?{{ $product->price }}</del> <span>?{{ $product->discount_price }}</span>
                                    @else
                                        <span>?{{ $product->price }}</span>
                                    @endif
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="mt-8 flex justify-center">
                    {{ $products->links() }}
                </div>
            @else
                <div class="text-center py-16 bg-white rounded-xl border border-gray-100 shadow-sm">
                    <i class="bi bi-basket text-4xl text-gray-300 mb-4 block"></i>
                    <h2 class="text-xl font-bold text-gray-700 mb-2">No products found</h2>
                    <p class="text-gray-500 mb-6">We couldn't find any products matching your criteria.</p>
                    <a href="{{ route('shop') }}" class="inline-block bg-[#b71c1c] text-white px-6 py-2 rounded-lg font-semibold hover:bg-[#8e1515] transition-colors">Clear Filters</a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

