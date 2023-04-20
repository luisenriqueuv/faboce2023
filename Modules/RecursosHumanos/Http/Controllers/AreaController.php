<?php

namespace Modules\RecursosHumanos\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\RecursosHumanos\Facades\Area;
use Modules\RecursosHumanos\Http\Requests\AreaRequest;

class AreaController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:recursoshumanos.area.index'])->only(['index', 'all', 'show']);
        $this->middleware(['permission:recursoshumanos.area.create'])->only(['create', 'store']);
        $this->middleware(['permission:recursoshumanos.area.edit'])->only(['edit', 'update']);
        $this->middleware(['permission:recursoshumanos.area.destroy'])->only(['destroy']);
        $this->middleware(['permission:recursoshumanos.area.restore'])->only(['restore']);
    }

    public function index()
    {
        return view('recursoshumanos::area.index');
    }

    public function all()
    {
        return Area::all();
    }

    public function create()
    {
        return view('recursoshumanos::area.create');
    }

    public function store(AreaRequest $request)
    {
        Area::store($request->validated());
        return redirect()->route('recursoshumanos.area.index')->with('success', 'Area creada satisfactoriamente');
    }

    public function show($id)
    {
        return redirect()->route('recursoshumanos.area.index')->with('error', 'Sin Acceso');
    }

    public function edit($id)
    {
        $area = Area::find($id);
        return view('recursoshumanos::area.edit', compact('area'));
    }

    public function update(AreaRequest $request, $id)
    {
        Area::update($request->validated(), $id);
        return redirect()->route('recursoshumanos.area.index')->with('success', 'Area actualizada satisfactoriamente');
    }

    public function destroy($id)
    {
        Area::delete($id);
        return redirect()->route('recursoshumanos.area.index')->with('success', 'Area eliminada satisfactoriamente');
    }

    public function restore($id)
    {
        Area::restore($id);
        return redirect()->route('recursoshumanos.area.index')->with('success', 'Area restaurada satisfactoriamente');
    }
}
