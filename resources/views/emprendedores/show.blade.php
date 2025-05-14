@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Detalle del Emprendedor</h1>
    <div class="card shadow-sm">
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-3">Nombre</dt>
                <dd class="col-sm-9">{{ $emprendedor->nombre }}</dd>

                <dt class="col-sm-3">Teléfono</dt>
                <dd class="col-sm-9">{{ $emprendedor->telefono }}</dd>

                <dt class="col-sm-3">Rubro</dt>
                <dd class="col-sm-9">{{ $emprendedor->rubro }}</dd>
            </dl>
            <a href="{{ route('emprendedores.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
@endsection