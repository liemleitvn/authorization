<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $table = 'roles';

	protected $primaryKey = 'id';

	protected $fillable = ['role','description'];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [];

	public function users() {
		return $this->belongsToMany(User::class, 'role_user', 'role_id', 'user_id');
	}
}
