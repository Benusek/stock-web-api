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
            @include('_form/supplies')
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
@endsection
