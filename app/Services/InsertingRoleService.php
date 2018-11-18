<?php
/**
 * Created by PhpStorm.
 * User: liemleitvn
 * Date: 17/11/2018
 * Time: 11:33
 */

namespace App\Services;

use App\Repositories\Contracts\RoleRepositoryInterface;


class InsertingRoleService
{
	private $roleRepo;

	public function __construct(RoleRepositoryInterface $roleRepo)
	{
		$this->roleRepo = $roleRepo;
	}

	public function execute($request) {

		$data = $request->only('role', 'description');

		$result = $this->roleRepo->create($data);

		return $result;
	}
}