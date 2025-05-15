@extends('layouts.app')

@section('content')
<div class="container mx-auto py-10 px-4 max-w-5xl">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Listado de Emprendedores</h1>
        <a href="{{ route('emprendedores.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition">
            + Nuevo emprendedor
        </a>
    </div>
    <div class="bg-white dark:bg-gray-800 shadow rounded-2xl overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nombre</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">Teléfono</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">Rubro</th>
                    <th class="px-6 py-3 text-center text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                @forelse($emprendedores as $emp)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-800 dark:text-gray-100 font-medium">{{ $emp->nombre }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-700 dark:text-gray-200">{{ $emp->telefono }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-700 dark:text-gray-200">{{ $emp->rubro }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <a href="{{ route('emprendedores.edit', $emp) }}" class="inline-block text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 mx-1" title="Editar">
                            ✏️
                        </a>
                        <form action="{{ route('emprendedores.destroy', $emp) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Eliminar este emprendedor?')">
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
                    <td colspan="4" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">No hay emprendedores registrados.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection