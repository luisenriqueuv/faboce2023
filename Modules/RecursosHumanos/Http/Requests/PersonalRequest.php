<?php

namespace Modules\RecursosHumanos\Http\Requests;

use Modules\Sas\Facades\SasInv\Conexion;
use Illuminate\Foundation\Http\FormRequest;

class PersonalRequest extends FormRequest
{
    public function rules()
    {
        $input = $this->all();
        $input['CARNET'] = trim($input['CARNET']);
        $input['CICIUDAD'] = trim($input['CICIUDAD']);
        $input['APELLIDO'] = trim($input['APELLIDO']);
        $input['NOMBRE'] = trim($input['NOMBRE']);
        $input['CIUDAD'] = trim($input['CIUDAD']);
        $this->replace($input);

        $r = $this->route('carnet') ? ',' . $input['CARNET'] . ',carnet' : '';

        return [
            'CARNET' => 'required|max:20|unique:' . config("app.consolidado") . '.rrhh_personal,carnet' . $r,
            'CICIUDAD' => 'max:2',
            'APELLIDO' => 'required|string|max:150',
            'NOMBRE' => 'required|string|max:150',
            'IDCARGO' => 'required|numeric|min:0',
            'IDJERARQUIA' => 'required|numeric|min:0',
            'IDAREA' => 'required|numeric|min:0',
            'AGECODIGO' => 'required|string|max:5',
            'CIUDAD' => 'required|string|max:100',
            'FECHAI' => 'required|date',
            'IDFORMULARIO' => 'required|numeric|min:0',
            'AGECODIGO2' => 'required|string|max:5'
        ];
    }

    public function attributes()
    {
        return [
            'CARNET' => 'carnet de identidad',
            'CICIUDAD' => 'extension',
            'APELLIDO' => 'apellido',
            'NOMBRE' => 'nombre',
            'IDCARGO' => 'cargo',
            'IDJERARQUIA' => 'jerarquia',
            'IDAREA' => 'area',
            'AGECODIGO' => 'fabrica',
            'CIUDAD' => 'ciudad',
            'FECHAI' => 'fecha ingreso',
            'IDFORMULARIO' => 'formulario',
            'AGECODIGO2' => 'agencia'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
