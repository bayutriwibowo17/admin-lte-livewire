<?php

namespace Database\Seeders;

use App\Enums\Role;
use App\Models\User;
use App\Models\WebSetting;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 */
	public function run(): void
	{
		$this->_user();
		$this->_website();
	}

	public function _user()
	{
		User::factory(100)->create();

		User::updateOrCreate([
			'name' => 'Admin',
			'username' => 'admin',
			'email' => 'admin@app.com',
			'password' => Hash::make('123'),
			'role' => Role::ADMIN->value,
			'email_verified_at' => now()
		]);
	}

	public function _website()
	{
		WebSetting::updateOrCreate([
			'title' => 'NTBK',
			'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eveniet, nihil sequi sint ipsa repudiandae vitae laborum iusto corporis voluptatum nemo veritatis. Blanditiis, eveniet ducimus?',
			'author' => 'ntbksource'
		]);
	}
}
