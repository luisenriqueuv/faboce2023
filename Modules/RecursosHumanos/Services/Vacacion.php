<?php

namespace Modules\RecursosHumanos\Services;

use Modules\RecursosHumanos\Facades\Documento;
use Modules\RecursosHumanos\Repositories\Vacacion as repository;

class Vacacion
{
    private const IDTIPOREGISTRO = 1;
    private $_repository;
    public function __construct(repository $repository)
    {
        $this->_repository = $repository;
    }
    public function allByDocument()
    {
        $documentos = Documento::allByUser(self::IDTIPOREGISTRO);
        if ($documentos) {
            return $this->_repository->allByDocument($documentos);
        } else {
            return [];
        }
    }
    public function find($id)
    {
        return $this->_repository->find($id);
    }
    public function show($id)
    {
        return $this->_repository->show($id);
    }
    public function store($validated)
    {
        $doc = Documento::find($validated['IDDOCUMENTO']);
        $validated['ID'] = $this->_newId($doc->INITIAL, $doc->IDTIPOREGISTRO, $validated['FECHA']);
        $validated['AGECODIGO'] = $doc->AGECODIGO;
        $this->_repository->store($validated);
        return $validated['ID'];
    }
    public function update($validated, $id)
    {
        $this->_repository->update($validated, $id);
    }
    public function delete($id)
    {
        $this->_repository->delete($id);
    }
    private function _newId($inicial, $idTipoRegistro, $fecha)
    {
        $idRegistro = $inicial;
        $idRegistro .= ($idTipoRegistro < 10) ? '0' . $idTipoRegistro : $idTipoRegistro;
        $idRegistro .= date('Ym', strtotime($fecha));
        $count = $this->_repository->count($idRegistro);
        if ($count < 9)
            $idRegistro .= '00' . ($count + 1);
        else if ($count < 99)
            $idRegistro .= '0' . ($count + 1);
        else
            $idRegistro .= ($count + 1);
        return $idRegistro;
    }
}
