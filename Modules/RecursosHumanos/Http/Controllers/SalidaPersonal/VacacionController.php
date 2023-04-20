<?php

namespace Modules\RecursosHumanos\Http\Controllers\SalidaPersonal;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\RecursosHumanos\Facades\agencia;
use Modules\RecursosHumanos\Facades\Area;
use Modules\RecursosHumanos\Facades\Documento;
use Modules\RecursosHumanos\Facades\Personal;
use Modules\RecursosHumanos\Facades\SalidaPersonal\Vacacion;
use Modules\RecursosHumanos\Facades\SalidaPersonal\Vacacion1;
use Modules\RecursosHumanos\Facades\SalidaPersonal\VacacionKardex;
use Modules\RecursosHumanos\Http\Requests\SalidaPersonal\VacacionRequest;
use Modules\RecursosHumanos\Http\Requests\SalidaPersonal\Vacacion1Request;

class VacacionController extends Controller
{
    private const IDVACACION = 1;

    public function index()
    {
        return view('recursoshumanos::salidapersonal.vacacion.index');
    }

    public function all()
    {
        return Vacacion::allByDocument();
    }

    public function create()
    {
        $nombrespersonas = Personal::all();
        $areas           = Area::all();
        $agencias        = agencia::all();
        $documentos      = Documento::all();
        //$documentos      = Documento::allDocumentByUser(self::IDVACACION);
//        @dump($documentos);
//        $idDocumentos    = Documento::all();
        return view('recursoshumanos::salidapersonal.vacacion.create', compact('documentos','nombrespersonas','agencias','areas'));
    }

    public function create1($idVacacion)
    {
        $documentos = Documento::allDocumentByUser(self::IDVACACION);
        return view('recursoshumanos::salidapersonal.vacacion.create1', compact('idVacacion', 'documentos'));
    }

    public function store(VacacionRequest $request)
    {
        $id = Vacacion::store($request->validated());
        return redirect()->route('recursoshumanos.salidapersonal.vacacion.show', $id)->with('success', 'Boleta de vacacion creada satisfactoriamente');
    }

    public function store1(Vacacion1Request $request)
    {
        $validated = $request->validated();
        if (Vacacion1::store($validated)) {
            return redirect()->route('recursoshumanos.salidapersonal.vacacion.show', $validated['IDVACACION'])
                ->with('success', 'Datos ingresados satisfactoriamente');
        } else {
            return redirect()->route('recursoshumanos.salidapersonal.vacacion.show', $validated['IDVACACION'])
                ->with('error', 'Error al ingresar los datos.');
        }
    }

    public function show($id)
    {
        $vacacion = Vacacion::show($id);
        return view('recursoshumanos::salidapersonal.vacacion.show', compact('vacacion'));
    }

    public function edit($id)
    {
        return view('recursoshumanos::edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
    }

    public function destroy1($id, $idvacacion)
    {
        Vacacion1::delete($id);
        return redirect()->route('recursoshumanos.salidapersonal.vacacion.show', $idvacacion)
            ->with('success', 'Fecha eliminada satisfactoriamente');
    }

    public function pdf($id)
    {
        $vacacion = Vacacion::show($id);
//        dd($vacacion);
        return view('recursoshumanos::salidapersonal.vacacion.pdf', compact('vacacion'));
    }
}
