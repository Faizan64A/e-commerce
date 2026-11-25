@extends('layouts.store')

@section('title', $product['name'].' — Ruh Cloth')

@section('content')
@php
    $hasDiscount = $product['original_price'] > $product['price'];
    $saveAmount = $product['original_price'] - $product['price'];
    $reviews = [
        ['name' => 'Ayesha Khan', 'rating' => 5, 'comment' => 'Amazing quality and beautiful embroidery work! The fabric is so soft and comfortable. Perfect for summer wear.', 'date' => '2 weeks ago'],
        ['name' => 'Fatima Ali', 'rating' => 5, 'comment' => 'Perfect fit and excellent quality. The embroidery is stunning and the fabric feels premium. Highly recommended!', 'date' => '1 month ago'],
        ['name' => 'Zara Ahmed', 'rating' => 4, 'comment' => 'Good quality kurta, delivery was fast. The embroidery is beautiful and the color is exactly as shown.', 'date' => '3 weeks ago'],
        ['name' => 'Maria Sheikh', 'rating' => 5, 'comment' => 'Absolutely love this kurta! The quality is outstanding and it is so comfortable to wear. Will definitely order more.', 'date' => '1 week ago'],
    ];
@endphp

<div class="min-h-screen bg-gradient-to-br from-rose-50 via-purple-50 to-indigo-50" data-product-detail data-stock="{{ $product['stock_count'] }}">
    <div class="mx-auto max-w-7xl px-3 py-4 sm:px-4 sm:py-6">
        <div class="mb-4 flex min-w-0 items-center gap-2 text-xs text-slate-600 sm:mb-6 sm:text-sm">
            <a href="{{ route('products.index') }}" class="inline-flex shrink-0 items-center hover:text-rose-600">
                <svg class="mr-1 h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
                Back
            </a>
            <span class="shrink-0">/</span>
            <span class="truncate font-medium text-slate-800">{{ $product['name'] }}</span>
        </div>

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 lg:gap-12">
            <div class="space-y-3 sm:space-y-4">
                <div class="group relative overflow-hidden rounded-2xl border border-white/60 bg-white shadow-lg sm:rounded-3xl sm:shadow-2xl">
                    <div class="relative h-72 sm:h-96 md:h-[520px]">
                        <img
                            id="main-product-image"
                            src="{{ $product['images'][0] }}"
                            alt="{{ $product['name'] }}"
                            class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-105"
                        >
                        @if (count($product['images']) > 1)
                            <button type="button" id="prev-image" class="absolute top-1/2 left-2 flex h-9 w-9 -translate-y-1/2 items-center justify-center rounded-full bg-white/95 text-slate-700 shadow sm:left-4 sm:h-12 sm:w-12">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="m15 18-6-6 6-6"/></svg>
                            </button>
                            <button type="button" id="next-image" class="absolute top-1/2 right-2 flex h-9 w-9 -translate-y-1/2 items-center justify-center rounded-full bg-white/95 text-slate-700 shadow sm:right-4 sm:h-12 sm:w-12">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="m9 18 6-6-6-6"/></svg>
                            </button>
                        @endif

                        <div class="absolute top-6 left-6 flex flex-col gap-3">
                            @if ($product['is_new'])
                                <span class="rounded-full bg-gradient-to-r from-emerald-500 to-teal-500 px-3 py-1.5 text-sm font-semibold text-white shadow-xl">NEW ARRIVAL</span>
                            @endif
                            @if ($product['is_bestseller'])
                                <span class="rounded-full bg-gradient-to-r from-amber-500 to-orange-500 px-3 py-1.5 text-sm font-semibold text-white shadow-xl">BESTSELLER</span>
                            @endif
                            @if ($product['discount'] > 0)
                                <span class="animate-pulse rounded-full bg-gradient-to-r from-red-500 to-pink-500 px-3 py-1.5 text-sm font-semibold text-white shadow-xl">-{{ $product['discount'] }}% OFF</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="scrollbar-hide flex gap-3 overflow-x-auto pb-2">
                    @foreach ($product['images'] as $index => $image)
                        <button
                            type="button"
                            class="h-20 w-20 flex-shrink-0 overflow-hidden rounded-xl border-2 transition-all duration-300 hover:scale-105 {{ $index === 0 ? 'border-rose-500 shadow-lg ring-2 ring-rose-200' : 'border-gray-200 shadow-md hover:border-rose-300' }}"
                            data-thumb
                            data-index="{{ $index }}"
                            data-src="{{ $image }}"
                        >
                            <img src="{{ $image }}" alt="{{ $product['name'] }} {{ $index + 1 }}" class="h-full w-full object-cover">
                        </button>
                    @endforeach
                </div>
            </div>

            <div class="space-y-6">
                <div class="flex w-fit items-center gap-3 rounded-2xl bg-gradient-to-r from-yellow-50 to-amber-50 px-4 py-2 shadow-lg">
                    <div class="flex items-center">
                        @for ($i = 1; $i <= 5; $i++)
                            <svg class="h-5 w-5 {{ $i <= $product['rating'] ? 'text-yellow-500' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27 18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                        @endfor
                    </div>
                    <span class="text-sm font-semibold text-gray-700">{{ $product['rating'] }} ({{ $product['reviews'] }} reviews)</span>
                </div>

                <h1 class="text-2xl leading-tight font-semibold text-slate-800 sm:text-3xl md:text-4xl">{{ $product['name'] }}</h1>

                <div class="flex flex-wrap items-center gap-4">
                    <span class="bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-3xl font-bold text-transparent">
                        ₨{{ number_format($product['price']) }}
                    </span>
                    @if ($hasDiscount)
                        <span class="text-xl text-gray-500 line-through">₨{{ number_format($product['original_price']) }}</span>
                        <span class="rounded-full bg-green-50 px-3 py-1 text-sm font-bold text-green-600 shadow-md">
                            Save ₨{{ number_format($saveAmount) }}
                        </span>
                    @endif
                </div>

                <div class="flex w-fit items-center gap-3 rounded-xl bg-green-50 px-4 py-2">
                    <svg class="h-5 w-5 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg>
                    <span class="font-semibold text-green-700">{{ $product['in_stock'] ? 'In Stock' : 'Out of Stock' }}</span>
                </div>

                <div class="space-y-3">
                    <h3 class="text-lg font-semibold text-gray-800">Quantity</h3>
                    <div class="flex items-center gap-3">
                        <button type="button" id="qty-minus" class="flex h-10 w-10 items-center justify-center rounded-full bg-gray-100 text-gray-700 shadow-md transition hover:bg-gray-200 hover:shadow-lg">−</button>
                        <span id="qty-value" class="min-w-[3rem] rounded-xl bg-gray-50 px-3 py-2 text-center text-xl font-bold text-gray-800">1</span>
                        <button type="button" id="qty-plus" class="flex h-10 w-10 items-center justify-center rounded-full bg-gray-100 text-gray-700 shadow-md transition hover:bg-gray-200 hover:shadow-lg">+</button>
                    </div>
                </div>

                <div class="space-y-3">
                    <button
                        type="button"
                        id="buy-now"
                        class="flex h-12 w-full items-center justify-center rounded-2xl bg-gradient-to-r from-orange-500 via-red-500 to-pink-500 text-base font-bold text-white shadow-lg sm:h-14 sm:text-lg"
                    >
                        Buy Now - ₨<span data-buy-total>{{ number_format($product['price']) }}</span>
                    </button>
                    <button
                        type="button"
                        class="flex h-11 w-full items-center justify-center rounded-2xl bg-gradient-to-r from-rose-500 via-purple-600 to-indigo-600 text-base font-semibold text-white shadow-lg sm:h-12 sm:text-lg"
                        data-add-to-cart
                        data-product-id="{{ $product['id'] }}"
                        data-product-name="{{ $product['name'] }}"
                        data-product-price="{{ $product['price'] }}"
                        data-product-image="{{ $product['images'][0] }}"
                    >
                        Add to Cart
                    </button>
                    <button
                        type="button"
                        id="wishlist-btn"
                        class="flex h-10 w-full items-center justify-center rounded-2xl border-2 border-rose-300 bg-transparent font-semibold text-rose-600 shadow-md transition hover:bg-rose-50 hover:shadow-lg"
                        data-toggle-fav
                        data-product-id="{{ $product['id'] }}"
                    >
                        Add to Wishlist
                    </button>
                </div>

                <div class="grid grid-cols-1 gap-3 border-t border-gray-200 pt-4 md:grid-cols-3">
                    <div class="flex items-center gap-2 rounded-xl bg-white/80 p-3 shadow-lg transition hover:-translate-y-1 hover:shadow-xl">
                        <div>
                            <div class="text-sm font-semibold text-gray-800">Free Shipping</div>
                            <div class="text-xs text-gray-600">On orders over ₨2000</div>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 rounded-xl bg-white/80 p-3 shadow-lg transition hover:-translate-y-1 hover:shadow-xl">
                        <div>
                            <div class="text-sm font-semibold text-gray-800">Easy Returns</div>
                            <div class="text-xs text-gray-600">7-day return policy</div>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 rounded-xl bg-white/80 p-3 shadow-lg transition hover:-translate-y-1 hover:shadow-xl">
                        <div>
                            <div class="text-sm font-semibold text-gray-800">Secure Payment</div>
                            <div class="text-xs text-gray-600">100% secure checkout</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-12">
            <div class="overflow-hidden rounded-3xl border border-white/60 bg-white/90 shadow-2xl backdrop-blur-sm">
                <div class="flex border-b border-gray-200">
                    <button type="button" class="tab-btn flex-1 border-b-2 border-rose-500 bg-gradient-to-r from-rose-50 to-purple-50 py-4 px-6 text-center font-bold text-rose-600" data-tab="description">Description</button>
                    <button type="button" class="tab-btn flex-1 py-4 px-6 text-center font-bold text-gray-600 hover:bg-rose-50 hover:text-rose-600" data-tab="reviews">Reviews</button>
                </div>
                <div class="p-6">
                    <div id="tab-description" class="tab-panel">
                        <p class="text-lg leading-relaxed text-gray-700">{{ $product['description'] }}</p>
                    </div>
                    <div id="tab-reviews" class="tab-panel hidden space-y-6">
                        <div class="flex items-center justify-between">
                            <h4 class="text-xl font-bold text-gray-800">Customer Reviews</h4>
                            <button type="button" class="rounded-xl bg-gradient-to-r from-rose-500 to-purple-600 px-4 py-2 font-semibold text-white shadow-lg transition hover:scale-105 hover:shadow-xl">Write a Review</button>
                        </div>
                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                            @foreach ($reviews as $review)
                                <div class="rounded-2xl bg-gradient-to-br from-gray-50 to-white p-4 shadow-lg transition hover:-translate-y-1 hover:shadow-xl">
                                    <div class="mb-3 flex items-center justify-between">
                                        <div class="flex items-center gap-3">
                                            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-r from-rose-400 to-purple-500 font-bold text-white shadow-lg">
                                                {{ substr($review['name'], 0, 1) }}
                                            </div>
                                            <div>
                                                <div class="text-sm font-bold text-gray-800">{{ $review['name'] }}</div>
                                                <div class="text-xs text-gray-600">{{ $review['date'] }}</div>
                                            </div>
                                        </div>
                                        <span class="rounded-full bg-green-100 px-2 py-1 text-xs text-green-800">Verified</span>
                                    </div>
                                    <div class="mb-3 flex items-center">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <svg class="h-4 w-4 {{ $i <= $review['rating'] ? 'text-yellow-500' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27 18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                                        @endfor
                                    </div>
                                    <p class="text-sm leading-relaxed text-gray-700">{{ $review['comment'] }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-12">
            <h3 class="mb-6 text-center text-2xl font-bold text-slate-800 sm:mb-8 sm:text-3xl">You May Also Like</h3>
            <div class="grid grid-cols-2 gap-3 sm:gap-5 md:grid-cols-3">
                @foreach ($relatedProducts as $related)
                    @include('partials.product-card', ['product' => $related])
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
