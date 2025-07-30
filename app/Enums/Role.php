<?php

namespace App\Enums;

enum Role: string
{
	case ADMIN = 'admin';
	case USER = 'user';

	// Method untuk mendapatkan label yang lebih user-friendly
	public function label(): string
	{
		return match ($this) {
			self::ADMIN => 'Administrator',
			self::USER => 'Pengguna',
		};
	}

	// Method untuk validasi role yang boleh di-assign
	public static function assignableRoles(): array
	{
		return [
			self::USER,
		];
	}
}
