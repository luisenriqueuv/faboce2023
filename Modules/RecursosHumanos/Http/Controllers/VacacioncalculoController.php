<?php

namespace Modules\RecursosHumanos\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Database\Query\Builder;
use Modules\RecursosHumanos\Facades\Vacacioncalculo;
use Modules\RecursosHumanos\Http\Requests\VacacioncalculoRequest;

class VacacioncalculoController extends Controller
{
    public function __construct()
    {
       /*
        $this->middleware(['permission:recursoshumanos.vacacioncalculo.index'])->only(['index', 'all', 'show']);
        $this->middleware(['permission:recursoshumanos.vacacioncalculo.create'])->only(['create', 'store']);
        $this->middleware(['permission:recursoshumanos.vacacioncalculo.edit'])->only(['edit', 'update']);
        $this->middleware(['permission:recursoshumanos.vacacioncalculo.destroy'])->only(['destroy']);
        $this->middleware(['permission:recursoshumanos.vacacioncalculo.restore'])->only(['restore']);
        */
    }

    public function index()
    {
        $registrosPersonal = Vacacioncalculo::all();
        return view('recursoshumanos::vacacioncalculo.index',compact('registrosPersonal'));
    }

    public function all()
    {
        return Vacacioncalculo::all();
    }

    public function like(Request $request)
    {
        $input = $request->all();
        return response()->json(Vacacioncalculo::like($input['query']));
    }

    public function create()
    {
        return view('recursoshumanos::vacacioncalculo.create');
    }

    public function store(VacacioncalculoRequest $request)
    {
        Vacacioncalculo::store($request->validated());
        return redirect()->route('recursoshumanos.vacacioncalculo.index')->with('success', 'Vacacioncalculo creada satisfactoriamente');
    }

    public function show($id)
    {
        return redirect()->route('recursoshumanos.vacacioncalculo.index')->with('error', 'Sin Acceso');
    }

    public function edit($id)
    {
        $vacacioncalculo = Vacacioncalculo::find($id);
        return view('recursoshumanos::vacacioncalculo.edit', compact('vacacioncalculo'));
    }

    public function update(VacacioncalculoRequest $request, $id)
    {
        Vacacioncalculo::update($request->validated(), $id);
        return redirect()->route('recursoshumanos.vacacioncalculo.index')->with('success', 'Vacacioncalculo actualizada satisfactoriamente');
    }

    public function destroy($id)
    {
        Vacacioncalculo::delete($id);
        return redirect()->route('recursoshumanos.vacacioncalculo.index')->with('success', 'Vacacioncalculo eliminada satisfactoriamente');
    }

    public function restore($id)
    {
        Vacacioncalculo::restore($id);
        return redirect()->route('recursoshumanos.vacacioncalculo.index')->with('success', 'Vacacioncalculo restaurada satisfactoriamente');
    }
    public function vacacioncalculoById($id)
    {
        $vacacioncalculo = Vacacioncalculo::getDescripcionById($id);
        //$respuesta = response()->json($vacacioncalculo)
        return $vacacioncalculo;
    }
}