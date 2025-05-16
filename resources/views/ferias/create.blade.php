@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto py-12">
    <div class="bg-gradient-to-br from-blue-100 via-white to-blue-200 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 shadow-2xl shadow-blue-200/60 dark:shadow-blue-900/40 rounded-3xl p-12 border border-blue-200 dark:border-blue-800 backdrop-blur-xl ring-1 ring-blue-100/40 dark:ring-blue-900/30">
        <h2 class="text-4xl font-extrabold mb-10 text-blue-900 dark:text-blue-200 tracking-tight drop-shadow-2xl">Registrar Nueva Feria</h2>
        @if ($errors->any())
            <ul class="mb-4 p-4 bg-red-100/80 dark:bg-red-900/80 rounded-xl shadow-lg text-red-700 dark:text-red-200 border border-red-200 dark:border-red-700">
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form action="{{ route('ferias.store') }}" method="POST">
            @csrf
            <div class="mb-8">
                <label for="nombre" class="block text-blue-800 dark:text-blue-200 font-semibold mb-2">Nombre de la feria</label>
                <input type="text" name="nombre" id="nombre" class="w-full rounded-xl border border-blue-200 dark:border-blue-700 bg-white/80 dark:bg-gray-900/80 dark:text-blue-100 focus:ring-4 focus:ring-blue-300/40 shadow-lg transition placeholder:text-blue-300 dark:placeholder:text-blue-600" value="{{ old('nombre') }}" required placeholder="Ej: Feria de Artesanos">
                @error('nombre')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-8">
                <label for="fecha" class="block text-blue-800 dark:text-blue-200 font-semibold mb-2">Fecha</label>
                <input type="date" name="fecha" id="fecha" class="w-full rounded-xl border border-blue-200 dark:border-blue-700 bg-white/80 dark:bg-gray-900/80 dark:text-blue-100 focus:ring-4 focus:ring-blue-300/40 shadow-lg transition" value="{{ old('fecha') }}" required>
                @error('fecha')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-8">
                <label for="lugar" class="block text-blue-800 dark:text-blue-200 font-semibold mb-2">Lugar</label>
                <input type="text" name="lugar" id="lugar" class="w-full rounded-xl border border-blue-200 dark:border-blue-700 bg-white/80 dark:bg-gray-900/80 dark:text-blue-100 focus:ring-4 focus:ring-blue-300/40 shadow-lg transition placeholder:text-blue-300 dark:placeholder:text-blue-600" value="{{ old('lugar') }}" required placeholder="Ej: Plaza Central">
                @error('lugar')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-10">
                <label for="descripcion" class="block text-blue-800 dark:text-blue-200 font-semibold mb-2">Descripción</label>
                <textarea name="descripcion" id="descripcion" rows="3" class="w-full rounded-xl border border-blue-200 dark:border-blue-700 bg-white/80 dark:bg-gray-900/80 dark:text-blue-100 focus:ring-4 focus:ring-blue-300/40 shadow-lg transition placeholder:text-blue-300 dark:placeholder:text-blue-600" required placeholder="Describe brevemente la feria">{{ old('descripcion') }}</textarea>
                @error('descripcion')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-10">
                <label class="block text-blue-800 dark:text-blue-200 font-semibold mb-4">Emprendedores</label>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    @foreach($emprendedores as $emp)
                        <label class="relative flex items-center space-x-4 bg-white/90 dark:bg-gray-800/90 rounded-2xl shadow-xl hover:shadow-blue-200/80 dark:hover:shadow-blue-900/40 transition p-4 border border-blue-100 dark:border-blue-700 cursor-pointer group ring-1 ring-blue-100/30 dark:ring-blue-900/20">
                            <input type="checkbox" name="emprendedores[]" value="{{ $emp->id }}" class="accent-blue-600 h-5 w-5 rounded border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-blue-400 transition">
                            <div>
                                <div class="text-lg font-bold text-blue-900 dark:text-blue-200 group-hover:text-blue-600">{{ $emp->nombre }}</div>
                                <div class="flex items-center text-sm text-blue-700 dark:text-blue-300 mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H5a2 2 0 01-2-2V5z" />
                                    </svg>
                                    {{ $emp->telefono }}
                                </div>
                                <div class="flex items-center text-xs text-blue-500 dark:text-blue-400 mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 1.343-3 3 0 1.657 1.343 3 3 3s3-1.343 3-3c0-1.657-1.343-3-3-3zm0 10c-4.418 0-8-1.79-8-4V6c0-2.21 3.582-4 8-4s8 1.79 8 4v8c0 2.21-3.582 4-8 4z" />
                                    </svg>
                                    {{ $emp->rubro }}
                                </div>
                            </div>
                            <span class="absolute top-2 right-2 w-3 h-3 rounded-full bg-blue-300 dark:bg-blue-700 opacity-0 group-hover:opacity-100 transition"></span>
                        </label>
                    @endforeach
                </div>
            </div>
            <div class="flex justify-end gap-4">
                <a href="{{ route('ferias.index') }}" class="px-6 py-2 bg-blue-100/80 dark:bg-blue-900/80 text-blue-800 dark:text-blue-200 rounded-xl shadow-md hover:bg-blue-200/80 dark:hover:bg-blue-800/80 transition font-semibold border border-blue-200 dark:border-blue-800">Cancelar</a>
                <button type="submit" class="px-6 py-2 bg-gradient-to-r from-blue-600 via-blue-500 to-blue-400 text-white rounded-xl shadow-xl hover:from-blue-700 hover:to-blue-600 transition font-semibold ring-1 ring-blue-300/40">Registrar</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('styles')
<style>
    body {
        background: radial-gradient(ellipse at 60% 40%, #e0e7ff 0%, #f8fafc 60%, #c7d2fe 100%);
        min-height: 100vh;
        /* Modern glassmorphism effect */
        backdrop-filter: blur(2px) saturate(120%);
    }
    @media (prefers-color-scheme: dark) {
        body {
            background: radial-gradient(ellipse at 60% 40%, #1e293b 0%, #0f172a 60%, #334155 100%);
        }
    }
    /* Subtle animated gradient for modern look */
    body {
        animation: gradientBG 16s ease infinite;
        background-size: 200% 200%;
    }
    @keyframes gradientBG {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
</style>
@endpush

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
