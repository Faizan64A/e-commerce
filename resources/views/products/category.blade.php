@extends('layouts.store')

@section('title', $name.' — Ruh Cloth')

@section('content')
<div class="bg-gradient-to-b from-rose-50/80 to-white font-catalog">
    <div class="mx-auto max-w-7xl px-3 py-8 sm:px-4 sm:py-12">
        <h2 class="mb-2 bg-gradient-to-r from-rose-700 to-purple-800 bg-clip-text text-3xl font-extrabold text-transparent sm:text-4xl">{{ $name }}</h2>
        <p class="mb-8 text-sm text-slate-600 sm:text-base">Shop our {{ strtolower($name) }} collection.</p>
        <div class="grid grid-cols-2 gap-3 sm:gap-5 md:grid-cols-3 lg:grid-cols-4">
            @forelse ($products as $product)
                @include('partials.product-card', ['product' => $product])
            @empty
                <div class="col-span-full rounded-2xl bg-white/80 p-12 text-center shadow">No products in this category yet.</div>
            @endforelse
        </div>
    </div>
</div>
@endsection
