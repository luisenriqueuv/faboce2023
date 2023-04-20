<?php

namespace Modules\RecursosHumanos\Repositories;

use Modules\Sistemas\Facades\Conexion;
use Modules\RecursosHumanos\Entities\Personal;

class PersonalRepository
{
    private $model;

    public function __construct(Personal $model)
    {
        $this->model = $model;
    }

    public function all(int $i)
    {
        $con = config("app.consolidado");
        return $i == 1 ?
            $this->model->on($con)
            ->withTrashed()
            ->with([
                'cargo' => function ($query) {
                    $query->select('ID', 'DESCRIPCION')->withTrashed();
                },
                'jerarquia' => function ($query) {
                    $query->select('ID', 'DESCRIPCION')->withTrashed();
                },
                'area' => function ($query) {
                    $query->select('ID', 'CODIGO', 'DESCRIPCION')->withTrashed();
                },
                'formulario' => function ($query) {
                    $query->select('ID', 'NOMBRE')->withTrashed();
                },
                'fabrica' => function ($query) {
                    $query->select('AGECODIGO', 'AGENOMBRE')->withTrashed();
                },
                'agencia' => function ($query) {
                    $query->select('AGECODIGO', 'AGENOMBRE')->withTrashed();
                }
            ])
            ->orderBy('APELLIDO')
            ->get() :
            $this->model->on($con)->get();
    }

    public function find($id)
    {
        $con = config("app.consolidado");
        return $this->model->on($con)->withTrashed()
            ->with([
                'cargo' => function ($query) {
                    $query->select('id', 'descripcion')->withTrashed();
                },
                'jerarquia' => function ($query) {
                    $query->select('id', 'descripcion')->withTrashed();
                },
                'area' => function ($query) {
                    $query->select('id', 'codigo', 'descripcion')->withTrashed();
                },
                'formulario' => function ($query) {
                    $query->select('id', 'nombre')->withTrashed();
                },
                'fabrica' => function ($query) {
                    $query->select('AGECODIGO', 'AGENOMBRE')->withTrashed();
                },
                'agencia' => function ($query) {
                    $query->select('AGECODIGO', 'AGENOMBRE')->withTrashed();
                }
            ])
            ->orderBy('apellido')->find($id);
    }

    public function like($data)
    {
        $con = config("app.consolidado");
        return $this->model->on($con)
            ->where('carnet', 'LIKE', '%' . $data . '%')
            ->orWhere('apellido', 'LIKE', '%' . $data . '%')
            ->orWhere('nombre', 'LIKE', '%' . $data . '%')
            ->get(['carnet', 'apellido', 'nombre']);
    }

    public function store($validated)
    {
        $con = config("app.consolidado");
        $this->model->on($con)->create($validated);
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
    public function nombrePersona($data)
    {
        $con = config("app.consolidado");
        return $this->model->on($con)
            ->where('carnet', '=',$data)
            ->get(['NOMBRE','APELLIDO']);
    }
}
