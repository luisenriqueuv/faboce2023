<?php

namespace Modules\RecursosHumanos\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Formulario extends Model
{
    use SoftDeletes;

    protected $table = 'rrhh_formulario';
    protected $primaryKey = 'ID';

    protected $fillable = [
        'CODIGO',
        'NOMBRE',
        'DESCRIPCION'
    ];

    public function formulario1()
    {
        return $this->hasMany(Formulario1::class, 'IDFORMULARIO', 'ID');
    }
}
