@php use App\Models\Product; use App\Enums\Product\Type; use App\Enums\Product\Unit;use Illuminate\Pagination\LengthAwarePaginator; @endphp
@php
    /** @var Product[]|LengthAwarePaginator $products */
@endphp

@extends('layout')

@section('content')
    <section class="p-5 w-full">
        <!--Advanced-->
        <div class="flex justify-between mb-4 flex-wrap-reverse gap-4">
            <div class="flex items-center gap-3 select-none">
                <h1 class="text-xl font-semibold text-gray-900">Товары</h1>
                <label for="filter"
                       class="flex items-center gap-2 text-gray-500 cursor-pointer hover:text-gray-700 transition">
                    <i class="fa-solid fa-filter"></i>
                    <span class="text-sm">Фильтры</span>
                </label>
            </div>
            <a href="{{ route('products.create') }}" class="flex items-center gap-2 h-10 px-4 bg-gray-800 text-white rounded-lg hover:bg-gray-900 transition">
                <i class="fa-solid fa-plus text-sm"></i>
                <span>Добавить товар</span>
            </a>
        </div>

        <!--Filter form-->
        <input type="checkbox" id="filter" hidden>
        <form action="#" method="GET" novalidate
              class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 mb-4 filter-menu">
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Поиск
                </label>
                <div class="relative">
                    <input type="search" name="search" value="{{ request('search') }}"
                           placeholder="Название товара"
                           class="w-full h-11 pl-10 pr-4 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                    <i class="fa-solid fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>
            </div>
            <div class="mb-6">
                <span class="block text-sm font-medium text-gray-700 mb-2">
                Фильтры
                </span>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-xs text-gray-500 mb-1">Тип</label>
                        <select name="type"
                                class="w-full h-10 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none">
                            <option value="">Все</option>
                            <option value="ingredient">Ингридиент</option>
                            <option value="finished">Рецепт</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs text-gray-500 mb-1">Ед.</label>
                        <select name="unit"
                                class="w-full h-10 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none">
                            <option value="">Все</option>
                            <option value="piece">Кусок</option>
                            <option value="liter">Литр</option>
                            <option value="kg">Киллограм</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs text-gray-500 mb-1">Наличие</label>
                        <select name="minimum" class="w-full h-10 px-3 rounded-lg border border-gray-300
                       focus:ring-2 focus:ring-blue-500 outline-none">
                            <option value="">Все</option>
                            <option value="ok">В наличии</option>
                            <option value="low">Мало</option>
                            <option value="out">Нет</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="mb-6">
                <span class="block text-sm font-medium text-gray-700 mb-2">Остатки</span>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs text-gray-500 mb-1">Количество</label>
                        <div class="flex gap-2">
                            <input type="number" name="min_quantity"
                                   placeholder="От"
                                   class="w-full h-10 px-3 rounded-lg border border-gray-300
                        focus:ring-2 focus:ring-blue-500 outline-none">
                            <input type="number" name="max_quantity"
                                   placeholder="До"
                                   class="w-full h-10 px-3 rounded-lg border border-gray-300
                        focus:ring-2 focus:ring-blue-500 outline-none">
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                <a href="{{ route('products.index') }}"
                        class="h-10 px-4 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50 transition cursor-pointer flex items-center">
                    Сбросить
                </a>

                <button type="submit"
                        class="h-10 px-6 rounded-lg bg-gray-600 text-white hover:bg-gray-700 transition shadow-sm cursor-pointer">
                    Применить
                </button>
            </div>
        </form>

        <!--Products cards-->
        <div class="grid grid-cols-full sm:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-5 gap-3">
            @foreach($products as $product)
                <div class="bg-white border border-gray-200 rounded-2xl p-4 hover:shadow-md transition flex flex-col justify-between">
                    <div class="flex justify-between items-start mb-3">
                        <div>
                            <p class="text-lg font-semibold text-gray-900">{{ $product->name }}</p>
                            <p class="text-xs text-gray-400">Продукт</p>
                        </div>
                        <div class="flex gap-2">
                            <a href="{{ route('products.edit', $product) }}"
                               class="w-8 h-8 flex items-center justify-center rounded-lg hover:bg-yellow-50 transition text-gray-800 hover:text-yellow-800">
                                <i class="fa-solid fa-edit text-sm"></i>
                            </a>
                            <a href="{{ route('products.destroy', $product) }}"
                                class="w-8 h-8 flex items-center justify-center rounded-lg hover:bg-red-50 transition text-gray-800 hover:text-red-800">
                                <i class="fa-solid fa-trash text-sm"></i>
                            </a>
                        </div>
                    </div>
                    <div class="space-y-2 text-sm mb-4">
                        <div class="flex justify-between">
                            <span class="text-gray-500">Тип</span>
                            <span class="text-gray-900 font-medium">{{ Type::from($product->type)->label() }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-500">Остаток</span>
                            <span
                                class="text-gray-900 font-medium">{{ $product->quantity }} {{ Unit::from($product->unit)->unit() }}</span>
                        </div>
                    </div>
                    <div class="flex justify-between items-center pt-3 border-t border-gray-100 text-xs text-gray-500">
                        <span>{{ $product->created_at->diffForHumans() }}</span>
                        <span>{{ $product->user }}</span>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="p-6">{{ $products->links('pagination') }}</div>
    </section>
@endsection
