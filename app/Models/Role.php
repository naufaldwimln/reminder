<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $fillable = ['nama_user_group'];

	public function users() {
		return $this->belongsToMany('app\Models\User');
	}

	public static function getGrupmenu($id_user_group) {
		$grupmenus = DB::table('group_menus')->where('id_user_group', $id_user_group)->get();
		return $grupmenus;
	}

	public static function updateGrupMenu($status, $id_menu, $id_user_group, $action) {
		$cek = DB::table('group_menus')->where('id_menu', $id_menu)->where('id_user_group', $id_user_group)->first();
		if ($status == 'true') {
			$newRole = '';
			if ($action != 'ROOT') {
				if (isset($cek)) {
					$role = $cek->role;
					$cekrole = strpos($role, $action);

					if($cekrole == false){
						$newRole = $role.$action;
						DB::table('group_menus')->where('id_user_group', $id_user_group)
							->where('id_menu', $id_menu)
							->update([
								'role' => $newRole,
								'updated_at' => \Carbon\Carbon::now(),
							]);
					}
				}
			} else {
				DB::table('group_menus')->insert([
					'id_user_group' => $id_user_group, 
					'id_menu' => $id_menu,
					'role' => 'A',
					'created_at' =>  \Carbon\Carbon::now(), # \Datetime()
					'updated_at' => \Carbon\Carbon::now(),  # \Datetime()
				]);
			}
		} else {
			if ($action != 'ROOT') {
				$newRole = '';
				if(isset($cek)) {
					$role = $cek->role;
					$cekrole = strpos($role, $action);

					if($cekrole != false) {
						$newRole = $role.$action;
						$newRole = str_replace($action,"", $role);
						DB::table('group_menus')->where('id_user_group', $id_user_group)
							->where('id_menu', $id_menu)
							->update([
								'role' => $newRole, 
								'updated_at' => \Carbon\Carbon::now()
							]);
					}
				}
			} else {
				DB::table('group_menus')->where('id_user_group', $id_user_group)->where('id_menu', $id_menu)->delete();
			}
			
		}
		return $newRole;
	 }



	public static function searchRole($keyword){
		$roles = Role::where('nama_user_group', 'LIKE', '%'.$keyword.'%')->paginate(20);
		return $roles;
	}
}
