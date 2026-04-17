<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Models\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

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
     * Create product
     * @param CreateProductRequest $request
     * @return RedirectResponse
     */
    public function store(CreateProductRequest $request): RedirectResponse
    {
        Product::query()->create($request->validated());
        return redirect()->route('products.index');
    }

    /**
     * Edit product
     * @param Product $product
     * @param CreateProductRequest $request
     * @return RedirectResponse
     */
    public function update(Product $product, CreateProductRequest $request): RedirectResponse
    {
        $product->update($request->validated());
        return redirect()->route('products.index');
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

    /**
     * Delete product
     * @param Product $product
     * @return RedirectResponse
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
