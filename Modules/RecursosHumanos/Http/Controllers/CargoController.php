<?php

namespace Modules\RecursosHumanos\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\RecursosHumanos\Facades\Cargo;
use Modules\RecursosHumanos\Http\Requests\CargoRequest;

class CargoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:recursoshumanos.cargo.index'])->only(['index', 'all', 'show']);
        $this->middleware(['permission:recursoshumanos.cargo.create'])->only(['create', 'store']);
        $this->middleware(['permission:recursoshumanos.cargo.edit'])->only(['edit', 'update']);
        $this->middleware(['permission:recursoshumanos.cargo.destroy'])->only(['destroy']);
        $this->middleware(['permission:recursoshumanos.cargo.restore'])->only(['restore']);
    }

    public function index()
    {
        return view('recursoshumanos::cargo.index');
    }

    public function all()
    {
        return Cargo::all(1);
    }

    public function create()
    {
        return view('recursoshumanos::cargo.create');
    }

    public function store(CargoRequest $request)
    {
        Cargo::store($request->validated());
        return redirect()->route('recursoshumanos.cargo.index')->with('success', 'Cargo creado satisfactoriamente');
    }

    public function show($id)
    {
        return redirect()->route('recursoshumanos.cargo.index')->with('error', 'Sin Acceso');
    }

    public function edit($id)
    {
        $cargo = Cargo::find($id);
        return view('recursoshumanos::cargo.edit', compact('cargo'));
    }

    public function update(CargoRequest $request, $id)
    {
        Cargo::update($request->validated(), $id);
        return redirect()->route('recursoshumanos.cargo.index')->with('success', 'Cargo actualizado satisfactoriamente');
    }

    public function destroy($id)
    {
        Cargo::delete($id);
        return redirect()->route('recursoshumanos.cargo.index')->with('success', 'Cargo eliminado satisfactoriamente');
    }

    public function restore($id)
    {
        Cargo::restore($id);
        return redirect()->route('recursoshumanos.cargo.index')->with('success', 'Cargo restaurado satisfactoriamente');
    }
}
