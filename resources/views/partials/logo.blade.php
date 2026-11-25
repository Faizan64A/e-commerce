@php
    $onDark = $onDark ?? false;
    $size = $size ?? 'md';
    $mark = $size === 'lg' ? 'h-12 w-12' : 'h-9 w-9 sm:h-10 sm:w-10';
    $word = $size === 'lg' ? 'text-2xl' : 'text-[15px] sm:text-lg';
@endphp

<a href="{{ route('products.index') }}" class="inline-flex shrink-0 items-center gap-2 no-underline">
    <span class="relative flex {{ $mark }} items-center justify-center rounded-2xl bg-gradient-to-br from-rose-500 via-fuchsia-500 to-purple-600 shadow-md shadow-rose-200/60">
        <svg class="h-5 w-5 text-white sm:h-6 sm:w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
        </svg>
        <span class="absolute -right-0.5 -top-0.5 h-2.5 w-2.5 rounded-full bg-amber-300 ring-2 ring-white"></span>
    </span>
    <span class="leading-none">
        <span class="{{ $word }} font-display block font-semibold tracking-[0.04em]">
            <span class="bg-gradient-to-r from-rose-500 to-purple-600 bg-clip-text text-transparent">RUH</span>
            <span class="{{ $onDark ? 'text-white' : 'text-slate-800' }}"> CLOTH</span>
        </span>
        <span class="mt-1 hidden font-sans text-[9px] font-medium tracking-[0.28em] {{ $onDark ? 'text-white/70' : 'text-slate-400' }} sm:block">SOUL OF FASHION</span>
    </span>
</a>
