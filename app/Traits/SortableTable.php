<?php

namespace App\Traits;

trait SortableTable
{
	public $sortDirection = "DESC";
	public $sortColumn = "id";

	public function doSort($column)
	{
		if ($this->sortColumn === $column) {
			$this->sortDirection = ($this->sortDirection == 'ASC') ? 'DESC' : 'ASC';
			return;
		}
		$this->sortColumn = $column;
		$this->sortDirection = 'ASC';
	}

	// life cycle hook
	public function updatedPerPage()
	{
		$this->resetPage();
	}

	public function updatedSearch()
	{
		$this->resetPage();
	}
}
