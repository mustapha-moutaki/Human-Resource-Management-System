@extends('layouts.app')

@section('title', 'User Management')

@section('content')
    <div class="mb-6">
        <h2 class="text-3xl font-bold mb-4 text-gray-800">User Management</h2>
        <p class="text-gray-600 mb-6">Manage your users from this dashboard.</p>
        
        <!-- Button to Add New User -->
        <div class="mb-6">
            <a href="{{ route('users.create') }}" class="bg-primary text-white py-2 px-4 rounded">Add New User</a>
        </div>
    </div>

    <!-- User Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">First Name</th>
                    <th class="py-3 px-6 text-left">Last Name</th>
                    <th class="py-3 px-6 text-left">Email</th>
                    <th class="py-3 px-6 text-left">Role</th> <!-- Added Role Column -->
                    <th class="py-3 px-6 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach($users as $user)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left">{{ $user->first_name }}</td>
                    <td class="py-3 px-6 text-left">{{ $user->last_name }}</td>
                    <td class="py-3 px-6 text-left">{{ $user->email }}</td>
                    <td class="py-3 px-6 text-left">{{ $user->role ? $user->role->name : 'No Role Assigned'}}</td> <!-- Displaying Role Name -->
                    <td class="py-3 px-6 text-left">
                    <a href="{{ route('users.show', $user->id) }}" class="text-green-500 hover:text-green-700">Show</a>
                        <a href="{{ route('users.edit', $user->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
