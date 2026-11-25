<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class StoreController extends Controller
{
    public function cart(): View
    {
        return view('store.cart');
    }

    public function checkout(): View
    {
        return view('store.checkout');
    }

    public function favorites(): View
    {
        return view('store.favorites');
    }

    public function profile(): View
    {
        return view('store.profile');
    }
}
