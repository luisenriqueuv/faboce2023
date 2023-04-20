<?php

use Illuminate\Support\Facades\Route;
use Modules\RecursosHumanos\Http\Controllers\SalidaPersonal\VacacionController;

Route::prefix('recursoshumanos')
    ->name('recursoshumanos.')
    ->middleware(['auth', 'role:super-admin|recursoshumanos|recursoshumanos.salidapersonal'])
    ->group(function () {

        Route::get('', function () {
            return redirect()->route('home');
        });
         // VACACION CALCULO
         Route::prefix('vacacioncalculo')
         ->name('vacacioncalculo.')
         ->controller(VacacioncalculoController::class)
         ->group(function () {
             Route::get('', 'index')->name('index');
             Route::get('all', 'all')->name('all');
             Route::get('create', 'create')->name('create');
             Route::get('{area}/edit', 'edit')->name('edit');
             Route::get('{area}', 'show')->name('show');
             Route::post('like', 'like')->name('like');
             Route::post('', 'store')->name('store');
             Route::post('{area}', 'restore')->name('restore');
             Route::put('{area}', 'update')->name('update');
             Route::delete('{area}', 'destroy')->name('destroy');
         });
        // SECCION
         Route::prefix('seccion')
         ->name('seccion.')
         ->controller(SeccionController::class)
         ->group(function () {
             Route::get('', 'index')->name('index');
             Route::get('all', 'all')->name('all');
             Route::get('create', 'create')->name('create');
             Route::get('{area}/edit', 'edit')->name('edit');
             Route::get('{area}', 'show')->name('show');
             Route::post('like', 'like')->name('like');
             Route::post('', 'store')->name('store');
             Route::post('{area}', 'restore')->name('restore');
             Route::put('{area}', 'update')->name('update');
             Route::delete('{area}', 'destroy')->name('destroy');
         });
        // DESCANSO
         Route::prefix('descanso')
         ->name('descanso.')
         ->controller(DescansoController::class)
         ->group(function () {
             Route::get('', 'index')->name('index');
             Route::get('all', 'all')->name('all');
             Route::get('create', 'create')->name('create');
             Route::get('{area}/edit', 'edit')->name('edit');
             Route::get('{id}/pdf', 'pdf')->name('pdf');
             Route::get('{area}', 'show')->name('show');
             Route::post('', 'store')->name('store');
             Route::post('{area}', 'restore')->name('restore');
             Route::put('{area}', 'update')->name('update');
             Route::delete('{area}', 'destroy')->name('destroy');
         });
         // CAMBIOTURNO
         Route::prefix('cambioturno')
         ->name('cambioturno.')
         ->controller(CambioturnoController::class)
         ->group(function () {
             Route::get('', 'index')->name('index');
             Route::get('all', 'all')->name('all');
             Route::get('create', 'create')->name('create');
             Route::get('{area}/edit', 'edit')->name('edit');
             Route::get('{id}/pdf', 'pdf')->name('pdf');
             Route::get('{area}', 'show')->name('show');
             Route::post('', 'store')->name('store');
             Route::post('{area}', 'restore')->name('restore');
             Route::put('{area}', 'update')->name('update');
             Route::delete('{area}', 'destroy')->name('destroy');
         });
         // REEMPLAZO
         Route::prefix('reemplazo')
         ->name('reemplazo.')
         ->controller(ReemplazoController::class)
         ->group(function () {
             Route::get('', 'index')->name('index');
             Route::get('all', 'all')->name('all');
             Route::get('create', 'create')->name('create');
             Route::get('{area}/edit', 'edit')->name('edit');
             Route::get('{id}/pdf', 'pdf')->name('pdf');
             Route::get('{area}', 'show')->name('show');
             Route::post('', 'store')->name('store');
             Route::post('{area}', 'restore')->name('restore');
             Route::put('{area}', 'update')->name('update');
             Route::delete('{area}', 'destroy')->name('destroy');
         });
        // COMPENSACION
         Route::prefix('compensacion')
         ->name('compensacion.')
         ->controller(CompensacionController::class)
         ->group(function () {
             Route::get('', 'index')->name('index');
             Route::get('all', 'all')->name('all');
             Route::get('create', 'create')->name('create');
             Route::get('{area}/edit', 'edit')->name('edit');
             Route::get('{id}/pdf', 'pdf')->name('pdf');
             Route::get('{area}', 'show')->name('show');
             Route::post('', 'store')->name('store');
             Route::post('{area}', 'restore')->name('restore');
             Route::put('{area}', 'update')->name('update');
             Route::delete('{area}', 'destroy')->name('destroy');
         });
         // PRUEBA
         Route::prefix('prueba')
         ->name('prueba.')
         ->controller(PruebaController::class)
         ->group(function () {
             Route::get('', 'index')->name('index');
             Route::get('all', 'all')->name('all');
             Route::get('create', 'create')->name('create');
             Route::get('{area}/edit', 'edit')->name('edit');
             Route::get('{area}', 'show')->name('show');
             Route::post('', 'store')->name('store');
             Route::post('{area}', 'restore')->name('restore');
             Route::put('{area}', 'update')->name('update');
             Route::delete('{area}', 'destroy')->name('destroy');
         });
        //TIPO REGISTROS
        Route::prefix('tiporegistro')
            ->name('tiporegistro.')
            ->controller(TiporegistroController::class)
            ->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('all', 'all')->name('all');
                Route::get('create', 'create')->name('create');
                Route::get('{area}/edit', 'edit')->name('edit');
                Route::get('{area}', 'show')->name('show');
                Route::post('', 'store')->name('store');
                Route::post('{area}', 'restore')->name('restore');
                Route::put('{area}', 'update')->name('update');
                Route::delete('{area}', 'destroy')->name('destroy');
            });
         // AREAS
        Route::prefix('area')
            ->name('area.')
            ->controller(AreaController::class)
            ->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('all', 'all')->name('all');
                Route::get('create', 'create')->name('create');
                Route::get('{area}/edit', 'edit')->name('edit');
                Route::get('{area}', 'show')->name('show');
                Route::post('', 'store')->name('store');
                Route::post('{area}', 'restore')->name('restore');
                Route::put('{area}', 'update')->name('update');
                Route::delete('{area}', 'destroy')->name('destroy');
            });
        // CARGOS
        Route::prefix('cargo')
            ->name('cargo.')
            ->controller(CargoController::class)
            ->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('all', 'all')->name('all');
                Route::get('create', 'create')->name('create');
                Route::get('{cargo}/edit', 'edit')->name('edit');
                Route::get('{cargo}', 'show')->name('show');
                Route::post('', 'store')->name('store');
                Route::post('{cargo}', 'restore')->name('restore');
                Route::put('{cargo}', 'update')->name('update');
                Route::delete('{cargo}', 'destroy')->name('destroy');
            });
        // JERARQUIAS
        Route::prefix('jerarquia')
            ->name('jerarquia.')
            ->controller(JerarquiaController::class)
            ->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('all', 'all')->name('all');
                Route::get('create', 'create')->name('create');
                Route::get('{jerarquia}/edit', 'edit')->name('edit');
                Route::get('{jerarquia}', 'show')->name('show');
                Route::post('', 'store')->name('store');
                Route::post('{jerarquia}', 'restore')->name('restore');
                Route::put('{jerarquia}', 'update')->name('update');
                Route::delete('{jerarquia}', 'destroy')->name('destroy');
            });
        // PERSONAL
        Route::prefix('personal')
            ->name('personal.')
            ->controller(PersonalController::class)
            ->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('all', 'all')->name('all');
                Route::get('create', 'create')->name('create');
                Route::get('{personal}/edit', 'edit')->name('edit');
                Route::get('{personal}', 'show')->name('show');
                Route::post('like', 'like')->name('like');
                Route::post('buscarcarnet', 'buscarcarnet')->name('buscarcarnet');
                Route::post('', 'store')->name('store');
                Route::post('{personal}', 'restore')->name('restore');
                Route::put('{personal}', 'update')->name('update');
                Route::delete('{personal}', 'destroy')->name('destroy');
            });
        // FORMULARIO
        Route::prefix('formulario')
            ->name('formulario.')
            ->controller(FormularioController::class)
            ->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('all', 'all')->name('all');
                Route::get('create', 'create')->name('create');
                Route::post('', 'store')->name('store');
                Route::get('{id}/edit', 'edit')->name('edit');
                Route::put('{id}', 'update')->name('update');
                Route::get('{id}', 'show')->name('show');
                Route::delete('{id}', 'destroy')->name('destroy');
                Route::post('{id}', 'restore')->name('restore');
            });
        // FORMULARIO 1
        Route::prefix('formulario1')
            ->name('formulario1.')
            ->controller(Formulario1Controller::class)
            ->group(function () {
                Route::get('{idFormulario}/create', 'create')->name('create');
                Route::post('', 'store')->name('store');
                Route::get('{id}/edit', 'edit')->name('edit');
                Route::put('{id}', 'update')->name('update');
                Route::get('{id}', 'show')->name('show');
                Route::delete('{id}/{idFormulario}', 'destroy')->name('destroy');
                Route::post('{id}/{idFormulario}', 'restore')->name('restore');
            });
        // SALIDAS
        Route::prefix('salidapersonal/vacacion')
            ->name('salidapersonal.vacacion.')
            ->controller(VacacionController::class)
            ->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('all', 'all')->name('all');
                Route::get('create', 'create')->name('create');
                Route::get('create1/{id}', 'create1')->name('create1');
                Route::get('{id}/pdf', 'pdf')->name('pdf');
                Route::get('{id}', 'show')->name('show');
                Route::post('store', 'store')->name('store');
                Route::post('store1', 'store1')->name('store1');
                Route::delete('{id}', 'destroy')->name('destroy');
                Route::delete('destroy1/{id}/{idvacacion}', 'destroy1')->name('destroy1');
            });
    });
// 