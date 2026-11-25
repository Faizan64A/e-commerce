@php
    $hasDiscount = $product['original_price'] > $product['price'];
    $saveAmount = $product['original_price'] - $product['price'];
@endphp

<article class="group relative w-full overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-sm transition duration-300 sm:rounded-3xl sm:shadow-md hover:border-rose-100 hover:shadow-xl" data-product-card>
    <a href="{{ route('products.show', $product['id']) }}" class="relative block overflow-hidden" data-card-gallery>
        <div class="scrollbar-hide flex h-44 w-full overflow-x-auto scroll-smooth sm:h-60 md:h-72" data-card-scroller style="scroll-snap-type: x mandatory;">
            @foreach ($product['images'] as $image)
                <img
                    src="{{ $image }}"
                    alt="{{ $product['name'] }}"
                    class="h-44 w-full flex-shrink-0 object-cover sm:h-60 md:h-72 md:transition-transform md:duration-700 md:group-hover:scale-105"
                    style="scroll-snap-align: start;"
                >
            @endforeach
        </div>

        <div class="absolute top-2 left-2 flex flex-col gap-1 sm:top-3 sm:left-3 sm:gap-2">
            @if ($product['is_new'])
                <span class="rounded-full bg-emerald-500 px-1.5 py-0.5 text-[10px] font-bold text-white sm:px-2 sm:py-1 sm:text-xs">NEW</span>
            @endif
            @if ($product['is_bestseller'])
                <span class="rounded-full bg-amber-500 px-1.5 py-0.5 text-[10px] font-bold text-white sm:px-2 sm:py-1 sm:text-xs">BEST</span>
            @endif
            @if ($product['discount'] > 0)
                <span class="rounded-full bg-rose-500 px-1.5 py-0.5 text-[10px] font-bold text-white sm:px-2 sm:py-1 sm:text-xs">-{{ $product['discount'] }}%</span>
            @endif
        </div>
    </a>

    <button
        type="button"
        class="absolute top-2 right-2 z-10 flex h-8 w-8 items-center justify-center rounded-full bg-white/95 text-slate-700 shadow sm:top-3 sm:right-3 sm:h-10 sm:w-10"
        data-toggle-fav
        data-product-id="{{ $product['id'] }}"
        aria-label="Add to favorites"
    >
        <svg class="h-4 w-4 sm:h-5 sm:w-5" data-heart-icon fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78L12 21.23l8.84-8.84a5.5 5.5 0 0 0 0-7.78z"/></svg>
    </button>

    <div class="p-2.5 sm:p-4">
        <div class="mb-1 flex items-center gap-1 text-[10px] text-amber-500 sm:mb-2 sm:text-xs">
            @for ($i = 1; $i <= 5; $i++)
                <svg class="h-3 w-3 {{ $i <= $product['rating'] ? 'text-amber-400' : 'text-slate-200' }}" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27 18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
            @endfor
            <span class="text-slate-500">({{ $product['reviews'] }})</span>
        </div>

        <a href="{{ route('products.show', $product['id']) }}">
            <h3 class="mb-1.5 line-clamp-2 min-h-10 font-catalog text-sm font-semibold tracking-tight text-slate-800 sm:min-h-12 sm:text-[15px]">
                {{ $product['name'] }}
            </h3>
        </a>

        <div class="mb-2.5 flex flex-wrap items-baseline gap-x-2 gap-y-0.5">
            <span class="text-base font-extrabold text-slate-900 sm:text-lg">₨{{ number_format($product['price']) }}</span>
            @if ($hasDiscount)
                <span class="text-xs text-slate-400 line-through sm:text-sm">₨{{ number_format($product['original_price']) }}</span>
            @endif
        </div>

        <button
            type="button"
            class="flex h-9 w-full items-center justify-center rounded-xl bg-gradient-to-r from-rose-500 to-purple-600 text-xs font-semibold text-white sm:h-11 sm:rounded-xl sm:text-sm"
            data-add-to-cart
            data-product-id="{{ $product['id'] }}"
            data-product-name="{{ $product['name'] }}"
            data-product-price="{{ $product['price'] }}"
            data-product-image="{{ $product['images'][0] }}"
        >
            Add to Cart
        </button>
    </div>
</article>
