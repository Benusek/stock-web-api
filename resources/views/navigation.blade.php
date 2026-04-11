<aside class="bg-gray-900 p-5 md:w-1/4">
    <header>
        <div class="flex justify-around items-center py-3">
            <a href="{{ route('supplies.index') }}"
               class="flex text-white font-bold tracking-widest justify-center text-5xl">
                <span>Stock</span>
            </a>
            <label for="toggle" class="md:hidden">
                <i class="fa-solid fa-bars text-white text-2xl"></i>
            </label>
        </div>
    </header>
    <input type="checkbox" class="toggle" id="toggle" hidden>
    <nav class="md:!flex flex-col gap-3 text-white md:mt-5">
        <a href="{{ route('supplies.index') }}"
           class="flex gap-3 items-center px-3 py-2 rounded-lg hover:bg-gray-800 transition">
            <i class="fa-solid fa-truck"></i>
            <span>Поставки</span>
        </a>
        <a href="{{ route('products.index') }}" class="flex gap-3 items-center px-3 py-2 rounded-lg hover:bg-gray-800 transition">
            <i class="fa-solid fa-box"></i>
            <span>Товары</span>
        </a>
        <a class="flex gap-3 items-center px-3 py-2 rounded-lg hover:bg-gray-800 transition">
            <i class="fa-solid fa-arrow-right-arrow-left"></i>
            <span>Операции</span>
        </a>
        <a class="flex gap-3 items-center px-3 py-2 rounded-lg hover:bg-gray-800 transition">
            <i class="fa-solid fa-utensils"></i>
            <span>Рецепты</span>
        </a>
        <a class="flex gap-3 items-center px-3 py-2 rounded-lg hover:bg-gray-800 transition">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span>Выйти</span>
        </a>
    </nav>
</aside>
