@php use App\Models\Supply;use App\Enums\Supply\Status; @endphp
@php
    /** @var Status $statuses */
    $statuses = Status::cases();
    /** @var Supply $supply **/
@endphp

@extends('layout')

@section('content')
    <section class="p-5 w-full">
        <form action="{{ route('supplies.update', $supply) }}" method="POST" class="flex flex-col bg-white border border-gray-200 rounded-2xl p-6">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-xl font-semibold">Поставка #{{ $supply->id }}</h1>
                    <p class="text-sm text-gray-500">Редактирование</p>
                </div>
                <div class="flex items-start">
                    <div class="text-right">
                        <p class="text-sm text-gray-500">Итого</p>
                        <p class="text-xl font-semibold" id="price">0 ₽</p>
                    </div>
                </div>
            </div>
            @include('_form.supplies')
            <div class="flex sm:justify-end gap-2 border-t border-gray-100 pt-4">
                <a href="{{ route('supplies.show', $supply) }}"
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
