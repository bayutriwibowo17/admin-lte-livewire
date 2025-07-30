<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Logout extends Component
{
	public function logout()
	{
		try {
			Auth::logout();
			session()->invalidate();
			session()->regenerateToken();
			$this->dispatch('alert', type: 'success', message: 'Terimakasih...');
			return redirect()->to('/login');
		} catch (\Exception $e) {
			$this->dispatch('alert', type: 'error', message: 'Logout gagal: ' . $e->getMessage());
		}
	}

	public function render()
	{
		return view('livewire.auth.logout');
	}
}
