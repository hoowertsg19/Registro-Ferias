@extends('layouts.app')

@section('content')
<div class="container mx-auto py-12 px-4 max-w-5xl">
  <div class="flex justify-between items-center mb-8">
    <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white tracking-tight">Listado de Ferias</h1>
    <a href="{{ route('ferias.create') }}"
       class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-5 py-2.5 rounded-xl shadow-lg hover:from-blue-700 hover:to-indigo-700 transition font-semibold flex items-center gap-2">
      <span class="text-xl">＋</span> Nueva Feria
    </a>
  </div>

  <div class="bg-gradient-to-br from-gray-50 via-white to-gray-100 dark:from-gray-800 dark:via-gray-900 dark:to-gray-800 shadow-2xl rounded-3xl overflow-x-auto border border-gray-200 dark:border-gray-700">
    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
      <thead class="bg-gray-100 dark:bg-gray-800">
        <tr>
          <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Nombre</th>
          <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Fecha</th>
          <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Lugar</th>
          <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Emprendedores</th>
          <th class="px-6 py-4 text-center text-xs font-bold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Acciones</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
        @forelse($ferias as $feria)
          <tr class="hover:bg-blue-50 dark:hover:bg-gray-700 transition">
            <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100 font-medium">{{ $feria->nombre }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-gray-700 dark:text-gray-200">{{ \Carbon\Carbon::parse($feria->fecha)->format('d/m/Y') }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-gray-700 dark:text-gray-200">{{ $feria->lugar }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-gray-700 dark:text-gray-200">
              <span class="inline-block bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 px-2 py-1 rounded-full text-xs font-semibold shadow-sm">
                {{ $feria->emprendedores->count() }}
              </span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-center">
              <a href="{{ route('ferias.show', $feria) }}" class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-gray-100 dark:bg-gray-800 text-gray-500 hover:bg-blue-100 hover:text-blue-700 dark:hover:bg-blue-900 dark:hover:text-blue-300 transition mx-1" title="Ver">
                <span class="text-lg">👁️</span>
              </a>
              <a href="{{ route('ferias.edit', $feria) }}" class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-blue-100 dark:bg-blue-900 text-blue-600 hover:bg-blue-200 hover:text-blue-800 dark:hover:bg-blue-800 dark:hover:text-blue-200 transition mx-1" title="Editar">
                <span class="text-lg">✏️</span>
              </a>
              <form action="{{ route('ferias.destroy', $feria) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Eliminar esta feria?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-red-100 dark:bg-red-900 text-red-600 hover:bg-red-200 hover:text-red-800 dark:hover:bg-red-800 dark:hover:text-red-300 transition mx-1" title="Eliminar">
                  <span class="text-lg">🗑️</span>
                </button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="5" class="px-6 py-8 text-center text-gray-500 dark:text-gray-400 text-lg">
              No hay ferias registradas.
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  @if(method_exists($ferias, 'links'))
    <div class="mt-8 flex justify-center">
      {{ $ferias->links() }}
    </div>
  @endif
</div>
@endsection
