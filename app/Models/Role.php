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
		return $this->hasMany(User::class, 'role_id');
	}

	public function permissions() {
		return $this->belongsToMany(Permission::class,'permisson_role', 'role_id', 'permission_id');
	}
}
