@extends('layouts.store')

@section('title', 'Returns — Ruh Cloth')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-rose-50 via-purple-50 to-indigo-50">
    <div class="mx-auto max-w-3xl px-4 py-16">
        <h1 class="mb-6 bg-gradient-to-r from-rose-600 to-purple-600 bg-clip-text text-4xl font-bold text-transparent">Returns</h1>
        <div class="space-y-4 rounded-3xl border border-white/50 bg-white/80 p-8 text-gray-700 shadow-xl">
            <p>You have 7 days from delivery to request a return for unused items with tags attached.</p>
            <p>Sale items and stitched-to-order pieces cannot be returned unless they arrive damaged.</p>
            <p>Email info@ruhcloth.com with your order number and photos if something is wrong. We will arrange a pickup or a store credit.</p>
        </div>
    </div>
</div>
@endsection
