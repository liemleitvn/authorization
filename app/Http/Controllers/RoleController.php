<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;

class RoleController extends Controller
{
    public function __construct()
	{

	}

	public function index() {
    	$roles = service('get_role')->execute();
		return view('inserting-role', compact('roles'));
	}

	public function store(RoleRequest $request) {

		$request->flashOnly('role','description');

		$result = service('insert_role')->execute($request);

    	if($result->name === $result->name) {
			return redirect()->route('roles.show')->with(['resultInserting'=>$result]);
		}
	}
}
