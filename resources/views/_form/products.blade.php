@php use App\Enums\Product\Type;use App\Enums\Product\Unit;use App\Models\Product; @endphp
@php /** @var Product $product */
    $product = $product ?? null;
    $types = Type::cases();
    $units = Unit::cases();
@endphp

<span class="block text-sm font-medium text-gray-700 mb-2">Основное</span>
<div class="grid grid-cols-full sm:grid-cols-2 md:grid-cols-4 gap-4 mb-6">
    <div>
        <label class="block text-xs text-gray-500 mb-1">Название</label>
        <input type="text" name="name" placeholder="Сыр" value="{{ old('name', $product?->name) }}"
               class="w-full h-10 pl-4 pr-4 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
        @error('name') <p class="text-red-900 text-sm">{{ $message }}</p> @enderror
    </div>
    <div>
        <label class="block text-xs text-gray-500 mb-1">Кол-во</label>
        <input type="number" name="quantity" placeholder="5" value="{{ old('quantity', $product?->quantity) }}"
               class="w-full h-10 pl-4 pr-4 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
        @error('quantity') <p class="text-red-900 text-sm">{{ $message }}</p> @enderror
    </div>
    <div>
        <label class="block text-xs text-gray-500 mb-1">Ед.</label>
        <select name="unit"
                class="w-full h-10 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none">
            @foreach($units as $unit)
                <option value="{{ $unit->value }}" @selected(old('unit') == $product?->unit || old('unit') == $unit->value)>{{ Unit::from($unit->value)->label() }}</option>
            @endforeach
        </select>
        @error('unit') <p class="text-red-900 text-sm">{{ $message }}</p> @enderror
    </div>
    <div>
        <label class="block text-xs text-gray-500 mb-1">Тип</label>
        <select name="type"
                class="w-full h-10 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none">
            @foreach($types as $type)
                <option value="{{ $type->value }}" @selected(old('type') == $product?->type || old('type') == $type->value)>{{ Type::from($type->value)->label() }}</option>
            @endforeach
        </select>
        @error('type') <p class="text-red-900 text-sm">{{ $message }}</p> @enderror
    </div>
</div>
<div class="mb-6">
    <span class="block text-sm font-medium text-gray-700 mb-2">Минимальный остаток</span>
    <input type="number" placeholder="5" name="minimum" value="{{ old('minimum', $product?->minimum) }}"
           class="w-full h-10 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none">
    @error('minimum') <p class="text-red-900 text-sm">{{ $message }}</p> @enderror
</div>
