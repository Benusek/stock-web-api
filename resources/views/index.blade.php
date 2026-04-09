@extends('layout')

@section('content')
    <section class="p-2 bg-gray-100 w-full">
        <form action="#" method="POST" novalidate
              class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Поиск
                </label>
                <div class="relative">
                    <input type="search" name="search"
                           placeholder="Номер поставки или товар"
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

                    <!-- Статус -->
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

                    <!-- Поставщик -->
                    <div>
                        <label class="block text-xs text-gray-500 mb-1">Поставщик</label>
                        <select name="supplier"
                                class="w-full h-10 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none">
                            <option value="">Все поставщики</option>
                            <option value="1">ООО Колбасики</option>
                            <option value="2">ООО Помидорчики</option>
                        </select>
                    </div>

                    <!-- Цена -->
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

            <!-- Действия -->
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
    </section>
@endsection
