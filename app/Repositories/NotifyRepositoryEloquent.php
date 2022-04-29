<?php

namespace App\Repositories;

use App\Enums\NotifyVerify;
use App\Enums\ParentCommunity;
use App\Interfaces\NotifyRepository;
use App\Models\Notify;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Eloquent\BaseRepository;
use App\Enums\Community;
use DB;

/**
 * Class AdminRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class NotifyRepositoryEloquent extends BaseRepository implements NotifyRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Notify::class;
    }

    /**
     * @param $perPage
     * @param $condition
     * @param $columns
     * @return mixed
     */

    public function getListNotify($perPage, $conditions = [], $columns = ['*'])
    {
        return $this->model
            ->with('admin', 'community')
            ->orderByDesc('created_at')->paginate(20);
    }
}
