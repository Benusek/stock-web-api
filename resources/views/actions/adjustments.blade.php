@php use App\Models\Product; use App\Enums\Product\Type; use App\Enums\Product\Unit ;use Illuminate\Pagination\LengthAwarePaginator@endphp
@php
    /** @var Product[]|LengthAwarePaginator $products */
        $products = Product::query()->paginate(10);
@endphp

@extends('layout')

@section('content')
    <section class="p-6 flex justify-center">
        <form action="{{ route('adjustments.store') }}" method="POST" novalidate
              class="bg-white rounded-2xl border border-gray-200 p-6 w-full max-w-4xl">

            @csrf

            <h2 class="text-lg font-semibold mb-6">Корректировка</h2>

            <!-- Основные поля -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">

                <div>
                    <label class="block text-xs text-gray-500 mb-1">Причина</label>

                    <select name="reason"
                            class="w-full h-10 px-3 border rounded-lg border-gray-300">

                        <option value="">Выберите причину</option>
                        <option value="inventory" {{ old('reason') == 'inventory' ? 'selected' : '' }}>
                            Инвентаризация
                        </option>
                        <option value="error" {{ old('reason') == 'error' ? 'selected' : '' }}>
                            Ошибка учета
                        </option>
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

            <!-- Заголовок товаров -->
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

            <!-- Кнопки -->
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
        @include('_form/actions')
    </section>
@endsection


