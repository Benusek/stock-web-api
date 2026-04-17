@extends('layout')

@section('content')
    <section class="p-6 w-full">
        <form action="{{ route('products.store') }}" method="POST" novalidate
              class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 mb-4">
            @csrf
            <div class="mb-6">
                <h1 class="text-xl font-semibold">Товар</h1>
                <p class="text-sm text-gray-500">Создание</p>
            </div>
            @include('_form/products')
            <div class="flex justify-between flex-col sm:flex-row pt-4 border-t border-gray-100 gap-2">
                <div class="flex gap-2 justify-between">
                    <a href="{{ route('products.index') }}"
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
@endsection
