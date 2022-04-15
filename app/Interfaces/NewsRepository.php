<?php

namespace App\Interfaces;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface AdminRepository.
 *
 * @package namespace App\Interfaces;
 */
interface NewsRepository extends RepositoryInterface
{
    public function getListNews($perPage, $condition = [], $columns = [ '*' ]);
}
