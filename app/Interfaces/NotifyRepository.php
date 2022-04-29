<?php

namespace App\Interfaces;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface AdminRepository.
 *
 * @package namespace App\Interfaces;
 */
interface NotifyRepository extends RepositoryInterface
{
    public function getListNotify($perPage, $conditions = [], $columns = [ '*' ]);
}
