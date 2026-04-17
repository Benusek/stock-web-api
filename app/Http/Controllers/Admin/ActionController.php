<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateActionRequest;
use App\Models\Action;
use App\Models\Adjustment;
use App\Models\Supply;
use App\Models\Writeoff;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ActionController extends Controller
{
    public function index(): Factory|View
    {
        $actions = Action::query()->paginate(12);
        return view('actions.index', compact('actions'));
    }

    /**
     * Create write off form
     * @return Factory|View
     */
    public function trashes(): Factory|View
    {
        return view('actions.trashes');
    }

    /**
     * Create adjustments form
     * @return Factory|View
     */
    public function adjustments(): Factory|View
    {
        return view('actions.adjustments');
    }

    public function trashes_store(CreateActionRequest $request)
    {
//        dd($request->validated());
        $action = Writeoff::query()->create($request->validated() + ['user_id' => $request->user()->id]);
//        $action->products()->attach($request->validated('products'));
        return redirect()->route('actions.index');
    }

    public function adjustments_store(CreateActionRequest $request)
    {
        $action = Adjustment::query()->create($request->validated() + ['user_id' => $request->user()->id]);
        $action->products()->attach($request->validated('products'));
        return redirect()->route('actions.index');
    }
}
