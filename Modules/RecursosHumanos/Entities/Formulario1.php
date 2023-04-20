<?php

namespace Modules\RecursosHumanos\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Formulario1 extends Model
{
    use SoftDeletes;

    protected $table = 'rrhh_formulario1';
    protected $primaryKey = 'ID';

    protected $fillable = [
        'NOMBRE',
        'IDFORMULARIO'
    ];


    public function formulario()
    {
        return $this->belongsTo(Formulario::class, 'IDFORMULARIO', 'ID');
    }

    public function evaluacion1()
    {
        return $this->hasMany(Evaluacion1::class, 'IDEVALUACION', 'ID');
    }
}
