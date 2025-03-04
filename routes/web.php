<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\GradController;
Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')->name('dashboard');
// Route::post('/users/create', [UserController::class, 'store']);

Route::view('profile', 'profile')->middleware(['auth'])->name('profile');

Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);
Route::resource('departements', DepartementController::class);
Route::resource('formations', FormationController::class);
Route::resource('grads', GradController::class);

// Route::resource('roles/create', RoleController::class);
Route::resource('permissions', PermissionController::class);
require __DIR__.'/auth.php';                               

