@php use App\Models\Supply; @endphp
@php
/** @var Supply $supply */
@endphp

@extends('layout')

@section('content')
    <section class="p-5 w-full">
        <div class="flex flex-col bg-white border border-gray-200 rounded-2xl p-6">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-xl font-semibold">Поставка #{{ $supply->id }}</h1>
                    <p class="text-sm text-gray-500">Редактирование</p>
                </div>
                <div class="flex items-start">
                    <div class="text-right">
                        <p class="text-sm text-gray-500">Итого</p>
                        <p class="text-xl font-semibold">24 500 ₽</p>
                    </div>
                </div>
            </div>
            <div class="mb-6">
                <span class="block text-sm font-medium text-gray-700">Основное</span>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs text-gray-500 mb-1">Статус</label>
                        <select name="status"
                                class="w-full h-10 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none">
                            <option value="">Все статусы</option>
                            <option value="completed">Проведена</option>
                            <option value="canceled">Отменена</option>
                            <option value="draft">Черновик</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs text-gray-500 mb-1">Поставщик</label>
                        <select name="supplier"
                                class="w-full h-10 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none">
                            <option value="">Все поставщики</option>
                            <option value="1">ООО Колбасики</option>
                            <option value="2">ООО Помидорчики</option>
                        </select>
                    </div>
                </div>
            </div>
            <div>
                <div class="flex justify-between">
                    <p class="block text-sm font-medium text-gray-700">Товары</p>
                    <div class="select-none">
                        <i class="text-sm text-gray-700 fa-solid fa-plus cursor-pointer" onclick="addProduct()"></i>
                        <i class="text-sm text-gray-700 fa-solid fa-minus cursor-pointer" onclick="removeProduct()"></i>
                    </div>
                </div>
                <div class="select-none" id="products"></div>
            </div>
            <div class="flex sm:justify-end gap-2 border-t border-gray-100 pt-4">
                <a href="{{ route('supplies.show', $supply) }}"
                   class="h-10 w-full md:w-min px-4 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50 transition cursor-pointer flex justify-center items-center">
                    Отмена
                </a>
                <button class="h-10 w-full md:w-min px-4 rounded-lg border bg-blue-600 hover:bg-blue-700 text-white transition cursor-pointer flex justify-center items-center">
                    Сохранить
                </button>
            </div>
        </div>
    </section>

    @include('templates/product')

    <script type="application/javascript" src="{{ asset('assets/js/multiple.js') }}"></script>
@endsection
