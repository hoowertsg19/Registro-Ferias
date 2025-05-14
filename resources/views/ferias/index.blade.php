<!-- resources/views/ferias/index.blade.php -->

@extends('layouts.app') {{-- Asegúrate de tener un layout base con Bootstrap --}}

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Listado de Ferias</h1>
        <a href="{{ route('ferias.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Crear nueva feria
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Lugar</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($ferias as $feria)
                        <tr>
                            <td>{{ $feria->nombre }}</td>
                            <td>{{ \Carbon\Carbon::parse($feria->fecha)->format('d/m/Y') }}</td>
                            <td>{{ $feria->lugar }}</td>
                            <td class="text-center">
                                <a href="{{ route('ferias.show', $feria) }}" class="btn btn-outline-info btn-sm" title="Ver">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('ferias.edit', $feria) }}" class="btn btn-outline-warning btn-sm" title="Editar">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('ferias.destroy', $feria) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm" title="Eliminar" onclick="return confirm('¿Eliminar esta feria?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">No hay ferias registradas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
