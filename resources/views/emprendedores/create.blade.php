@extends('layouts.app')

@section('content')
<div class="container mx-auto py-16 px-4 max-w-2xl">
  <div class="relative rounded-3xl overflow-hidden border border-gray-200 dark:border-gray-800 shadow-[0_8px_32px_0_rgba(31,38,135,0.37)] backdrop-blur-xl bg-gradient-to-br from-blue-50 via-white to-purple-100 dark:from-gray-900 dark:via-gray-800 dark:to-blue-950 transition-shadow duration-300 hover:shadow-[0_12px_48px_0_rgba(31,38,135,0.45)]">
    <div class="absolute inset-0 pointer-events-none z-0">
      <div class="absolute -top-16 -right-16 w-56 h-56 bg-gradient-to-br from-blue-200 via-blue-400 to-purple-300 dark:from-blue-900 dark:via-blue-800 dark:to-purple-900 rounded-full opacity-30 blur-3xl"></div>
      <div class="absolute -bottom-16 -left-16 w-44 h-44 bg-gradient-to-tr from-purple-200 via-pink-200 to-blue-200 dark:from-purple-900 dark:via-pink-900 dark:to-blue-900 rounded-full opacity-20 blur-2xl"></div>
      <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-2/3 h-2/3 bg-gradient-radial from-white/60 via-blue-100/30 to-transparent dark:from-gray-800/70 dark:via-blue-900/30 dark:to-transparent rounded-full opacity-40 blur-2xl"></div>
    </div>
    <div class="relative z-10 p-12">
      <h1 class="text-4xl font-extrabold mb-10 text-gray-900 dark:text-white tracking-tight flex items-center gap-3 drop-shadow-lg">
        <svg class="w-10 h-10 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path d="M12 4v16m8-8H4"></path>
        </svg>
        Nuevo Emprendedor
      </h1>

      @if($errors->any())
        <div class="mb-8 p-4 bg-red-100/80 dark:bg-red-900/70 border-l-4 border-red-500 dark:border-red-400 rounded-xl shadow-lg">
          <ul class="list-disc list-inside text-sm text-red-800 dark:text-red-200">
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{ route('emprendedores.store') }}" method="POST" class="space-y-8">
        @csrf

        <div>
          <label for="nombre" class="block text-base font-semibold text-gray-700 dark:text-gray-200 mb-2">Nombre</label>
          <input
            type="text" name="nombre" id="nombre" required
            value="{{ old('nombre') }}"
            class="mt-1 block w-full rounded-2xl border-2 border-gray-200 dark:border-gray-700 bg-white/80 dark:bg-gray-900/70 text-gray-900 dark:text-gray-100 shadow-inner focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition placeholder-gray-400 dark:placeholder-gray-500"
            placeholder="Ingresa el nombre"
            autocomplete="off"
          >
        </div>

        <div>
          <label for="telefono" class="block text-base font-semibold text-gray-700 dark:text-gray-200 mb-2">Teléfono</label>
          <input
            type="text" name="telefono" id="telefono" required
            value="{{ old('telefono') }}"
            class="mt-1 block w-full rounded-2xl border-2 border-gray-200 dark:border-gray-700 bg-white/80 dark:bg-gray-900/70 text-gray-900 dark:text-gray-100 shadow-inner focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition placeholder-gray-400 dark:placeholder-gray-500"
            placeholder="Ej: 8xxx-xxxx"
            autocomplete="off"
          >
        </div>

        <div>
          <label for="rubro" class="block text-base font-semibold text-gray-700 dark:text-gray-200 mb-2">Rubro</label>
          <input
            type="text" name="rubro" id="rubro" required
            value="{{ old('rubro') }}"
            class="mt-1 block w-full rounded-2xl border-2 border-gray-200 dark:border-gray-700 bg-white/80 dark:bg-gray-900/70 text-gray-900 dark:text-gray-100 shadow-inner focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition placeholder-gray-400 dark:placeholder-gray-500"
            placeholder="Ej: Gastronomía, Artesanía, etc."
            autocomplete="off"
          >
        </div>

        <div class="flex justify-end space-x-4 pt-8 border-t border-gray-100 dark:border-gray-800">
          <a href="{{ route('emprendedores.index') }}"
             class="px-7 py-2.5 bg-gray-100/80 dark:bg-gray-700/80 text-gray-700 dark:text-gray-200 rounded-xl font-medium hover:bg-gray-200 dark:hover:bg-gray-600 shadow transition duration-150">
            Cancelar
          </a>
          <button type="submit"
                  class="px-7 py-2.5 bg-gradient-to-r from-blue-600 via-blue-500 to-blue-400 text-white rounded-xl font-semibold shadow-xl hover:from-blue-700 hover:to-blue-500 dark:hover:from-blue-500 dark:hover:to-blue-400 transition duration-150">
            Guardar
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