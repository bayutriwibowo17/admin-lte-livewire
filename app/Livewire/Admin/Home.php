<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Beranda Admin')]
class Home extends Component
{
	public function render()
	{
		return view('livewire.admin.home');
	}
}
