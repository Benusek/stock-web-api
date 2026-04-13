@php
    use App\Enums\Product\Type;use App\Models\Supply;
    use App\Enums\Product\Unit;use \App\Enums\Supply\Status;
@endphp
@php
    /** @var Supply $supply */
@endphp

@extends('layout')

@section('content')
    <section class="p-5 w-full">
        <div class="bg-white border border-gray-200 rounded-2xl p-6 mb-6">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <p class="text-sm text-gray-400">Поставка</p>
                    <div class="flex items-center gap-3">
                        <h1 class="text-2xl font-semibold text-gray-900">#{{ $supply->id }}</h1>
                        <span class="text-xs px-3 py-1 rounded-full {{ Status::from($supply->status)->classes() }}">{{ Status::from($supply->status)->label() }}</span>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-sm text-gray-400">Сумма</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ $supply->supplies->sum('price') }} ₽</p>
                </div>
            </div>
            <div class="grid grid-cols-full sm:grid-cols-3 md:grid-cols-4 gap-4 text-sm">
                <div>
                    <p class="text-gray-400">Поставщик</p>
                    <p class="text-gray-900 font-medium">{{ $supply->supplier->name }}</p>
                </div>
                <div>
                    <p class="text-gray-400">Дата</p>
                    <p class="text-gray-900">{{ $supply->created_at->diffForHumans() }}</p>
                </div>
                <div>
                    <p class="text-gray-400">Создал</p>
                    <p class="text-gray-900">{{ $supply->user->name }}</p>
                </div>
                <div class="col-span-full justify-between gap-2 flex flex-wrap-reverse md:flex-wrap">
                    <a href="{{ route('supplies.index') }}"
                       class="h-10 w-full md:w-min px-4 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50 transition cursor-pointer flex justify-center items-center">
                        Вернуться
                    </a>
                    <div class="flex gap-2 w-full md:w-min">
                        <a href="{{ route('supplies.edit', $supply) }}"
                           class="h-10 w-full md:w-min px-4 rounded-lg border border-yellow-300 text-yellow-600 hover:bg-gray-50 transition cursor-pointer flex justify-center items-center">
                            <i class="fa-solid fa-edit"></i>
                        </a>
                        <a href=""
                           class="h-10 w-full md:w-min px-4 rounded-lg border border-red-300 text-red-600 hover:bg-gray-50 transition cursor-pointer flex justify-center items-center">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden md:block bg-white border border-gray-200 rounded-2xl overflow-hidden">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 text-gray-500">
                <tr>
                    <th class="text-left px-4 py-3">Название</th>
                    <th class="text-left px-4 py-3">Кол-во</th>
                    <th class="text-left px-4 py-3">Ед.</th>
                    <th class="text-left px-4 py-3">Тип</th>
                </tr>
                </thead>
                <tbody class="divide-y">
                @foreach($supply->products as $index => $product)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-3 font-medium text-gray-900 border-t border-r border-gray-200">
                            {{ $product->name }}
                        </td>
                        <td class="px-4 py-3 border-t border-x border-gray-200">
                            {{ $supply->supplies[$index]->quantity }}
                        </td>
                        <td class="px-4 py-3 text-gray-600 border-t border-x border-gray-200">
                            {{ Unit::from($product->unit)->label() }}
                        </td>
                        <td class="px-4 py-3 border-t border-l border-gray-200">
                            <span class="text-xs px-2 py-1 rounded {{ Type::from($product->type)->classes() }}">{{ Type::from($product->type)->label() }}</span>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="grid grid-cols-full sm:grid-cols-2 gap-6">
            @foreach($supply->products as $index => $product)
                <div class="md:hidden space-y-3">
                    <div class="bg-white border border-gray-200 rounded-xl p-4">
                        <div class="flex items-center gap-2 mb-2">
                            <p class="font-medium text-gray-900">{{ $product->name }}</p>
                            <span class="text-xs px-2 py-1 rounded {{ Type::from($product->type)->classes() }}">{{ Type::from($product->type)->label() }}</span>
                        </div>

                        <div class="grid grid-cols-2 gap-2 text-sm">
                            <div>
                                <p class="text-gray-400 text-xs">Количество</p>
                                <p class="text-gray-900">{{ $supply->supplies[$index]->quantity }}</p>
                            </div>

                            <div>
                                <p class="text-gray-400 text-xs">Единица</p>
                                <p class="text-gray-900">{{ Unit::from($product->unit)->label() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
