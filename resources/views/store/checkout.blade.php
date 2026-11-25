@extends('layouts.store')

@section('title', 'Secure Checkout — Ruh Cloth')

@section('content')
<div class="bg-gradient-to-b from-rose-50/80 to-white">
    <div class="mx-auto max-w-7xl px-3 py-6 sm:px-4 sm:py-8">
        <div class="mb-6 text-center sm:mb-10">
            <h1 class="mb-2 bg-gradient-to-r from-rose-600 via-purple-600 to-indigo-600 bg-clip-text text-3xl font-bold text-transparent sm:text-4xl">Checkout</h1>
            <p class="text-sm text-slate-600 sm:text-lg">Complete your order in a few steps</p>
        </div>

        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-8 xl:grid-cols-3">
            <div class="space-y-8 xl:col-span-2">
                <div class="overflow-hidden rounded-3xl border border-white/50 bg-white/80 shadow-xl">
                    <div class="bg-gradient-to-r from-rose-500 via-purple-600 to-indigo-600 p-6 text-white">
                        <h2 class="text-2xl font-bold">Shipping Address</h2>
                        <p class="mt-2 text-white/90">Enter your details for delivery</p>
                    </div>
                    <form id="checkout-form" class="space-y-4 p-4 sm:space-y-6 sm:p-8">
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                            <input name="name" required placeholder="Full Name" class="w-full rounded-xl border border-gray-200 bg-white/50 px-4 py-3 outline-none focus:border-purple-500">
                            <input type="email" name="email" required placeholder="Email Address" class="w-full rounded-xl border border-gray-200 bg-white/50 px-4 py-3 outline-none focus:border-purple-500">
                        </div>
                        <input name="street" required placeholder="Street Address" class="w-full rounded-xl border border-gray-200 bg-white/50 px-4 py-3 outline-none focus:border-purple-500">
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                            <input name="city" required placeholder="City" class="w-full rounded-xl border border-gray-200 bg-white/50 px-4 py-3 outline-none focus:border-purple-500">
                            <select name="province" required class="w-full rounded-xl border border-gray-200 bg-white/50 px-4 py-3 outline-none focus:border-purple-500">
                                <option value="">Select Province</option>
                                <option>Punjab</option>
                                <option>Sindh</option>
                                <option>Khyber Pakhtunkhwa</option>
                                <option>Balochistan</option>
                                <option>Gilgit-Baltistan</option>
                                <option>Azad Jammu & Kashmir</option>
                            </select>
                            <input name="zip" required placeholder="Zip Code" class="w-full rounded-xl border border-gray-200 bg-white/50 px-4 py-3 outline-none focus:border-purple-500">
                        </div>
                    </form>
                </div>

                <div class="overflow-hidden rounded-3xl border border-white/50 bg-white/80 shadow-xl">
                    <div class="bg-gradient-to-r from-rose-500 via-purple-600 to-indigo-600 p-6 text-white">
                        <h2 class="text-2xl font-bold">Your Order</h2>
                        <p class="mt-2 text-white/90">Review your selected items</p>
                    </div>
                    <div id="checkout-items" class="space-y-4 p-4 sm:space-y-6 sm:p-8"></div>
                </div>
            </div>

            <div class="space-y-8">
                <div class="overflow-hidden rounded-3xl border border-white/50 bg-white/80 shadow-xl">
                    <div class="bg-gradient-to-r from-rose-500 via-purple-600 to-indigo-600 p-6 text-white">
                        <h2 class="text-2xl font-bold">Payment Method</h2>
                    </div>
                    <div class="space-y-3 p-4 sm:space-y-4 sm:p-8">
                        <label class="flex cursor-pointer items-center gap-4 rounded-2xl border-2 border-purple-500 bg-gradient-to-r from-purple-50 to-rose-50 p-4">
                            <input type="radio" name="payment" value="cash-on-delivery" checked class="h-5 w-5">
                            <span class="font-semibold text-gray-800">Cash on Delivery</span>
                        </label>
                        <label class="flex cursor-pointer items-center gap-4 rounded-2xl border-2 border-gray-200 bg-white/50 p-4 hover:border-purple-300">
                            <input type="radio" name="payment" value="jazzcash" class="h-5 w-5">
                            <span class="font-semibold text-gray-800">JazzCash</span>
                        </label>
                        <label class="flex cursor-pointer items-center gap-4 rounded-2xl border-2 border-gray-200 bg-white/50 p-4 hover:border-purple-300">
                            <input type="radio" name="payment" value="easypaisa" class="h-5 w-5">
                            <span class="font-semibold text-gray-800">EasyPaisa</span>
                        </label>
                    </div>
                </div>

                <div class="overflow-hidden rounded-3xl border border-white/50 bg-white/80 shadow-xl">
                    <div class="bg-gradient-to-r from-rose-500 via-purple-600 to-indigo-600 p-6 text-white">
                        <h2 class="text-2xl font-bold">Order Summary</h2>
                    </div>
                    <div class="space-y-4 p-4 sm:space-y-6 sm:p-8">
                        <div class="flex justify-between text-lg"><span class="text-gray-600">Subtotal</span><span id="checkout-subtotal" class="font-semibold">₨0</span></div>
                        <div class="flex justify-between text-lg"><span class="text-gray-600">Shipping Fee</span><span class="font-semibold">₨500</span></div>
                        <div class="flex justify-between border-t-2 border-gray-200 pt-4 text-2xl font-bold">
                            <span class="bg-gradient-to-r from-rose-600 to-purple-600 bg-clip-text text-transparent">Total</span>
                            <span id="checkout-total" class="bg-gradient-to-r from-rose-600 to-purple-600 bg-clip-text text-transparent">₨0</span>
                        </div>
                        <button type="button" id="place-order" class="flex w-full items-center justify-center rounded-2xl bg-gradient-to-r from-rose-500 via-purple-600 to-indigo-600 py-4 text-xl font-bold text-white shadow-xl hover:scale-105">Place Order</button>
                        <p class="text-center text-sm text-gray-500">Your payment information is secure and encrypted</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="order-success" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 p-4 backdrop-blur-sm">
        <div class="w-full max-w-md overflow-hidden rounded-3xl bg-white shadow-2xl">
            <div class="bg-gradient-to-r from-green-500 to-emerald-600 p-8 text-center text-white">
                <h3 class="text-2xl font-bold">Order Placed Successfully!</h3>
            </div>
            <div class="p-8 text-center">
                <p class="mb-2 text-gray-600">Your order has been confirmed</p>
                <p id="order-id" class="mb-6 bg-gradient-to-r from-rose-600 to-purple-600 bg-clip-text text-2xl font-bold text-transparent"></p>
                <p class="mb-8 text-gray-500">Thank you for shopping with us! You will receive a confirmation email shortly.</p>
                <a href="{{ route('products.index') }}" class="block w-full rounded-xl bg-gradient-to-r from-rose-500 to-purple-600 py-3 font-semibold text-white shadow-lg">Continue Shopping</a>
            </div>
        </div>
    </div>
</div>
@endsection
