<?php
/**
 * Created by PhpStorm.
 * User: liemleitvn
 * Date: 17/11/2018
 * Time: 17:34
 */

namespace App\Services;

use App\Repositories\Contracts\RoleRepositoryInterface;


class GettingRoleService
{
	private $roleRepo;

	public function __construct(RoleRepositoryInterface $roleRepo)
	{
		$this->roleRepo = $roleRepo;
	}

	public function execute($keyword ='', $column ='', $offset = 0, $limit = 10) {
		return $this->roleRepo->get($keyword, $column, $offset, $limit);
	}
}