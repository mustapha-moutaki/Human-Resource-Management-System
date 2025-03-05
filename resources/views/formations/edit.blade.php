@extends('layouts.app')

@section('title', 'Edit Formation')

@section('content')
    <div class="max-w-4xl mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg">
        <h2 class="text-2xl font-semibold mb-6">Edit Formation</h2>

        <form method="POST" action="{{ route('formations.update', $formation->id) }}">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium">Title</label>
                <input type="text" name="title" value="{{ old('title', $formation->title) }}" class="w-full p-2 border border-gray-300 rounded-lg" required>
            </div>

            <!-- Skill -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium">Skill</label>
                <input type="text" name="skill" value="{{ old('skill', $formation->skill) }}" class="w-full p-2 border border-gray-300 rounded-lg" required>
            </div>

            <!-- Completion Date -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium">Completion Date</label>
                <input type="date" name="completion_date" value="{{ old('completion_date', $formation->completion_date) }}" class="w-full p-2 border border-gray-300 rounded-lg" required>
            </div>

            <!-- Type -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium">Type</label>
                <select name="type" class="w-full p-2 border border-gray-300 rounded-lg" required>
                    <option value="course" {{ $formation->type == 'course' ? 'selected' : '' }}>Course</option>
                    <option value="Diplome" {{ $formation->type == 'Diplome' ? 'selected' : '' }}>Diplome</option>
                    <option value="hybrid" {{ $formation->type == 'hybrid' ? 'selected' : '' }}>Hybrid</option>
                </select>
            </div>

            <!-- Created At -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium">Created At</label>
                <input type="text" value="{{ $formation->created_at }}" disabled class="w-full p-2 bg-gray-200 border border-gray-300 rounded-lg">
            </div>

            <!-- Updated At -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium">Updated At</label>
                <input type="text" value="{{ $formation->updated_at }}" disabled class="w-full p-2 bg-gray-200 border border-gray-300 rounded-lg">
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