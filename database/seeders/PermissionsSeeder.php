<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		app()[ PermissionRegistrar::class ]->forgetCachedPermissions();

//		Creamos roles
		$adminRole        = Role::create(['name' => 'admin']);
		$collaboratorRole = Role::create(['name' => 'collaborator']);
		$suscriptorRole   = Role::create(['name' => 'suscriptor']);

//		Creamos permisos
		Permission::create(['name' => 'dashboard access']);
		Permission::create(['name' => 'create post']);
		Permission::create(['name' => 'edit post']);
		Permission::create(['name' => 'delete post']);
		Permission::create(['name' => 'create user']);
		Permission::create(['name' => 'edit user']);
		Permission::create(['name' => 'delete user']);

//		Asignamos permisos a roles
//		Admin
		$adminRole->givePermissionTo('dashboard access');
		$adminRole->givePermissionTo('create post');
		$adminRole->givePermissionTo('edit post');
		$adminRole->givePermissionTo('delete post');
		$adminRole->givePermissionTo('create user');
		$adminRole->givePermissionTo('edit user');
		$adminRole->givePermissionTo('delete user');
//		Collaborator
		$collaboratorRole->givePermissionTo('create post');
		$collaboratorRole->givePermissionTo('edit post');
		$collaboratorRole->givePermissionTo('delete post');
	}
}
