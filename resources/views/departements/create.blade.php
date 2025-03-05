@extends('layouts.app')

@section('title', 'Create Department')

@section('content')
    <div class="max-w-md mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
        <h1 class="mb-4 text-2xl text-blue-500"><i class="fas fa-plus"></i> Create Department</h1>
        <form action="{{ route('departements.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" 
                       class="w-full p-2 border border-gray-300 rounded-lg @error('name') border-red-500 @enderror" required>
                @error('name')
                <div class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="manager" class="block text-gray-700 font-medium">Manager</label>
                <select id="manager" name="manager" 
                        class="w-full p-2 border border-gray-300 rounded-lg @error('manager') border-red-500 @enderror" required>
                    <option value="">Select a manager</option>
                    @foreach ($managerUsers as $user)
                        <option value="{{ $user->id }}">{{ $user->first_name . ' ' . $user->last_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="text-right">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                    <i class="fas fa-save"></i> Save
                </button>
            </div>
        </form>
    </div>
@endsection