<?php

namespace Modules\RecursosHumanos\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vacacioncalculo extends Model
{
    use SoftDeletes;

    const CREATED_AT        = 'CREATED_AT';
    const UPDATED_AT        = 'UPDATED_AT';
    const DELETED_AT        = 'DELETED_AT';
    const DELETED_ID        = 'DELETED_ID';

    protected $connection   = 'sisinvconsolidado2023';
    protected $table        = 'rrhh_vacaciones_personal';
    protected $primaryKey   = 'ID';
    public $incrementing    = false;
    protected $keyType      = 'string';

    protected $fillable     = [ 'ID',
                                'CARNET',
                                'FECHA_INGRESO',
                                'FECHA_CALCULO',
                                'ANIOS_VACACION',
                                'IDFORMULARIO',
                                'CREATED_AT',
                                'UPDATED_AT',
                                'DELETED_AT',
                                'DELETED_ID'
    ];
}