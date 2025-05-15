@extends('layouts.app')

@section('content')
<div class="container mx-auto py-10 px-4 max-w-2xl">
  <div class="bg-white dark:bg-gray-800 shadow-lg rounded-2xl p-8">
    <h1 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100">Editar Emprendedor</h1>

    @if($errors->any())
      <div class="mb-6 p-4 bg-red-50 dark:bg-red-900 border border-red-200 dark:border-red-700 rounded-lg">
        <ul class="list-disc list-inside text-sm text-red-700 dark:text-red-300">
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('emprendedores.update', $emprendedor) }}" method="POST" class="space-y-6">
      @csrf
      @method('PUT')

      <div>
        <label for="nombre" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre</label>
        <input
          type="text" name="nombre" id="nombre" required
          value="{{ old('nombre', $emprendedor->nombre) }}"
          class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 shadow-sm focus:ring-blue-500 focus:border-blue-500"
        >
      </div>

      <div>
        <label for="telefono" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Teléfono</label>
        <input
          type="text" name="telefono" id="telefono" required
          value="{{ old('telefono', $emprendedor->telefono) }}"
          class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 shadow-sm focus:ring-blue-500 focus:border-blue-500"
        >
      </div>

      <div>
        <label for="rubro" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Rubro</label>
        <input
          type="text" name="rubro" id="rubro" required
          value="{{ old('rubro', $emprendedor->rubro) }}"
          class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 shadow-sm focus:ring-blue-500 focus:border-blue-500"
        >
      </div>

      <div class="flex justify-end space-x-4 pt-4 border-t border-gray-200 dark:border-gray-700">
        <a href="{{ route('emprendedores.index') }}"
           class="px-5 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition">
          Cancelar
        </a>
        <button type="submit"
                class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 dark:hover:bg-blue-500 transition">
          Actualizar
        </button>
      </div>
    </form>
  </div>
</div>
@endsection