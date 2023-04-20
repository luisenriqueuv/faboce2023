<?php

namespace Modules\RecursosHumanos\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tiporegistro extends Model
{
    use SoftDeletes;

    protected $table = 'rrhh_tiporegistro';
    protected $primaryKey = 'ID';

    protected $fillable = [
        'ID',
        'TITLE'
    ];
}