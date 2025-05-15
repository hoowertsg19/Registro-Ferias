@extends('layouts.app')

@section('content')
<div class="container mx-auto py-10 px-4 max-w-3xl">
    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-2xl p-8">
        <h1 class="text-3xl font-bold mb-2 text-gray-800 dark:text-gray-100">Bienvenido, {{ Auth::user()->name }}</h1>
        <p class="mb-8 text-gray-500 dark:text-gray-300">Selecciona una opción:</p>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <a href="{{ route('ferias.index') }}"
               class="flex flex-col items-center justify-center bg-blue-50 dark:bg-blue-900 hover:bg-blue-100 dark:hover:bg-blue-800 transition rounded-xl shadow p-6 group">
                <span class="text-4xl mb-2 transition group-hover:scale-110">📅</span>
                <span class="text-lg font-semibold text-blue-700 dark:text-blue-200">Ver Ferias</span>
            </a>
            <a href="{{ route('emprendedores.index') }}"
               class="flex flex-col items-center justify-center bg-green-50 dark:bg-green-900 hover:bg-green-100 dark:hover:bg-green-800 transition rounded-xl shadow p-6 group">
                <span class="text-4xl mb-2 transition group-hover:scale-110">🧑‍💼</span>
                <span class="text-lg font-semibold text-green-700 dark:text-green-200">Ver Emprendedores</span>
            </a>
        </div>
    </div>
</div>
@endsection
