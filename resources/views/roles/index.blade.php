@extends('layouts.app')

@section('title', 'Roles Management')

@section('content')
<div class="container mx-auto mt-5">
    <h1 class="mb-4 text-2xl font-bold">Roles Management</h1>

    <!-- Display success message -->
    @if(session('success'))
        <div class="bg-green-500 text-white p-3 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Create Role Button -->
    <a href="{{ route('roles.create') }}" class="inline-block mb-3 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
        <i class="fas fa-plus"></i> Create Role
    </a>

    <!-- Roles Table -->
    <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="py-2 px-4 border-b text-left">Name</th>
                <th class="py-2 px-4 border-b text-left">Guard Name</th>
                <th class="py-2 px-4 border-b text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @if($roles->isEmpty())
                <tr>
                    <td colspan="3" class="text-center py-4">There are no roles available.</td>
                </tr>
            @else
                @foreach($roles as $role)
                    <tr class="border-b">
                        <td class="py-2 px-4">{{ $role->name }}</td>
                        <td class="py-2 px-4">{{ $role->guard_name }}</td>
                        <td class="py-2 px-4">
                            <!-- Edit Link -->
                            <a href="{{ route('roles.edit', $role->id) }}" class="text-blue-500 hover:underline">
                                <i class="fas fa-edit"></i> Edit
                            </a>

                            <!-- Delete Link -->
                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Are you sure?')">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
@endsection