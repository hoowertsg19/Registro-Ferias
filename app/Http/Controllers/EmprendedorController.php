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
            'nombre' => 'required|max:100',
            'telefono' => [
                'required',
                'unique:emprendedores,telefono',
                'regex:/^[578][0-9]{7}$/',
            ],
            'rubro' => 'required|max:100',
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
            'nombre' => 'required|max:100',
            'telefono' => [
                'required',
                'unique:emprendedores,telefono,' . $emprendedor->id,
                'regex:/^[578][0-9]{7}$/',
            ],
            'rubro' => 'required|max:100',
        ]);

        $emprendedor->update($request->all());

        return redirect()->route('emprendedores.index');
    }

    public function destroy(Emprendedor $emprendedor)
    {
        $emprendedor->delete();
        return redirect()->route('emprendedores.index');
    }

    public function show(Emprendedor $emprendedor)
    {
        return view('emprendedores.show', compact('emprendedor'));
    }
}
