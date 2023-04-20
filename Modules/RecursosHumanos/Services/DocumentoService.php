<?php

namespace Modules\RecursosHumanos\Services;

use Modules\RecursosHumanos\Repositories\DocumentoRepository;

class DocumentoService
{
    private $_repository;

    public function __construct(DocumentoRepository $repository)
    {
        $this->_repository = $repository;
    }

    public function all()
    {
        return $this->_repository->all();
    }
    public function allByUser($idTipoRegistro = null)
    {
        return $this->_repository->allByUser($idTipoRegistro);
    }

    public function allDocumentByUser($idTipoRegistro = null)
    {
        return $this->_repository->allDocumentByUser($idTipoRegistro);
    }

    public function typeDocumentoByIdTipoRegistro($idTipoRegistro = null)
    {
        return $this->_repository->typeDocumentoByIdTipoRegistro($idTipoRegistro);
    }

    public function find($id)
    {
        return $this->_repository->find($id);
    }
}
