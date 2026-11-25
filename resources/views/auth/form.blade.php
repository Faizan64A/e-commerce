@extends('layouts.auth')

@section('title', $mode === 'login' ? 'Login — Ruh Cloth' : 'Sign Up — Ruh Cloth')

@section('content')
<div class="grid min-h-dvh lg:grid-cols-2">
    <div class="relative hidden overflow-hidden bg-gradient-to-br from-rose-500 via-fuchsia-500 to-purple-700 p-12 text-white lg:flex lg:flex-col lg:justify-between">
        <div class="absolute -top-24 -left-16 h-72 w-72 rounded-full bg-white/10 blur-2xl"></div>
        <div class="absolute right-0 bottom-0 h-80 w-80 rounded-full bg-purple-900/30 blur-3xl"></div>
        <div class="relative">
            @include('partials.logo', ['onDark' => true, 'size' => 'lg'])
        </div>
        <div class="relative max-w-md">
            <p class="mb-3 text-sm font-semibold tracking-[0.25em] text-white/70 uppercase">Soul of fashion</p>
            <h1 class="mb-4 text-4xl font-semibold leading-tight xl:text-5xl">Wear what feels like you.</h1>
            <p class="text-base leading-relaxed text-white/85">Lawn, kurtas, and formals from Lahore — crafted for comfort, made for celebration.</p>
            <ul class="mt-8 space-y-3 text-sm text-white/90">
                <li class="flex items-center gap-3"><span class="h-1.5 w-1.5 rounded-full bg-white"></span> Free shipping over ₨2,000</li>
                <li class="flex items-center gap-3"><span class="h-1.5 w-1.5 rounded-full bg-white"></span> Easy 7-day returns</li>
                <li class="flex items-center gap-3"><span class="h-1.5 w-1.5 rounded-full bg-white"></span> Secure checkout</li>
            </ul>
        </div>
        <p class="relative text-sm text-white/60">© 2024 Ruh Cloth</p>
    </div>

    <div class="flex min-h-dvh items-center justify-center bg-slate-50 px-4 py-8 sm:px-8">
        <div class="w-full max-w-[420px]">
            <div class="mb-8 flex justify-center lg:hidden">
                @include('partials.logo', ['size' => 'lg'])
            </div>

            <div class="rounded-3xl border border-slate-100 bg-white p-5 shadow-xl shadow-rose-100/40 sm:p-8">
                <h2 class="text-2xl font-extrabold text-slate-900 sm:text-3xl">{{ $mode === 'login' ? 'Welcome back' : 'Create account' }}</h2>
                <p class="mt-1 mb-6 text-sm text-slate-500">{{ $mode === 'login' ? 'Sign in to track orders and your wishlist.' : 'Join Ruh Cloth to save favorites and checkout faster.' }}</p>

                <div class="mb-6 grid grid-cols-2 rounded-2xl bg-slate-100 p-1">
                    <a href="{{ route('login') }}" class="rounded-xl py-2.5 text-center text-sm font-semibold {{ $mode === 'login' ? 'bg-white text-rose-600 shadow-sm' : 'text-slate-500' }}">Login</a>
                    <a href="{{ route('register') }}" class="rounded-xl py-2.5 text-center text-sm font-semibold {{ $mode === 'register' ? 'bg-white text-rose-600 shadow-sm' : 'text-slate-500' }}">Sign up</a>
                </div>

                <form id="auth-form" data-auth-mode="{{ $mode }}" class="space-y-4">
                    @if ($mode === 'register')
                        <label class="block">
                            <span class="mb-1.5 block text-xs font-semibold text-slate-600">Full name</span>
                            <input type="text" name="name" required placeholder="Ayesha Khan" autocomplete="name" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none transition focus:border-rose-400 focus:bg-white">
                        </label>
                    @endif
                    <label class="block">
                        <span class="mb-1.5 block text-xs font-semibold text-slate-600">Email</span>
                        <input type="email" name="email" required placeholder="you@email.com" autocomplete="email" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none transition focus:border-rose-400 focus:bg-white">
                    </label>
                    <label class="block">
                        <span class="mb-1.5 block text-xs font-semibold text-slate-600">Password</span>
                        <input type="password" name="password" required minlength="6" placeholder="At least 6 characters" autocomplete="{{ $mode === 'login' ? 'current-password' : 'new-password' }}" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none transition focus:border-rose-400 focus:bg-white">
                    </label>
                    @if ($mode === 'login')
                        <div class="text-right">
                            <a href="{{ route('password.request') }}" class="text-xs font-semibold text-purple-600 hover:text-rose-600">Forgot password?</a>
                        </div>
                    @endif
                    <button type="submit" class="mt-2 w-full rounded-xl bg-gradient-to-r from-rose-500 to-purple-600 py-3.5 text-sm font-bold text-white shadow-lg shadow-rose-200 transition active:scale-[0.99]">
                        {{ $mode === 'login' ? 'Login' : 'Create account' }}
                    </button>
                </form>

                <div class="relative my-6 text-center">
                    <span class="relative z-10 bg-white px-3 text-xs text-slate-400">or continue with</span>
                    <div class="absolute inset-x-0 top-1/2 h-px -translate-y-1/2 bg-slate-100"></div>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <button type="button" data-social="google" class="rounded-xl border border-slate-200 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-50">Google</button>
                    <button type="button" data-social="facebook" class="rounded-xl bg-[#1877F2] py-2.5 text-sm font-semibold text-white hover:bg-[#166fe5]">Facebook</button>
                </div>
            </div>

            <p class="mt-6 text-center text-sm text-slate-500">
                @if ($mode === 'login')
                    New here? <a href="{{ route('register') }}" class="font-semibold text-rose-600">Create an account</a>
                @else
                    Already have an account? <a href="{{ route('login') }}" class="font-semibold text-rose-600">Login</a>
                @endif
            </p>
        </div>
    </div>
</div>
@endsection
