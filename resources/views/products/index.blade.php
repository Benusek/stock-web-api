@extends('layout')

@section('content')
    <section class="px-5 py-2 w-full">
        <!--Advanced-->
        <div class="flex justify-between mb-2 items-center">
            <label for="filter"><i class="fa-solid fa-filter text-gray-500 cursor-pointer"></i></label>
            <a href="{{ route('products.create') }}" class="flex items-center bg-gray-600 text-white px-4 h-10 rounded-lg hover:bg-gray-700 transition gap-2">
                <i class="fa-solid fa-plus text-white"></i>
                <span>Добавить товары</span>
            </a>
        </div>

        <!--Filter form-->
        <input type="checkbox" id="filter" hidden>
        <form action="#" method="POST" novalidate
              class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 mb-4 filter-menu">
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Поиск
                </label>
                <div class="relative">
                    <input type="search" name="search"
                           placeholder="Название товара"
                           class="w-full h-11 pl-10 pr-4 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                    <i class="fa-solid fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>
            </div>

            <div class="mb-6">
                <span class="block text-sm font-medium text-gray-700 mb-2">
                  Период
                </span>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <input type="date" name="start"
                           class="h-11 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none">
                    <input type="date" name="end"
                           class="h-11 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none">
                </div>
            </div>

            <div class="mb-6">
                <span class="block text-sm font-medium text-gray-700 mb-2">
                Фильтры
                </span>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-xs text-gray-500 mb-1">Поставщик</label>
                        <select name="supplier"
                                class="w-full h-10 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none">
                            <option value="">Все поставщики</option>
                            <option value="1">ООО Колбасики</option>
                            <option value="2">ООО Помидорчики</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs text-gray-500 mb-1">
                            Создал
                        </label>

                        <select name="user_id"
                                class="w-full h-10 px-3 rounded-lg border border-gray-300 focus:ring-1 focus:ring-blue-500 outline-none">
                            <option value="">Все пользователи</option>
                            <option value="1">Иван Иванов</option>
                            <option value="2">Петр Петров</option>
                            <option value="3">Анна Смирнова</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs text-gray-500 mb-1">Сумма</label>
                        <div class="flex gap-2">
                            <input type="number" name="min"
                                   placeholder="От"
                                   class="w-full h-10 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none">
                            <input type="number" name="max"
                                   placeholder="До"
                                   class="w-full h-10 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none">
                        </div>
                    </div>

                </div>
            </div>
            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                <button type="reset"
                        class="h-10 px-4 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50 transition cursor-pointer">
                    Сбросить
                </button>

                <button type="submit"
                        class="h-10 px-6 rounded-lg bg-gray-600 text-white hover:bg-gray-700 transition shadow-sm cursor-pointer">
                    Применить
                </button>
            </div>
        </form>

        <!--Products cards-->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3">
            <div class="bg-white border border-gray-200 rounded-2xl p-4 hover:shadow-md transition flex flex-col justify-between">
                <div class="flex justify-between items-start mb-3">
                    <!-- Название -->
                    <div>
                        <p class="text-lg font-semibold text-gray-900">
                            Ром Bacardi
                        </p>
                        <p class="text-xs text-gray-400">
                            Продукт
                        </p>
                    </div>
                    <!-- Actions -->
                    <div class="flex gap-2">
                        <button class="w-8 h-8 flex items-center justify-center rounded-lg hover:bg-gray-100 transition">
                            <i class="fa-solid fa-edit text-gray-600 text-sm"></i>
                        </button>
                        <button class="w-8 h-8 flex items-center justify-center rounded-lg hover:bg-red-50 transition">
                            <i class="fa-solid fa-trash text-red-500 text-sm"></i>
                        </button>
                    </div>
                </div>
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-500">Тип</span>
                        <span class="text-gray-900 font-medium">Ингредиент</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Ед. измерения</span>
                        <span class="text-gray-900">Литр</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Остаток</span>
                        <span class="text-gray-900 font-medium">15 л</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
