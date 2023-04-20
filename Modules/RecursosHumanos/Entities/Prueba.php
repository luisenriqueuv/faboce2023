<?php

namespace Modules\RecursosHumanos\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prueba extends Model
{
    use SoftDeletes;
    //PARA QUE VAYA PASANDO LOS DATOS POR DEFECTO DE LA TABLA
    const CREATED_AT        = 'CREATED_AT';
    const UPDATED_AT        = 'UPDATED_AT';
    const DELETED_AT        = 'DELETED_AT';
    const DELETED_ID        = 'DELETED_ID';

    protected $table        = 'rrhh_prueba';
    protected $primaryKey   = 'ID';
    public $incrementing    = false;
    protected $keyType      = 'string';

    protected $fillable = [
        'DETALLE',
        'DETALLE_1'
    ];
}
