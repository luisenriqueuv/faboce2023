<?php

namespace Modules\RecursosHumanos\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TiporegistroRequest extends FormRequest
{
    public function rules()
    {
        $input = $this->all();
        $input['ID'] = trim($input['ID']);
        $input['TITLE'] = trim($input['TITLE']);
        return [
            'ID' => 'max:5',
            'TITLE' => 'max:20'
        ];
    }

    public function authorize()
    {
        return true;
    }
}