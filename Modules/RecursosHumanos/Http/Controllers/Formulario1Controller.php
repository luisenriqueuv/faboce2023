<?php

// ----------------------------------------------
//              CONTROL (FORMULARIO 1)
// ----------------------------------------------

namespace Modules\RecursosHumanos\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\RecursosHumanos\Facades\Formulario1;
use Modules\RecursosHumanos\Http\Requests\Formulario1Request;

class Formulario1Controller extends Controller
{
    public function __construct()
    {        
        $this->middleware(['permission:recursoshumanos.formulario1.create'])->only(['create', 'store']);
        $this->middleware(['permission:recursoshumanos.formulario1.edit'])->only(['edit', 'update']);
        $this->middleware(['permission:recursoshumanos.formulario1.destroy'])->only(['destroy']);
        $this->middleware(['permission:recursoshumanos.formulario1.restore'])->only(['restore']);
    }
    
    // create(idFormulario)
    public function create($idFormulario)
    {   
        return view('recursoshumanos::formulario1.create',compact('idFormulario'));
    }

    // store(datos)
    public function store(Formulario1Request $request)
    {
        Formulario1::store($request->validated());
        return redirect()->route('recursoshumanos.formulario.show',$request->id_formulario)->with('success', 'Pregunta creada satisfactoriamente');        
    }
    
    // edit(id)
    public function edit($id)
    {
        $formulario1 = Formulario1::find($id);
        return view('recursoshumanos::formulario1.edit', compact('formulario1'));
    }

    // update(datos,id)
    public function update(Formulario1Request $request, $id)
    {
        Formulario1::update($request->validated(), $id);  
        return redirect()->route('recursoshumanos.formulario.show',$request->id_formulario)->with('success', 'Pregunta actualizada satisfactoriamente');
    }

    // destroy(id,idFormulario)
    public function destroy($id,$idFormulario)
    {
        Formulario1::delete($id);        
        return redirect()->route('recursoshumanos.formulario.show',$idFormulario)->with('success', 'Pregunta eliminada satisfactoriamente');
    }

    // restore(id,idFormulario)
    public function restore($id,$idFormulario)
    {
        Formulario1::restore($id);        
        return redirect()->route('recursoshumanos.formulario.show',$idFormulario)->with('success', 'Pregunta restaurada satisfactoriamente');
    }
}
