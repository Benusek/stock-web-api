@php use App\Models\Product; use App\Enums\Product\Type; use App\Enums\Product\Unit ;use Illuminate\Pagination\LengthAwarePaginator@endphp
@php
    /** @var Product[]|LengthAwarePaginator $products */
        $products = Product::query()->paginate(10);
@endphp

@extends('layout')

@section('content')
    <section class="p-6">
        <form action="" method="POST" class="bg-white rounded-2xl border border-gray-200 p-6 max-w-4xl" novalidate>

            <div class="flex justify-between items-center mb-6">
                <h2 class="text-lg font-semibold">Корректировка остатков</h2>

                <button type="button" onclick="addProduct()"
                        class="flex items-center gap-2 h-9 px-3 text-sm bg-gray-800 text-white rounded-lg hover:bg-gray-900">
                    <i class="fa-solid fa-plus"></i>
                    Добавить товар
                </button>
            </div>
            <div id="products" class="space-y-3">
                <div class="grid grid-cols-12 gap-3 items-center product-row">
                    <div class="col-span-4">
                        <select class="w-full h-10 px-3 border border-gray-300 rounded-lg">
                            <option>Выберите товар</option>
                        </select>
                    </div>
                    <div data-quantity="2" class="col-span-3 text-sm text-gray-500">
                        10 кг
                    </div>
                    <div class="col-span-3">
                        <input type="number"
                               class="w-full h-10 px-3 border border-gray-300 rounded-lg actual-input"
                               placeholder="Факт">
                    </div>
                    <div class="col-span-1 text-sm font-medium delta">
                        0
                    </div>
                    <div class="col-span-1 text-right">
                        <button type="button" class="text-gray-400 hover:text-red-500">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div id="products"></div>
            <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="text-sm text-gray-600">Причина</label>
                    <select class="w-full h-10 px-3 border border-gray-300 rounded-lg">
                        <option>Инвентаризация</option>
                        <option>Ошибка учета</option>
                    </select>
                </div>
                <div>
                    <label class="text-sm text-gray-600">Комментарий</label>
                    <input type="text"
                           class="w-full h-10 px-3 border border-gray-300 rounded-lg">
                </div>
            </div>
            <div class="flex justify-between mt-6 pt-4 border-t border-gray-100">
                <button type="reset"
                        class="h-10 px-4 border border-gray-300 rounded-lg text-gray-600">
                    Отмена
                </button>
                <button type="submit"
                        class="h-10 px-6 bg-gray-800 text-white rounded-lg hover:bg-gray-900">
                    Применить
                </button>
            </div>
        </form>
    </section>
@endsection
{{--<script>--}}
{{--    document.addEventListener('input', function (e) {--}}
{{--        if (e.target.classList.contains('actual-input')) {--}}
{{--            const row = e.target.closest('.product-row');--}}

{{--            const stock = parseFloat(row.dataset.quantity); // текущий остаток--}}
{{--            const actual = parseFloat(e.target.value || 0);--}}

{{--            console.log(stock)--}}
{{--            const delta = actual - stock;--}}

{{--            const deltaEl = row.querySelector('.delta');--}}

{{--            deltaEl.textContent = delta;--}}

{{--            // цвет--}}
{{--            deltaEl.classList.toggle('text-red-500', delta < 0);--}}
{{--            deltaEl.classList.toggle('text-green-600', delta > 0);--}}
{{--        }--}}
{{--    });--}}
{{--</script>--}}

@include('_form/actions')
