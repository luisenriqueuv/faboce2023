<?php

namespace Modules\RecursosHumanos\Http\Controllers\SalidaPersonal;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\RecursosHumanos\Facades\Documento;
use Modules\RecursosHumanos\Facades\SalidaPersonal\Reemplazo;
use Modules\RecursosHumanos\Facades\SalidaPersonal\Reemplazo1;
use Modules\RecursosHumanos\Facades\SalidaPersonal\ReemplazoKardex;
use Modules\RecursosHumanos\Http\Requests\SalidaPersonal\ReemplazoRequest;
use Modules\RecursosHumanos\Http\Requests\SalidaPersonal\Reemplazo1Request;

class ReemplazoController extends Controller
{
    private const IDReemplazo = 1;

    public function index()
    {
        return view('recursoshumanos::salidapersonal.reemplazo.index');
    }

    public function all()
    {
        return Reemplazo::allByDocument();
    }

    public function create()
    {
        $documentos = Documento::allDocumentByUser(self::IDReemplazo);
        return view('recursoshumanos::salidapersonal.reemplazo.create', compact('documentos'));
    }

    public function create1($idReemplazo)
    {
        $documentos = Documento::allDocumentByUser(self::IDReemplazo);
        return view('recursoshumanos::salidapersonal.reemplazo.create1', compact('idReemplazo', 'documentos'));
    }

    public function store(ReemplazoRequest $request)
    {
        $id = Reemplazo::store($request->validated());
        return redirect()->route('recursoshumanos.salidapersonal.reemplazo.show', $id)->with('success', 'Boleta de Reemplazo creada satisfactoriamente');
    }

    public function store1(Reemplazo1Request $request)
    {
        $validated = $request->validated();
        if (Reemplazo1::store($validated)) {
            return redirect()->route('recursoshumanos.salidapersonal.reemplazo.show', $validated['IDReemplazo'])
                ->with('success', 'Datos ingresados satisfactoriamente');
        } else {
            return redirect()->route('recursoshumanos.salidapersonal.reemplazo.show', $validated['IDReemplazo'])
                ->with('error', 'Error al ingresar los datos.');
        }
    }

    public function show($id)
    {
        $Reemplazo = Reemplazo::show($id);
        return view('recursoshumanos::salidapersonal.reemplazo.show', compact('Reemplazo'));
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

    public function destroy1($id, $idReemplazo)
    {
        Reemplazo1::delete($id);
        return redirect()->route('recursoshumanos.salidapersonal.reemplazo.show', $idReemplazo)
            ->with('success', 'Fecha eliminada satisfactoriamente');
    }

    public function pdf($id)
    {
        $Reemplazo = Reemplazo::show($id);
        return view('recursoshumanos::salidapersonal.reemplazo.pdf', compact('Reemplazo'));
    }
}