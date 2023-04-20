<?php

namespace Modules\RecursosHumanos\Services;

use Modules\RecursosHumanos\Repositories\DescansoRepository;
use Modules\RecursosHumanos\Facades\Descanso as FacadesDescanso;
use Modules\RecursosHumanos\Facades\Tiporegistro;
use Modules\RecursosHumanos\Facades\Documento;
use Illuminate\Support\Str;

class DescansoService
{
    private const IDTIPOREGISTRO = 7;
//    private $repository;
    private $_repository;
    public function __construct(DescansoRepository $repository)
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

    public function all()
    {
        return $this->_repository->all();
    }

    public function find($id)
    {
        return $this->_repository->find($id);
    }

    public function store($validated)
    {
        $this->_repository->store($validated);
    }

    public function update($validated, $id)
    {
        $this->_repository->update($validated, $id);
    }

    public function delete($id)
    {
        $this->_repository->delete($id);
    }
    
    public function show($id)
    {
        return $this->_repository->show($id);
    }

    private function _newId($inicial, $idTipoRegistro, $fecha)
    {
        $idRegistro  = $inicial;
        $idRegistro .= ($idTipoRegistro < 10) ? '0' . $idTipoRegistro : $idTipoRegistro;
        $idRegistro .= date('Ym',strtotime($fecha));
        $count       = $this->_repository->count($idRegistro);
        if ($count < 9)
            $idRegistro .= '00' . ($count + 1);
        else if ($count < 99)
            $idRegistro .= '0' . ($count + 1);
        else
            $idRegistro .= ($count + 1);
        return $idRegistro;
    }
    public function crearIdDocumento($FechaSolicitud){
        $tiposregistros  = Tiporegistro::find(self::IDTIPOREGISTRO); //DEVOLVERA 4 | COMPENSACION
        $idTregistro     = $tiposregistros->ID;
        $idTipoDocumento = Documento::typeDocumentoByIdTipoRegistro($idTregistro);
        $zonas = $idTipoDocumento->pluck('INITIAL')->unique();
        $initialDocumento = $zonas[0];
        //FECHA SOLO AÑO Y MES
        $fechaSol =explode('-',$FechaSolicitud);
        // 202304
        $anioMes  = $fechaSol[0].''.$fechaSol[1];
        $codigoCreado = $this->_newId($initialDocumento,$idTregistro,$anioMes);
        return $codigoCreado;
    }
    public function obtenerUltimoRegistro(){
        $ultimoReg = FacadesDescanso ::all();
        return $ultimoReg;
    }
    public function pdf($id)
    {
        return $this->_repository->pdf($id);
    }
}