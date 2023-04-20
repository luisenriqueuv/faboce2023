<?php

namespace Modules\RecursosHumanos\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seccion extends Model
{
    use SoftDeletes;

    protected $connection   = 'sisinvconsolidado2023';
    protected $table        = 'rrhh_seccion';
    protected $primaryKey   = 'ID';
    
    protected $fillable = [
        'IDAREA',
        'CODIGO',
        'DESCRIPCION'
    ];
}
