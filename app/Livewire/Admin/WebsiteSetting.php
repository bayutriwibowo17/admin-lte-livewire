<?php

namespace App\Livewire\Admin;

use App\Models\WebSetting;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Pengaturan website')]
class WebsiteSetting extends Component
{
	public $title;
	public $description;
	public $author;

	public function mount()
	{
		$this->title = dataWeb()->title;
		$this->description = dataWeb()->description;
		$this->author = dataWeb()->author;
	}

	public function rules()
	{
		$rules = [
			'title' => 'required|string|min:4',
			'description' => 'required',
		];

		return $rules;
	}

	public function validationAttributes()
	{
		return [
			'title' => 'Judul Website',
			'description' => 'Deskripsi Website',
		];
	}


	public function save()
	{
		$this->validate($this->rules());
		try {
			WebSetting::first()->update([
				'title' => $this->title,
				'description' => $this->description
			]);
			$this->dispatch('alert', type: 'success', message: 'Data berhasil disimpan');
		} catch (\Illuminate\Database\QueryException $e) {
			$this->dispatch('alert', type: 'error', message: 'Terjadi kesalahan database: ' . $e->getMessage());
		} catch (\Exception $e) {
			$this->dispatch('alert', type: 'error', message: 'Terjadi kesalahan tak terduga: ' . $e->getMessage());
		}
	}

	public function render()
	{
		return view('livewire.admin.website-setting');
	}
}
