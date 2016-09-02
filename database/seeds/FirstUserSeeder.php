<?php

use Illuminate\Database\Seeder;
use App\Models\UserControl\Group;
use App\Models\UserControl\Permission;
use App\Models\UserControl\User;

class FirstUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $now = Carbon\Carbon::now();

		Group::insert([
			['name' => 'admin', 'created_at' => $now, 'updated_at' => $now],
		]);
	 
		// Basic permissions data
		Permission::insert([
			['name' => 'groupUser.read', 'created_at' => $now, 'updated_at' => $now],
			['name' => 'groupUser.create', 'created_at' => $now, 'updated_at' => $now],
			['name' => 'groupUser.update', 'created_at' => $now, 'updated_at' => $now],
			['name' => 'groupUser.delete', 'created_at' => $now, 'updated_at' => $now],
			['name' => 'user.read', 'created_at' => $now, 'updated_at' => $now],
			['name' => 'user.create', 'created_at' => $now, 'updated_at' => $now],
			['name' => 'user.update', 'created_at' => $now, 'updated_at' => $now],
			['name' => 'user.delete', 'created_at' => $now, 'updated_at' => $now],
		]);
	 
		// Add a permission to a role
		$group = Group::where('name', 'admin')->first();
		$group->addPermission('groupUser.read');
		$group->addPermission('groupUser.create');
		$group->addPermission('groupUser.update');    
		$group->addPermission('groupUser.delete');
		$group->addPermission('user.read');
		$group->addPermission('user.create');
		$group->addPermission('user.update');    
		$group->addPermission('user.delete');
		// ... Add other role permission if necessary
	 
		// Create a user, and give roles
		$user = User::create([
			'name' => 'super admin',
			'email' => 'super@admin.com',
			'password' => bcrypt('admin'),
		]);
	 
		$user->assignGroup('admin');
    }
}
