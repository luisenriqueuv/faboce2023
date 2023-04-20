<?php

namespace Modules\RecursosHumanos\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\RecursosHumanos\Entities\Personal;
use Modules\RecursosHumanos\Facades\Area;
use Modules\RecursosHumanos\Facades\Compensacion;
use Modules\RecursosHumanos\Http\Requests\CompensacionRequest;
use Modules\RecursosHumanos\Facades\SalidaPersonal\Vacacion;
use Modules\RecursosHumanos\Facades\Seccion;
use Modules\RecursosHumanos\Repositories\CompensacionRepository;
use Modules\RecursosHumanos\Repositories\PersonalRepository;

class CompensacionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('recursoshumanos::compensacion.index');
    }

    public function all()
    {
        return Compensacion::all();
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
        return view('recursoshumanos::compensacion.create', compact('nombrespersonas','areas','secciones'));
    }
    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CompensacionRequest $request)
    {
        Compensacion::store($request->validated());
        return redirect()->route('recursoshumanos.compensacion.index')->with('success', 'Compensacion creada satisfactoriamente');
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
        $compensacion    = Compensacion::find($id);
        $nombrespersonas = Personal::all();
        $areas           = Area::all();
        $secciones       = Seccion::all();
        return view('recursoshumanos::compensacion.edit', compact('compensacion','nombrespersonas','areas','secciones'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(CompensacionRequest $request, $id)
    {
        Compensacion::update($request->validated(), $id);
        return redirect()->route('recursoshumanos.compensacion.index')->with('success', 'Compensacion actualizada satisfactoriamente');
    }
     /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        Compensacion::delete($id);
        return redirect()->route('recursoshumanos.compensacion.index')->with('success', 'Compensacion eliminada satisfactoriamente');
    }

    public function pdf($id)
    {
        $seccionController  = new SeccionController();
        $compensacion       = Compensacion::show($id);
        //PREGUNTAMOS SI TIENE VALORES EN $compensacion
        if (count($compensacion)>=1) {
            //SI EXISTE VALORES HARA EL TRABAJO DE BUSCAR
            $seccionBuscar      = $compensacion[0]['SECCION'];
            $seccion            = $seccionController->seccionById($seccionBuscar);
            //OBTENEMOS EL ID DEL USUARIO
            $user      = auth()->user();
            $idusuario = $user->id;
            //MOSTRARA EL PDF
            return view('recursoshumanos::compensacion.pdf', compact('compensacion','seccion','idusuario'));
        }else{
            //NO MOSTRARA Y NOS MANDARA DIRECTO A VER LOS REGISTROS
            return view('recursoshumanos::compensacion.index')->with('success', 'Documento no valido o eliminado.');
        }
    }
}