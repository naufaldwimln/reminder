<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Model
{
    protected $fillable = ['name', 'email', 'email_verified_at', 'id_user_group', 'remember_token', 'password'];
    
    protected $hidden = [
		'password', 'remember_token',
	];

    public function menus() {
		return $this->belongsToMany('app\Models\Menu');
	}

	public function role() {
		return $this->hasOne('app\Models\Role');
	}

	public function group_menus() {
		return $this->belongsToMany('Modules\GroupMenu\Entities\GroupMenu', 'id_user_group');
	}
}
