@extends('layouts.app')

@section('content')
<div class="container mx-auto py-12 px-4 max-w-5xl">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white tracking-tight">Listado de Emprendedores</h1>
        <a href="{{ route('emprendedores.create') }}"
           class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-5 py-2 rounded-xl shadow-lg hover:from-blue-700 hover:to-indigo-700 transition font-semibold flex items-center gap-2">
            <span class="text-xl">+</span> Nuevo emprendedor
        </a>
    </div>
    <div class="bg-gradient-to-br from-gray-50 via-white to-gray-200 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 shadow-2xl rounded-3xl overflow-x-auto border border-gray-200 dark:border-gray-700">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead>
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 dark:text-gray-200 uppercase tracking-wider">Nombre</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 dark:text-gray-200 uppercase tracking-wider">Teléfono</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 dark:text-gray-200 uppercase tracking-wider">Rubro</th>
                    <th class="px-6 py-4 text-center text-xs font-bold text-gray-600 dark:text-gray-200 uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                @forelse($emprendedores as $emp)
                <tr class="hover:bg-blue-50 dark:hover:bg-gray-800 transition">
                    <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100 font-semibold">{{ $emp->nombre }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-700 dark:text-gray-300">{{ $emp->telefono }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-700 dark:text-gray-300">{{ $emp->rubro }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <a href="{{ route('emprendedores.edit', $emp) }}" class="inline-block bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-300 rounded-full px-3 py-1 shadow hover:bg-blue-200 dark:hover:bg-blue-800 transition mx-1" title="Editar">
                            ✏️
                        </a>
                        <form action="{{ route('emprendedores.destroy', $emp) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Estás seguro que deseas eliminar este emprendedor? Esta acción no se puede deshacer.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-100 dark:bg-red-900 text-red-700 dark:text-red-300 rounded-full px-3 py-1 shadow hover:bg-red-200 dark:hover:bg-red-800 transition mx-1" title="Eliminar">
                                🗑️
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-8 text-center text-gray-500 dark:text-gray-400">No hay emprendedores registrados.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection