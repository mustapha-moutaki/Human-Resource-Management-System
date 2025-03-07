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
- [Notifications](#notifications)

---

## Authentication Routes
- `/` → Redirects to the login page.
- `POST /logout` → Logs out the authenticated user and redirects to login.

## Dashboard & Profile
- `GET /dashboard` → Displays the dashboard view.
- `GET /profile` → Displays the user profile (requires authentication).

## User Management
- `GET, POST, PUT, DELETE /users` → Resource routes for user management.
- `PUT /users/{userId}/update` → Updates user formation details.
- `PUT /users/{user}` → Updates user information.

## Role & Permission Management
- `GET, POST, PUT, DELETE /roles` → Resource routes for role management (Admin only).
- `GET, POST, PUT, DELETE /permissions` → Resource routes for permission management.

## Departments Management
- `GET, POST, PUT, DELETE /departements` → Resource routes for department management (Admin only).

## Career & Formation Management
- `GET, POST, PUT, DELETE /careers` → Resource routes for career management.
- `GET, POST, PUT, DELETE /formations` → Resource routes for formations (HR & Admin only).

## Contract Management
- `GET, POST, PUT, DELETE /contracts` → Resource routes for contract management (HR & Admin only).

## Graduation & Leave Management
- `GET, POST, PUT, DELETE /grads` → Resource routes for managing graduations (Manager, HR & Admin only).
- `PATCH /leave/{leave}/accept` → Accepts a leave request.
- `PATCH /leave/{leave}/refuse` → Refuses a leave request.
- `POST /leave/store` → Stores a leave request.
- `DELETE /leave/{id}` → Deletes a leave request.
- `DELETE /leave/{id}/edit` → Edits a leave request.

## Organizational Chart Management
- `GET, POST, PUT, DELETE /organizational` → Resource routes for managing organizational charts (Manager, HR & Admin only).

## Employee Leave Requests
- `GET /employee/leaverequest/create` → Employee creates a leave request.
- `GET, POST, PUT, DELETE /employee/leaverequest/status` → Employee leave request status management.
- `GET /administrations` → Displays all leave requests.

## Notifications
- `GET /notifications` → Displays all notifications.
- `POST /notifications/mark-as-read` → Marks notifications as read.

---

## Middleware Restrictions
- **Admin Only:** Roles & Departments management.
- **HR & Admin:** Formations & Contracts management.
- **Manager, HR & Admin:** Graduation & Organizational Chart management.
- **Employee:** Leave request creation and status tracking.

---

## Authentication Requirement
These routes require authentication:
- Profile
- User management
- Dashboard
- Notifications
- Leave requests

---

## Setup Instructions
1. Clone the repository: `git clone your-repository-url`
2. Install dependencies: `composer install`
3. Setup `.env` file and configure database connection
4. Run migrations: `php artisan migrate`
5. Seed the database (if needed): `php artisan db:seed --class=UserSeeder`
6. Start the application: `php artisan serve`

---

For more details, refer to the Laravel documentation: [https://laravel.com/docs](https://laravel.com/docs).

