<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use App\Traits\SortableTable;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Data pengguna')]
class Index extends Component
{
	use WithPagination, SortableTable;

	public $perPage = 10;
	public $searchName = '';
	public $searchUsername = '';
	public $searchEmail = '';
	public $search = '';

	protected $listeners = ['refresh'];

	public function refresh()
	{
		$this->resetPage();
		$this->reset();
	}

	#[On('delete')]
	public function delete($id)
	{
		try {
			User::find($id)->delete();
			$this->dispatch('alert', type: 'success', message: 'Data berhasil dihapus');
		} catch (\Exception $e) {
			$this->dispatch('alert', type: 'error', message: 'Terjadi kesalahan: ' . $e->getMessage());
		}
	}

	public function render()
	{
		$query = User::query();

		collect([
			'search' => '',
			'searchName' => 'name',
			'searchEmail' => 'email',
			'searchUsername' => 'username',
		])->each(function ($column, $property) use ($query) {
			if (!empty($this->{$property})) {
				$query->search($this->{$property}, $column);
			}
		});

		$users = $query
			->orderBy($this->sortColumn, $this->sortDirection)
			->paginate($this->perPage);

		return view('livewire.admin.users.index', [
			'users' => $users
		]);
	}
}
