<footer class="bg-slate-950 text-white">
    <div class="mx-auto max-w-7xl px-4 py-10 sm:py-16">
        <div class="grid grid-cols-1 gap-10 sm:grid-cols-2 md:grid-cols-4">
            <div class="space-y-4">
                @include('partials.logo', ['onDark' => true])
                <p class="text-sm text-gray-400">Premium fashion for your soul. Quality craftsmanship meets modern design.</p>
            </div>
            <div>
                <h4 class="mb-4 text-lg font-semibold">Quick Links</h4>
                <ul class="space-y-2 text-gray-400">
                    <li><a href="{{ route('about') }}" class="hover:text-white">About Us</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-white">Contact</a></li>
                    <li><a href="{{ route('size-guide') }}" class="hover:text-white">Size Guide</a></li>
                    <li><a href="{{ route('shipping') }}" class="hover:text-white">Shipping Info</a></li>
                    <li><a href="{{ route('returns') }}" class="hover:text-white">Returns</a></li>
                </ul>
            </div>
            <div>
                <h4 class="mb-4 text-lg font-semibold">Categories</h4>
                <ul class="space-y-2 text-gray-400">
                    <li><a href="{{ route('products.category', 'new-arrivals') }}" class="hover:text-white">New Arrivals</a></li>
                    <li><a href="{{ route('products.category', 'kurtas-kurtis') }}" class="hover:text-white">Kurtas</a></li>
                    <li><a href="{{ route('products.category', 'lawn-suits') }}" class="hover:text-white">Lawn Suits</a></li>
                    <li><a href="{{ route('products.category', 'formal-wear') }}" class="hover:text-white">Formal Wear</a></li>
                    <li><a href="{{ route('products.category', 'accessories') }}" class="hover:text-white">Accessories</a></li>
                </ul>
            </div>
            <div>
                <h4 class="mb-4 text-lg font-semibold">Contact Info</h4>
                <div class="space-y-3 text-gray-400">
                    <p>Lahore, Pakistan</p>
                    <p>+92 300 1234567</p>
                    <p>info@ruhcloth.com</p>
                </div>
            </div>
        </div>
        <div class="mt-12 flex flex-col items-center justify-between border-t border-gray-800 pt-8 md:flex-row">
            <p class="text-sm text-gray-400">© 2024 Ruh Cloth. All rights reserved.</p>
            <div class="mt-4 flex space-x-6 md:mt-0">
                <a href="{{ route('privacy') }}" class="text-sm text-gray-400 hover:text-white">Privacy Policy</a>
                <a href="{{ route('terms') }}" class="text-sm text-gray-400 hover:text-white">Terms of Service</a>
                <a href="{{ route('cookies') }}" class="text-sm text-gray-400 hover:text-white">Cookie Policy</a>
            </div>
        </div>
    </div>
</footer>
