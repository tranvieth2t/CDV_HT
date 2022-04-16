<?php

namespace App\Services;

use App\Traits\Logging;
use Illuminate\Support\Facades\Storage;

/**
 * Class BaseService.
 *
 * @package namespace App\Http\Controllers;
 */
class BaseService
{
    use Logging;
    /**
     * @var Repository
     */
    protected $repository;

    public function all($columns = array('*'))
    {
        return $this->repository->all($columns);
    }

    public function first($columns = array('*'))
    {
        return $this->repository->first($columns);
    }

    public function paginate($limit = null, $columns = ['*'])
    {
        return $this->repository->paginate($limit, $columns);
    }

    public function find($id, $columns = ['*'])
    {
        return $this->repository->find($id, $columns);
    }

    public function findByField($field, $value, $columns = ['*'])
    {
        return $this->repository->findByField($field, $value, $columns);
    }

    public function findWhere(array $where, $columns = ['*'])
    {
        return $this->repository->findWhere($where, $columns);
    }

    public function findWhereIn($field, array $where, $columns = ['*'])
    {
        return $this->repository->findWhereIn($field, $where, $columns);
    }

    public function findWhereNotIn($field, array $where, $columns = ['*'])
    {
        return $this->repository->findWhereNotIn($field, $where, $columns);
    }

    public function findWhereBetween($field, array $where, $columns = ['*'])
    {
        return $this->repository->findWhereBetween($field, $where, $columns);
    }

    public function create(array $attributes)
    {
        return $this->repository->create($attributes);
    }

    public function update(array $attributes, $id)
    {
        return $this->repository->update($attributes, $id);
    }

    public function updateOrCreate(array $attributes, array $values = [])
    {
        return $this->repository->updateOrCreate($attributes, $values);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }

    public function deleteWhere(array $where)
    {
        return $this->repository->deleteWhere($where);
    }

    public function orderBy($column, $direction = 'asc')
    {
        return $this->repository->orderBy($column, $direction);
    }

    public function scopeQuery(\Closure $scope)
    {
        return $this->repository->scopeQuery($scope);
    }
}
