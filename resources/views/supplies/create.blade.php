@php
    /** @var $products */
    $products = []
@endphp

@extends('layout')

@section('content')
    <section class="p-2 w-full">
        <p class="block font-medium text-gray-700 p-2 mb-3 text-3xl">Создание поставки</p>
        <form action="#" method="POST" novalidate
              class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 mb-4">
            @csrf
            <label class="block text-sm font-medium text-gray-700 mb-2">Поставка</label>
            <div class="mb-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-end">
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
            <div class="flex justify-between">
                <p class="block text-sm font-medium text-gray-700 mb-2">Товары</p>
                <div class="select-none">
                    <i class="text-sm text-gray-700 fa-solid fa-plus cursor-pointer" onclick="addProduct()"></i>
                    <i class="text-sm text-gray-700 fa-solid fa-minus cursor-pointer" onclick="removeProduct()"></i>
                </div>
            </div>
            <div class="select-none" id="products"></div>
            <div class="flex justify-between flex-col sm:flex-row pt-4 border-t border-gray-100 gap-2">
                <div class="flex gap-2 justify-between">
                    <a href="{{ route('supplies.index') }}"
                       class="h-10 w-full px-4 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50 transition cursor-pointer flex justify-center items-center">
                        Назад
                    </a>
                    <button type="reset"
                            class="h-10 w-full px-4 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50 transition cursor-pointer">
                        Сбросить
                    </button>
                </div>
                <button type="submit"
                        class="h-10 px-6 rounded-lg bg-gray-600 text-white hover:bg-gray-700 transition shadow-sm cursor-pointer">
                    Применить
                </button>
            </div>
        </form>

    </section>

    <template id="product-template">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-3">
            <div>
                <label class="block text-xs text-gray-500 mb-1">Название</label>
                <input type="text" name="items[INDEX][name]"
                       class="w-full h-10 pl-4 pr-4 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
            </div>
            <div>
                <label class="block text-xs text-gray-500 mb-1">Кол-во</label>
                <input type="number" name="items[INDEX][quantity]"
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
    </template>

    <script type="application/javascript" src="{{ asset('assets/js/multiple.js') }}"></script>
@endsection
