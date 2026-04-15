@php use App\Models\Product; @endphp
@php
    /** @var Product $product */
@endphp

@extends('layout')

@section('content')
    <section class="p-5 w-full">
        <div class="flex flex-col bg-white border border-gray-200 rounded-2xl p-6 mb-4">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-xl font-semibold text-gray-900">Товар</h1>
                    <p class="text-sm text-gray-500">Редактирование</p>
                </div>
                <div class="flex text-sm flex-col items-end">
                    <p class="text-sm text-gray-500">Создан</p>
                    <p class="block font-medium text-gray-900">{{ $product->created_at->diffForHumans() }}</p>
                </div>
            </div>
            <span class="block text-sm font-medium text-gray-700 mb-2">Основное</span>
            <div class="grid grid-cols-full sm:grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                <div>
                    <label class="block text-xs text-gray-500 mb-1">Название</label>
                    <input type="text" name="items[INDEX][name]" placeholder="Сыр" value="{{ $product->name }}"
                           class="w-full h-10 pl-4 pr-4 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                </div>
                <div>
                    <label class="block text-xs text-gray-500 mb-1">Кол-во</label>
                    <input type="number" name="items[INDEX][quantity]" placeholder="5" value="{{ $product->quantity }}"
                           class="w-full h-10 pl-4 pr-4 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                </div>
                <div>
                    <label class="block text-xs text-gray-500 mb-1">Ед.</label>
                    <select name="items[INDEX][unit]"
                            class="w-full h-10 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none">
                        <option value="liter">Литр</option>
                        <option value="piece">Кусок</option>
                        <option value="kg">Киллограмм</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs text-gray-500 mb-1">Тип</label>
                    <select name="items[INDEX][type]"
                            class="w-full h-10 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none">
                        <option value="ingredient">Ингридиент</option>
                        <option value="completed">Готовый</option>
                    </select>
                </div>
            </div>
            <div class="mb-6">
                <span class="block text-sm font-medium text-gray-700 mb-2">Минимальный остаток</span>
                <input type="number" placeholder="5" name="min-quantity"
                       class="w-full h-10 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none">
            </div>

            <div class="flex sm:justify-end gap-2 pt-4 border-t border-gray-100">
                <a href="{{ route('products.index') }}"
                   class="h-10 w-full md:w-min px-4 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50 transition cursor-pointer flex justify-center items-center">
                    Отмена
                </a>
                <button
                    class="h-10 w-full md:w-min px-4 rounded-lg border bg-blue-600 hover:bg-blue-700 text-white transition cursor-pointer flex justify-center items-center">
                    Сохранить
                </button>
            </div>
        </div>
    </section>
@endsection
