<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supply;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

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
            ->orderBy('id', 'DESC')
            ->paginate(10);
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
}
