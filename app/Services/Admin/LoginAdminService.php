<?php
/**
 * Created by PhpStorm.
 * User: liemleitvn
 * Date: 18/11/2018
 * Time: 09:34
 */

namespace App\Services\Admin;


use App\Repositories\Eloquents\AdminRepository;
use Illuminate\Support\Facades\Hash;

class LoginAdminService
{
	private $adminRepo;
	public function __construct(AdminRepository $adminRepo)
	{
		$this->adminRepo = $adminRepo;
	}

	public function execute($request) {
		$checkEmailLogin =  $this->adminRepo->findBy('email', $request->email);
		if(empty($checkEmailLogin)) {
			return ['email'=>'Email is invalid'];
		}
		$password = Hash::make($request->password);

		dd($password, $checkEmailLogin->password);

		if($password != $checkEmailLogin->password) {
			return ['password'=>'Password is invalid'];
		}
		return [];
	}
}