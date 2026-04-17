@php use App\Models\Supplier;use App\Models\Supply;use App\Models\User;use App\Enums\Supply\Status ;use Illuminate\Pagination\LengthAwarePaginator@endphp
@php
    /** @var LengthAwarePaginator|Supply[] $supplies */
    /** @var User[] $users */
    /** @var Status $statuses */
    /** @var Supplier[] $suppliers **/
    $suppliers = Supplier::all();
    $users = User::all();
    $statuses = Status::cases();
@endphp

@extends('layout')

@section('content')
    <section class="p-5 w-full">
        <!--Advanced-->
        <div class="flex justify-between mb-4 flex-wrap-reverse gap-4">
            <div class="flex items-center gap-3 select-none">
                <h1 class="text-xl font-semibold text-gray-900">Поставки</h1>
                <label for="filter"
                       class="flex items-center gap-2 text-gray-500 cursor-pointer hover:text-gray-700 transition">
                    <i class="fa-solid fa-filter"></i>
                    <span class="text-sm">Фильтры</span>
                </label>
            </div>
            <a href="{{ route('supplies.create') }}" class="flex items-center gap-2 h-10 px-4 bg-gray-800 text-white rounded-lg hover:bg-gray-900 transition">
                <i class="fa-solid fa-plus text-sm"></i>
                <span>Добавить поставку</span>
            </a>
        </div>

        <!--Filter form-->
        <input type="checkbox" id="filter" hidden>
        <form action="#" method="GET" novalidate
              class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 mb-4 filter-menu">
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Поиск
                </label>
                <div class="relative">
                    <input type="search" name="search" value="{{ request('search') }}"
                           placeholder="Номер поставки или товар"
                           class="w-full h-11 pl-10 pr-4 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                    <i class="fa-solid fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>
            </div>

            <div class="mb-6">
                <span class="block text-sm font-medium text-gray-700 mb-2">
                  Период
                </span>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <input type="date" name="start" value="{{ request('start') }}"
                           class="h-11 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none">
                    <input type="date" name="end" value="{{ request('end') }}"
                           class="h-11 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none">
                </div>
            </div>
            <div class="mb-6">
                <span class="block text-sm font-medium text-gray-700 mb-2">
                Фильтры
                </span>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-xs text-gray-500 mb-1">Статус</label>
                        <select name="status"
                                class="w-full h-10 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none">
                            <option value="">Все статусы</option>
                            @foreach($statuses as $status)
                                <option value="{{ $status->value }}" @selected(request('status') == $status->value)>{{ Status::from($status->value)->label() }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs text-gray-500 mb-1">Поставщик</label>
                        <select name="supplier_id" class="w-full h-10 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none">
                            <option value="">Все поставщики</option>
                            @foreach($suppliers as $supplier)
                                <option value="{{ $supplier->id }}" @selected(old('supplier_id') == $supplier->id || old('supplier_id') == $supplier->id)>{{ $supplier->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs text-gray-500 mb-1">
                            Создал
                        </label>
                        <select name="user_id"
                                class="w-full h-10 px-3 rounded-lg border border-gray-300 focus:ring-1 focus:ring-blue-500 outline-none">
                            <option value="">Все пользователи</option>
                            @foreach($users as $user)
                                <option
                                    value="{{ $user->id }}" @selected(request('user_id') == $user->id)>{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs text-gray-500 mb-1">Сумма</label>
                        <div class="flex gap-2">
                            <input type="number" name="min" value="{{ request('min') }}"
                                   placeholder="От"
                                   class="w-full h-10 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none">
                            <input type="number" name="max" value="{{ request('max') }}"
                                   placeholder="До"
                                   class="w-full h-10 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none">
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                <a href="{{ route('supplies.index') }}"
                   class="h-10 px-4 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50 transition cursor-pointer flex items-center">
                    Сбросить
                </a>
                <button type="submit"
                        class="h-10 px-6 rounded-lg bg-gray-600 text-white hover:bg-gray-700 transition shadow-sm cursor-pointer">
                    Применить
                </button>
            </div>
        </form>

        <!--Supplies cards-->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3">
            @if(count($supplies) < 1)
                <p class="col-span-full text-sm font-semibold">К сожалению по запросу ничего не найдено</p>
                <p class="col-span-full text-sm font-semibold">Хотите <a href="{{ route('supplies.create') }}" class="text-blue-500 border-b border-blue-500">добавить</a> запись?</p>
            @endif
            @foreach($supplies as $supply)
                <div class="bg-white border border-gray-200 rounded-2xl p-4 hover:shadow-md transition">
                    <div class="flex justify-between items-start mb-3">
                        <div>
                            <p class="text-xs text-gray-400">Поставка</p>
                            <p class="text-lg font-semibold text-gray-900">#{{ $supply->id }}</p>
                        </div>
                        <span
                            class="text-xs px-3 py-1 rounded-full {{ Status::from($supply->status)->classes() }}">{{ Status::from($supply->status)->label() }}</span>
                    </div>
                    <div class="space-y-2 mb-4">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Поставщик</span>
                            <span class="text-gray-900 font-medium">{{ $supply->supplier->name }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Создал</span>
                            <span class="text-gray-900">{{ $supply->user->name }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Дата</span>
                            <span class="text-gray-900">{{ $supply->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                    <div class="flex justify-between items-center pt-3 border-t border-gray-100">
                        <div>
                            <p class="text-xs text-gray-400">Сумма</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $supply->supplies->sum('price') }} ₽</p>
                        </div>
                        <a href="{{ route('supplies.show', $supply) }}" class="text-sm text-blue-600 hover:underline">
                            Подробнее
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="p-6">{{ $supplies->links('pagination') }}</div>
    </section>

@endsection

