<!-- resources/views/ferias/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mx-auto py-10 px-4 max-w-5xl">
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Listado de Ferias</h1>
    <a href="{{ route('ferias.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition">
      + Nueva Feria
    </a>
  </div>

  <div class="bg-white dark:bg-gray-800 shadow rounded-2xl overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
      <thead class="bg-gray-50 dark:bg-gray-700">
        <tr>
          <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase">Nombre</th>
          <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase">Fecha</th>
          <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase">Lugar</th>
          <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase">Emprendedores</th>
          <th class="px-6 py-3 text-center text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase">Acciones</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
        @forelse($ferias as $feria)
          <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
            <td class="px-6 py-4 whitespace-nowrap text-gray-800 dark:text-gray-100">{{ $feria->nombre }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-gray-700 dark:text-gray-200">{{ \Carbon\Carbon::parse($feria->fecha)->format('d/m/Y') }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-gray-700 dark:text-gray-200">{{ $feria->lugar }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-gray-700 dark:text-gray-200">{{ $feria->emprendedores->count() }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-center">
              <a href="{{ route('ferias.show', $feria) }}" class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300 mx-1" title="Ver">
                👁️
              </a>
              <a href="{{ route('ferias.edit', $feria) }}" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-200 mx-1" title="Editar">
                ✏️
              </a>
              <form action="{{ route('ferias.destroy', $feria) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Eliminar esta feria?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300 mx-1" title="Eliminar">
                  🗑️
                </button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="5" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
              No hay ferias registradas.
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  {{-- Opcional: Paginación --}}
  @if(method_exists($ferias, 'links'))
    <div class="mt-6">
      {{ $ferias->links() }}
    </div>
  @endif
</div>
@endsection
