<?php

namespace App\Livewire\Admin\Users;

use App\Livewire\Forms\Admin\UsersForm;
use App\Models\User;
use Livewire\Component;

class EditModal extends Component
{
	public UsersForm $form;
	public $showModal = false;

	protected $listeners = ['openEditModal' => 'openModal'];

	public function openModal($id)
	{
		$this->resetErrorBag();
		$user = User::findOrFail($id);
		$this->form->setUser($user);
		$this->showModal = true;
	}

	public function closeModal()
	{
		$this->showModal = false;
		$this->form->reset();
		$this->resetErrorBag();
	}

	public function save()
	{
		$this->form->validate();
		try {
			$this->form->update();
			$this->dispatch('refresh', to: Index::class);
			$this->dispatch('alert', type: 'success', message: 'Data berhasil disimpan');
			$this->closeModal();
		} catch (\Illuminate\Database\QueryException $e) {
			$this->dispatch('alert', type: 'error', message: 'Terjadi kesalahan database: ' . $e->getMessage());
		} catch (\Exception $e) {
			$this->dispatch('alert', type: 'error', message: 'Terjadi kesalahan tak terduga: ' . $e->getMessage());
		}
	}

	public function render()
	{
		return view('livewire.admin.users.edit-modal');
	}
}
