<header class="sticky top-0 z-50 border-b border-slate-100 bg-white/95 backdrop-blur-md">
    <div class="bg-gradient-to-r from-rose-500 to-purple-600 py-1.5 text-white">
        <p class="truncate px-4 text-center text-[11px] font-medium sm:text-sm">Free shipping on orders over ₨2,000</p>
    </div>

    <div class="mx-auto max-w-7xl px-3 py-2.5 sm:px-4 sm:py-3">
        <div class="flex items-center gap-2 sm:gap-4">
            @include('partials.logo')

            <form action="{{ route('products.search') }}" method="get" class="relative hidden min-w-0 flex-1 md:block">
                <svg class="pointer-events-none absolute top-1/2 left-3 h-4 w-4 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m20 20-3-3"/></svg>
                <input type="search" name="q" value="{{ request('q') }}" placeholder="Search kurtas, lawn, formals..." class="w-full rounded-full border border-slate-200 bg-slate-50 py-2 pr-4 pl-10 text-sm outline-none transition focus:border-rose-300 focus:bg-white">
            </form>

            <div class="ml-auto flex shrink-0 items-center gap-0.5 sm:gap-1">
                <a href="{{ route('register') }}" data-guest-only class="hidden rounded-full px-3 py-1.5 text-sm font-medium text-slate-700 hover:bg-slate-100 lg:inline-flex">Sign up</a>
                <a href="{{ route('login') }}" data-guest-only class="hidden rounded-full bg-gradient-to-r from-rose-500 to-purple-600 px-3 py-1.5 text-sm font-semibold text-white shadow-sm lg:inline-flex">Login</a>
                <a href="{{ route('profile') }}" data-user-only class="is-hidden hidden rounded-full px-3 py-1.5 text-sm font-medium text-slate-700 hover:bg-slate-100 lg:inline-flex">Account</a>
                <button type="button" data-user-only data-logout class="is-hidden hidden rounded-full px-3 py-1.5 text-sm font-medium text-rose-600 hover:bg-rose-50 lg:inline-flex">Logout</button>

                <a href="{{ route('favorites') }}" class="relative rounded-full p-2 hover:bg-slate-100" aria-label="Favorites">
                    <svg class="h-5 w-5 text-slate-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78L12 21.23l8.84-8.84a5.5 5.5 0 0 0 0-7.78z"/></svg>
                    <span data-fav-count class="absolute top-0.5 right-0.5 hidden h-4 min-w-4 items-center justify-center rounded-full bg-rose-500 px-1 text-[10px] font-bold text-white">0</span>
                </a>
                <a href="{{ route('cart') }}" class="relative rounded-full p-2 hover:bg-slate-100" aria-label="Cart">
                    <svg class="h-5 w-5 text-slate-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
                    <span data-cart-count class="absolute top-0.5 right-0.5 hidden h-4 min-w-4 items-center justify-center rounded-full bg-purple-500 px-1 text-[10px] font-bold text-white">0</span>
                </a>
                <button type="button" id="mobile-menu-btn" class="rounded-full p-2 hover:bg-slate-100 lg:hidden" aria-label="Open menu" aria-expanded="false">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
            </div>
        </div>

        <form action="{{ route('products.search') }}" method="get" class="relative mt-2 md:hidden">
            <svg class="pointer-events-none absolute top-1/2 left-3 h-4 w-4 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m20 20-3-3"/></svg>
            <input type="search" name="q" value="{{ request('q') }}" placeholder="Search products..." class="w-full rounded-full border border-slate-200 bg-slate-50 py-2 pr-4 pl-10 text-sm outline-none focus:border-rose-300 focus:bg-white">
        </form>

        <nav class="mt-3 hidden items-center gap-7 border-t border-slate-100 pt-3 lg:flex">
            <a href="{{ route('products.index') }}" class="text-sm font-semibold text-slate-700 hover:text-rose-600">Home</a>
            <div class="group relative">
                <button type="button" class="flex items-center gap-1 text-sm font-semibold text-slate-700 hover:text-rose-600">
                    Categories
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="m6 9 6 6 6-6"/></svg>
                </button>
                <div class="invisible absolute top-full left-0 z-20 mt-2 w-48 rounded-xl border border-slate-100 bg-white py-1 opacity-0 shadow-lg transition group-hover:visible group-hover:opacity-100">
                    <a href="{{ route('products.category', 'kurtas-kurtis') }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-rose-50">Kurtas & Kurtis</a>
                    <a href="{{ route('products.category', 'lawn-suits') }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-rose-50">Lawn Suits</a>
                    <a href="{{ route('products.category', 'formal-wear') }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-rose-50">Formal Wear</a>
                    <a href="{{ route('products.category', 'accessories') }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-rose-50">Accessories</a>
                    <a href="{{ route('products.category', 'new-arrivals') }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-rose-50">New Arrivals</a>
                </div>
            </div>
            <a href="{{ route('about') }}" class="text-sm font-semibold text-slate-700 hover:text-rose-600">About</a>
            <a href="{{ route('contact') }}" class="text-sm font-semibold text-slate-700 hover:text-rose-600">Contact</a>
        </nav>
    </div>

    <div id="mobile-drawer" class="fixed inset-0 z-[60] hidden lg:hidden">
        <div id="mobile-drawer-backdrop" class="absolute inset-0 bg-slate-900/40"></div>
        <div class="absolute top-0 right-0 flex h-full w-[min(100%,20rem)] flex-col bg-white shadow-2xl">
            <div class="flex items-center justify-between border-b border-slate-100 px-4 py-3">
                <span class="text-sm font-bold text-slate-800">Menu</span>
                <button type="button" id="mobile-menu-close" class="rounded-full p-2 hover:bg-slate-100" aria-label="Close menu">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M6 18 18 6M6 6l12 12"/></svg>
                </button>
            </div>
            <nav class="flex-1 space-y-1 overflow-y-auto p-4">
                <a href="{{ route('products.index') }}" class="block rounded-xl px-3 py-2.5 font-semibold text-slate-800 hover:bg-rose-50">Home</a>
                <p class="px-3 pt-3 pb-1 text-xs font-bold tracking-wide text-slate-400 uppercase">Categories</p>
                <a href="{{ route('products.category', 'kurtas-kurtis') }}" class="block rounded-xl px-3 py-2 text-slate-700 hover:bg-rose-50">Kurtas & Kurtis</a>
                <a href="{{ route('products.category', 'lawn-suits') }}" class="block rounded-xl px-3 py-2 text-slate-700 hover:bg-rose-50">Lawn Suits</a>
                <a href="{{ route('products.category', 'formal-wear') }}" class="block rounded-xl px-3 py-2 text-slate-700 hover:bg-rose-50">Formal Wear</a>
                <a href="{{ route('products.category', 'accessories') }}" class="block rounded-xl px-3 py-2 text-slate-700 hover:bg-rose-50">Accessories</a>
                <a href="{{ route('products.category', 'new-arrivals') }}" class="block rounded-xl px-3 py-2 text-slate-700 hover:bg-rose-50">New Arrivals</a>
                <a href="{{ route('about') }}" class="mt-2 block rounded-xl px-3 py-2.5 font-semibold text-slate-800 hover:bg-rose-50">About</a>
                <a href="{{ route('contact') }}" class="block rounded-xl px-3 py-2.5 font-semibold text-slate-800 hover:bg-rose-50">Contact</a>
            </nav>
            <div class="space-y-2 border-t border-slate-100 p-4">
                <a href="{{ route('login') }}" data-guest-only class="block rounded-xl bg-gradient-to-r from-rose-500 to-purple-600 py-3 text-center font-semibold text-white">Login</a>
                <a href="{{ route('register') }}" data-guest-only class="block rounded-xl border border-slate-200 py-3 text-center font-semibold text-slate-800">Create account</a>
                <a href="{{ route('profile') }}" data-user-only class="is-hidden block rounded-xl bg-slate-900 py-3 text-center font-semibold text-white">Account</a>
                <button type="button" data-user-only data-logout class="is-hidden w-full rounded-xl border border-rose-200 py-3 font-semibold text-rose-600">Logout</button>
            </div>
        </div>
    </div>
</header>
