<?php

use App\Models\WebSetting;
use Illuminate\Support\Facades\Auth;

if (!function_exists('user')) {
	function user()
	{
		return Auth::user();
	}
}

if (!function_exists('dataWeb')) {
	function dataWeb()
	{
		return WebSetting::first();
	}
}

if (!function_exists('activeStateMenu')) {
	function activeStateMenu($route)
	{
		return request()->is($route) ? 'active' : '';
	}
}
