<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
			'role'=>'required|unique:roles'
        ];
    }

    public function messages()
	{
		return [
			'role.required'=>'Role cannot be empty. Please entry the role before click button add',
			'role.unique'=>'Role is already exist'
		];
	}
}
