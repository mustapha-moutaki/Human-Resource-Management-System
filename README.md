# Laravel Application Routes

This document provides an overview of the routes defined in your Laravel application and their respective functionalities.

## Table of Contents
- [Authentication Routes](#authentication-routes)
- [Dashboard & Profile](#dashboard--profile)
- [User Management](#user-management)
- [Role & Permission Management](#role--permission-management)
- [Departments Management](#departments-management)
- [Career & Formation Management](#career--formation-management)
- [Contract Management](#contract-management)
- [Graduation & Leave Management](#graduation--leave-management)
- [Organizational Chart Management](#organizational-chart-management)
- [Employee Leave Requests](#employee-leave-requests)
- [Notifications](#notifications)

---

## Authentication Routes
- `/` → Redirects to the login page.
- `POST /logout` → Logs out the authenticated user and redirects to login.

## Dashboard & Profile
- `GET /dashboard` → Displays the dashboard view.
- `GET /profile` → Displays the user profile.

## User Management
- `GET, POST, PUT, DELETE /users` → Resource routes for user management.
- `PUT /users/{userId}/update` → Updates user formation details.
- `PUT /users/{user}` → Updates user information.

## Role & Permission Management
- `GET, POST, PUT, DELETE /roles` → Resource routes for role management.
- `GET, POST, PUT, DELETE /permissions` → Resource routes for permission management.

## Departments Management
- `GET, POST, PUT, DELETE /departements` → Resource routes for department management.

## Career & Formation Management
- `GET, POST, PUT, DELETE /careers` → Resource routes for career management.
- `GET, POST, PUT, DELETE /formations` → Resource routes for formations.

## Contract Management
- `GET, POST, PUT, DELETE /contracts` → Resource routes for contract management.

## Graduation & Leave Management
- `GET, POST, PUT, DELETE /grads` → Resource routes for managing grads.
- `PATCH /leave/{leave}/accept` → Accepts a leave request.
- `PATCH /leave/{leave}/refuse` → Refuses a leave request.
- `POST /leave/store` → Stores a leave request.
- `DELETE /leave/{id}` → Deletes a leave request.
- `DELETE /leave/{id}/edit` → Edits a leave request.

## Organizational Chart Management
- `GET, POST, PUT, DELETE /organizational` → Resource routes for managing organizational charts.

## Employee Leave Requests
- `GET /employee/leaverequest/create` → Employee creates a leave request.
- `GET, POST, PUT, DELETE /employee/leaverequest/status` → Employee leave request status management.
- `GET /administrations` → Displays all leave requests.

## Notifications
- `GET /notifications` → Displays all notifications.

---

## Database Seeding
To seed necessary data, use the following commands:
```sh
php artisan db:seed --class=PermissionSeeder
php artisan db:seed --class=RoleSeeder
php artisan db:seed --class=UserSeeder
```

---

## Setup Instructions
1. Clone the repository: `git clone your-repository-url`
2. Install dependencies: `composer install`
3. Setup `.env` file and configure database connection
4. Run migrations: `php artisan migrate`
5. Seed the database (if needed): `php artisan db:seed --class=UserSeeder`
6. Start the application: `php artisan serve`

---

## Routes Definition
```php


//login
Route::redirect('/', '/login');
Route::post('/logout', function () {
    Auth::logout();
    session()->invalidate();
    session()->regenerateToken();
    return redirect('/login');
});
Route::view('dashboard', 'dashboard');
//profile
Route::view('profile', 'profile');
//role
Route::resource('roles', RoleController::class);
//deparetment
Route::resource('departements', DepartementController::class);
//user
Route::resource('users', UserController::class);
Route::put('/users/{user}', [UserController::class, 'update']);
Route::get('/reset-password/{token}', [UserController::class, 'showResetForm']);
Route::post('/reset-password', [UserController::class, 'updatePassword']);
//career
Route::resource('careers', CareerController::class);
//notification
Route::get('/notifications', [NotificationController::class, 'showAllNotifications']);
//formation
Route::resource('formations', FormationController::class);
//contract
Route::resource('contracts', ContractController::class);
//grad
Route::resource('grads', GradController::class);
//leaves
Route::resource('manageapps', ManageApps::class);
//user & formation
Route::put('/users/{userId}/update', [UserFormationController::class, 'update']);
//organizational(Organigramme)
Route::resource('organizational', OrganizationalChartController::class);
//leave request
Route::get('/employee/leaverequest/create', [AdministrationController::class, 'create']);
Route::patch('leave/{leave}/accept', [LeaveController::class, 'accept']);
Route::patch('leave/{leave}/refuse', [LeaveController::class, 'refuse']);
Route::resource('/employee/leaverequest/status', LeaveController::class);
Route::get('/administrations', [LeaveController::class, 'index']);
Route::post('/leave/store', [LeaveController::class, 'store']);
Route::delete('/leave/{id}', [LeaveController::class, 'destroy']);
Route::delete('/leave/{id}/edit', [LeaveController::class, 'edit']);
//permissions
Route::resource('permissions', PermissionController::class);

```