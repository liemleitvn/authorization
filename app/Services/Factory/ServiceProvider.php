<?php
/**
 * Created by PhpStorm.
 * User: liemleitvn
 * Date: 17/11/2018
 * Time: 11:38
 */

namespace App\Services\Factory;


class ServiceProvider
{
	protected function __construct()
	{
		//
	}

	public static function register() {
		return [
			'insert_role'=> \App\Services\Admin\InsertingRoleService::class,
			'get_role'=>\App\Services\Admin\GettingRoleService::class,
			'login_admin'=>\App\Services\Admin\LoginAdminService::class
		];
	}
}