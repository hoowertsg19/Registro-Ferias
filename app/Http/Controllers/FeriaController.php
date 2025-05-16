<?php

namespace App\Http\Controllers;

use App\Models\Feria;
use App\Models\Emprendedor;
use Illuminate\Http\Request;

class FeriaController extends Controller
{
    public function index()
    {
        // Usa paginación en lugar de get() para que $ferias->links() funcione
        $ferias = Feria::with('emprendedores')->paginate(10);

        return view('ferias.index', compact('ferias'));
    }

    public function create()
    {
        $emprendedores = \App\Models\Emprendedor::all();
        return view('ferias.create', compact('emprendedores'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha' => 'required|date|after:today', // <-- Aquí validas que sea después de hoy
            'lugar' => 'required|string|max:255',
            'descripcion' => 'required|string',
        ]);

        $feria = Feria::create($validated);
        $feria->emprendedores()->sync($request->emprendedores ?? []);

        return redirect()->route('ferias.index');
    }

    public function edit(Feria $feria)
    {
        $emprendedores = Emprendedor::all();
        $feriaEmps = $feria->emprendedores->pluck('id')->toArray();
        return view('ferias.edit', compact('feria', 'emprendedores', 'feriaEmps'));
    }

    public function update(Request $request, Feria $feria)
    {
        $request->validate([
            'nombre' => 'required',
            'fecha' => 'required|date',
            'lugar' => 'required',
            'descripcion' => 'required',
        ]);

        $feria->update($request->only(['nombre', 'fecha', 'lugar', 'descripcion']));
        $feria->emprendedores()->sync($request->emprendedores ?? []);

        return redirect()->route('ferias.index');
    }

    public function destroy(Feria $feria)
    {
        $feria->delete();
        return redirect()->route('ferias.index');
    }

    public function show(Feria $feria)
    {
        // Cambia '12' por la cantidad de cards por página que quieras
        $emprendedores = $feria->emprendedores()->paginate(12);
        return view('ferias.show', compact('feria', 'emprendedores'));
    }
}
