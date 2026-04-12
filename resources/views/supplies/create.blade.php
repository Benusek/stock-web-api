
@extends('layout')

@section('content')
    <section class="p-5 w-full">
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
            <div class="mb-6">
                <div class="flex justify-between">
                    <p class="block text-sm font-medium text-gray-700 mb-2">Товары</p>
                    <div class="select-none">
                        <i class="text-sm text-gray-700 fa-solid fa-plus cursor-pointer" onclick="addProduct()"></i>
                        <i class="text-sm text-gray-700 fa-solid fa-minus cursor-pointer" onclick="removeProduct()"></i>
                    </div>
                </div>
                <div class="select-none" id="products"></div>
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

    @include('templates.product')

    <script type="application/javascript" src="{{ asset('assets/js/multiple.js') }}"></script>
@endsection
