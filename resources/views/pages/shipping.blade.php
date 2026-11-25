@extends('layouts.store')

@section('title', 'Shipping Info — Ruh Cloth')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-rose-50 via-purple-50 to-indigo-50">
    <div class="mx-auto max-w-3xl px-4 py-16">
        <h1 class="mb-6 bg-gradient-to-r from-rose-600 to-purple-600 bg-clip-text text-4xl font-bold text-transparent">Shipping Info</h1>
        <div class="space-y-4 rounded-3xl border border-white/50 bg-white/80 p-8 text-gray-700 shadow-xl">
            <p>Free shipping on orders over ₨2000. A flat ₨500 fee applies below that threshold.</p>
            <p>Orders placed before 3pm usually leave the warehouse the next working day. Delivery inside Punjab is 2–4 days; other provinces 4–7 days.</p>
            <p>You will receive an order number after checkout. Cash on Delivery, JazzCash, and EasyPaisa are available on the checkout page.</p>
        </div>
    </div>
</div>
@endsection
