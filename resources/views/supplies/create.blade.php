@php
    use App\Enums\Supply\Status;
    /** @var Status $statuses */
    $statuses = Status::cases();
@endphp

@extends('layout')

@section('content')
    <section class="p-5 w-full">
        <form action="{{ route('supplies.store') }}" method="POST" novalidate
              class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 mb-4">
            @csrf
            <div class="flex justify-between mb-6">
                <div>
                    <h1 class="text-xl font-semibold">Поставка</h1>
                    <p class="text-sm text-gray-500">Создание</p>
                </div>
                <div class="flex items-start">
                    <div class="text-right">
                        <p class="text-sm text-gray-500">Итого</p>
                        <p class="text-xl font-semibold" id="price">0 ₽</p>
                    </div>
                </div>
            </div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Основное</label>
            <div class="mb-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-end">
                    <div>
                        <label class="block text-xs text-gray-500 mb-1">Статус</label>
                        <select name="status"
                                class="w-full h-10 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none">
                            @foreach($statuses as $status)
                                <option
                                    value="{{ $status->value }}" @selected(old('status') == $status->value)>{{ Status::from($status->value)->label() }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs text-gray-500 mb-1">Поставщик</label>
                        @include('_form/supply')
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

    @include('_form.product', ['price' => true])
    @include('_form.multiple')
@endsection
