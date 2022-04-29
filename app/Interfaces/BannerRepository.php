<?php

namespace App\Interfaces;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface AdminRepository.
 *
 * @package namespace App\Interfaces;
 */
interface BannerRepository extends RepositoryInterface
{
    public function getListBanner($perPage, $conditions = [], $columns = [ '*' ]);
}
