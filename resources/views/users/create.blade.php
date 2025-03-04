<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f5f5f5;
        }
        .container {
            max-width: 800px;
            margin-top: 50px;
            padding: 30px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .form-label {
            font-weight: bold;
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4 text-primary"><i class="fas fa-user-plus"></i> Add New User</h1>
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
           

            <!-- First Name -->
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" required>
            </div>

            <!-- Last Name -->
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" required>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <!-- Department -->
            <div class="mb-3">
                <label for="departement_id" class="form-label">Department</label>
                <select class="form-select" id="departement_id" name="departement_id">
                    <option value="">Select Department</option>
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Role -->
            <div class="mb-3">
                <label for="role_id" class="form-label">Role</label>
                <select class="form-select" id="role_id" name="role_id">
                    <option value="">Select Role</option>
                    @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Grade -->
            <div class="mb-3">
                <label for="grad_id" class="form-label">Grade</label>
                <select class="form-select" id="grad_id" name="grad_id">
                <option value="">Select Grad</option>
                    @foreach($grads as $grad)
                    <option value="{{ $grad->id }}">{{ $grad->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Contract -->
            <div class="mb-3">
                <label for="contract_id" class="form-label">Contract</label>
                <select class="form-select" id="contract_id" name="contract_id">
                    <option value="">Select Contract</option>
                    <option value="1">Full-Time</option>
                    <option value="2">Part-Time</option>
                    <option value="3">Freelance</option>
                </select>
            </div>

            <!-- Salary -->
            <div class="mb-3">
                <label for="salary" class="form-label">Salary</label>
                <input type="number" class="form-control" id="salary" name="salary" required>
            </div>

            <!-- Remember Token (optional) -->
            <div class="mb-3">
                <label for="remember_token" class="form-label">Remember Token</label>
                <input type="text" class="form-control" id="remember_token" name="remember_token">
            </div>

            <!-- Created at (read-only) -->
            <div class="mb-3">
                <label for="created_at" class="form-label">Created At</label>
                <input type="text" class="form-control" id="created_at" name="created_at" value="{{ now() }}" disabled>
            </div>

            <!-- Updated at (read-only) -->
            <div class="mb-3">
                <label for="updated_at" class="form-label">Updated At</label>
                <input type="text" class="form-control" id="updated_at" name="updated_at" value="{{ now() }}">
            </div>


            <!-- Submit Button -->
            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save User and Graduation Info</button>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
