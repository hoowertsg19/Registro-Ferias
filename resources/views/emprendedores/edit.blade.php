@extends('layouts.app')

@section('content')
<div class="container mx-auto py-12 px-4 max-w-2xl">
  <div class="bg-white dark:bg-gray-900 shadow-2xl hover:shadow-3xl transition-shadow duration-300 rounded-3xl p-10 border border-gray-100 dark:border-gray-800 relative overflow-hidden">
    <div class="absolute inset-0 pointer-events-none">
      <div class="absolute -top-10 -right-10 w-40 h-40 bg-blue-100 dark:bg-blue-900 rounded-full opacity-30 blur-2xl"></div>
      <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-purple-100 dark:bg-purple-900 rounded-full opacity-20 blur-2xl"></div>
    </div>
    <h1 class="text-3xl font-extrabold mb-8 text-gray-900 dark:text-white tracking-tight flex items-center gap-2">
      <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path d="M12 4v16m8-8H4"></path>
      </svg>
      Editar Emprendedor
    </h1>

    @if($errors->any())
      <div class="mb-8 p-4 bg-red-100 dark:bg-red-900 border-l-4 border-red-500 dark:border-red-400 rounded-xl shadow">
        <ul class="list-disc list-inside text-sm text-red-800 dark:text-red-200">
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('emprendedores.update', $emprendedor) }}" method="POST" class="space-y-7 relative z-10">
      @csrf
      @method('PUT')

      <div>
        <label for="nombre" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1">Nombre</label>
        <input
          type="text" name="nombre" id="nombre" required
          value="{{ old('nombre', $emprendedor->nombre) }}"
          class="mt-1 block w-full rounded-xl border-2 border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 shadow focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition"
          placeholder="Ingresa el nombre"
        >
      </div>

      <div>
        <label for="telefono" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1">Teléfono</label>
        <input
          type="text" name="telefono" id="telefono" required
          value="{{ old('telefono', $emprendedor->telefono) }}"
          class="mt-1 block w-full rounded-xl border-2 border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 shadow focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition"
          placeholder="Ej: 3512345678"
        >
      </div>

      <div>
        <label for="rubro" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1">Rubro</label>
        <input
          type="text" name="rubro" id="rubro" required
          value="{{ old('rubro', $emprendedor->rubro) }}"
          class="mt-1 block w-full rounded-xl border-2 border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 shadow focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition"
          placeholder="Ej: Gastronomía, Artesanía, etc."
        >
      </div>

      <div class="flex justify-end space-x-4 pt-6 border-t border-gray-100 dark:border-gray-800">
        <a href="{{ route('emprendedores.index') }}"
           class="px-6 py-2 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200 rounded-xl font-medium hover:bg-gray-200 dark:hover:bg-gray-600 shadow transition">
          Cancelar
        </a>
        <button type="submit"
                class="px-6 py-2 bg-gradient-to-r from-blue-600 to-blue-400 text-white rounded-xl font-semibold shadow-lg hover:from-blue-700 hover:to-blue-500 dark:hover:from-blue-500 dark:hover:to-blue-400 transition">
          Actualizar
        </button>
      </div>
    </form>
  </div>
</div>

<script>
    document.getElementById('nombre').addEventListener('input', function(e) {
        let value = e.target.value;
        if (value.length > 0) {
            e.target.value = value.charAt(0).toUpperCase() + value.slice(1);
        }
    });

    document.getElementById('rubro').addEventListener('input', function(e) {
        let value = e.target.value;
        if (value.length > 0) {
            e.target.value = value.charAt(0).toUpperCase() + value.slice(1);
        }
    });
</script>
@endsection