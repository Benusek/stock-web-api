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

    const values = @if($supply) @json($values) @else [] @endif;
    const price = document.getElementById('price');
    const products = document.getElementById('products');

    function addProduct(data = null) {
        if (productIndex < 6) {
            const template = document.getElementById('product-template').innerHTML;
            const html = template.replaceAll('INDEX', productIndex);

            products.insertAdjacentHTML('beforeend', html);
            const row = products.lastElementChild;

            prices.push(data ? data['price'] : 0)
            if (data) {
                row.querySelector('[name="products[' + productIndex + '][id]"]').value = data['product_id'];
                row.querySelector('[name="products[' + productIndex + '][quantity]"]').value = data['quantity'];
                row.querySelector('[name="products[' + productIndex + '][price]"]').value = data['price'];
                priceOutput()
            }
            row.querySelector("[name$='[price]']").addEventListener('input', function () {
                prices[productIndex] = row.querySelector("[name$='[price]']").value * 1
                priceOutput()
            })

            productIndex++;
        }
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

    values.length ? values.forEach(item => addProduct(item)) : addProduct()
</script>
