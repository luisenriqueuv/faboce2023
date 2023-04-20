<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;

abstract class BaseRepository
{

    protected $model;
    protected $query;
    protected $take;
    protected $with = array();
    protected $joins = array();
    protected $wheres = array();
    protected $whereIns = array();
    protected $orderBys = array();
    protected $scopes = array();
    protected $db;

    public function setConnection($db)
    {
        $this->db = $db;
    }

    public function all($select = ['*'])
    {
        $this->newQuery()->eagerLoad()->setClauses()->setScopes();
        $models = $this->query->get($select);
        $this->unsetClauses();
        return $models;
    }

    public function count()
    {
        return $this->all()->count();
    }

    public function create(array $data)
    {
        $this->newQuery();
        return $this->query->create($data);
    }

    public function createMultiple(array $data)
    {
        $models = new Collection();
        foreach ($data as $d) {
            $models->push($this->create($d));
        }
        return $models;
    }

    public function delete()
    {
        $this->newQuery()->setClauses()->setScopes();
        $result = $this->query->delete();
        $this->unsetClauses();
        return $result;
    }

    public function destroy($id)
    {
        $this->unsetClauses();
        return $this->get($id)->delete();
    }

    public function deleteMultipleById(array $ids)
    {
        return $this->model->destroy($ids);
    }

    public function first()
    {
        $this->newQuery()->eagerLoad()->setClauses()->setScopes();
        $model = $this->query->first();
        $this->unsetClauses();
        return $model;
    }

    public function get($id)
    {
        $this->unsetClauses();
        $this->newQuery()->eagerLoad();
        return $this->query->find($id);
    }

    public function limit($limit)
    {
        $this->take = $limit;
        return $this;
    }

    public function orderBy($column, $direction = 'asc')
    {
        $this->orderBys[] = compact('column', 'direction');
        return $this;
    }

    public function update(array $data, $id)
    {
        $this->unsetClauses();
        $model = $this->get($id);
        $model->update($data);
        return $model;
    }

    public function join($db, $valuea, $valueb, $operator = '=')
    {
        $this->joins[] = compact('db', 'valuea', 'valueb', 'operator');
        return $this;
    }

    public function where($column, $value, $operator = '=')
    {
        $this->wheres[] = compact('column', 'value', 'operator');
        return $this;
    }

    public function whereIn($column, $values)
    {
        $values = is_array($values) ? $values : array($values);
        $this->whereIns[] = compact('column', 'values');
        return $this;
    }

    public function with($relations)
    {
        if (is_string($relations)) $relations = func_get_args();
        $this->with = $relations;
        return $this;
    }

    protected function newQuery()
    {
        $this->query = $this->model->on($this->db)->newQuery();
        return $this;
    }

    protected function eagerLoad()
    {
        foreach ($this->with as $relation) {
            $this->query->with($relation);
        }
        return $this;
    }

    protected function setClauses()
    {
        foreach ($this->joins as $join) {
            $this->query->join($join['db'], $join['valuea'], $join['operator'], $join['valueb']);
        }
        foreach ($this->wheres as $where) {
            $this->query->where($where['column'], $where['operator'], $where['value']);
        }
        foreach ($this->whereIns as $whereIn) {
            $this->query->whereIn($whereIn['column'], $whereIn['values']);
        }
        foreach ($this->orderBys as $orders) {
            $this->query->orderBy($orders['column'], $orders['direction']);
        }
        if (isset($this->take) and !is_null($this->take)) {
            $this->query->take($this->take);
        }
        return $this;
    }

    protected function setScopes()
    {
        foreach ($this->scopes as $method => $args) {
            $this->query->$method(implode(', ', $args));
        }
        return $this;
    }

    protected function unsetClauses()
    {
        $this->wheres   = array();
        $this->whereIns = array();
        $this->scopes   = array();
        $this->take     = null;
        return $this;
    }
}
