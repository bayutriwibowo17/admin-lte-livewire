<?php

namespace App\Livewire\Admin\Users;

use App\Livewire\Forms\Admin\UsersForm;
use Livewire\Component;

class CreateModal extends Component
{
	public UsersForm $form;
	public $showModal = false;

	protected $listeners = ['openCreateModal' => 'openModal'];

	public function openModal()
	{
		$this->resetErrorBag();
		$this->form->reset();
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
			$this->form->store();
			$this->dispatch('refresh', to: Index::class);
			$this->closeModal();
			$this->dispatch('alert', type: 'success', message: 'Data berhasil disimpan');
		} catch (\Illuminate\Database\QueryException $e) {
			$this->dispatch('alert', type: 'error', message: 'Terjadi kesalahan database: ' . $e->getMessage());
		} catch (\Exception $e) {
			$this->dispatch('alert', type: 'error', message: 'Terjadi kesalahan tak terduga: ' . $e->getMessage());
		}
	}

	public function render()
	{
		return view('livewire.admin.users.create-modal');
	}
}
