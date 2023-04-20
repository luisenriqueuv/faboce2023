<?php

namespace Modules\RecursosHumanos\Http\Requests\SalidaPersonal;

use Illuminate\Foundation\Http\FormRequest;

class Vacacion1Request extends FormRequest
{
    public function rules()
    {
        return [
            'IDVACACION' => 'required',
            'FECHAI' => 'required|date',
            'HORAI1' => 'nullable',
            'HORAI2' => 'nullable',
            'FECHAF' => 'required|date',
            'HORAF1' => 'nullable',
            'HORAF2' => 'nullable',
            'DIAS' => 'required|string|max:15',
            'MEDIODIAI' => 'nullable|string|max:5',
            'MEDIODIAF' => 'nullable|string|max:5',
            'FECHARETORNO' => 'required|date',
            'OBSERVACION' => 'required|max:150',
            'SECCION' => 'max:150',
        ];
    }

    public function attributes()
    {
        return [
            'FECHAI' => 'fecha inicial',
            'FECHAF' => 'fecha final',
            'DIAS' => 'dias'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
