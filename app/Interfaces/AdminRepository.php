<?php

namespace App\Interfaces;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface AdminRepository.
 *
 * @package namespace App\Interfaces;
 */
interface AdminRepository extends RepositoryInterface
{
    public function getListAdmin($perPage, $condition = [], $columns = [ '*' ]);
    public function getAdminCensor();
}
