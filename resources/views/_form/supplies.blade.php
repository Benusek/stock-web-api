@php use App\Models\Supplier;use App\Models\Supply;use App\Enums\Supply\Status; @endphp
@php
    /** @var Status $statuses */
    /** @var Supply $supply **/
    /** @var Supplier[] $suppliers **/
    $supply = $supply ?? null;
    $statuses = Status::cases();
    $suppliers = Supplier::query()->get();
@endphp

<div class="mb-6">
    <span class="block text-sm font-medium text-gray-700">Основное</span>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block text-xs text-gray-500 mb-1">Статус</label>
            <select name="status"
                    class="w-full h-10 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none">
                <option value="">Выберите статус</option>
                @foreach($statuses as $status)
                    <option
                        value="{{ $status->value }}" @selected(old('status', $supply?->status) == $status->value)>{{ Status::from($status->value)->label() }}</option>
                @endforeach
            </select>
            @error('status') <p class="text-red-900 text-sm">{{ $message }}</p>@enderror
        </div>
        <div>
            <label class="block text-xs text-gray-500 mb-1">Поставщик</label>
            <select name="supplier_id"
                    class="w-full h-10 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none">
                <option value="">Выберите поставщика</option>
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}"
                        @selected(old('supplier_id') == $supplier->id)>{{ $supplier->name }}</option>
                @endforeach
            </select>
            @error('supplier_id') <p class="text-red-900 text-sm">{{ $message }}</p>@enderror
        </div>
    </div>
</div>
<div>
    <div class="flex justify-between">
        <p class="block text-sm font-medium text-gray-700">Товары</p>
        <div class="select-none">
            <i class="text-sm text-gray-700 fa-solid fa-plus cursor-pointer" onclick="addProduct()"></i>
            <i class="text-sm text-gray-700 fa-solid fa-minus cursor-pointer" onclick="removeProduct()"></i>
        </div>
    </div>
    <div class="select-none" id="products"></div>
</div>

@include('_form.multiple')
