@extends('layouts.store')

@section('title', $title.' — Ruh Cloth')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-rose-50 via-purple-50 to-indigo-50">
    <div class="mx-auto max-w-3xl px-4 py-16">
        <h1 class="mb-4 bg-gradient-to-r from-rose-600 to-purple-600 bg-clip-text text-4xl font-bold text-transparent">{{ $title }}</h1>
        <p class="mb-8 text-lg text-gray-600">{{ $intro }}</p>
        <div class="space-y-6 rounded-3xl border border-white/50 bg-white/80 p-8 shadow-xl">
            @foreach ($sections as $section)
                <div>
                    <h2 class="mb-2 text-xl font-bold text-gray-800">{{ $section['heading'] }}</h2>
                    <p class="leading-relaxed text-gray-700">{{ $section['body'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
