@extends('layouts.store')

@section('title', 'Ruh Cloth — Discover Our Latest Collection')

@section('content')
<div class="bg-gradient-to-b from-rose-50/80 to-white font-catalog">
    <div class="mx-auto max-w-7xl px-3 py-8 sm:px-4 sm:py-12">
        <section class="mb-8 text-center sm:mb-10">
            <h2 class="mb-2 text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl md:text-5xl">
                Latest Collection
            </h2>
            <p class="mx-auto max-w-xl text-sm font-medium text-slate-500 sm:text-base">
                Curated lawn, kurtas, and formals designed for everyday elegance.
            </p>
        </section>

        <div class="grid grid-cols-2 gap-3 sm:gap-5 md:grid-cols-3 lg:grid-cols-4">
            @forelse ($products as $product)
                @include('partials.product-card', ['product' => $product])
            @empty
                <div class="col-span-full text-center text-slate-600">No products found.</div>
            @endforelse
        </div>
    </div>
</div>
@endsection
