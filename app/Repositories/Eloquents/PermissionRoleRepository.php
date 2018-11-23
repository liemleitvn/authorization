<?php
/**
 * Created by PhpStorm.
 * User: liemleitvn
 * Date: 22/11/2018
 * Time: 14:31
 */

namespace App\Repositories\Eloquents;


use App\Models\PermissionRole;
use App\Repositories\Contracts\PermissionRoleRepositoryInterface;

class PermissionRoleRepository extends EloquentAbstract implements PermissionRoleRepositoryInterface
{
	protected $model;

	public function __construct(PermissionRole $permissionRole)
	{
		$this->model = $permissionRole;
	}
}