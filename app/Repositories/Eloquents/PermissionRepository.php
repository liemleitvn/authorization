<?php
/**
 * Created by PhpStorm.
 * User: liemleitvn
 * Date: 22/11/2018
 * Time: 11:48
 */

namespace App\Repositories\Eloquents;


use App\Models\Permission;
use App\Repositories\Contracts\PermissionRepositoryInterface;

class PermissionRepository extends EloquentAbstract implements PermissionRepositoryInterface
{
	protected $model;

	public function __construct(Permission $permission)
	{
		$this->model = $permission;
	}
}