@extends('layouts.store')

@section('title', 'Search — Ruh Cloth')

@section('content')
<div class="bg-gradient-to-b from-rose-50/80 to-white font-catalog">
    <div class="mx-auto max-w-7xl px-3 py-8 sm:px-4 sm:py-12">
        <h2 class="mb-4 bg-gradient-to-r from-rose-500 to-purple-600 bg-clip-text text-3xl font-extrabold text-transparent sm:text-4xl">Search</h2>
        <form action="{{ route('products.search') }}" method="get" class="mb-6 max-w-xl">
            <input type="search" name="q" value="{{ $query }}" placeholder="Search for products..." class="w-full rounded-full border border-slate-200 px-5 py-3 text-sm outline-none focus:border-rose-300">
        </form>
        <p class="mb-6 text-sm text-slate-600">{{ count($products) }} result{{ count($products) === 1 ? '' : 's' }}{{ $query !== '' ? ' for "'.$query.'"' : '' }}</p>
        <div class="grid grid-cols-2 gap-3 sm:gap-5 md:grid-cols-3 lg:grid-cols-4">
            @forelse ($products as $product)
                @include('partials.product-card', ['product' => $product])
            @empty
                <div class="col-span-full rounded-2xl bg-white/80 p-12 text-center shadow">No matches found. Try another search.</div>
            @endforelse
        </div>
    </div>
</div>
@endsection
