<?php

namespace Modules\RecursosHumanos\Providers;
use Modules\RecursosHumanos\Entities\Area;
use Modules\RecursosHumanos\Entities\Cargo;
use Modules\RecursosHumanos\Entities\Prueba;
use Modules\RecursosHumanos\Entities\Personal;
use Modules\RecursosHumanos\Entities\Jerarquia;
use Modules\RecursosHumanos\Entities\Formulario;
use Modules\RecursosHumanos\Entities\Formulario1;
use Modules\RecursosHumanos\Observers\AreaObserver;
use Modules\RecursosHumanos\Observers\CargoObserver;
use Modules\RecursosHumanos\Entities\Tiporegistro;
use Modules\RecursosHumanos\Observers\TiporegistroObserver;

use Modules\RecursosHumanos\Observers\PersonalObserver;
use Modules\RecursosHumanos\Observers\JerarquiaObserver;
use Modules\RecursosHumanos\Observers\FormularioObserver;
use Modules\RecursosHumanos\Observers\Formulario1Observer;
use Modules\RecursosHumanos\Entities\SalidaPersonal\Vacacion;
use Modules\RecursosHumanos\Entities\SalidaPersonal\Vacacion1;
use Modules\RecursosHumanos\Entities\SalidaPersonal\VacacionKardex;
use Modules\RecursosHumanos\Observers\SalidaPersonal\VacacionObserver;
use Modules\RecursosHumanos\Observers\SalidaPersonal\Vacacion1Observer;
use Modules\RecursosHumanos\Observers\SalidaPersonal\VacacionKardexObserver;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

use Modules\RecursosHumanos\Observers\PruebaObserver;
use Modules\RecursosHumanos\Observers\CompensacionObserver;
use Modules\RecursosHumanos\Observers\ReemplazoObserver;
use Modules\RecursosHumanos\Observers\CambioturnoObserver;
use Modules\RecursosHumanos\Observers\DescansoObserver;
use Modules\RecursosHumanos\Observers\SeccionObserver;
use Modules\RecursosHumanos\Observers\VacacioncalculoObserver;

use Modules\RecursosHumanos\Entities\Cambioturno;
use Modules\RecursosHumanos\Entities\Compensacion;
use Modules\RecursosHumanos\Entities\Reemplazo;
use Modules\RecursosHumanos\Entities\Descanso;
use Modules\RecursosHumanos\Entities\Seccion;
use Modules\RecursosHumanos\Entities\Vacacioncalculo;


class ObserverServiceProvider extends ServiceProvider
{
    public function boot()
    {
        parent::boot();
        Area::observe(AreaObserver::class);
        Cargo::observe(CargoObserver::class);
        Formulario::observe(FormularioObserver::class);
        Formulario1::observe(Formulario1Observer::class);
        Jerarquia::observe(JerarquiaObserver::class);
        Personal::observe(PersonalObserver::class);
        Tiporegistro::observe(TiporegistroObserver::class);

        Vacacion::observe(VacacionObserver::class);
        Vacacion1::observe(Vacacion1Observer::class);
        VacacionKardex::observe(VacacionKardexObserver::class);
        //AGREMAMOS LOS OBSERVERS PARA QUE PUEDA REGISTRAR Y ACTUALIZAR LOS DATOS DE DELETED_ID EN TABLAS
        Prueba::observe(PruebaObserver::class);
        //COMPENSACIONES
        Compensacion::observe(CompensacionObserver::class);
        //REEMPLAZOS
        Reemplazo::observe(ReemplazoObserver::class);
        //CAMBIOTURNOS
        Cambioturno::observe(CambioturnoObserver::class);
        //DESCANSO
        Descanso::observe(DescansoObserver::class);
        //SECCION
        Seccion::observe(SeccionObserver::class);
        //CALCULO DE LAS VACACIONES
        Vacacioncalculo::observe(VacacioncalculoObserver::class);
    }
}