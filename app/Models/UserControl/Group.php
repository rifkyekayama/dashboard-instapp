<?php

namespace App\Models\UserControl;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Group extends Model
{
    //
    public function permissions()
	{
		return $this->belongsToMany(Permission::class, 'permission_group');
	}
 
	public function users()
	{
		return $this->belongsToMany(User::class, 'group_user');
	}
 
	public function addPermission($permissionValue)
	{
		if (is_string($permissionValue)) {
			$permission = Permission::where('name', $permissionValue)->first();
			if($permission == null){
				$newPermission = new Permission;
				$newPermission->name = $permissionValue;
				$newPermission->save();
			}
			$permission = Permission::where('name', $permissionValue)->first();
		}
 
		return $this->permissions()->attach($permission);
	}
 
	public function removePermission($permission)
	{
		if (is_string($permission)) {
			$permission = Permission::where('name', $permission)->first();
		}
 
		return $this->permissions()->detach($permission);
	}
}
