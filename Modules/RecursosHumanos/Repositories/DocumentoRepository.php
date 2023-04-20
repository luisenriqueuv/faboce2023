<?php

namespace Modules\RecursosHumanos\Repositories;

use Modules\Sistemas\Facades\Conexion;
use Modules\RecursosHumanos\Entities\Documento as model;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\Dump;

class DocumentoRepository
{
    private $_model;

    public function __construct(model $model)
    {
        $this->_model = $model;
    }

    public function all()
    {
        return $this->_model
            ->orderBy('ID', 'DESC')
            ->get();
    }
    public function allDocuments()
    {
        return $this->_model->withTrashed()
            ->orderBy('FECHA', 'DESC')
            ->orderBy('ID', 'DESC')
            ->get(['ID','IDTIPOREGISTRO','TITLE','AGECODIGO']);
    }
    public function allByUser($idTipoRegistro)
    {
        $query = $this->_model
            ->select('rrhh_documento.ID')
            ->join('rrhh_documentousuario', 'rrhh_documentousuario.IDDOCUMENTO', 'rrhh_documento.ID')
            ->where('rrhh_documentousuario.IDUSUARIO', auth()->user()->id);
        if (!is_null($idTipoRegistro)) {
            $query = $query->where('rrhh_documento.IDTIPOREGISTRO', $idTipoRegistro);
        }
        return $query->get();
    }
    public function typeDocumentoByIdTipoRegistro($idTipoRegistro)
    {
        $query = $this->_model
            ->select('INITIAL','TITLE')
//            ->join('rrhh_documentousuario', 'rrhh_documentousuario.IDDOCUMENTO', 'rrhh_documento.ID')
            ->where('IDTIPOREGISTRO', $idTipoRegistro);
        if (!is_null($idTipoRegistro)) {
            $query = $query->where('IDTIPOREGISTRO', $idTipoRegistro);
        }
        return $query->get();
    }
    public function ageCodigoByIdTipoRegistro($idTipoRegistro)
    {
        $query = $this->_model
            ->select('AGECODIGO','TITLE')
//            ->join('rrhh_documentousuario', 'rrhh_documentousuario.IDDOCUMENTO', 'rrhh_documento.ID')
            ->where('IDTIPOREGISTRO', $idTipoRegistro);
        if (!is_null($idTipoRegistro)) {
            $query = $query->where('IDTIPOREGISTRO', $idTipoRegistro);
        }
        return $query->get();
    }
    public function allDocumentByUser($idTipoRegistro)
    {
        $query = $this->_model
            ->select('rrhh_documento.ID', 'rrhh_documento.TITLE', 'rrhh_documento.AGECODIGO', 'rrhh_documento.INITIAL')
            ->join('rrhh_documentousuario', 'rrhh_documentousuario.IDDOCUMENTO', 'rrhh_documento.ID')
            ->where('rrhh_documentousuario.IDUSUARIO', auth()->user()->id);
        if (!is_null($idTipoRegistro)) {
            $query = $query->where('rrhh_documento.IDTIPOREGISTRO', $idTipoRegistro);
        }
        return $query->get();
    }

    public function find($id)
    {
        return $this->_model->find($id);
    }

    public function store($validated)
    {
        $this->_model->create($validated);
    }

    public function update($validated, $id)
    {
        $this->find($id)->update($validated);
    }

    public function delete($id)
    {
        $this->find($id)->delete();
    }

    public function restore($id)
    {
        $this->find($id)->restore();
    }
}
