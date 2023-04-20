<?php

namespace Modules\RecursosHumanos\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cargo extends Model
{
    use SoftDeletes;

    protected $table = 'rrhh_cargo';
    protected $primaryKey = 'ID';

    protected $fillable = [
        'DESCRIPCION'
    ];
}
