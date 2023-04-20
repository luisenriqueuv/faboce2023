<?php

namespace Modules\RecursosHumanos\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\RecursosHumanos\Facades\Area;
use Modules\RecursosHumanos\Facades\Personal;
use Modules\RecursosHumanos\Facades\Cambioturno;
use Modules\RecursosHumanos\Facades\Seccion;
use Modules\RecursosHumanos\Http\Requests\CambioturnoRequest;

class CambioturnoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {        
        return view('recursoshumanos::cambioturno.index');
    }

    public function all()
    {
        return Cambioturno::all();
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $nombrespersonas = Personal::all();
        $areas           = Area::all();
        $secciones       = Seccion::all();
        return view('recursoshumanos::cambioturno.create',compact('nombrespersonas','areas','secciones'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CambioturnoRequest $request)
    {
        Cambioturno::store($request->validated());
        return redirect()->route('recursoshumanos.cambioturno.index')->with('success', 'Cambioturno creada satisfactoriamente');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('recursoshumanos::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $nombrespersonas = Personal::all();
        $areas           = Area::all();
        $cambioturno     = Cambioturno::find($id);
        $secciones       = Seccion::all();
        return view('recursoshumanos::cambioturno.edit', compact('cambioturno','areas','nombrespersonas','secciones'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(CambioturnoRequest $request, $id)
    {
        Cambioturno::update($request->validated(), $id);
        return redirect()->route('recursoshumanos.cambioturno.index')->with('success', 'Cambio Turno actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        Cambioturno::delete($id);
        return redirect()->route('recursoshumanos.cambioturno.index')->with('success', 'Cambio Turno eliminado satisfactoriamente');
    }
    public function pdf($id)
    {
        $seccionController  = new SeccionController();
        $cambioturnos       = Cambioturno::show($id);
//        dd($cambioturno);
        //PREGUNTAMOS SI TIENE VALORES EN $cambioturno
        if (count($cambioturnos)>=1) {
            //SI EXISTE VALORES HARA EL TRABAJO DE BUSCAR
            $seccionBuscar      = $cambioturnos[0]['SECCION'];
//            dd($cambioturno[0]['SECCION']);
            $seccion            = $seccionController->seccionById($seccionBuscar);
            //OBTENEMOS EL CI DEL USUARIO
            $user      = auth()->user();
            $idusuario = $user->id;
            //MOSTRARA EL PDF
            return view('recursoshumanos::cambioturno.pdf', compact('cambioturnos','seccion','idusuario'));
        }else{
            //NO MOSTRARA Y NOS MANDARA DIRECTO A VER LOS REGISTROS
            return view('recursoshumanos::cambioturno.index')->with('success', 'Documento no valido o eliminado.');
        }
    }
}