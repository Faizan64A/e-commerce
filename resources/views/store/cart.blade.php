@extends('layouts.store')

@section('title', 'Your Shopping Bag — Ruh Cloth')

@section('content')
<div class="bg-gradient-to-b from-rose-50/80 to-white">
    <div class="mx-auto max-w-7xl px-3 py-8 sm:px-4 sm:py-12">
        <h2 class="mb-8 bg-gradient-to-r from-rose-600 to-purple-700 bg-clip-text text-center text-3xl font-extrabold text-transparent sm:mb-12 sm:text-4xl">Your Bag</h2>

        <div id="cart-empty" class="hidden flex-col items-center justify-center rounded-xl border bg-white/80 py-20 shadow-lg">
            <p class="mb-6 text-xl text-gray-600">Your shopping bag is empty.</p>
            <a href="{{ route('products.index') }}" class="rounded-lg bg-rose-500 px-8 py-3 font-semibold text-white shadow hover:bg-rose-600">Continue Shopping</a>
        </div>

        <div id="cart-filled" class="hidden grid-cols-1 gap-8 lg:grid-cols-3">
            <div class="rounded-2xl border border-slate-100 bg-white p-4 shadow-md sm:p-6 lg:col-span-2">
                <h3 class="mb-4 text-lg font-bold text-slate-800 sm:mb-6 sm:text-2xl">Items in your bag</h3>
                <div id="cart-items" class="space-y-6"></div>
            </div>
            <div class="h-fit sticky top-28 rounded-2xl border bg-white/90 p-6 shadow-md">
                <h3 class="mb-6 text-2xl font-bold text-gray-800">Order Summary</h3>
                <div id="cart-summary" class="space-y-4 text-gray-700"></div>
                <a href="{{ route('checkout') }}?source=cart" class="mt-8 block w-full rounded-lg bg-rose-500 py-3 text-center font-semibold text-white shadow hover:bg-rose-600">Proceed to Checkout</a>
                <a href="{{ route('products.index') }}" class="mt-4 block w-full rounded-lg border border-gray-300 py-3 text-center font-semibold text-gray-700 hover:bg-gray-50">Continue Shopping</a>
            </div>
        </div>
    </div>
</div>
@endsection
