@php use App\Models\Supply; @endphp
@php /** @var Supply $supply */
    $supply = $supply ?? null;
    $supplies = $supply?->supplies;
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

<script>
    let productIndex = 0;
    let prices = [];
    let sum = 0;

    window.LaravelErrors = @json($errors->toArray());
    const oldProducts = @json(old('products', []));
    const values = @if($supply) @json($values) @else [] @endif;

    const price = document.getElementById('price');
    const products = document.getElementById('products');

    function addProduct(data = null) {
        if (productIndex < 6) {
            const template = document.getElementById('product-template').innerHTML;
            const html = template.replaceAll('INDEX', productIndex);

            products.insertAdjacentHTML('beforeend', html);
            const row = products.lastElementChild;

            prices.push(data? data['price'] * 1 : 0)
            if (data) {
                row.querySelector('[name="products[' + productIndex + '][product_id]"]').value = data['product_id'];
                row.querySelector('[name="products[' + productIndex + '][quantity]"]').value = data['quantity'];
                row.querySelector('[name="products[' + productIndex + '][price]"]').value = data['price'];
            }

            productIndex++;
        }
        changeEvent()
    }

    function changeEvent() {
        products.querySelectorAll('div.grid').forEach((row, index) => {
            row.querySelector("[name$='[price]']").addEventListener('input', function() {
                prices[index] = row.querySelector("[name$='[price]']").value * 1
                priceOutput()
            })
        })
    }

    function removeProduct() {
        if (productIndex > 1) {
            products.lastElementChild.remove()
            prices.pop()
            priceOutput()

            productIndex--;
        }
    }

    function priceOutput() {
        sum = Math.sumPrecise(prices);
        price.innerHTML = sum + ' ₽';
    }

    function applyErrors() {
        const errors = window.LaravelErrors || {};

        products.querySelectorAll('div.grid').forEach((row, index) => {
            row.dataset.index = index;

            Object.keys(errors).forEach(key => {
                const match = key.match(/^products\.(\d+)\.(.+)$/);
                if (!match) return;

                const errorIndex = match[1];
                const field = match[2];

                if (parseInt(errorIndex) !== index) return;

                const errorElement = row.querySelector(`[data-error="${field}"]`);

                if (errorElement) {
                    errorElement.textContent = errors[key][0];
                    errorElement.classList.remove('hidden');
                }
            });
        });
    }

    if (oldProducts.length) {
        oldProducts.forEach(p => addProduct(p))
    } else {
        if (values.length) {
            values.forEach(item => addProduct(item));
        } else {
            addProduct()
        }
    }
    priceOutput()
    applyErrors();
</script>
