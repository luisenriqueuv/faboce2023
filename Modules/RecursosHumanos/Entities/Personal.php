<?php

namespace Modules\RecursosHumanos\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\RecursosHumanos\Facades\Personal as FacadesPersonal;

class Personal extends Model
{
    use SoftDeletes;

    protected $connection   = 'sisinvconsolidado2023';
    protected $table        = 'rrhh_personal';
    protected $primaryKey   = 'CARNET';
    public $incrementing    = false;
    protected $keyType      = 'string';

    protected $fillable = [
        'CARNET',
        'carnet_ciudad',
        'apellido',
        'nombre',
        'id_cargo',
        'id_jerarquia',
        'id_area',
        'agecodigo',
        'ciudad',
        'fecha_ingreso',
        'id_formulario',
        'agecodigo2',
        'carnet1',
        'carnet2'
    ];
    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'IDCARGO', 'ID');
    }

    public function jerarquia()
    {
        return $this->belongsTo(Jerarquia::class, 'IDJERARQUIA', 'ID');
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'IDAREA', 'ID');
    }

    public function formulario()
    {
        return $this->belongsTo(Formulario::class, 'IDFORMULARIO', 'ID');
    }

    public function fabrica()
    {
        return $this->belongsTo(Agencia::class, 'AGECODIGO', 'AGECODIGO');
    }

    public function agencia()
    {
        return $this->belongsTo(Agencia::class, 'AGECODIGO2', 'AGECODIGO');
    }

    public function obtenerNombre()
    {
        return $this->belongsTo(FacadesPersonal::class, 'carnet', 'carnet');
    }
}
