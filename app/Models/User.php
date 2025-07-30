<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\Role;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
	/** @use HasFactory<\Database\Factories\UserFactory> */
	use HasFactory, Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var list<string>
	 */
	protected $guarded = [
		'id',
	];

	/**
	 * The attributes that should be hidden for serialization.
	 *
	 * @var list<string>
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];

	/**
	 * Get the attributes that should be cast.
	 *
	 * @return array<string, string>
	 */
	protected function casts(): array
	{
		return [
			'email_verified_at' => 'datetime',
			'password' => 'hashed',
			'role' => Role::class,
		];
	}

	public function scopeSearch(Builder $query, string $searchTerm = '', string $searchColumn = '')
	{
		return $query->when($searchTerm, function ($q) use ($searchTerm, $searchColumn) {
			$columns = ['name', 'username', 'email'];

			if (in_array($searchColumn, $columns)) {
				// Search kolom spesifik
				$q->where($searchColumn, 'like', '%' . $searchTerm . '%');
			} else {
				// Search semua kolom
				foreach ($columns as $column) {
					$q->orWhere($column, 'like', '%' . $searchTerm . '%');
				}
			}
		});
	}
}
