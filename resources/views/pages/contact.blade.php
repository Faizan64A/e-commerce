@extends('layouts.store')

@section('title', 'Contact — Ruh Cloth')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-rose-50 via-purple-50 to-indigo-50">
    <div class="mx-auto max-w-3xl px-4 py-16">
        <h1 class="mb-6 bg-gradient-to-r from-rose-600 to-purple-600 bg-clip-text text-4xl font-bold text-transparent">Contact</h1>
        <div class="mb-8 grid gap-4 rounded-3xl border border-white/50 bg-white/80 p-8 shadow-xl md:grid-cols-3">
            <p><span class="block font-semibold text-gray-800">Address</span><span class="text-gray-600">Lahore, Pakistan</span></p>
            <p><span class="block font-semibold text-gray-800">Phone</span><span class="text-gray-600">+92 300 1234567</span></p>
            <p><span class="block font-semibold text-gray-800">Email</span><span class="text-gray-600">info@ruhcloth.com</span></p>
        </div>
        <form id="contact-form" class="space-y-4 rounded-3xl border border-white/50 bg-white/80 p-8 shadow-xl">
            <input name="name" required placeholder="Your name" class="w-full rounded-xl border border-gray-200 px-4 py-3 outline-none focus:border-rose-500">
            <input type="email" name="email" required placeholder="Your email" class="w-full rounded-xl border border-gray-200 px-4 py-3 outline-none focus:border-rose-500">
            <textarea name="message" rows="5" required placeholder="How can we help?" class="w-full rounded-xl border border-gray-200 px-4 py-3 outline-none focus:border-rose-500"></textarea>
            <button type="submit" class="w-full rounded-xl bg-gradient-to-r from-rose-500 to-purple-600 py-3 font-semibold text-white">Send Message</button>
        </form>
    </div>
</div>
@endsection
