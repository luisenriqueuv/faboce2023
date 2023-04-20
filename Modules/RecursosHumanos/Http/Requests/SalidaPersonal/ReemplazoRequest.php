<?php

namespace Modules\RecursosHumanos\Http\Requests\SalidaPersonal;

use Illuminate\Foundation\Http\FormRequest;

class ReemplazoRequest extends FormRequest
{
    public function rules()
    {
        return [
            'FECHA' => 'required|date',
            'CARNET' => 'required|string|max:15',
            'IDDOCUMENTO' => 'required|string|max:3'
        ];
    }

    public function attributes()
    {
        return [
            'FECHA' => 'fecha',
            'CARNET' => 'carnet',
            'IDDOCUMENTO' => 'agencia'
        ];
    }

    public function authorize()
    {
        return true;
    }
}