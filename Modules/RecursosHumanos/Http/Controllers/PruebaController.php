<?php

namespace Modules\RecursosHumanos\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\RecursosHumanos\Facades\Prueba;
use Modules\RecursosHumanos\Http\Requests\PruebaRequest;

class PruebaController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('recursoshumanos::prueba.index');
    }

    public function all()
    {
        return Prueba::all();
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('recursoshumanos::prueba.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(PruebaRequest $request)
    {
        Prueba::store($request->validated());
        return redirect()->route('recursoshumanos.prueba.index')->with('success', 'Prueba creada satisfactoriamente');
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
        $prueba = Prueba::find($id);
        return view('recursoshumanos::prueba.edit', compact("prueba"));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(PruebaRequest $request, $id)
    {
        Prueba::update($request->validated(), $id);
        return redirect()->route('recursoshumanos.prueba.index')->with('success', 'Prueba actualizada satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        Prueba::delete($id);
        return redirect()->route('recursoshumanos.prueba.index')->with('success', 'Prueba eliminada satisfactoriamente');
    }
}
