@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Listado de Emprendedores</h1>
        <a href="{{ route('emprendedores.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Nuevo emprendedor
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Rubro</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($emprendedores as $emprendedor)
                        <tr>
                            <td>{{ $emprendedor->nombre }}</td>
                            <td>{{ $emprendedor->telefono }}</td>
                            <td>{{ $emprendedor->rubro }}</td>
                            <td class="text-center">
                                <a href="{{ route('emprendedores.show', $emprendedor) }}" class="btn btn-outline-info btn-sm" title="Ver">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('emprendedores.edit', $emprendedor) }}" class="btn btn-outline-warning btn-sm" title="Editar">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('emprendedores.destroy', $emprendedor) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm" title="Eliminar" onclick="return confirm('¿Eliminar este emprendedor?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">No hay emprendedores registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection