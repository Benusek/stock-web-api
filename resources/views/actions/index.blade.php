@php use App\Models\Action;use Illuminate\Pagination\LengthAwarePaginator;@endphp
@php
    /** @var Action[]|LengthAwarePaginator $actions */
@endphp

@extends('layout')

@section('content')
    <section class="p-5 w-full">
    <!--Advanced-->
    <div class="flex justify-between mb-4 flex-wrap-reverse gap-4">
        <div class="flex items-center gap-3 select-none">
            <h1 class="text-xl font-semibold text-gray-900">Операции</h1>
{{--            <label for="filter"--}}
{{--                   class="flex items-center gap-2 text-gray-500 cursor-pointer hover:text-gray-700 transition">--}}
{{--                <i class="fa-solid fa-filter"></i>--}}
{{--                <span class="text-sm">Фильтры</span>--}}
{{--            </label>--}}
        </div>
        <div class="flex justify-end mb-4">
            <div class="relative">

                <label for="actions" class="flex items-center gap-2 h-10 px-4 bg-gray-800 text-white rounded-lg hover:bg-gray-900 transition cursor-pointer select-none">
                    <i class="fa-solid fa-plus text-sm"></i>
                    <span>Добавить</span>
                    <i class="fa-solid fa-chevron-down text-xs"></i>
                </label>
                <input type="checkbox" name="actions" id="actions" hidden class="peer">
                <div id="add-buttons" class="absolute right-0 mt-2 w-44 bg-white border border-gray-200 rounded-lg shadow-lg hidden  peer-checked:block group-hover:block overflow-hidden">
                    <a href="{{ route('trashes.create') }}"
                       class="block px-4 py-2 text-sm hover:bg-gray-50">
                        Списание
                    </a>
                    <a href="{{ route('adjustments.create') }}"
                       class="block px-4 py-2 text-sm hover:bg-gray-50">
                        Корректировка
                    </a>
                </div>
            </div>
        </div>
    </div>

        <!--Actions cards-->
        <div class="grid grid-cols-full lg:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-3">
            @foreach($actions as $action)

                @php
                    $type = $action->type;
                    $model = $action->actionable;
                    $label = '';
                    $labelClass = '';
                    $amount = null;
                    $amountClass = 'text-gray-900';
                    $context = '';
                    $details = '';

                    switch ($type) {
                        case 'supply':
                            $label = 'Поставка';
                            $labelClass = 'bg-blue-100 text-blue-700';

                            $amount = number_format($action->amount, 0, '', ' ') . ' ₽';
                            $amountClass = 'text-gray-900';

                            $context = $model->supplier->name ?? '—';
//                            $details = $model->products->count() . ' товаров';
                            break;

                        case 'writeoff':
                            $label = 'Списание';
                            $labelClass = 'bg-red-100 text-red-700';

                            $amount = '-' . number_format(abs($action->amount), 0, '', ' ') . ' ₽';
                            $amountClass = 'text-red-600';

                            $context = $model->reason ?? 'Списание';
//                            $details = $model->products->count() . ' товаров';
                            break;

                        case 'adjustment':
                            $label = 'Корректировка';
                            $labelClass = 'bg-yellow-100 text-yellow-700';

                            $amount = $action->amount > 0
                                ? '+' . $action->amount
                                : $action->amount;

                            $amountClass = $action->amount > 0
                                ? 'text-green-600'
                                : 'text-red-600';

                            $context = $model->reason ?? '—';
//                            $details = $model->products->count() . ' товаров';
                            break;
                    }
                @endphp

                <div class="bg-white border border-gray-200 rounded-2xl p-4
        flex flex-col justify-between h-44 hover:shadow-md transition">
                    <div class="mb-3">
                        <div class="flex justify-between items-start mb-1">
                            <div class="flex items-center gap-2">
                    <span class="text-xs px-2 py-1 rounded {{ $labelClass }}">
                        {{ $label }}
                    </span>
                                <span class="text-sm font-semibold text-gray-900">
                        #{{ $model->id ?? '—' }}
                    </span>
                                @if($type === 'supply')
                                    <span class="text-xs px-2 py-1 rounded {{\App\Enums\Supply\Status::from($model->status)->classes()}}">
                            {{ \App\Enums\Supply\Status::from($model->status)->label() ?? '—' }}
                        </span>
                                @endif
                            </div>
                            <div class="text-right">
                                <p class="text-xs text-gray-400">
                                    {{ $type === 'adjustment' ? 'Изменение' : 'Сумма' }}
                                </p>
                                <p class="text-lg font-semibold {{ $amountClass }}">
                                    {{ $amount }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="text-sm text-gray-600 space-y-1 mb-3">
                        <div class="flex justify-between">
                            <span class="text-gray-400">Контекст</span>
                            <span class="text-gray-900">{{ $context }}</span>
                        </div>
{{--                        <div class="flex justify-between">--}}
{{--                            <span class="text-gray-400">Детали</span>--}}
{{--                            <span class="text-gray-900">{{ $details }}</span>--}}
{{--                        </div>--}}
                    </div>
                    <div class="flex justify-between items-center text-xs text-gray-400 pt-2 border-t border-gray-100">
                        <span>{{ $action->created_at->format('d.m.Y') }}</span>
                        <span>{{ $action->user->name ?? '—' }}</span>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="p-6">{{ $actions->links('pagination') }}</div>
    </section>
@endsection
