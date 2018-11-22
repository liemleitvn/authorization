<?php
/**
 * Created by PhpStorm.
 * User: liemleitvn
 * Date: 21/11/2018
 * Time: 00:13
 */

namespace App\Repositories\Eloquents;


use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use DB;

class UserRepository extends EloquentAbstract implements UserRepositoryInterface
{
	protected $model;

	public function __construct(User $user)
	{
		$this->model = $user;
	}
}