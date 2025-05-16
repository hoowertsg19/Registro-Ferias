<?php

namespace App\Http\Controllers;

use App\Models\Emprendedor;
use Illuminate\Http\Request;

class EmprendedorController extends Controller
{
    public function index()
    {
        $emprendedores = Emprendedor::all();
        return view('emprendedores.index', compact('emprendedores'));
    }

    public function create()
    {
        return view('emprendedores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|min:3|max:100',
            'telefono' => [
                'required',
                'unique:emprendedores,telefono',
                'regex:/^(8|7|5)[0-9]{7}$/',
            ],
            'rubro' => 'required|string|min:3|max:50',
        ], [
            'telefono.regex' => 'El número debe tener 8 dígitos y comenzar con 8, 7 o 5.',
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.min' => 'El nombre debe tener al menos 3 caracteres.',
            'nombre.max' => 'El nombre no debe exceder 100 caracteres.',
            'rubro.required' => 'El rubro es obligatorio.',
            'rubro.min' => 'El rubro debe tener al menos 3 caracteres.',
            'rubro.max' => 'El rubro no debe exceder 50 caracteres.',
            'telefono.required' => 'El teléfono es obligatorio.',
            'telefono.unique' => 'El teléfono ya está registrado.',
        ]);

        Emprendedor::create($request->all());

        return redirect()->route('emprendedores.index');
    }

    public function edit(Emprendedor $emprendedor)
    {
        return view('emprendedores.edit', compact('emprendedor'));
    }

    public function update(Request $request, Emprendedor $emprendedor)
    {
        $request->validate([
            'nombre' => 'required|string|min:3|max:100',
            'telefono' => [
                'required',
                'regex:/^(8|7|5)[0-9]{7}$/',
            ],
            'rubro' => 'required|string|min:3|max:50',
        ], [
            'telefono.regex' => 'El número debe tener 8 dígitos y comenzar con 8, 7 o 5.',
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.min' => 'El nombre debe tener al menos 3 caracteres.',
            'nombre.max' => 'El nombre no debe exceder 100 caracteres.',
            'rubro.required' => 'El rubro es obligatorio.',
            'rubro.min' => 'El rubro debe tener al menos 3 caracteres.',
            'rubro.max' => 'El rubro no debe exceder 50 caracteres.',
            'telefono.required' => 'El teléfono es obligatorio.',
        ]);

        $emprendedor->update($request->only(['nombre', 'telefono', 'rubro']));

        return redirect()->route('emprendedores.index');
    }

    public function destroy(Emprendedor $emprendedor)
    {
        $emprendedor->delete();
        return redirect()->route('emprendedores.index')->with('success', '¡Emprendedor eliminado correctamente!');
    }

    public function show(Emprendedor $emprendedor)
    {
        return view('emprendedores.show', compact('emprendedor'));
    }
}
