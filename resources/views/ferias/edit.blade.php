<!-- resources/views/ferias/edit.blade.php -->

<h1>Editar Feria</h1>

<form action="{{ route('ferias.update', $feria) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nombre:</label>
    <input type="text" name="nombre" value="{{ $feria->nombre }}" required><br>

    <label>Fecha:</label>
    <input type="date" name="fecha" value="{{ $feria->fecha }}" required><br>

    <label>Lugar:</label>
    <input type="text" name="lugar" value="{{ $feria->lugar }}" required><br>

    <label>Descripción:</label>
    <textarea name="descripcion" required>{{ $feria->descripcion }}</textarea><br>

    <label>Emprendedores:</label><br>
    @foreach($emprendedores as $emp)
        <input type="checkbox" name="emprendedores[]"
            value="{{ $emp->id }}" {{ in_array($emp->id, $feriaEmps) ? 'checked' : '' }}>
            {{ $emp->nombre }}<br>
    @endforeach

    <button type="submit">Actualizar</button>
</form>
