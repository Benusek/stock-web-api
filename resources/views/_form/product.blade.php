@php
    use App\Models\Product;
    /* @var Product[] $products
    */
    $supply = $supply ?? null;
    $price = $price ?? null;
    $products = Product::query()->get();
@endphp

<template id="product-template">
    <div class="grid grid-cols-full @if ($price) sm:grid-cols-3 @else sm:grid-cols-2 @endif gap-3 mb-6">
        <div>
            <label class="block text-xs text-gray-500 mb-1">Название</label>
            <select name="products[INDEX][id]"
                    class="w-full h-10 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none">
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block text-xs text-gray-500 mb-1">Кол-во</label>
            <input type="number" name="products[INDEX][quantity]" placeholder="5"
                   class="w-full h-10 pl-4 pr-4 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
        </div>
        @if ($price)
            <div>
                <label class="block text-xs text-gray-500 mb-1">Стоимость</label>
                <input type="number" name="products[INDEX][price]" placeholder="5"
                       class="w-full h-10 pl-4 pr-4 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
            </div>
        @endif
    </div>
</template>
