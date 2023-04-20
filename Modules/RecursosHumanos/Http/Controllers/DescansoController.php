<?php

namespace Modules\RecursosHumanos\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\RecursosHumanos\Facades\Area;
use Modules\RecursosHumanos\Facades\Descanso;
use Modules\RecursosHumanos\Facades\Personal;
use Modules\RecursosHumanos\Facades\Seccion;
use Modules\RecursosHumanos\Http\Requests\DescansoRequest;

class DescansoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('recursoshumanos::descanso.index');
    }

    public function all()
    {
        return Descanso::all();
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
        return view('recursoshumanos::descanso.create', compact('nombrespersonas','areas','secciones'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(DescansoRequest $request)
    {
        Descanso::store($request->validated());
        return redirect()->route('recursoshumanos.descanso.index')->with('success', 'Descanso creada satisfactoriamente');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $descanso = Descanso::show($id);
        return view('recursoshumanos::show', compact('descanso'));
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
        $descanso        = Descanso::find($id);
        $secciones       = Seccion::all();
        return view('recursoshumanos::descanso.edit', compact('descanso','areas','nombrespersonas','secciones'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(DescansoRequest $request, $id)
    {
        Descanso::update($request->validated(), $id);
        return redirect()->route('recursoshumanos.descanso.index')->with('success', 'Descanso actualizada satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        Descanso::delete($id);
        return redirect()->route('recursoshumanos.descanso.index')->with('success', 'Descanso eliminada satisfactoriamente');
    }
    public function pdf($id)
    {
        $seccionController  = new SeccionController();
        $descansos           = Descanso::show($id);
        //PREGUNTAMOS SI TIENE VALORES EN $descanso
        if (count($descansos)>=1) {
            //SI EXISTE VALORES HARA EL TRABAJO DE BUSCAR
            $seccionBuscar      = $descansos[0]['SECCION'];
            $seccion            = $seccionController->seccionById($seccionBuscar);
            //OBTENEMOS EL CI DEL USUARIO
            $user      = auth()->user();
            $idusuario = $user->id;
            //MOSTRARA EL PDF
            return view('recursoshumanos::descanso.pdf', compact('descansos','seccion','idusuario'));
        }else{
            //NO MOSTRARA Y NOS MANDARA DIRECTO A VER LOS REGISTROS
            return view('recursoshumanos::descanso.index')->with('success', 'Documento no valido o eliminado.');
        }
    }
}