<?php

namespace Modules\RecursosHumanos\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cambioturno extends Model
{
    use SoftDeletes;

    const CREATED_AT        = 'CREATED_AT';
    const UPDATED_AT        = 'UPDATED_AT';
    const DELETED_AT        = 'DELETED_AT';
    const DELETED_ID        = 'DELETED_ID';

    protected $connection   = 'sisinvconsolidado2023';
    protected $table        = 'rrhh_cambio_turno';
    protected $primaryKey   = 'ID';
    public $incrementing    = false;
    protected $keyType      = 'string';

    protected $fillable     = [ 'ID',
                                'CARNET',
                                'NOMBRE_COMPLETO',
                                'FECHA_SOLICITUD',
                                'SECCION',
                                'FECHA_INICIO_SOLICITUD',
                                'FECHA_FIN_SOLICITUD',
                                'NOMBRE_REEMPLAZO',
                                'TURNO_REEMPLAZO',
                                'NOMBRE_REEMPLAZADO',
                                'TURNO_REEMPLAZADO',
                                'CREATED_AT',
                                'UPDATED_AT',
                                'DELETED_AT',
                                'DELETED_ID'
                                ];
}