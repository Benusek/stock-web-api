@php use App\Models\Supplier;@endphp
@php
    /**
    * @var Supplier[] $suppliers
    * @var boolean $filter
    **/
    $filter = $filter ?? null;
    $suppliers = Supplier::query()->get();
@endphp

<select name="supplier_id"
        class="w-full h-10 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none">
    @if($filter)
        <option value="">Все поставщики</option>
    @endif
    @foreach($suppliers as $supplier)
        <option value="{{ $supplier->id }}" @if($filter)
            @selected(request('supplier_id'))
            @endif>{{ $supplier->name }}</option>
    @endforeach
</select>
