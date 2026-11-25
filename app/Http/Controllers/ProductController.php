<?php

namespace App\Http\Controllers;

use App\Support\ProductCatalog;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        return view('products.index', [
            'products' => ProductCatalog::all(),
        ]);
    }

    public function show(int $id): View
    {
        $product = ProductCatalog::find($id);

        abort_if($product === null, 404);

        return view('products.show', [
            'product' => $product,
            'relatedProducts' => ProductCatalog::related($id),
        ]);
    }

    public function search(Request $request): View
    {
        $query = (string) $request->string('q');

        return view('products.search', [
            'query' => $query,
            'products' => ProductCatalog::search($query),
        ]);
    }

    public function category(string $slug): View
    {
        $known = $slug === 'new-arrivals' || collect(ProductCatalog::categories())->contains('slug', $slug);

        abort_unless($known, 404);

        return view('products.category', [
            'slug' => $slug,
            'name' => ProductCatalog::categoryName($slug),
            'products' => ProductCatalog::byCategory($slug),
        ]);
    }
}
