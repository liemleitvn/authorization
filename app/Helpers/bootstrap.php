<?php
/**
 * Created by PhpStorm.
 * User: liemleitvn
 * Date: 17/11/2018
 * Time: 11:50
 */

function service ($provider) {
	return \App\Services\Factory\SeviceFactory::create($provider);
}

