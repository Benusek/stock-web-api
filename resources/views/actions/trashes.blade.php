@php use App\Models\Product ;@endphp
@php
    /** @var Product[] $products */
        $products = Product::all();
@endphp

@extends('layout')

@section('content')
    <section class="p-6 flex justify-center gap-6">
        <form action="{{route('trashes.store') }}" method="POST" novalidate
              class="bg-white rounded-2xl border border-gray-200 p-6 w-full max-w-4xl">
            @csrf
            <h2 class="text-lg font-semibold mb-6">Списание</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">

                <div>
                    <label class="block text-xs text-gray-500 mb-1">Причина</label>
                    <select name="reason" class="w-full h-10 px-3 border border-gray-300 rounded-lg">
                        <option value="">Выберите причину</option>
                        <option value="crashed">Порча</option>
                        <option value="old">Истек срок</option>
                        <option value="error">Ошибка учета</option>
                    </select>
                    @error('reason')
                    <p data-error="product_id" class="text-red-900 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-xs text-gray-500 mb-1">Комментарий</label>

                    <input type="text"
                           name="comment"
                           value="{{ old('comment') }}"
                           placeholder="Комментарий"
                           class="w-full h-10 px-3 border rounded-lg
                       border-gray-300">

                    @error('comment')
                    <p data-error="product_id" class="text-red-900 text-sm">{{ $message }}</p>
                    @enderror
                </div>

            </div>
            <div class="flex justify-between items-center mb-2">
                <p class="text-sm font-medium text-gray-700">Товары</p>

                <div class="flex gap-3 select-none">
                    <i class="fa-solid fa-plus cursor-pointer text-gray-600 hover:text-black"
                       onclick="addProduct()"></i>
                    <i class="fa-solid fa-minus cursor-pointer text-gray-600 hover:text-black"
                       onclick="removeProduct()"></i>
                </div>
            </div>
            <div id="products"></div>
            <div class="flex justify-between mt-6 pt-4 border-t border-gray-100">

                <a href="{{ route('actions.index') }}"
                   class="h-10 px-4 border border-gray-300 rounded-lg text-gray-600 flex items-center">
                    Отмена
                </a>

                <button type="submit"
                        class="h-10 px-6 bg-gray-800 text-white rounded-lg hover:bg-gray-900">
                    Применить
                </button>

            </div>

        </form>
{{--        <form action="{{ route('trashes.store') }}" method="POST" class="bg-white rounded-2xl border border-gray-200 p-6 w-full">--}}
{{--            <h2 class="text-lg font-semibold mb-6">Списание</h2>--}}
{{--            <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">--}}
{{--                <div>--}}
{{--                    <label class="block text-xs text-gray-500 mb-1">Причина</label>--}}
{{--                    <select name="reason" class="w-full h-10 px-3 border border-gray-300 rounded-lg">--}}
{{--                        <option value="">Выберите причину</option>--}}
{{--                        <option value="crashed">Порча</option>--}}
{{--                        <option value="old">Истек срок</option>--}}
{{--                        <option value="error">Ошибка учета</option>--}}
{{--                    </select>--}}
{{--                    @error('reason') <p class="text-red-900 text-sm">{{ $message }}</p> @enderror--}}
{{--                </div>--}}
{{--                <div>--}}
{{--                    <label class="block text-xs text-gray-500 mb-1">Комментарий</label>--}}
{{--                    <input type="text" placeholder="Комментарий" name="comment"--}}
{{--                           class="w-full h-10 px-3 border border-gray-300 rounded-lg">--}}
{{--                    @error('comment') <p class="text-red-900 text-sm">{{ $message }}</p @enderror--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="flex justify-between">--}}
{{--                <p class="block text-sm font-medium text-gray-700">Товары</p>--}}
{{--                <div class="select-none">--}}
{{--                    <i class="text-sm text-gray-700 fa-solid fa-plus cursor-pointer" onclick="addProduct()"></i>--}}
{{--                    <i class="text-sm text-gray-700 fa-solid fa-minus cursor-pointer" onclick="removeProduct()"></i>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div id="products" class="space-y-3"></div>--}}
{{--            <div class="flex justify-between mt-6 pt-4 border-t border-gray-100">--}}
{{--                <a type="reset" href="{{ route('actions.index') }}"--}}
{{--                        class="h-10 px-4 border border-gray-300 rounded-lg text-gray-600 cursor-pointer flex justify-center items-center">--}}
{{--                    Отмена--}}
{{--                </a>--}}
{{--                <button type="submit"--}}
{{--                        class="h-10 px-6 bg-gray-800 text-white rounded-lg hover:bg-gray-900 cursor-pointer">--}}
{{--                    Списать--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </form>--}}
    </section>
    @include('_form/actions')
@endsection
