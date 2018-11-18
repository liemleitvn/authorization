<?php
/**
 * Created by PhpStorm.
 * User: liemleitvn
 * Date: 17/11/2018
 * Time: 11:28
 */

namespace App\Repositories\Contracts;


interface RoleRepositoryInterface
{
	public function get($keyword,$column, $offset, $limit);
}