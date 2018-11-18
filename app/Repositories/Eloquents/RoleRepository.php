<?php
/**
 * Created by PhpStorm.
 * User: liemleitvn
 * Date: 17/11/2018
 * Time: 11:29
 */

namespace App\Repositories\Eloquents;

use App\Models\Role;
use App\Repositories\Contracts\RoleRepositoryInterface;


class RoleRepository extends EloquentAbstract implements RoleRepositoryInterface
{
	protected $model;

	public function __construct(Role $role)
	{
		$this->model = $role;
	}

	public function get($keyword = '',$column = '', $offset = 0, $limit = 10)
	{
		if($keyword == "") {
			return $this->model->skip($offset)->take($limit)->orderBy('created_at', 'desc')->get();
		}

		$result = $this->model->where(function ($query) use ($keyword, $column) {
			$query->where($column, 'like', "%{$keyword}%");
		})->skip($offset)->take($limit)->orderBy('created_at', 'desc')->get();

		return $result;
	}
}