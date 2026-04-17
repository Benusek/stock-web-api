@php use App\Models\Product; @endphp
@php
    /** @var Product $product */
@endphp

@extends('layout')

@section('content')
    <section class="p-5 w-full">
        <form action="{{ route('products.update', $product) }}" method="POST" class="flex flex-col bg-white border border-gray-200 rounded-2xl p-6 mb-4">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-xl font-semibold text-gray-900">Товар</h1>
                    <p class="text-sm text-gray-500">Редактирование</p>
                </div>
                <div class="flex text-sm flex-col items-end">
                    <p class="text-sm text-gray-500">Создан</p>
                    <p class="block font-medium text-gray-900">{{ $product->created_at->diffForHumans() }}</p>
                </div>
            </div>
            @include('_form/products')
            <div class="flex sm:justify-end gap-2 pt-4 border-t border-gray-100">
                <a href="{{ route('products.index') }}"
                   class="h-10 w-full md:w-min px-4 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50 transition cursor-pointer flex justify-center items-center">
                    Отмена
                </a>
                <button
                    class="h-10 px-4 rounded-lg bg-gray-600 text-white hover:bg-gray-700 transition shadow-sm cursor-pointer flex justify-center items-center">
                    Сохранить
                </button>
            </div>
        </form>
    </section>
@endsection
