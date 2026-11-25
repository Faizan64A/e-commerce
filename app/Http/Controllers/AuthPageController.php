<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class AuthPageController extends Controller
{
    public function login(): View
    {
        return view('auth.form', [
            'mode' => 'login',
        ]);
    }

    public function register(): View
    {
        return view('auth.form', [
            'mode' => 'register',
        ]);
    }

    public function forgotPassword(): View
    {
        return view('auth.forgot-password');
    }
}
