<?php

namespace Modules\RecursosHumanos\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\RecursosHumanos\Facades\Tiporegistro;
use Modules\RecursosHumanos\Http\Requests\TiporegistroRequest;

class TiporegistroController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:recursoshumanos.tiporegistro.index'])->only(['index', 'all', 'show']);
        $this->middleware(['permission:recursoshumanos.tiporegistro.create'])->only(['create', 'store']);
        $this->middleware(['permission:recursoshumanos.tiporegistro.edit'])->only(['edit', 'update']);
        $this->middleware(['permission:recursoshumanos.tiporegistro.destroy'])->only(['destroy']);
        $this->middleware(['permission:recursoshumanos.tiporegistro.restore'])->only(['restore']);
    }

    public function index()
    {
        return view('recursoshumanos::tiporegistro.index');
    }

    public function all()
    {
        return Tiporegistro::all(1);
    }

    public function create()
    {
        return view('recursoshumanos::tiporegistro.create');
    }

    public function store(TiporegistroRequest $request)
    {
        Tiporegistro::store($request->validated());
        return redirect()->route('recursoshumanos.tiporegistro.index')->with('success', 'Tiporegistro creada satisfactoriamente');
    }

    public function show($id)
    {
        return redirect()->route('recursoshumanos.tiporegistro.index')->with('error', 'Sin Acceso');
    }

    public function edit($id)
    {
        $tiporegistro = Tiporegistro::find($id);
        return view('recursoshumanos::tiporegistro.edit', compact('tiporegistro'));
    }

    public function update(TiporegistroRequest $request, $id)
    {
        Tiporegistro::update($request->validated(), $id);
        return redirect()->route('recursoshumanos.tiporegistro.index')->with('success', 'Tiporegistro actualizada satisfactoriamente');
    }

    public function destroy($id)
    {
        Tiporegistro::delete($id);
        return redirect()->route('recursoshumanos.tiporegistro.index')->with('success', 'Tiporegistro eliminada satisfactoriamente');
    }

    public function restore($id)
    {
        Tiporegistro::restore($id);
        return redirect()->route('recursoshumanos.tiporegistro.index')->with('success', 'Tiporegistro restaurada satisfactoriamente');
    }
}
