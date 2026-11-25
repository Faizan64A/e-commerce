@extends('layouts.store')

@section('title', 'Size Guide — Ruh Cloth')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-rose-50">
    <div class="mx-auto max-w-4xl px-4 py-16">
        <h1 class="mb-6 bg-gradient-to-r from-rose-600 to-purple-600 bg-clip-text text-4xl font-bold text-transparent">Size Guide</h1>
        <div class="overflow-hidden rounded-3xl border bg-white/90 shadow-xl">
            <table class="w-full text-left text-sm text-gray-700 md:text-base">
                <thead class="bg-gradient-to-r from-rose-500 to-purple-600 text-white">
                    <tr>
                        <th class="px-4 py-3">Size</th>
                        <th class="px-4 py-3">Chest (in)</th>
                        <th class="px-4 py-3">Waist (in)</th>
                        <th class="px-4 py-3">Length (in)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-t"><td class="px-4 py-3">S</td><td class="px-4 py-3">36</td><td class="px-4 py-3">32</td><td class="px-4 py-3">38</td></tr>
                    <tr class="border-t bg-rose-50/40"><td class="px-4 py-3">M</td><td class="px-4 py-3">38</td><td class="px-4 py-3">34</td><td class="px-4 py-3">40</td></tr>
                    <tr class="border-t"><td class="px-4 py-3">L</td><td class="px-4 py-3">40</td><td class="px-4 py-3">36</td><td class="px-4 py-3">42</td></tr>
                    <tr class="border-t bg-rose-50/40"><td class="px-4 py-3">XL</td><td class="px-4 py-3">42</td><td class="px-4 py-3">38</td><td class="px-4 py-3">44</td></tr>
                </tbody>
            </table>
        </div>
        <p class="mt-6 text-gray-600">If you are between sizes, we recommend sizing up for lawn sets and kurtas.</p>
    </div>
</div>
@endsection
