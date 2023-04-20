<?php

namespace Modules\RecursosHumanos\Http\Requests;

use Modules\Sas\Facades\SasInv\Conexion;
use Illuminate\Foundation\Http\FormRequest;

class SeccionRequest extends FormRequest
{
    public function rules()
    {
        $input = $this->all();
        $input['ID']          = trim($input['CARNET']);
        $input['CODIGO']      = trim($input['CICIUDAD']);
        $input['DESCRIPCION'] = trim($input['APELLIDO']);
        $this->replace($input);
        return [
            'ID'            => 'max:2',
            'CODIGO'        => 'required|string|max:150',
            'DESCRIPCION'   => 'required|string|max:150'
        ];
    }

    public function attributes()
    {
        return [
            'ID' => 'ID',
            'CODIGO' => 'CODIGO',
            'DESCRIPCION' => 'DESCRIPCION'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
