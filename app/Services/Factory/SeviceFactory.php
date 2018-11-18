<?php
/**
 * Created by PhpStorm.
 * User: liemleitvn
 * Date: 17/11/2018
 * Time: 11:42
 */

namespace App\Services\Factory;


class SeviceFactory
{
	protected function __construct()
	{
		//
	}

	public static function create($provider) {
		$providers = ServiceProvider::register();

		if(!isset($providers[$provider])) {
			throw new \Exception("Provider {$provider} is not set in ServiceProvider class");
		}

		$className = $providers[$provider];

		if(!class_exists($className)) {
			throw new \Exception("Class {$className} is not found");
		}

		return app($className);
	}
}