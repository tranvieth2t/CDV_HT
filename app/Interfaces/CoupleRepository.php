<?php

namespace App\Interfaces;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface AdminRepository.
 *
 * @package namespace App\Interfaces;
 */
interface CoupleRepository extends RepositoryInterface
{
    public function getListCouple($perPage, $conditions = [], $columns = [ '*' ]);
}
