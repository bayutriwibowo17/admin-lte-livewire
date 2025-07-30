<?php

namespace App\Livewire\Forms\Admin;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Enum;
use Livewire\Form;

class UsersForm extends Form
{
	public ?User $user = null;
	public $name = '';
	public $username = '';
	public $email = '';
	public $role = '';
	public $password = '';
	public $password_confirmation = '';

	public function setUser(User $user)
	{
		$this->user = $user;
		$this->name = $user->name;
		$this->username = $user->username;
		$this->email = $user->email;
		$this->role = $user->role->value;
	}

	public function rules()
	{
		$rules = [
			'name' => 'required|min:3',
			'username' => 'required|min:3|unique:users,username,' . ($this->user->id ?? 'NULL'),
			'email' => 'required|email|unique:users,email,' . ($this->user->id ?? 'NULL'),
			'role' => ['required', new Enum(Role::class)]
		];

		if (!$this->user || $this->password) {
			$rules['password'] = 'required|min:6|confirmed';
		}

		return $rules;
	}

	public function validationAttributes()
	{
		return [
			'name' => 'Nama lengkap',
			'username' => 'Username',
			'email' => 'Email',
		];
	}

	public function store()
	{
		User::create([
			'name' => $this->name,
			'username' => str()->lower($this->username),
			'email' => $this->email,
			'role' => Role::from($this->role),
			'password' => Hash::make($this->password)
		]);
		$this->reset();
	}

	public function update()
	{
		$this->user->update([
			'name' => $this->name,
			'username' => str()->lower($this->username),
			'email' => $this->email,
			'role' => Role::from($this->role),
			'password' => $this->password ? Hash::make($this->password) : $this->user->password,
		]);

		$this->reset();
	}
}
