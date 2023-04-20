<?php

namespace Modules\RecursosHumanos\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\RecursosHumanos\Facades\Jerarquia;
use Modules\RecursosHumanos\Http\Requests\JerarquiaRequest;

class JerarquiaController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:recursoshumanos.jerarquia.index'])->only(['index', 'all', 'show']);
        $this->middleware(['permission:recursoshumanos.jerarquia.create'])->only(['create', 'store']);
        $this->middleware(['permission:recursoshumanos.jerarquia.edit'])->only(['edit', 'update']);
        $this->middleware(['permission:recursoshumanos.jerarquia.destroy'])->only(['destroy']);
        $this->middleware(['permission:recursoshumanos.jerarquia.restore'])->only(['restore']);
    }

    public function index()
    {
        return view('recursoshumanos::jerarquia.index');
    }

    public function all()
    {
        return Jerarquia::all(1);
    }

    public function create()
    {
        return view('recursoshumanos::jerarquia.create');
    }

    public function store(JerarquiaRequest $request)
    {
        Jerarquia::store($request->validated());
        return redirect()->route('recursoshumanos.jerarquia.index')->with('success', 'Jerarquia creada satisfactoriamente');
    }

    public function show($id)
    {
        return redirect()->route('recursoshumanos.jerarquia.index')->with('error', 'Sin Acceso');
    }

    public function edit($id)
    {
        $jerarquia = Jerarquia::find($id);
        return view('recursoshumanos::jerarquia.edit', compact('jerarquia'));
    }

    public function update(JerarquiaRequest $request, $id)
    {
        Jerarquia::update($request->validated(), $id);
        return redirect()->route('recursoshumanos.jerarquia.index')->with('success', 'Jerarquia actualizada satisfactoriamente');
    }

    public function destroy($id)
    {
        Jerarquia::delete($id);
        return redirect()->route('recursoshumanos.jerarquia.index')->with('success', 'Jerarquia eliminada satisfactoriamente');
    }

    public function restore($id)
    {
        Jerarquia::restore($id);
        return redirect()->route('recursoshumanos.jerarquia.index')->with('success', 'Jerarquia restaurada satisfactoriamente');
    }
}
