<!-- resources/views/ferias/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto py-8">
    <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-8">
        <h2 class="text-2xl font-bold mb-6 text-gray-900 dark:text-gray-100">Registrar Nueva Feria</h2>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form action="{{ route('ferias.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nombre" class="block text-gray-700 dark:text-gray-200 font-semibold mb-2">Nombre de la feria</label>
                <input type="text" name="nombre" id="nombre" class="w-full rounded border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:ring focus:ring-blue-200" value="{{ old('nombre') }}" required>
                @error('nombre')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="fecha" class="block text-gray-700 dark:text-gray-200 font-semibold mb-2">Fecha</label>
                <input type="date" name="fecha" id="fecha" class="w-full rounded border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:ring focus:ring-blue-200" value="{{ old('fecha') }}" required>
                @error('fecha')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="lugar" class="block text-gray-700 dark:text-gray-200 font-semibold mb-2">Lugar</label>
                <input type="text" name="lugar" id="lugar" class="w-full rounded border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:ring focus:ring-blue-200" value="{{ old('lugar') }}" required>
                @error('lugar')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-6">
                <label for="descripcion" class="block text-gray-700 dark:text-gray-200 font-semibold mb-2">Descripción</label>
                <textarea name="descripcion" id="descripcion" rows="3" class="w-full rounded border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:ring focus:ring-blue-200" required>{{ old('descripcion') }}</textarea>
                @error('descripcion')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-4">Emprendedores</label>
                <div class="cardm">
                    @foreach($emprendedores as $emp)
                        <div class="emp-card-container">
                            <input type="checkbox" name="emprendedores[]" value="{{ $emp->id }}" class="emp-checkbox">
                            <div class="card">
                                <div class="main">{{ $emp->nombre }}</div>
                            </div>
                            <div class="card2">
                                <div class="upper">
                                    <div class="humidity">
                                        <div class="humiditytext">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H5a2 2 0 01-2-2V5z" />
                                            </svg>
                                            <span>{{ $emp->telefono }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="lower">
                                    <div class="realfeel">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 1.343-3 3 0 1.657 1.343 3 3 3s3-1.343 3-3c0-1.657-1.343-3-3-3zm0 10c-4.418 0-8-1.79-8-4V6c0-2.21 3.582-4 8-4s8 1.79 8 4v8c0 2.21-3.582 4-8 4z" />
                                        </svg>
                                        <span>{{ $emp->rubro }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="flex justify-end gap-2">
                <a href="{{ route('ferias.index') }}" class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200 rounded hover:bg-gray-300 dark:hover:bg-gray-600">Cancelar</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Registrar</button>
            </div>
        </form>
    </div>
</div>
@endsection

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('nombre').addEventListener('input', function(e) {
        let value = e.target.value;
        if (value.length > 0) {
            e.target.value = value.charAt(0).toUpperCase() + value.slice(1);
        }
    });

    document.getElementById('lugar').addEventListener('input', function(e) {
        let value = e.target.value;
        if (value.length > 0) {
            e.target.value = value.charAt(0).toUpperCase() + value.slice(1);
        }
    });

    document.getElementById('descripcion').addEventListener('input', function(e) {
        let value = e.target.value;
        if (value.length > 0) {
            e.target.value = value.charAt(0).toUpperCase() + value.slice(1);
        }
    });
});
</script>
