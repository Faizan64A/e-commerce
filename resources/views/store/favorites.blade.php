@extends('layouts.store')

@section('title', 'My Favorites — Ruh Cloth')

@section('content')
<div class="bg-gradient-to-b from-rose-50/80 to-white">
    <div class="mx-auto max-w-7xl px-3 py-8 sm:px-4">
        <div class="mb-6 rounded-2xl border border-slate-100 bg-white p-5 shadow-sm sm:mb-8 sm:rounded-3xl sm:p-8">
            <h1 class="mb-1 bg-gradient-to-r from-rose-600 via-purple-600 to-indigo-600 bg-clip-text text-3xl font-bold text-transparent sm:text-4xl">My Favorites</h1>
            <p class="text-sm text-slate-600 sm:text-lg"><span id="fav-count-label">0 items</span> in your wishlist</p>
        </div>
        <div id="favorites-empty" class="hidden rounded-2xl border border-slate-100 bg-white p-8 text-center shadow-sm sm:p-12">
            <h2 class="mb-3 text-2xl font-bold text-slate-800">No favorites yet</h2>
            <p class="mb-6 text-sm text-slate-600">Tap the heart on a product to save it here.</p>
            <a href="{{ route('products.index') }}" class="inline-block rounded-xl bg-gradient-to-r from-rose-500 to-purple-600 px-6 py-3 font-semibold text-white">Browse Products</a>
        </div>
        <div id="favorites-grid" class="grid grid-cols-2 gap-3 sm:gap-5 md:grid-cols-3 lg:grid-cols-4"></div>
    </div>
</div>
@endsection
