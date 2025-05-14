@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Bienvenido, {{ Auth::user()->name }}</h1>
    <p class="mb-6">Selecciona una opción:</p>
    <div class="d-flex flex-column gap-3">
        <a href="{{ route('ferias.index') }}" class="btn btn-primary w-25">
            📅 Ver Ferias
        </a>
        <a href="{{ route('emprendedores.index') }}" class="btn btn-success w-25">
            🧑‍💼 Ver Emprendedores
        </a>
    </div>
</div>
@endsection
