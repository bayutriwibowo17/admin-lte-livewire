<?php

namespace App\Http\Middleware;

use App\Enums\Role;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
	 */
	public function handle(Request $request, Closure $next, ...$roles): Response
	{
		// Jika user tidak terautentikasi
		if (!$request->user()) {
			abort(403, 'Anda harus login terlebih dahulu');
		}

		// Konversi string role ke Enum
		$allowedRoles = array_map(function ($role) {
			return Role::from($role);
		}, $roles);

		// Cek apakah role user ada di yang diizinkan
		if (!in_array($request->user()->role, $allowedRoles)) {
			abort(403, 'Anda tidak memiliki akses ke halaman ini');
		}

		return $next($request);
	}
}
