@extends('layouts.app')

@section('content')
    <!-- Main Content Section -->
    <div class="max-w-3xl mx-auto p-8 bg-white shadow-lg rounded-lg mt-10 border border-gray-200">
        <h1 class="mb-4 text-3xl text-blue-500"><i class="fas fa-user-plus"></i> Add New User</h1>
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            
            <!-- First Name -->
            <div class="mb-4">
                <label for="first_name" class="block text-gray-700 font-medium">First Name</label>
                <input type="text" class="w-full p-2 border border-gray-300 rounded-lg" id="first_name" name="first_name" required>
            </div>

            <!-- Last Name -->
            <div class="mb-4">
                <label for="last_name" class="block text-gray-700 font-medium">Last Name</label>
                <input type="text" class="w-full p-2 border border-gray-300 rounded-lg" id="last_name" name="last_name" required>
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium">Email</label>
                <input type="email" class="w-full p-2 border border-gray-300 rounded-lg" id="email" name="email" required>
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-medium">Password</label>
                <input type="password" class="w-full p-2 border border-gray-300 rounded-lg" id="password" name="password" required>
            </div>

            <!-- Birthdate -->
            <div class="mb-4">
                <label for="birthdate" class="block text-gray-700 font-medium">Birthdate</label>
                <input type="date" class="w-full p-2 border border-gray-300 rounded-lg" id="birthdate" name="birthday" required>
            </div>

            <!-- Address -->
            <div class="mb-4">
                <label for="address" class="block text-gray-700 font-medium">Address</label>
                <input type="text" class="w-full p-2 border border-gray-300 rounded-lg" id="address" name="address" required>
            </div>

            <!-- Phone Number -->
            <div class="mb-4">
                <label for="phone" class="block text-gray-700 font-medium">Phone Number</label>
                <input type="tel" class="w-full p-2 border border-gray-300 rounded-lg" id="phone" name="phone" required>
            </div>

            <!-- Marital Status -->
            <div class="mb-4">
                <label for="status" class="block text-gray-700 font-medium">Marital Status</label>
                <select class="w-full p-2 border border-gray-300 rounded-lg" id="status" name="status" required>
                    <option value="">Select Status</option>
                    <option value="engaged">Engaged</option>
                    <option value="divorced">Divorced</option>
                </select>
            </div>

            <!-- Assurance -->
            <div class="mb-4">
                <label for="assurance" class="block text-gray-700 font-medium">Assurance</label>
                <select class="w-full p-2 border border-gray-300 rounded-lg" id="assurance" name="assurance" required>
                    <option value="yes">I Have</option>
                    <option value="not">I Do Not Have</option>
                </select>
            </div>

            <!-- CIN Number -->
            <div class="mb-4">
                <label for="cin" class="block text-gray-700 font-medium">CIN Number</label>
                <input type="text" class="w-full p-2 border border-gray-300 rounded-lg" id="cin" name="CIN" required>
            </div>

            <!-- CNSS Number -->
            <div class="mb-4">
                <label for="cnss" class="block text-gray-700 font-medium">CNSS Number</label>
                <input type="text" class="w-full p-2 border border-gray-300 rounded-lg" id="cnss" name="CNSS" required>
            </div>

            <!-- Department -->
            <div class="mb-4">
                <label for="departement_id" class="block text-gray-700 font-medium">Department</label>
                <select class="w-full p-2 border border-gray-300 rounded-lg" id="departement_id" name="departement_id">
                    <option value="">Select Department</option>
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Role -->
            <div class="mb-4">
                <label for="role_id" class="block text-gray-700 font-medium">Role</label>
                <select class="w-full p-2 border border-gray-300 rounded-lg" id="role_id" name="role_id">
                    <option value="">Select Role</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Grade -->
            <div class="mb-4">
                <label for="grad_id" class="block text-gray-700 font-medium">Grade</label>
                <select class="w-full p-2 border border-gray-300 rounded-lg" id="grad_id" name="grad_id">
                    <option value="">Select Grad</option>
                    @foreach($grads as $grad)
                        <option value="{{ $grad->id }}">{{ $grad->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Contract -->
            <div class="mb-4">
                <label for="contract_id" class="block text-gray-700 font-medium">Contract</label>
                <select class="w-full p-2 border border-gray-300 rounded-lg" id="contract_id" name="contract_id">
                    <option value="">Select Contract</option>
                    @foreach($contracts as $contract)
                        <option value="{{ $contract->id }}">{{ $contract->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Salary -->
            <div class="mb-4">
                <label for="salary" class="block text-gray-700 font-medium">Salary</label>
                <input type="number" class="w-full p-2 border border-gray-300 rounded-lg" id="salary" name="salary" required>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700">
                <i class="fas fa-save"></i> Save User Info
            </button>
        </form>
    </div>
@endsection