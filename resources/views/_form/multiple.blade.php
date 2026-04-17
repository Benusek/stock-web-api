@php use App\Models\Supply; use App\Models\Product; use App\Models\SupplyProducts;@endphp
@php
    /** @var Supply $supply */
    /** @var Product[] $products */
    /** @var SupplyProducts $supplies */
    $supply = $supply ?? null;
    $supplies = $supply?->supplies;
    $products = Product::all();
    if ($supply) {
        $values = $supply->products->map(function ($product, $index) use ($supplies) {
            return [
                'product_id' => $product->id,
                'quantity' => $supplies[$index]->quantity,
                'price' => $supplies[$index]->price,
            ];
        });
    }
@endphp

<template id="product-template">
    <div class="grid grid-cols-full sm:grid-cols-3 gap-3 mb-6">
        <div>
            <label class="block text-xs text-gray-500 mb-1">Название</label>
            <select name="products[INDEX][product_id]"
                    class="w-full h-10 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none">
                <option value="">Выберите товар</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" @selected(old('products[INDEX][product_id]') == $product->id)>{{ $product->name }}</option>
                @endforeach
            </select>
            <p data-error="product_id" class="text-red-900 text-sm"></p>
        </div>
        <div>
            <label class="block text-xs text-gray-500 mb-1">Кол-во</label>
            <input type="number" name="products[INDEX][quantity]" placeholder="5"
                   class="w-full h-10 pl-4 pr-4 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
            <p data-error="quantity" class="text-red-900 text-sm"></p>
        </div>
        <div>
            <label class="block text-xs text-gray-500 mb-1">Стоимость</label>
            <input type="number" name="products[INDEX][price]" placeholder="5"
                   class="w-full h-10 pl-4 pr-4 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
            <p data-error="price" class="text-red-900 text-sm"></p>
        </div>
    </div>
</template>

<script type="application/javascript">
    let productIndex = 0;
    const prices = [];

    window.LaravelErrors = @json($errors->toArray());
    const oldProducts = @json(old('products', []));
    const values = @if($supply) @json($values) @else [] @endif;

    const priceEl = document.getElementById('price');
    const productsEl = document.getElementById('products');
    const template = document.getElementById('product-template').innerHTML;

    const MAX_PRODUCTS = 6;

    function createRow(index, data = {}) {
        const html = template.replaceAll('INDEX', index);
        productsEl.insertAdjacentHTML('beforeend', html);

        const row = productsEl.lastElementChild;

        if (data) {
            setValue(row, index, 'product_id', data.product_id ?? '');
            setValue(row, index, 'quantity', data.quantity ?? '');
            setValue(row, index, 'price', data.price ?? 0);
        }

        prices[index] = Number(data?.price) || 0;
    }

    function setValue(row, index, field, value) {
        const input = row.querySelector(`[name="products[${index}][${field}]"]`);
        if (input) input.value = value;
    }

    function addProduct(data = null) {
        if (productIndex >= MAX_PRODUCTS) return;

        createRow(productIndex, data);
        productIndex++;

        updateTotal();
    }

    function removeProduct() {
        if (productIndex <= 1) return;

        productsEl.lastElementChild.remove();
        productIndex--;
        prices.pop();

        updateTotal();
    }

    function updateTotal() {
        const sum = Math.sumPrecise(prices);
        priceEl.textContent = `${sum} ₽`;
    }

    productsEl.addEventListener('input', (e) => {
        if (!e.target.name?.includes('[price]')) return;

        const row = e.target.closest('div.grid');
        const index = [...productsEl.children].indexOf(row);

        prices[index] = Number(e.target.value) || 0;
        updateTotal();
    });

    function applyErrors() {
        const errors = window.LaravelErrors || {};

        Object.entries(errors).forEach(([key, messages]) => {
            const match = key.match(/^products\.(\d+)\.(.+)$/);
            if (!match) return;

            const [_, index, field] = match;
            const row = productsEl.children[index];
            if (!row) return;

            const errorEl = row.querySelector(`[data-error="${field}"]`);
            if (errorEl) {
                errorEl.textContent = messages[0];
                errorEl.classList.remove('hidden');
            }
        });
    }

    function init() {
        const source = oldProducts.length
            ? oldProducts
            : (values.length ? values : [null]);

        source.forEach(item => addProduct(item));

        updateTotal();
        applyErrors();
    }

    init();
</script>
