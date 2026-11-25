@extends('layouts.auth')

@section('title', 'Forgot Password — Ruh Cloth')

@section('content')
<div class="flex min-h-dvh items-center justify-center bg-slate-50 px-4 py-10">
    <div class="w-full max-w-[420px]">
        <div class="mb-8 flex justify-center">
            @include('partials.logo', ['size' => 'lg'])
        </div>
        <div class="rounded-3xl border border-slate-100 bg-white p-6 shadow-xl shadow-rose-100/40 sm:p-8">
            <h2 class="text-2xl font-extrabold text-slate-900">Reset password</h2>
            <p class="mt-2 mb-6 text-sm text-slate-500">Enter the email on your account. This demo only shows a confirmation toast.</p>
            <form id="forgot-form" class="space-y-4">
                <label class="block">
                    <span class="mb-1.5 block text-xs font-semibold text-slate-600">Email</span>
                    <input type="email" name="email" required placeholder="you@email.com" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none focus:border-rose-400 focus:bg-white">
                </label>
                <button type="submit" class="w-full rounded-xl bg-gradient-to-r from-rose-500 to-purple-600 py-3.5 text-sm font-bold text-white shadow-lg shadow-rose-200">Send reset link</button>
            </form>
            <p class="mt-6 text-center text-sm">
                <a href="{{ route('login') }}" class="font-semibold text-rose-600">Back to login</a>
            </p>
        </div>
    </div>
</div>
@endsection
