<?php

namespace Modules\RecursosHumanos\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Database\Query\Builder;
use Modules\RecursosHumanos\Facades\Seccion;
use Modules\RecursosHumanos\Http\Requests\SeccionRequest;

class SeccionController extends Controller
{
    public function __construct()
    {
       /*
        $this->middleware(['permission:recursoshumanos.seccion.index'])->only(['index', 'all', 'show']);
        $this->middleware(['permission:recursoshumanos.seccion.create'])->only(['create', 'store']);
        $this->middleware(['permission:recursoshumanos.seccion.edit'])->only(['edit', 'update']);
        $this->middleware(['permission:recursoshumanos.seccion.destroy'])->only(['destroy']);
        $this->middleware(['permission:recursoshumanos.seccion.restore'])->only(['restore']);
*/
    }

    public function index()
    {
        return view('recursoshumanos::seccion.index');
    }

    public function all()
    {
        return Seccion::all();
    }

    public function like(Request $request)
    {
        $input = $request->all();
        return response()->json(Seccion::like($input['query']));
    }

    public function create()
    {
        return view('recursoshumanos::seccion.create');
    }

    public function store(SeccionRequest $request)
    {
        Seccion::store($request->validated());
        return redirect()->route('recursoshumanos.seccion.index')->with('success', 'Seccion creada satisfactoriamente');
    }

    public function show($id)
    {
        return redirect()->route('recursoshumanos.seccion.index')->with('error', 'Sin Acceso');
    }

    public function edit($id)
    {
        $seccion = Seccion::find($id);
        return view('recursoshumanos::seccion.edit', compact('seccion'));
    }

    public function update(SeccionRequest $request, $id)
    {
        Seccion::update($request->validated(), $id);
        return redirect()->route('recursoshumanos.seccion.index')->with('success', 'Seccion actualizada satisfactoriamente');
    }

    public function destroy($id)
    {
        Seccion::delete($id);
        return redirect()->route('recursoshumanos.seccion.index')->with('success', 'Seccion eliminada satisfactoriamente');
    }

    public function restore($id)
    {
        Seccion::restore($id);
        return redirect()->route('recursoshumanos.seccion.index')->with('success', 'Seccion restaurada satisfactoriamente');
    }
    public function seccionById($id)
    {
        $seccion = Seccion::getDescripcionById($id);
        //$respuesta = response()->json($seccion)
        return $seccion;
    }
}