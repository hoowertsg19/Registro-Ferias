<!-- resources/views/ferias/show.blade.php -->

<h1>Detalles de la Feria</h1>

<p><strong>Nombre:</strong> {{ $feria->nombre }}</p>
<p><strong>Fecha:</strong> {{ $feria->fecha }}</p>
<p><strong>Lugar:</strong> {{ $feria->lugar }}</p>
<p><strong>Descripción:</strong> {{ $feria->descripcion }}</p>

<h5>Emprendedores participantes:</h5>
<ul>
    @foreach($feria->emprendedores as $emp)
        <li>{{ $emp->nombre }} ({{ $emp->rubro }})</li>
    @endforeach
</ul>

<a href="{{ route('ferias.index') }}">Volver al listado</a>
