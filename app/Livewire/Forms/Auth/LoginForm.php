<?php

namespace App\Livewire\Forms\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class LoginForm extends Form
{
	#[Rule('required|string')]
	public $username;
	#[Rule('required|string')]
	public $password;

	public $remember = false;

	public function store()
	{
		$this->validate();

		// Coba login
		if (Auth::attempt([
			'username' => $this->username,
			'password' => $this->password,
		], $this->remember)) {
			// Redirect ke home kalo berhasil
			flash('Selamat datang!');
			return redirect()->route('home');
		}

		// Kalo gagal, kasih error
		$this->addError('username', 'Username atau password salah.');
	}
}
