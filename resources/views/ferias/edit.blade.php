<!-- resources/views/ferias/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mx-auto py-10 px-4 max-w-3xl">
  <div class="bg-white dark:bg-gray-800 shadow-lg rounded-2xl p-8">
    <h1 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100">
      Editar Feria
    </h1>

    @if($errors->any())
      <div class="mb-6 p-4 bg-red-50 dark:bg-red-900 border border-red-200 dark:border-red-700 rounded-lg">
        <ul class="list-disc list-inside text-sm text-red-700 dark:text-red-300">
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('ferias.update', $feria) }}" method="POST" class="space-y-6">
      @csrf
      @method('PUT')

      <div>
        <label for="nombre" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre</label>
        <input
          type="text" name="nombre" id="nombre" required
          value="{{ old('nombre', $feria->nombre) }}"
          class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700
                 text-gray-900 dark:text-gray-100 shadow-sm focus:ring-blue-500 focus:border-blue-500"
        >
      </div>

      <div>
        <label for="fecha" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Fecha</label>
        <input
          type="date" name="fecha" id="fecha" required
          value="{{ old('fecha', $feria->fecha->format('Y-m-d')) }}"
          class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700
                 text-gray-900 dark:text-gray-100 shadow-sm focus:ring-blue-500 focus:border-blue-500"
        >
      </div>

      <div>
        <label for="lugar" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Lugar</label>
        <input
          type="text" name="lugar" id="lugar" required
          value="{{ old('lugar', $feria->lugar) }}"
          class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700
                 text-gray-900 dark:text-gray-100 shadow-sm focus:ring-blue-500 focus:border-blue-500"
        >
      </div>

      <div>
        <label for="descripcion" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
          Descripción
        </label>
        <textarea
          name="descripcion" id="descripcion" rows="4"
          class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700
                 text-gray-900 dark:text-gray-100 shadow-sm focus:ring-blue-500 focus:border-blue-500"
        >{{ old('descripcion', $feria->descripcion) }}</textarea>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
          Emprendedores participantes
        </label>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
          @foreach($emprendedores as $emp)
            <label class="relative block bg-gray-50 dark:bg-gray-700 rounded-lg p-3 text-center cursor-pointer
                          hover:ring-2 hover:ring-blue-400 transition">
              <input
                type="checkbox"
                name="emprendedores[]"
                value="{{ $emp->id }}"
                class="absolute top-2 left-2 h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                {{ in_array($emp->id, old('emprendedores', $feria->emprendedores->pluck('id')->toArray())) ? 'checked' : '' }}
              >
              <div class="font-medium text-gray-800 dark:text-gray-100 mt-2">
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

      <div class="flex justify-end space-x-4 pt-4 border-t border-gray-200 dark:border-gray-700">
        <a href="{{ route('ferias.index') }}"
           class="px-5 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-lg
                  hover:bg-gray-300 dark:hover:bg-gray-600 transition">
          Cancelar
        </a>
        <button type="submit"
                class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 dark:hover:bg-blue-500 transition">
          Guardar cambios
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
