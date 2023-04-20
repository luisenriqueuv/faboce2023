<?php

namespace Modules\RecursosHumanos\Entities\SalidaPersonal;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class VacacionKardex extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    const CREATED_AT = 'CREATED_AT';
    const UPDATED_AT = 'UPDATED_AT';

    protected $table = 'rrhh_vacacionkardex';
    protected $primaryKey = 'ID';
    protected $connection = 'sisinvconsolidado';

    protected $fillable = [
        'IDVACACION',
        'IDVACACION1',
        'CARNET',
        'FECHA',
        'AGECODIGO',
        'ASIGNADA',
        'TOMADA',
        'FECHARETORNO',
        'OBSERVACION'
    ];
}
