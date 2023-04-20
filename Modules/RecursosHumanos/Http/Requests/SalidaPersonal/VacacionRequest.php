<?php

namespace Modules\RecursosHumanos\Http\Requests\SalidaPersonal;

use Illuminate\Foundation\Http\FormRequest;

class VacacionRequest extends FormRequest
{
    public function rules()
    {
        $input                = $this->all();
        //SEPARAMOS EL NOMBRE DEL CI Y LO GUARDAMOS EN LA TABLA
        $datos                = explode('|',trim($input['CARNET']));
        $input['FECHA']       = trim($datos[1]);
        //OBTENEMOS EL NOMBRE DE LA PERSONA SELECCIONADA
        $input['FECHA']       = trim($input['FECHA']);
        $input['AGECODIGO']   = trim($input['AGECODIGO']);
        $input['CARNET']      = trim($datos[0]);
        $input['OBSERVACION'] = trim($input['OBSERVACION']);
        $input['SECCION']     = trim($input['SECCION']);
        dump($datos);
        return [
            'FECHA'       => 'required|date',
            'AGECODIGO'   => 'required|max:5',
            'CARNET'      => 'string|max:15',
            'CARNET1'     => 'string|max:15',
            'IDDOCUMENTO' => 'string|max:15',
            'OBSERVACION' => 'string|max:100',
            'SECCION'     => 'string|max:100'
        ];
    }

    public function attributes()
    {
        return [
            'FECHA'       => 'fecha',
            'AGECODIGO'   => 'agecodigo',
            'CARNET'      => 'carnet',
            'IDDOCUMENTO' => 'iddocumento',
            'OBSERVACION' => 'observacion',
            'SECCION'     => 'seccion'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
