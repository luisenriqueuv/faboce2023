<?php

namespace Modules\RecursosHumanos\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Descanso extends Model
{
    use SoftDeletes;

    const CREATED_AT        = 'CREATED_AT';
    const UPDATED_AT        = 'UPDATED_AT';
    const DELETED_AT        = 'DELETED_AT';
    const DELETED_ID        = 'DELETED_ID';

    protected $connection   = 'sisinvconsolidado2023';
    protected $table        = 'rrhh_descanso';
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
                                'OBSERVACION',
                                'FECHA_RETORNO',
                                'SALDO_FAVOR_VACACION',
                                'HORA_INICIO_SOLICITUD',
                                'HORA_FIN_SOLICITUD',
                                'TOTAL_DIAS',
                                'TOTAL_HORAS',
                                'DIAS_VACACION',
                                'HORAS_VACACION',
                                'CREATED_AT',
                                'UPDATED_AT',
                                'DELETED_AT',
                                'DELETED_ID'
                                ];
}