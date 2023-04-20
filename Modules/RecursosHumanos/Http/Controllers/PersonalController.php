<?php

namespace Modules\RecursosHumanos\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\RecursosHumanos\Facades\Area;
use Modules\RecursosHumanos\Facades\Cargo;
use Modules\RecursosHumanos\Facades\Agencia;
use Modules\RecursosHumanos\Facades\Personal;
use Modules\RecursosHumanos\Facades\Jerarquia;
use Modules\RecursosHumanos\Facades\Formulario;
use Modules\RecursosHumanos\Http\Requests\PersonalRequest;

class PersonalController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:recursoshumanos.personal.index'])->only(['index', 'all', 'show']);
        $this->middleware(['permission:recursoshumanos.personal.create'])->only(['create', 'store']);
        $this->middleware(['permission:recursoshumanos.personal.edit'])->only(['edit', 'update']);
        $this->middleware(['permission:recursoshumanos.personal.destroy'])->only(['destroy']);
    }

    public function index()
    {
        return view('recursoshumanos::personal.index');
    }

    public function all()
    {
        return Personal::all(1);
    }

    public function like(Request $request)
    {
        $input = $request->all();
        //dd('Query: ' . $input['query']);
        //error_log("Query: " . $input['query']);
        return response()->json(Personal::like($input['query']));
    }

    public function create()
    {
        $cargos = Cargo::all();
        $jerarquias = Jerarquia::all();
        $areas = Area::all();
        $formularios = Formulario::all();
        $fabricas = Agencia::all();
        return view('recursoshumanos::personal.create', compact('cargos', 'jerarquias', 'areas', 'fabricas', 'formularios'));
    }

    public function store(PersonalRequest $request)
    {
        Personal::store($request->validated());
        return redirect()->route('recursoshumanos.personal.index')->with('success', 'Personal creado satisfactoriamente');
    }

    public function show($id)
    {
        return Personal::find($id);
        // return redirect()->route('recursoshumanos.personal.index')->with('error', 'Sin Acceso');
    }

    public function edit($id)
    {
        $cargos = Cargo::all();
        $jerarquias = Jerarquia::all();
        $areas = Area::all();
        $formularios = Formulario::all();
        $fabricas = Agencia::all();
        $personal = Personal::find($id);
        return view('recursoshumanos::personal.edit', compact('personal', 'cargos', 'jerarquias', 'areas', 'fabricas', 'formularios'));
    }

    public function update(PersonalRequest $request, $id)
    {
        Personal::update($request->validated(), $id);
        return redirect()->route('recursoshumanos.personal.index')->with('success', 'Personal actualizado satisfactoriamente');
    }

    public function destroy($id)
    {
        Personal::delete($id);
        return redirect()->route('recursoshumanos.personal.index')->with('success', 'Personal eliminado satisfactoriamente');
    }

    public function restore($id)
    {
        Personal::restore($id);
        return redirect()->route('recursoshumanos.personal.index')->with('success', 'Personal restaurado satisfactoriamente');
    }
    public function buscarcarnet(Request $request)
    {
        $carnet = $request->input('carnet');
        $personal = Personal::where('carnet', $carnet)
                    ->with('obtenerNombre')
                    ->first();
        return response()->json($personal);
    }
}