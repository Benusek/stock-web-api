<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * List of products
     * @return Factory|View
     */
    public function index(): Factory|View
    {
        $products = Product::filter(request()->all())
        ->orderBy('id', 'DESC')->paginate(12);
        return view('products.index', compact('products'));
    }

    /**
     * Create product form
     * @return Factory|View
     */
    public function create(): Factory|View
    {
        return view('products.create');
    }

    /**
     * Edit product form
     * @param Product $product
     * @return Factory|View
     */
    public function edit(Product $product): Factory|View
    {
        return view('products.edit', compact('product'));
    }
}
