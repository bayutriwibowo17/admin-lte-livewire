<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
	Route::get('/login', \App\Livewire\Auth\Login::class)->name('login');
});

Route::middleware(['auth'])->group(function () {
	Route::post('/logout', \App\Livewire\Auth\Logout::class)->name('logout');

	Route::get('/', \App\Livewire\Home::class)->name('home');
	Route::get('/profile', \App\Livewire\Profile::class);
});

Route::prefix('/admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
	Route::get('/', \App\Livewire\Admin\Home::class)->name('home');
	Route::get('/settings', \App\Livewire\Admin\WebsiteSetting::class);
	Route::get('/users', \App\Livewire\Admin\Users\Index::class)->name('users');
});
