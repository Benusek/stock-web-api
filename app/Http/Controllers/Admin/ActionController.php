<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateActionRequest;
use App\Http\Requests\CreateAdjustmentRequest;
use App\Models\Action;
use App\Models\Adjustment;
use App\Models\Supply;
use App\Models\Writeoff;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class ActionController extends Controller
{
    public function index(): Factory|View
    {
        $actions = Action::query()->groupBy('id')->orderBy('id', 'DESC')->paginate(12);
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
        $data = $request->validated();

        DB::transaction(function () use ($data, $request) {

            // 1. создаём writeoff
            $writeoff = Writeoff::query()->create([
                'comment' => $data['comment'],
                'reason' => $data['reason'],
                'user_id' => $request->user()->id,
            ]);

            // 2. привязываем продукты
            $products = collect($data['products'])
                ->mapWithKeys(function ($item) {
                    return [
                        $item['product_id'] => [
                            'quantity' => $item['quantity'],
                        ]
                    ];
                })
                ->toArray();

            $writeoff->products()->attach($products);

            // 3. создаём action (ключевой момент)
            Action::query()->create([
                'type' => 'writeoff',
                'user_id' => $request->user()->id,

                'actionable_id' => $writeoff->id,
                'actionable_type' => Writeoff::class,
            ]);
        });

        return redirect()->route('actions.index');
    }

    public function adjustments_store(CreateAdjustmentRequest $request)
    {
        $data = $request->validated();

        DB::transaction(function () use ($data, $request) {

            // 1. создаём adjustment
            $adjustment = Adjustment::query()->create([
                'comment' => $data['comment'],
                'reason' => $data['reason'],
                'user_id' => $request->user()->id,
            ]);

            // 2. привязываем продукты
            $products = collect($data['products'])
                ->mapWithKeys(function ($item) {
                    return [
                        $item['product_id'] => [
                            'quantity' => $item['quantity'], // может быть ±
                        ]
                    ];
                })
                ->toArray();

            $adjustment->products()->attach($products);

            // 3. считаем общее изменение (опционально, но желательно)
            $amount = collect($data['products'])->sum('quantity');

            // 4. создаём action
            Action::query()->create([
                'type' => 'adjustment',
                'user_id' => $request->user()->id,

                'actionable_id' => $adjustment->id,
                'actionable_type' => Adjustment::class,

                'amount' => $amount, // +5 или -3
            ]);
        });

        return redirect()->route('actions.index');
    }
}
