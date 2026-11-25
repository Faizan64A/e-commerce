<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PageController extends Controller
{
    public function about(): View
    {
        return view('pages.about');
    }

    public function contact(): View
    {
        return view('pages.contact');
    }

    public function sizeGuide(): View
    {
        return view('pages.size-guide');
    }

    public function shipping(): View
    {
        return view('pages.shipping');
    }

    public function returns(): View
    {
        return view('pages.returns');
    }

    public function privacy(): View
    {
        return view('pages.legal', [
            'title' => 'Privacy Policy',
            'intro' => 'How Ruh Cloth collects, uses, and protects your information.',
            'sections' => [
                ['heading' => 'Information we collect', 'body' => 'We collect the name, email, phone, and delivery address you provide at checkout or in your profile, plus items stored in your cart and wishlist on this device.'],
                ['heading' => 'How we use it', 'body' => 'We use this information to process orders, share shipping updates, and improve the store experience. Frontend-only demo data stays in your browser until a backend is connected.'],
                ['heading' => 'Cookies', 'body' => 'This demo uses local browser storage for cart, wishlist, and guest account details. You can clear it anytime from your browser settings.'],
            ],
        ]);
    }

    public function terms(): View
    {
        return view('pages.legal', [
            'title' => 'Terms of Service',
            'intro' => 'The rules for browsing and placing orders on Ruh Cloth.',
            'sections' => [
                ['heading' => 'Orders', 'body' => 'Prices are shown in PKR. This frontend demo stores orders locally and does not charge a real payment. A live store would confirm stock before accepting an order.'],
                ['heading' => 'Content', 'body' => 'Product photos and copy on this demo are for design purposes. You may not reuse them commercially without permission.'],
                ['heading' => 'Changes', 'body' => 'We may update these terms as the store grows. Continued use of the site means you accept the latest version.'],
            ],
        ]);
    }

    public function cookies(): View
    {
        return view('pages.legal', [
            'title' => 'Cookie Policy',
            'intro' => 'What this demo stores in your browser and why.',
            'sections' => [
                ['heading' => 'Essential storage', 'body' => 'Cart items, wishlist IDs, and a guest profile are saved in localStorage so the pages work without a backend.'],
                ['heading' => 'Analytics', 'body' => 'This demo does not load third-party analytics cookies.'],
                ['heading' => 'Control', 'body' => 'Clear site data in your browser to reset cart, favorites, and the demo login.'],
            ],
        ]);
    }
}
