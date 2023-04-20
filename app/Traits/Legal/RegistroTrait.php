<?php

namespace App\Traits\Legal;

use App\User;

use App\Models\Legal\Registro;
use App\Models\Legal\Documento;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

trait RegistroTrait
{

    public function all_records($tipo_documento)
    {
        $ids = array();
        $documentos = User::find(Auth::user()->id)->documentos_legal()->where('id_tipo_registro', $tipo_documento)->get();
        foreach ($documentos as $documento) {
            $ids[] = $documento->id;
        }
        return Registro::with('documento')->whereIN('id_documento', $ids)->orderBy('id', 'DESC')->get();
    }

    public function all_legal_documents($tipo_documento)
    {
        return User::find(Auth::user()->id)->documentos_legal()->where('id_tipo_registro', $tipo_documento)->get();
    }

    public function create_record($value, $ruta)
    {
        $value['id'] = $this->created_id($value['fecha_inicial'], $value['id_documento']);
        if (array_key_exists('file', $value)) {
            $value['nombre_archivo'] = $value['file']->getClientOriginalName();
            $value['ruta'] = Storage::disk('upload')->put($ruta, $value['file']);
        }
        Registro::create($value);
    }

    public function update_record($registro, $value, $ruta)
    {
        if (array_key_exists('file', $value)) {
            if (Storage::disk('upload')->exists($registro->ruta)) {
                Storage::disk('upload')->delete($registro->ruta);
            }
            $value['nombre_archivo'] = $value['file']->getClientOriginalName();
            $value['ruta'] = Storage::disk('upload')->put($ruta, $value['file']);
        }
        if (!array_key_exists('acuerdo', $value)) {
            $value['acuerdo'] = NULL;
        }
        $registro->update($value);
    }

    public function delete_record($registro)
    {
        if (Storage::disk('upload')->exists($registro->ruta)) {
            Storage::disk('upload')->delete($registro->ruta);
        }
        $registro->delete();
    }

    public function downloadPDF($id)
    {
        $registro = Registro::find($id);
        return Storage::disk('upload')->download($registro->ruta, $registro->nombre_archivo);
    }

    public function created_id($fecha, $id_documento)
    {
        $documento = Documento::find($id_documento);
        $aux_fecha = strtotime($fecha);
        $idRegistro = $documento->inicial;
        $idRegistro .= ($documento->id_tipo_registro < 10) ? '0' . $documento->id_tipo_registro : $documento->id_tipo_registro;
        $idRegistro .= date('Y', $aux_fecha);
        $count = Registro::withTrashed()->where('id', 'like', $idRegistro . '%')->count();
        if ($count < 9) {
            $idRegistro .= '00' . ($count + 1);
        } else {
            if ($count < 99) {
                $idRegistro .= '0' . ($count + 1);
            } else {
                $idRegistro .= ($count + 1);
            }
        }
        return $idRegistro;
    }
}
