<?php

namespace Modules\RecursosHumanos\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\RecursosHumanos\Facades\Area;
use Modules\RecursosHumanos\Facades\Compensacion;
use Modules\RecursosHumanos\Facades\Personal;
use Modules\RecursosHumanos\Facades\Reemplazo;
use Modules\RecursosHumanos\Facades\Seccion;
use Modules\RecursosHumanos\Http\Requests\ReemplazoRequest;

class ReemplazoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('recursoshumanos::reemplazo.index');
    }

    public function all()
    {
        return Reemplazo::all();
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
        return view('recursoshumanos::reemplazo.create', compact('nombrespersonas','areas','secciones'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(ReemplazoRequest $request)
    {
        Reemplazo::store($request->validated());
        return redirect()->route('recursoshumanos.reemplazo.index')->with('success', 'Reemplazo creada satisfactoriamente');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $compensacion = Compensacion::show($id);
        return view('recursoshumanos::show', compact('compensacion'));
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
        $reemplazo = Reemplazo::find($id);
        $secciones       = Seccion::all();
        return view('recursoshumanos::reemplazo.edit', compact('reemplazo','nombrespersonas','areas','secciones'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(ReemplazoRequest $request, $id)
    {
        Reemplazo::update($request->validated(), $id);
        return redirect()->route('recursoshumanos.reemplazo.index')->with('success', 'Reemplazo actualizada satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        Reemplazo::delete($id);
        return redirect()->route('recursoshumanos.reemplazo.index')->with('success', 'Reemplazo eliminada satisfactoriamente');
    }
    public function pdf($id)
    {
        $seccionController  = new SeccionController();
        $reemplazos          = Reemplazo::show($id);
//        dd($reemplazo);
        //PREGUNTAMOS SI TIENE VALORES EN $reemplazo
        if (count($reemplazos)>=1) {
            //SI EXISTE VALORES HARA EL TRABAJO DE BUSCAR
            $seccionBuscar      = $reemplazos[0]['SECCION'];
            $seccion            = $seccionController->seccionById($seccionBuscar);
            //OBTENEMOS EL CI DEL USUARIO
            $user      = auth()->user();
            $idusuario = $user->id;
            //MOSTRARA EL PDF
            return view('recursoshumanos::reemplazo.pdf', compact('reemplazos','seccion','idusuario'));
        }else{
            //NO MOSTRARA Y NOS MANDARA DIRECTO A VER LOS REGISTROS
            return view('recursoshumanos::reemplazo.index')->with('success', 'Documento no valido o eliminado.');
        }
    }
}