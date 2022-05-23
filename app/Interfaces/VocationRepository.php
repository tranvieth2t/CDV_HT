<?php

namespace App\Interfaces;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface VocationRepository.
 *
 * @package namespace App\Interfaces;
 */
interface VocationRepository extends RepositoryInterface
{
    public function getListVocation($perPage, $conditions = [], $columns = [ '*' ]);
}
