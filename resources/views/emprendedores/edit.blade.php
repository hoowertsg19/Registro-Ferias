@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Editar Emprendedor</h1>
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('emprendedores.update', $emprendedor) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $emprendedor->nombre) }}" required>
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" name="telefono" id="telefono" class="form-control" value="{{ old('telefono', $emprendedor->telefono) }}" required>
                </div>
                <div class="mb-3">
                    <label for="rubro" class="form-label">Rubro</label>
                    <input type="text" name="rubro" id="rubro" class="form-control" value="{{ old('rubro', $emprendedor->rubro) }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('emprendedores.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
@endsection