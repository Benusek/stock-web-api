@php use App\Models\Product;@endphp
@php
    /** @var Product[] $products */
    $products = Product::all();

@endphp

<template id="product-template">
    <div class="grid grid-cols-full sm:grid-cols-2 gap-3 items-center mb-4" id="row">
        <div>
            <label class="block text-xs text-gray-500 mb-1">Название</label>
            <select name="products[INDEX][product_id]" class="w-full h-10 px-3 border border-gray-300 rounded-lg">
                <option>Выберите товар</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
            <p data-error="product_id" class="text-red-900 text-sm"></p>
        </div>
        <div>
            <label class="block text-xs text-gray-500 mb-1">Кол-во</label>
            <div class="flex flex-row justify-around items-center">
                <input type="number" min="1"  name="products[INDEX][quantity]" placeholder="5"
                       class="w-full h-10 px-3 border border-gray-300 rounded-lg">
            </div>
            <p data-error="quantity" class="text-red-900 text-sm"></p>
        </div>
    </div>
</template>

<script type="application/javascript">
    let productIndex = 0

    window.LaravelErrors = @json($errors->toArray());
    const oldProducts = @json(old('products', []));
    console.log(oldProducts);

    const price = document.getElementById('price')
    const products = document.getElementById('products')
    const template = document.getElementById('product-template').innerHTML

    function addProduct(data = null) {
        if (productIndex >= 6) return

        const html = template.replaceAll('INDEX', productIndex)

        products.insertAdjacentHTML('beforeend', html)
        const row = products.lastElementChild

        if (data) {

            row.querySelector('[name="products[' + productIndex + '][product_id]"]').value = data['product_id'] ?? ''
            row.querySelector('[name="products[' + productIndex + '][quantity]"]').value = data['quantity']
            if (row.querySelector('[name="products[' + productIndex + '][price]"]')) {row.querySelector('[name="products[' + productIndex + '][price]"]').value = data['price']}
        }

        productIndex++
    }


    function removeProduct() {
        if (productIndex <= 1) return
        products.lastElementChild.remove()
        productIndex--
    }

    // function changeEvent() {
    //     products.querySelectorAll('div.grid').forEach((row) => {
    //         row.querySelector("#trash").addEventListener('click', function () {
    //             row.remove()
    //             productIndex--
    //         })
    //     })
    // }

    function applyErrors() {
        const errors = window.LaravelErrors || {};

        products.querySelectorAll('div.grid').forEach((row, index) => {
            row.dataset.index = index;

            Object.keys(errors).forEach(key => {
                const match = key.match(/^products\.(\d+)\.(.+)$/)
                if (!match) return

                const errorIndex = match[1]
                const field = match[2]

                if (parseInt(errorIndex) !== index) return

                const errorElement = row.querySelector(`[data-error="${field}"]`)

                if (errorElement) {
                    errorElement.textContent = errors[key][0]
                    errorElement.classList.remove('hidden')
                }
            });
        });
    }

    if (oldProducts.length) {
        oldProducts.forEach(p => addProduct(p))
    } else {
        addProduct()
    }
    applyErrors()
</script>
