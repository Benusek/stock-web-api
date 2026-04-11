@extends('layout')

@section('content')
    <section class="px-5 py-2 w-full">
        <div class="bg-white border border-gray-200 rounded-2xl p-6 mb-6">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <p class="text-sm text-gray-400">Поставка</p>
                    <div class="flex items-center gap-3">
                        <h1 class="text-2xl font-semibold text-gray-900">
                            #10234
                        </h1>
                        <span class="text-xs px-3 py-1 rounded-full bg-green-100 text-green-700">
                          Проведена
                        </span>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-sm text-gray-400">Сумма</p>
                    <p class="text-2xl font-semibold text-gray-900">24 500 ₽</p>
                </div>
            </div>
            <div class="grid grid-cols-full sm:grid-cols-3 md:grid-cols-4 gap-4 text-sm">
                <div>
                    <p class="text-gray-400">Поставщик</p>
                    <p class="text-gray-900 font-medium">ООО Колбасики</p>
                </div>
                <div>
                    <p class="text-gray-400">Дата</p>
                    <p class="text-gray-900">12.04.2026</p>
                </div>
                <div>
                    <p class="text-gray-400">Создал</p>
                    <p class="text-gray-900">Иван Иванов</p>
                </div>
                <div class="col-span-full justify-between gap-2 flex flex-wrap-reverse md:flex-wrap">
                    <a href="{{ route('supplies.index') }}"
                       class="h-10 w-full md:w-min px-4 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50 transition cursor-pointer flex justify-center items-center">
                        Вернуться
                    </a>
                    <div class="flex gap-2 w-full md:w-min">
                        <a href="" class="h-10 w-full md:w-min px-4 rounded-lg border border-yellow-300 text-yellow-600 hover:bg-gray-50 transition cursor-pointer flex justify-center items-center">
                            <i class="fa-solid fa-edit"></i>
                        </a>
                        <a href="" class="h-10 w-full md:w-min px-4 rounded-lg border border-red-300 text-red-600 hover:bg-gray-50 transition cursor-pointer flex justify-center items-center">
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
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-3 font-medium text-gray-900">
                            Мохито
                        </td>
                        <td class="px-4 py-3">
                            8000
                        </td>
                        <td class="px-4 py-3 text-gray-600">
                            Литр
                        </td>
                        <td class="px-4 py-3">
                            <span class="text-xs px-2 py-1 rounded bg-blue-100 text-blue-700">Ингридиент</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="md:hidden space-y-3">
            <div class="bg-white border border-gray-200 rounded-xl p-4">
                <p class="font-medium text-gray-900 mb-2">Мохито</p>
                <div class="grid grid-cols-2 gap-2 text-sm">
                    <div>
                        <p class="text-gray-400 text-xs">Количество</p>
                        <p class="text-gray-900">8000</p>
                    </div>

                    <div>
                        <p class="text-gray-400 text-xs">Единица</p>
                        <p class="text-gray-900">Литр</p>
                    </div>
                    <div class="col-span-2">
                        <p class="text-gray-400 text-xs">Тип</p>
                        <p class="text-gray-900">Ингридиент</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
