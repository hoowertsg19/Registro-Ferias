@extends('layouts.app')

@section('content')
<div class="container mx-auto py-12 px-4 max-w-5xl bg-gradient-to-br from-blue-50 via-white to-indigo-100 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 rounded-3xl shadow-2xl">
  {{-- Feria Details --}}
  <div class="bg-white dark:bg-gray-900 shadow-xl hover:shadow-2xl transition-shadow duration-300 rounded-3xl p-10 mb-10 border border-gray-100 dark:border-gray-700">
    <h1 class="text-4xl font-extrabold mb-3 text-gray-900 dark:text-white tracking-tight">
      {{ $feria->nombre }}
    </h1>
    <div class="flex flex-wrap gap-4 mb-4">
      <span class="inline-flex items-center px-3 py-1 bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 rounded-full text-sm font-medium shadow-sm">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
        </svg>
        {{ \Carbon\Carbon::parse($feria->fecha)->format('d/m/Y') }}
      </span>
      <span class="inline-flex items-center px-3 py-1 bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 rounded-full text-sm font-medium shadow-sm">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 12.414a2 2 0 00-2.828 0l-4.243 4.243M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
        </svg>
        {{ $feria->lugar }}
      </span>
    </div>
    <p class="text-gray-700 dark:text-gray-300 mb-6 text-lg leading-relaxed border-l-4 border-blue-400 dark:border-blue-600 pl-4 italic">
      {{ $feria->descripcion }}
    </p>
    <a href="{{ route('ferias.index') }}"
       class="inline-block text-indigo-600 dark:text-indigo-300 hover:underline font-semibold transition-colors">
      ← Volver al listado
    </a>
  </div>

  {{-- Emprendedores en Cards --}}
  <h2 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white tracking-tight flex items-center gap-2">
    <svg class="w-6 h-6 text-indigo-400 dark:text-indigo-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87M16 3.13a4 4 0 010 7.75M8 3.13a4 4 0 000 7.75"/>
    </svg>
    Emprendedores participantes
  </h2>
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
    @forelse($emprendedores as $emp)
      <div class="bg-white dark:bg-gray-900 shadow-lg hover:shadow-2xl transition-shadow duration-300 rounded-2xl p-6 flex flex-col items-center text-center border border-gray-100 dark:border-gray-700 relative overflow-hidden">
        <div class="absolute top-0 right-0 m-2">
          <span class="inline-block w-3 h-3 rounded-full bg-gradient-to-br from-indigo-400 to-blue-400 opacity-60"></span>
        </div>
        <div class="text-xl font-semibold text-gray-900 dark:text-white mb-2 tracking-wide">
          {{ $emp->nombre }}
        </div>
        <div class="flex items-center text-gray-600 dark:text-gray-300 text-sm mb-1">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1 text-blue-400 dark:text-blue-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 
                     01-2 2H5a2 2 0 01-2-2V5z" />
          </svg>
          {{ $emp->telefono }}
        </div>
        <div class="flex items-center text-gray-600 dark:text-gray-300 text-sm mb-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1 text-green-400 dark:text-green-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 8c-1.657 0-3 1.343-3 3 0 
                     1.657 1.343 3 3 3s3-1.343 3-3c0-1.657-1.343-3-3-3zm0 
                     10c-4.418 0-8-1.79-8-4V6c0-2.21 3.582-4 
                     8-4s8 1.79 8 4v8c0 2.21-3.582 4-8 4z" />
          </svg>
          {{ $emp->rubro }}
        </div>
        <div class="w-16 h-1 bg-gradient-to-r from-indigo-400 to-blue-400 rounded-full mt-2"></div>
      </div>
    @empty
      <p class="col-span-full text-gray-500 dark:text-gray-400 text-center py-8">
        No hay emprendedores registrados en esta feria.
      </p>
    @endforelse
  </div>

  {{-- Paginación de Emprendedores --}}
  @if(method_exists($emprendedores, 'links'))
    <div class="mt-8 flex justify-center">
      {{ $emprendedores->links() }}
    </div>
  @endif
</div>
@endsection
