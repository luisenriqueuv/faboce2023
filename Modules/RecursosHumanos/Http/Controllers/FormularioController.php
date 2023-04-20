<?php

namespace Modules\RecursosHumanos\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\RecursosHumanos\Facades\Formulario;
use Modules\RecursosHumanos\Http\Requests\FormularioRequest;

class FormularioController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:recursoshumanos.formulario.index'])->only(['index', 'all', 'show']);
        $this->middleware(['permission:recursoshumanos.formulario.create'])->only(['create', 'store']);
        $this->middleware(['permission:recursoshumanos.formulario.edit'])->only(['edit', 'update']);
        $this->middleware(['permission:recursoshumanos.formulario.destroy'])->only(['destroy']);
    }
    
    // index()
    public function index()
    {
        return view('recursoshumanos::formulario.index');
    }

    // all()
    public function all()
    {
        return Formulario::all();
    }

    // create()
    public function create()
    {        
        return view('recursoshumanos::formulario.create');
    }

    // store(datos)
    public function store(FormularioRequest $request)
    {
        Formulario::store($request->validated());
        return redirect()->route('recursoshumanos.formulario.index')->with('success', 'Formulario creado satisfactoriamente');
    }

    // show(id)
    public function show($id)
    {   
        $formulario = Formulario::find($id);
        if($formulario->deleted_id > 0){
            return redirect()->route('recursoshumanos.formulario.index')->with('success', 'No Permitido, Formulario Eliminado');
        }
        else{
            return view('recursoshumanos::formulario.show',compact('formulario'));           
        }
    }

    // edit(id)
    public function edit($id)
    {
        $formulario = Formulario::find($id);
        return view('recursoshumanos::formulario.edit', compact('formulario'));
    }

    // update(datos,id)
    public function update(FormularioRequest $request, $id)
    {
        Formulario::update($request->validated(), $id);
        return redirect()->route('recursoshumanos.formulario.index')->with('success', 'Formulario actualizado satisfactoriamente');
    }

    // destroy(id)
    public function destroy($id)
    {
        Formulario::delete($id);
        return redirect()->route('recursoshumanos.formulario.index')->with('success', 'Formulario eliminado satisfactoriamente');
    }

    // restore(id)
    public function restore($id)
    {
        Formulario::restore($id);
        return redirect()->route('recursoshumanos.formulario.index')->with('success', 'Formulario restaurado satisfactoriamente');
    }
}
