<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
	use AuthenticatesUsers;

	protected $guard = 'admin';

	protected $redirectTo = null;

	public function __construct()
	{
//		$this->redirectTo = route('admin.dashboard');
		$this->middleware('guest:admin', ['except' => ['logout']]);
	}


	protected function guard()
	{
		return Auth::guard('admin');
	}

	public function index()
	{

		return view('admin.auth.login');
	}

	public function login(Request $request) {
		dd($request->all());
	}
}
