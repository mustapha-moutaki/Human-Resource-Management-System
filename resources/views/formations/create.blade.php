@extends('layouts.app')

@section('title', 'Create Formation')

@section('content')
    <div class="max-w-4xl mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg">
        <h2 class="text-2xl font-semibold mb-6">Create Formation</h2>

        <form method="POST" action="{{ route('formations.store') }}">
            @csrf

            <!-- Title -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium">Title</label>
                <input type="text" name="title" value="{{ old('title') }}" class="w-full p-2 border border-gray-300 rounded-lg" required>
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium">Description</label>
                <textarea name="description" rows="4" class="w-full p-2 border border-gray-300 rounded-lg" required>{{ old('description') }}</textarea>
            </div>

            <!-- Start Date -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium">Start Date</label>
                <input type="date" name="start_date" value="{{ old('start_date') }}" class="w-full p-2 border border-gray-300 rounded-lg" required>
            </div>

            <!-- Completion Date -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium">Completion Date</label>
                <input type="date" name="completion_date" value="{{ old('completion_date') }}" class="w-full p-2 border border-gray-300 rounded-lg" required>
            </div>

            <!-- Duration -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium">Duration (in hours)</label>
                <input type="number" name="duration" value="{{ old('duration') }}" class="w-full p-2 border border-gray-300 rounded-lg" required>
            </div>

            <!-- Type -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium">Type</label>
                <select name="type" class="w-full p-2 border border-gray-300 rounded-lg" required>
                    <option value="online" {{ old('type') == 'online' ? 'selected' : '' }}>online</option>
                    <option value="physic" {{ old('type') == 'physic' ? 'selected' : '' }}>physic</option>
                </select>
            </div>

            <!-- Buttons -->
            <div class="flex justify-between">
                <a href="{{ route('formations.index') }}" class="text-gray-700 px-4 py-2 bg-gray-200 rounded-lg">
                    Cancel
                </a>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg">
                    Save
                </button>
            </div>
        </form>
    </div>
@endsection