<template id="product-template">
    <div class="grid grid-cols-2 gap-3 mb-6">
        <div>
            <label class="block text-xs text-gray-500 mb-1">Название</label>
            <select name="items[INDEX][unit]"
                    class="w-full h-10 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none">
                <option value="liter">Скотч</option>
                <option value="piece">Говядина</option>
                <option value="kg">Сыр</option>
            </select>
        </div>
        <div>
            <label class="block text-xs text-gray-500 mb-1">Кол-во</label>
            <input type="number" name="items[INDEX][quantity]" placeholder="5"
                   class="w-full h-10 pl-4 pr-4 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
        </div>
    </div>
</template>
