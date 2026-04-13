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
        return view('supplies.index', ['supplies' => Supply::query()->orderBy('id', 'DESC')->get()]);
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

    public function create()
    {
        return view('supplies.create');
    }
}
