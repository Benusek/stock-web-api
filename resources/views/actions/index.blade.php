@extends('layout')

@section('content')
    <section class="p-5 w-full">
        <!--Advanced-->
        <div class="mb-4">
            <div class="flex items-center gap-3 select-none">
                <h1 class="text-xl font-semibold text-gray-900">Операции</h1>
                <label for="filter"
                       class="flex items-center gap-2 text-gray-500 cursor-pointer hover:text-gray-700 transition">
                    <i class="fa-solid fa-filter"></i>
                    <span class="text-sm">Фильтры</span>
                </label>
            </div>

        </div>

        <!--Actions cards-->
        <div class="grid grid-cols-full lg:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-3">
            <div class="bg-white border border-gray-200 rounded-2xl p-4
            flex flex-col justify-between h-44 hover:shadow-md transition min-w-max">
                <div class="mb-3">
                    <div class="flex justify-between items-start mb-1">
                        <div class="flex items-center gap-2">
                            <span class="text-xs px-2 py-1 rounded bg-blue-100 text-blue-700">Поставка</span>
                            <span class="text-sm font-semibold text-gray-900">#10234</span>
                            <span class="text-xs px-2 py-1 rounded bg-green-100 text-green-700">Проведена</span>
                        </div>
                        <div class="text-right">
                            <p class="text-xs text-gray-400">Сумма</p>
                            <p class="text-lg font-semibold text-gray-900">
                                24 500 ₽
                            </p>
                        </div>
                    </div>
                </div>
                <div class="text-sm text-gray-600 space-y-1 mb-3">
                    <div class="flex justify-between">
                        <span class="text-gray-400">Контекст</span>
                        <span class="text-gray-900">ООО Колбасики</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Детали</span>
                        <span class="text-gray-900">5 товаров</span>
                    </div>
                </div>
                <div class="flex justify-between items-center text-xs text-gray-400 pt-2 border-t border-gray-100">
                    <span>12.04.2026</span>
                    <span>Иван Иванов</span>
                </div>
            </div>
            <div class="bg-white border border-gray-200 rounded-2xl p-4
            flex flex-col justify-between h-44 hover:shadow-md transition">
                <div class="mb-3">
                    <div class="flex justify-between items-start mb-1">
                        <div class="flex items-center gap-2">
                            <span class="text-xs px-2 py-1 bg-red-100 text-red-700 rounded">Списание</span>
                        </div>
                        <div class="text-right">
                            <p class="text-xs text-gray-400">Сумма</p>
                            <p class="text-lg text-red-600 font-semibold">-3 200 ₽</p>
                        </div>
                    </div>
                </div>
                <div class="text-sm text-gray-600 space-y-1 mb-3">
                    <div class="flex justify-between">
                        <span class="text-gray-400">Контекст</span>
                        <span class="text-gray-900">Списание</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Детали</span>
                        <span class="text-gray-900">5 товаров</span>
                    </div>
                </div>
                <div class="flex justify-between items-center text-xs text-gray-400 pt-2 border-t border-gray-100">
                    <span>12.04.2026</span>
                    <span>Иван Иванов</span>
                </div>
            </div>
            <div class="bg-white border border-gray-200 rounded-2xl p-4
            flex flex-col justify-between h-44 hover:shadow-md transition">
                <div class="mb-3">
                    <div class="flex justify-between items-start mb-1">
                        <div class="flex items-center gap-2">
                            <span class="text-xs px-2 py-1 bg-yellow-100 text-yellow-700 rounded">Корректировка</span>
                        </div>
                        <div class="text-right">
                            <p class="text-xs text-gray-400">Кол-во</p>
                            <span class="text-gray-900 font-semibold">+5 ед.</span>
                        </div>
                    </div>
                </div>
                <div class="text-sm text-gray-600 space-y-1 mb-3">
                    <div class="flex justify-between">
                        <span class="text-gray-400">Контекст</span>
                        <span class="text-gray-900">Корректировка</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Детали</span>
                        <span class="text-gray-900">Ром</span>
                    </div>
                </div>
                <div class="flex justify-between items-center text-xs text-gray-400 pt-2 border-t border-gray-100">
                    <span>12.04.2026</span>
                    <span>Иван Иванов</span>
                </div>
            </div>
    </section>
@endsection
