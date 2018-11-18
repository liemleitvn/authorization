<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role_User extends Model
{

	protected $table = 'role_user';
	protected $primaryKey = 'id';

	protected $fillable = ['user_id', 'role_id'];
}