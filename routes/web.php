<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\GradController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\OrganizationalChartController;
use App\Http\Controllers\AdministrationController;
use App\Livewire\LogoutComponent;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\ManageApps; 
Route::redirect('/', '/login');

Route::post('/logout', function () {
    Auth::logout();
    session()->invalidate();
    session()->regenerateToken();

    return redirect('/login');
})->name('logout');

Route::view('dashboard', 'dashboard')->name('dashboard');
// Route::post('/users/create', [UserController::class, 'store']);

Route::view('profile', 'profile')->middleware(['auth'])->name('profile');

Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);
Route::resource('departements', DepartementController::class);
Route::resource('formations', FormationController::class);
Route::resource('grads', GradController::class);
Route::resource('contracts', ContractController::class);
Route::resource('careers', CareerController::class);

Route::view('organizational', 'organizational.index')->name('maindashboard');
Route::resource('organizational', OrganizationalChartController::class);
Route::get('/administrations', [AdministrationController::class, 'index'])->name('administrations.index');
Route::get('/employee/leaverequest/create', [AdministrationController::class, 'create'])->name('administrations.create');
Route::resource('/employee/leaverequest/status', LeaveController::class);

// Route::resource('roles/create', RoleController::class);
Route::post('/leave/store', [LeaveController::class, 'store'])->name('leave.store');
Route::delete('/leave/{id}', [LeaveController::class, 'destroy'])->name('leave.destroy');
Route::delete('/leave/{id}/edit', [LeaveController::class, 'edit'])->name('leave.edit');

Route::resource('manageapps', ManageApps::class);
Route::patch('leave/{leave}/accept', [LeaveController::class, 'accept'])->name('leave.accept');
Route::patch('leave/{leave}/refuse', [LeaveController::class, 'refuse'])->name('leave.refuse');


Route::resource('permissions', PermissionController::class);
require __DIR__.'/auth.php';                               

