@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10 p-6 bg-white rounded-lg shadow-lg">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Edit User</h1>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- First Name -->
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">First Name</label>
            <input type="text" name="first_name" class="form-input mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50" value="{{ old('first_name', $user->first_name) }}" required>
        </div>
        
        <!-- Last Name -->
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Last Name</label>
            <input type="text" name="last_name" class="form-input mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50" value="{{ old('last_name', $user->last_name) }}" required>
        </div>
        
        <!-- Email -->
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Email</label>
            <input type="email" name="email" class="form-input mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50" value="{{ old('email', $user->email) }}" required>
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Password</label>
            <input type="password" name="password" class="form-input mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50" placeholder="Leave blank to keep current password">
        </div>

        <!-- Birthdate -->
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Birthdate</label>
            <input type="date" name="birthdate" class="form-input mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50" value="{{ old('birthdate', $user->birthdate) }}">
        </div>

        <!-- Address -->
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Address</label>
            <input type="text" name="address" class="form-input mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50" value="{{ old('address', $user->address) }}">
        </div>

        <!-- Phone Number -->
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Phone Number</label>
            <input type="text" name="phone_number" class="form-input mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50" value="{{ old('phone_number', $user->phone_number) }}">
        </div>

        <!-- Marital Status -->
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Marital Status</label>
            <select name="marital_status" class="form-select mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                <option value="single" {{ old('marital_status', $user->marital_status) == 'single' ? 'selected' : '' }}>Single</option>
                <option value="married" {{ old('marital_status', $user->marital_status) == 'married' ? 'selected' : '' }}>Married</option>
                <option value="divorced" {{ old('marital_status', $user->marital_status) == 'divorced' ? 'selected' : '' }}>Divorced</option>
            </select>
        </div>

        <!-- Assurance -->
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Assurance</label>
            <select name="assurance" class="form-select mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                <option value="yes" {{ old('assurance', $user->assurance) == 'yes' ? 'selected' : '' }}>Yes</option>
                <option value="no" {{ old('assurance', $user->assurance) == 'no' ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <!-- CIN -->
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">CIN (National Identity Number)</label>
            <input type="text" name="cin" class="form-input mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50" value="{{ old('cin', $user->cin) }}" required>
        </div>

        <!-- CNSS -->
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">CNSS (Social Security Number)</label>
            <input type="text" name="cnss" class="form-input mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50" value="{{ old('CNSS', $user->CNSS) }}" required>
        </div>

        <!-- Department -->
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Department</label>
            <select name="departement_id" class="form-select mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50" required>
                <option value="">Select Department</option>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}" {{ old('departement_id', $user->departement_id) == $department->id ? 'selected' : '' }}>{{ $department->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Role -->
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Role</label>
            <select name="role_id" class="form-select mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50" required>
                <option value="">Select Role</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ old('role_id', $user->role_id) == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Grade -->
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Grade</label>
            <select name="grad_id" class="form-select mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50" required>
                <option value="">Select Grade</option>
                @foreach($grads as $grad)
                    <option value="{{ $grad->id }}" {{ old('grad_id', $user->grad_id) == $grad->id ? 'selected' : '' }}>{{ $grad->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Contract -->
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Contract</label>
            <select class="w-full p-2 border border-gray-300 rounded-lg" id="contract_id" name="contract_id">
                @foreach($contracts as $contract)
                    <option value="{{ $contract->id }}">{{ $contract->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Salary -->
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Salary</label>
            <input type="number" name="salary" class="form-input mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50" value="{{ old('salary', $user->salary) }}" required>
        </div>

        <!-- Remember Token (optional) -->
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Remember Token</label>
            <input type="text" name="remember_token" class="form-input mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50" value="{{ old('remember_token', $user->remember_token) }}">
        </div>

        <!-- Created at (read-only) -->
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Created At</label>
            <input type="text" class="form-input mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50" value="{{ $user->created_at }}" disabled>
        </div>

        <!-- Updated at (read-only) -->
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Updated At</label>
            <input type="text" class="form-input mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50" value="{{ now() }}" disabled>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg shadow hover:bg-yellow-600 transition duration-200">Update</button>
    </form>
</div>
@endsection
