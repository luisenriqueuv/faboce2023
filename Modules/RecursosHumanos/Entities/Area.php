<?php

namespace Modules\RecursosHumanos\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{
    use SoftDeletes;

    protected $table = 'rrhh_area';
    protected $primaryKey = 'ID';

    protected $fillable = [
        'CODIGO',
        'DESCRIPCION'
    ];
}