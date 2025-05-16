@extends('layouts.app')

@section('content')
<div class="container mx-auto py-16 px-4 max-w-3xl">
  <div class="bg-gradient-to-br from-blue-100 via-white to-blue-200 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 border border-blue-200 dark:border-gray-700/60 rounded-3xl p-12 shadow-2xl shadow-blue-300/40 dark:shadow-black/60 backdrop-blur-xl relative overflow-hidden">
    <!-- Modern glassmorphism effect -->
    <div class="absolute inset-0 bg-white/30 dark:bg-gray-900/30 rounded-3xl backdrop-blur-2xl pointer-events-none"></div>
    <h1 class="relative z-10 text-4xl font-extrabold mb-10 text-blue-900 dark:text-blue-100 tracking-tight drop-shadow-2xl">
      Editar Feria
    </h1>

    @if($errors->any())
      <div class="relative z-10 mb-8 p-4 bg-red-100/90 dark:bg-red-900/80 border border-red-300 dark:border-red-700 rounded-2xl shadow-lg shadow-red-200/40 dark:shadow-black/40">
        <ul class="list-disc list-inside text-sm text-red-800 dark:text-red-200">
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('ferias.update', $feria) }}" method="POST" class="relative z-10 space-y-8">
      @csrf
      @method('PUT')

      <div>
        <label for="nombre" class="block text-base font-semibold text-blue-800 dark:text-blue-200 mb-2">Nombre</label>
        <input
          type="text" name="nombre" id="nombre" required
          value="{{ old('nombre', $feria->nombre) }}"
          class="mt-1 block w-full rounded-2xl border border-blue-300 dark:border-blue-700 bg-white/70 dark:bg-gray-800/70
                 text-gray-900 dark:text-gray-100 shadow-lg shadow-blue-100/40 dark:shadow-black/30 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition"
        >
      </div>

      <div>
        <label for="fecha" class="block text-base font-semibold text-blue-800 dark:text-blue-200 mb-2">Fecha</label>
        <input
          type="date" name="fecha" id="fecha" required
          value="{{ old('fecha', $feria->fecha->format('Y-m-d')) }}"
          class="mt-1 block w-full rounded-2xl border border-blue-300 dark:border-blue-700 bg-white/70 dark:bg-gray-800/70
                 text-gray-900 dark:text-gray-100 shadow-lg shadow-blue-100/40 dark:shadow-black/30 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition"
        >
      </div>

      <div>
        <label for="lugar" class="block text-base font-semibold text-blue-800 dark:text-blue-200 mb-2">Lugar</label>
        <input
          type="text" name="lugar" id="lugar" required
          value="{{ old('lugar', $feria->lugar) }}"
          class="mt-1 block w-full rounded-2xl border border-blue-300 dark:border-blue-700 bg-white/70 dark:bg-gray-800/70
                 text-gray-900 dark:text-gray-100 shadow-lg shadow-blue-100/40 dark:shadow-black/30 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition"
        >
      </div>

      <div>
        <label for="descripcion" class="block text-base font-semibold text-blue-800 dark:text-blue-200 mb-2">
          Descripción
        </label>
        <textarea
          name="descripcion" id="descripcion" rows="4"
          class="mt-1 block w-full rounded-2xl border border-blue-300 dark:border-blue-700 bg-white/70 dark:bg-gray-800/70
                 text-gray-900 dark:text-gray-100 shadow-lg shadow-blue-100/40 dark:shadow-black/30 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition"
        >{{ old('descripcion', $feria->descripcion) }}</textarea>
      </div>

      <div>
        <label class="block text-base font-semibold text-blue-800 dark:text-blue-200 mb-4">
          Emprendedores participantes
        </label>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6">
          @foreach($emprendedores as $emp)
            <label class="relative block bg-white/70 dark:bg-gray-800/70 rounded-2xl p-5 text-center cursor-pointer
                          hover:ring-4 hover:ring-blue-300 dark:hover:ring-blue-700 shadow-lg shadow-blue-100/40 dark:shadow-black/30 transition group border border-blue-200 dark:border-blue-700">
              <input
                type="checkbox"
                name="emprendedores[]"
                value="{{ $emp->id }}"
                class="absolute top-3 left-3 h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 accent-blue-600"
                {{ in_array($emp->id, old('emprendedores', $feria->emprendedores->pluck('id')->toArray())) ? 'checked' : '' }}
              >
              <div class="font-semibold text-blue-900 dark:text-blue-100 mt-2 group-hover:scale-105 transition">
                {{ $emp->nombre }}
              </div>
              <div class="flex items-center justify-center text-gray-600 dark:text-gray-300 text-xs mt-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 
                           01-2 2H5a2 2 0 01-2-2V5z" />
                </svg>
                {{ $emp->telefono }}
              </div>
              <div class="flex items-center justify-center text-gray-600 dark:text-gray-300 text-xs mt-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8c-1.657 0-3 1.343-3 3 0 
                           1.657 1.343 3 3 3s3-1.343 3-3c0-1.657-1.343-3-3-3zm0 
                           10c-4.418 0-8-1.79-8-4V6c0-2.21 3.582-4 
                           8-4s8 1.79 8 4v8c0 2.21-3.582 4-8 4z" />
                </svg>
                {{ $emp->rubro }}
              </div>
            </label>
          @endforeach
        </div>
      </div>

      <div class="flex justify-end space-x-4 pt-8 border-t border-blue-200 dark:border-blue-700/60">
        <a href="{{ route('ferias.index') }}"
           class="px-7 py-2 bg-gradient-to-r from-gray-100 to-blue-50 dark:from-gray-700 dark:to-blue-900 text-blue-800 dark:text-blue-200 rounded-xl
                  hover:bg-blue-100 dark:hover:bg-blue-800 shadow-md shadow-blue-100/40 dark:shadow-black/30 transition font-semibold">
          Cancelar
        </a>
        <button type="submit"
                class="px-7 py-2 bg-gradient-to-r from-blue-600 via-blue-500 to-blue-400 text-white rounded-xl shadow-xl
                       hover:from-blue-700 hover:to-blue-500 dark:hover:from-blue-500 dark:hover:to-blue-400 transition font-bold ring-2 ring-blue-300/30 dark:ring-blue-800/30">
          Guardar cambios
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
