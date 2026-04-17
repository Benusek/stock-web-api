@extends('layout')

@section('content')
    <div class="bg-gray-900 h-screen flex justify-center items-center">
        <div class="flex flex-col gap-10 select-none mt-20 mb-auto">
            <a class="text-white font-bold text-5xl text-center tracking-widest">
                <span>Stock</span>
            </a>
            <form action="{{ route('authorization') }}" method="POST" class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 m-auto" novalidate>
                @csrf
                <div class="mb-6">
                    <label class="block text-lg font-medium text-gray-700 mb-1 text-center">
                        Вход
                    </label>
                    <div class="mb-6 w-max-min">
                        <label class="block text-xs text-gray-500 mb-1">Почта</label>
                        <input type="email" name="email" placeholder="test@example.com" value="{{ old('email') }}"
                               class="w-full h-10 pl-4 pr-4 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                        @error('email') <p class="text-red-900 text-sm w-50 sm:w-full">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-xs text-gray-500 mb-1">Пароль</label>
                        <input type="password" name="password" placeholder="password" value="{{ old('password') }}"
                               class="w-full h-10 pl-4 pr-4 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                        @error('password') <p class="text-red-900 text-sm w-50 sm:w-full">{{ $message }}</p> @enderror
                    </div>
                </div>
                <div class="w-full pt-4 border-t border-gray-100 gap-2">
                    <button type="submit"
                            class="w-full h-10 px-6 rounded-lg bg-gray-600 text-white hover:bg-gray-700 transition shadow-sm cursor-pointer">
                        Войти
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
