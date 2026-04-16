<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSupplyRequest;
use App\Models\Supply;
use App\Models\SupplyProducts;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class SupplyController extends Controller
{
    /**
     * List of supplies
     * @return Factory|View
     */
    public function index(): Factory|View
    {
        $supplies = Supply::filter(request()->all())
            ->withSum('supplies as total_price', 'price')
            ->with(['supplier', 'user', 'products'])
            ->orderBy('id', 'DESC')->paginate(12);
        return view('supplies.index', compact('supplies'));
    }

    /**
     * Show supply
     * @param Supply $supply
     * @return Factory|View
     */
    public function show(Supply $supply): Factory|View
    {
        return view('supplies.show', compact('supply'));
    }

    /**
     * Edit supply form
     * @param Supply $supply
     * @return Factory|View
     */
    public function edit(Supply $supply): Factory|View
    {
        return view('supplies.edit', compact('supply'));
    }

    /**
     * Create supply form
     * @return Factory|View
     */
    public function create(): Factory|View
    {
        return view('supplies.create');
    }

    /**
     * Create supply
     * @param CreateSupplyRequest $request
     * @return RedirectResponse
     */
    public function store(CreateSupplyRequest $request): RedirectResponse
    {
        $supply = Supply::query()->create($request->validated() + ['user_id' => 1]);
        $supply->products()->attach($request->validated('products'));
        return redirect()->route('supplies.index');
    }


    /**
     * Delete supply
     * @param Supply $supply
     * @return RedirectResponse
     */
    public function destroy(Supply $supply): RedirectResponse
    {
        $supply->delete();
        return redirect()->route('supplies.index');
    }


    public function update(CreateSupplyRequest $request, Supply  $supply): RedirectResponse
    {
        $supply->update($request->validated());
        $supply->products()->sync($request->validated('products'));
        return redirect()->route('supplies.show', $supply);
    }
}
