@extends('layouts.app')

@section('content')
<div class="container mx-auto py-12 px-4 max-w-3xl">
    <div class="bg-gradient-to-br from-gray-50 via-white to-blue-50 dark:from-gray-900 dark:via-gray-800 dark:to-blue-900 shadow-2xl ring-2 ring-blue-200 dark:ring-blue-800 rounded-3xl p-12 transition-all duration-300 border border-blue-100 dark:border-blue-900 backdrop-blur-md">
        <h1 class="text-4xl font-extrabold mb-4 text-gray-900 dark:text-white tracking-tight drop-shadow-2xl">
            Bienvenido, <span class="bg-gradient-to-r from-blue-400 to-green-400 bg-clip-text text-transparent">{{ Auth::user()->name }}</span>
        </h1>
        <p class="mb-10 text-gray-600 dark:text-gray-300 text-lg font-medium">
            Selecciona una opción:
        </p>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-10">
            <!-- Ferias -->
            <a href="{{ route('ferias.index') }}"
               class="flex flex-col items-center justify-center bg-gradient-to-br from-blue-100 via-blue-50 to-blue-200 dark:from-blue-900 dark:via-blue-800 dark:to-blue-700 hover:scale-105 transition-transform duration-200 rounded-2xl shadow-[0_8px_32px_0_rgba(31,38,135,0.37)] hover:shadow-[0_12px_48px_0_rgba(31,38,135,0.45)] p-10 group border border-blue-200 dark:border-blue-800 backdrop-blur-sm hover:ring-4 hover:ring-blue-300 dark:hover:ring-blue-600">
                <span class="text-6xl mb-4 transition group-hover:scale-125 drop-shadow-xl">📅</span>
                <span class="text-3xl font-extrabold text-blue-900 dark:text-blue-200 drop-shadow">{{ $feriasCount }}</span>
                <span class="text-lg font-semibold text-blue-700 dark:text-blue-200 mt-2 tracking-wide">Ferias Registradas</span>
            </a>

            <!-- Emprendedores -->
            <a href="{{ route('emprendedores.index') }}"
               class="flex flex-col items-center justify-center bg-gradient-to-br from-green-100 via-green-50 to-green-200 dark:from-green-900 dark:via-green-800 dark:to-green-700 hover:scale-105 transition-transform duration-200 rounded-2xl shadow-[0_8px_32px_0_rgba(16,185,129,0.25)] hover:shadow-[0_12px_48px_0_rgba(16,185,129,0.35)] p-10 group border border-green-200 dark:border-green-800 backdrop-blur-sm hover:ring-4 hover:ring-green-300 dark:hover:ring-green-600">
                <span class="text-6xl mb-4 transition group-hover:scale-125 drop-shadow-xl">🧑‍💼</span>
                <span class="text-3xl font-extrabold text-green-900 dark:text-green-200 drop-shadow">{{ $emprendedoresCount }}</span>
                <span class="text-lg font-semibold text-green-700 dark:text-green-200 mt-2 tracking-wide">Emprendedores</span>
            </a>
        </div>
    </div>
</div>
@endsection
