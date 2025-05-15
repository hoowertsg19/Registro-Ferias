@extends('layouts.app')

@section('content')
<div class="container mx-auto py-10 px-4 max-w-5xl">
  {{-- Feria Details --}}
  <div class="bg-white dark:bg-gray-800 shadow-lg rounded-2xl p-8 mb-8">
    <h1 class="text-3xl font-bold mb-2 text-gray-800 dark:text-gray-100">
      {{ $feria->nombre }}
    </h1>
    <p class="text-gray-600 dark:text-gray-300 mb-1">
      <strong>Fecha:</strong> {{ \Carbon\Carbon::parse($feria->fecha)->format('d/m/Y') }}
    </p>
    <p class="text-gray-600 dark:text-gray-300 mb-1">
      <strong>Lugar:</strong> {{ $feria->lugar }}
    </p>
    <p class="text-gray-600 dark:text-gray-300 mb-4">
      <strong>Descripción:</strong> {{ $feria->descripcion }}
    </p>
    <a href="{{ route('ferias.index') }}"
       class="inline-block text-blue-600 hover:underline">
      ← Volver al listado
    </a>
  </div>

  {{-- Emprendedores en Cards --}}
  <h2 class="text-2xl font-semibold mb-4 text-gray-800 dark:text-gray-100">
    Emprendedores participantes
  </h2>
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    @forelse($emprendedores as $emp)
      <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-4 flex flex-col items-center text-center">
        <div class="text-lg font-medium text-gray-800 dark:text-gray-100 mb-2">
          {{ $emp->nombre }}
        </div>
        <div class="flex items-center text-gray-600 dark:text-gray-300 text-sm mb-1">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 
                     01-2 2H5a2 2 0 01-2-2V5z" />
          </svg>
          {{ $emp->telefono }}
        </div>
        <div class="flex items-center text-gray-600 dark:text-gray-300 text-sm">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 8c-1.657 0-3 1.343-3 3 0 
                     1.657 1.343 3 3 3s3-1.343 3-3c0-1.657-1.343-3-3-3zm0 
                     10c-4.418 0-8-1.79-8-4V6c0-2.21 3.582-4 
                     8-4s8 1.79 8 4v8c0 2.21-3.582 4-8 4z" />
          </svg>
          {{ $emp->rubro }}
        </div>
      </div>
    @empty
      <p class="col-span-full text-gray-500 dark:text-gray-400">
        No hay emprendedores registrados en esta feria.
      </p>
    @endforelse
  </div>

  {{-- Paginación de Emprendedores --}}
  @if(method_exists($emprendedores, 'links'))
    <div class="mt-6">
      {{ $emprendedores->links() }}
    </div>
  @endif
</div>
@endsection
