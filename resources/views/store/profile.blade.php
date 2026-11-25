@extends('layouts.store')

@section('title', 'User Profile — Ruh Cloth')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-rose-50 via-purple-50 to-indigo-50 px-4 py-12">
    <div class="mx-auto max-w-2xl">
        <div class="overflow-hidden rounded-3xl border border-white/50 bg-white/80 shadow-xl">
            <div class="bg-gradient-to-r from-rose-500 via-purple-600 to-indigo-600 p-8 text-center text-white">
                <h1 class="mb-2 text-3xl font-bold">User Profile</h1>
                <p class="text-white/90">Update your personal details below</p>
            </div>
            <form id="profile-form" class="space-y-6 p-8">
                <div>
                    <label class="mb-2 block text-sm font-semibold text-gray-700">Full Name</label>
                    <input name="name" required placeholder="Enter your full name" class="w-full rounded-xl border-2 border-gray-200 bg-gray-50 px-4 py-4 outline-none focus:border-rose-500 focus:bg-white">
                </div>
                <div>
                    <label class="mb-2 block text-sm font-semibold text-gray-700">Email Address</label>
                    <input type="email" name="email" required placeholder="Enter your email address" class="w-full rounded-xl border-2 border-gray-200 bg-gray-50 px-4 py-4 outline-none focus:border-rose-500 focus:bg-white">
                </div>
                <div>
                    <label class="mb-2 block text-sm font-semibold text-gray-700">Phone Number</label>
                    <input type="tel" name="phone" required placeholder="Enter your phone number" class="w-full rounded-xl border-2 border-gray-200 bg-gray-50 px-4 py-4 outline-none focus:border-rose-500 focus:bg-white">
                </div>
                <div>
                    <label class="mb-2 block text-sm font-semibold text-gray-700">Street Address</label>
                    <textarea name="address" rows="3" required placeholder="Enter your complete address" class="w-full resize-none rounded-xl border-2 border-gray-200 bg-gray-50 px-4 py-4 outline-none focus:border-rose-500 focus:bg-white"></textarea>
                </div>
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div>
                        <label class="mb-2 block text-sm font-semibold text-gray-700">City</label>
                        <input name="city" required placeholder="Enter your city" class="w-full rounded-xl border-2 border-gray-200 bg-gray-50 px-4 py-4 outline-none focus:border-rose-500 focus:bg-white">
                    </div>
                    <div>
                        <label class="mb-2 block text-sm font-semibold text-gray-700">Province</label>
                        <select name="province" required class="w-full rounded-xl border-2 border-gray-200 bg-gray-50 px-4 py-4 outline-none focus:border-rose-500 focus:bg-white">
                            <option value="">Select Province</option>
                            <option>Punjab</option>
                            <option>Sindh</option>
                            <option>Khyber Pakhtunkhwa</option>
                            <option>Balochistan</option>
                            <option>Gilgit-Baltistan</option>
                            <option>Azad Kashmir</option>
                            <option>Islamabad Capital Territory</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="flex h-14 w-full items-center justify-center rounded-xl bg-gradient-to-r from-rose-500 via-purple-600 to-indigo-600 text-lg font-semibold text-white shadow-lg hover:scale-105">Update Profile</button>
            </form>
        </div>
    </div>
</div>
@endsection
