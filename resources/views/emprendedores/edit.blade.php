@extends('layouts.app')

@section('content')
<div class="container mx-auto py-16 px-4 max-w-2xl">
  <div class="relative rounded-3xl overflow-hidden border border-gray-200 dark:border-gray-800 shadow-[0_10px_40px_0_rgba(0,0,0,0.15)] bg-gradient-to-br from-blue-50 via-white to-purple-50 dark:from-gray-900 dark:via-gray-800 dark:to-blue-950 transition-all duration-300">
    <!-- Modern gradient background shapes -->
    <div class="absolute inset-0 pointer-events-none z-0">
      <div class="absolute -top-16 -right-16 w-56 h-56 bg-gradient-to-br from-blue-400/30 via-blue-200/20 to-purple-300/20 rounded-full blur-3xl"></div>
      <div class="absolute -bottom-20 -left-20 w-44 h-44 bg-gradient-to-tr from-purple-400/20 via-pink-200/10 to-blue-200/10 rounded-full blur-2xl"></div>
      <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-gradient-radial from-blue-100/10 via-transparent to-transparent rounded-full blur-2xl"></div>
    </div>
    <div class="relative z-10 p-12">
      <h1 class="text-4xl font-extrabold mb-10 text-gray-900 dark:text-white tracking-tight flex items-center gap-3 drop-shadow-lg">
        <svg class="w-10 h-10 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path d="M12 4v16m8-8H4"></path>
        </svg>
        Editar Emprendedor
      </h1>

      @if($errors->any())
        <div class="mb-8 p-4 bg-red-100/80 dark:bg-red-900/80 border-l-4 border-red-500 dark:border-red-400 rounded-xl shadow-lg">
          <ul class="list-disc list-inside text-sm text-red-800 dark:text-red-200">
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{ route('emprendedores.update', $emprendedor) }}" method="POST" class="space-y-8">
        @csrf
        @method('PUT')

        <div>
          <label for="nombre" class="block text-base font-semibold text-gray-700 dark:text-gray-200 mb-2">Nombre</label>
          <input
            type="text" name="nombre" id="nombre" required
            value="{{ old('nombre', $emprendedor->nombre) }}"
            class="mt-1 block w-full rounded-2xl border border-gray-300 dark:border-gray-700 bg-white/80 dark:bg-gray-900/80 text-gray-900 dark:text-gray-100 shadow-lg focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition placeholder-gray-400 dark:placeholder-gray-500"
            placeholder="Ingresa el nombre"
            autocomplete="off"
          >
        </div>

        <div>
          <label for="telefono" class="block text-base font-semibold text-gray-700 dark:text-gray-200 mb-2">Teléfono</label>
          <input
            type="text" name="telefono" id="telefono" required
            value="{{ old('telefono', $emprendedor->telefono) }}"
            class="mt-1 block w-full rounded-2xl border border-gray-300 dark:border-gray-700 bg-white/80 dark:bg-gray-900/80 text-gray-900 dark:text-gray-100 shadow-lg focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition placeholder-gray-400 dark:placeholder-gray-500"
            placeholder="Ej: 8xxx-xxxx"
            autocomplete="off"
          >
        </div>

        <div>
          <label for="rubro" class="block text-base font-semibold text-gray-700 dark:text-gray-200 mb-2">Rubro</label>
          <input
            type="text" name="rubro" id="rubro" required
            value="{{ old('rubro', $emprendedor->rubro) }}"
            class="mt-1 block w-full rounded-2xl border border-gray-300 dark:border-gray-700 bg-white/80 dark:bg-gray-900/80 text-gray-900 dark:text-gray-100 shadow-lg focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition placeholder-gray-400 dark:placeholder-gray-500"
            placeholder="Ej: Gastronomía, Artesanía, etc."
            autocomplete="off"
          >
        </div>

        <div class="flex justify-end space-x-4 pt-8 border-t border-gray-200 dark:border-gray-800">
          <a href="{{ route('emprendedores.index') }}"
             class="px-7 py-2.5 bg-gray-100/80 dark:bg-gray-800/80 text-gray-700 dark:text-gray-200 rounded-xl font-medium hover:bg-gray-200 dark:hover:bg-gray-700 shadow transition border border-gray-200 dark:border-gray-700">
            Cancelar
          </a>
          <button type="submit"
                  class="px-7 py-2.5 bg-gradient-to-r from-blue-600 via-blue-500 to-blue-400 text-white rounded-xl font-semibold shadow-xl hover:from-blue-700 hover:to-blue-500 dark:hover:from-blue-500 dark:hover:to-blue-400 transition border-0">
            Actualizar
          </button>
        </div>
      </form>
    </div>
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