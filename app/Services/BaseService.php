<?php

namespace App\Services;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

abstract class BaseService
{
    /**
     * @type Model
     */
    protected $model;

    private static $me = null;


    public static function getMe()
    {
        if (static::$me) {
            return static::$me;
        }

        foreach (config('auth.guards') as $guardName => $guard) {
            if (auth($guardName)->check() === false) {
                continue;
            }
            static::$me = auth($guardName)->user();
            break;
        }

        return static::$me;
    }

    /**
     * @param int $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index($request, $limit = 25)
    {
        if ($limit === 0) {
            $limit = $this->query()->count();
        }
        return $this->query()
            ->paginate($limit);
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|Model|null
     */
    public function show($id)
    {
        return $this->query()
            ->findOrFail($id);
    }

    /**
     * @param $request
     * @return \Illuminate\Database\Eloquent\Builder|Model
     */
    public function store($request)
    {
        return $this->query()
            ->create($request);
    }

    /**
     * @param int $id
     * @param $request
     * @return bool|int
     */
    public function update($request, $id)
    {
        return $this->query()
            ->findOrFail($id)
            ->update($request);
//            ->update($request->validated());
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $this->query()->findOrFail($id)->delete();
        return redirect()->back();
    }

    /**
     * @param $arrayData
     */
    public function createByArray(array $arrayData)
    {
        return $this->query()->create($arrayData);
    }

    /**
     * @return Builder
     */
    public function query()
    {
        return $this->model::query();
    }

    public function pluck()
    {
        return $this->query()->select(['id', 'name'])->pluck('name', 'id');
    }

    public function find($id)
    {
        return $this->query()->findOrFail($id);
    }

    /**
     * Create pagination from array
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function findByField($field, $value, $columns = ['*'])
    {
        return $this->query()->where($field, $value)->get();
    }
    public function getByConditions(array $condition)
    {
        return $this->query()->where($condition)->get();
    }
}
