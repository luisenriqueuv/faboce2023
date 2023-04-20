<?php

namespace Modules\RecursosHumanos\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nombrepersona extends Model
{
    use SoftDeletes;

    protected $table = 'rrhh_personal';
    protected $primaryKey = 'ID';

    protected $fillable = [
        'APELLIDO','NOMBRE'
    ];
}