<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		User::create([
			'name'     => 'Admin user',
			'email'    => 'admin@gmail.com',
			'image'    => 'avatar-default.png',
			'password' => Hash::make('asdf1234')
		])->assignRole('admin');
		
		User::create([
			'name'     => 'Collaborator user',
			'email'    => 'collaborator@gmail.com',
			'image'    => 'avatar-default.png',
			'password' => Hash::make('asdf1234')
		])->assignRole('collaborator');
		
		User::create([
			'name'     => 'Subscriber user',
			'email'    => 'subscriber@gmail.com',
			'image'    => 'avatar-default.png',
			'password' => Hash::make('asdf1234')
		])->assignRole('subscriber');
	}
}