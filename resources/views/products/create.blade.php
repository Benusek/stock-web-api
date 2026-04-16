@extends('layout')

@section('content')
    <section class="p-5 w-full">
        <form action="#" method="POST" novalidate
              class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 mb-4">
            @csrf
            <div class="mb-6">
                <h1 class="text-xl font-semibold">Товар</h1>
                <p class="text-sm text-gray-500">Создание</p>
            </div>
            <span class="block text-sm font-medium text-gray-700 mb-2">Основное</span>
            <div class="grid grid-cols-full sm:grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                <div>
                    <label class="block text-xs text-gray-500 mb-1">Название</label>
                    <input type="text" name="name" placeholder="Сыр" value="{{ old('product') }}"
                           class="w-full h-10 pl-4 pr-4 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                </div>
                <div>
                    <label class="block text-xs text-gray-500 mb-1">Кол-во</label>
                    <input type="number" name="quantity" placeholder="5" value="{{ old('quantity') }}"
                           class="w-full h-10 pl-4 pr-4 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                </div>
                <div>
                    <label class="block text-xs text-gray-500 mb-1">Ед.</label>
                    <select name="unit"
                            class="w-full h-10 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none">
                        <option value="liter">Литр</option>
                        <option value="piece">Штука</option>
                        <option value="kg">Киллограмм</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs text-gray-500 mb-1">Тип</label>
                    <select name="type"
                            class="w-full h-10 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none">
                        <option value="ingredient">Ингридиент</option>
                        <option value="completed">Готовый</option>
                    </select>
                </div>
            </div>
            <div class="mb-6">
                <span class="block text-sm font-medium text-gray-700 mb-2">Минимальный остаток</span>
                <input type="number" placeholder="5" name="minimum"
                       class="w-full h-10 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none">
            </div>
            <div class="flex justify-between flex-col sm:flex-row pt-4 border-t border-gray-100 gap-2">
                <div class="flex gap-2 justify-between">
                    <a href="{{ route('supplies.index') }}"
                       class="h-10 w-full px-4 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50 transition cursor-pointer flex justify-center items-center">
                        Вернуться
                    </a>
                    <button type="reset"
                            class="h-10 w-full px-4 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50 transition cursor-pointer">
                        Сбросить
                    </button>
                </div>
                <button type="submit"
                        class="h-10 px-6 rounded-lg bg-gray-600 text-white hover:bg-gray-700 transition shadow-sm cursor-pointer">
                    Добавить
                </button>
            </div>
        </form>
    </section>

    @include('_form/product')
    @include('_form/multiple')

@endsection
