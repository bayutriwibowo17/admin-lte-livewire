<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Pengaturan akun')]
class Profile extends Component
{
	public $username;
	public $email;
	public $name;
	public $new_password = '';
	public $new_password_confirmation = '';

	public function mount()
	{
		$this->username = user()->username;
		$this->email = user()->email;
		$this->name = user()->name;
	}

	public function rules()
	{
		$rules = [
			'name' => 'required|min:6',
		];

		if ($this->new_password) {
			$rules['new_password'] = 'required|min:6|confirmed';
		}

		return $rules;
	}

	public function validationAttributes()
	{
		return [
			'name' => 'Nama lengkap',
			'new_password' => 'Password baru',
		];
	}


	public function save()
	{
		$this->validate($this->rules());
		if ($this->name == user()->name && empty($this->new_password)) {
			return $this->dispatch('alert', type: 'error', message: 'Tidak ada perubahan data');
		}
		try {
			$updateData['name'] = $this->name;
			if ($this->new_password) {
				$updateData['password'] = Hash::make($this->new_password);
			}

			User::where('id', user()->id)->update($updateData);

			$this->reset(['new_password', 'new_password_confirmation']);
			$this->dispatch('alert', type: 'success', message: 'Data berhasil disimpan');
		} catch (\Illuminate\Database\QueryException $e) {
			$this->dispatch('alert', type: 'error', message: 'Terjadi kesalahan database: ' . $e->getMessage());
		} catch (\Exception $e) {
			$this->dispatch('alert', type: 'error', message: 'Terjadi kesalahan tak terduga: ' . $e->getMessage());
		}
	}

	public function render()
	{
		return view('livewire.profile');
	}
}
