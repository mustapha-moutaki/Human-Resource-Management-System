@extends('layouts.app')

@section('title', 'Edit Role')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md w-full max-w-md mx-auto mt-10">
    <h1 class="text-2xl font-bold mb-4 text-center">Edit Role</h1>
    
    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Role Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name', $role->name) }}" required 
               class="border border-gray-300 p-2 rounded-md w-full mb-4 focus:outline-none focus:ring-2 focus:ring-blue-400">

        <label for="guard_name" class="block text-sm font-medium text-gray-700 mb-1">Guard Name:</label>
        <input type="text" id="guard_name" name="guard_name" value="{{ old('guard_name', $role->guard_name) }}" required 
               class="border border-gray-300 p-2 rounded-md w-full mb-4 focus:outline-none focus:ring-2 focus:ring-blue-400">

        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 transition duration-200">
            Update Role
        </button>
    </form>
</div>
@endsection