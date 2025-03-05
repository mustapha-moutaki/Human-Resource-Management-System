@extends('layouts.app')

@section('title', 'Create Career')

@section('content')
    <div class="max-w-4xl mx-auto mt-10 p-8 bg-white shadow-lg rounded-lg">
        <h2 class="text-3xl font-semibold mb-6 text-gray-800 flex items-center">
            <i class="fas fa-briefcase fa-lg mr-2"></i> Create Career
        </h2>

        <form method="POST" action="{{ route('careers.store') }}">
            @csrf

            <!-- Career Name -->
            <div class="mb-6">
                <label class="block text-gray-700 font-medium">Career Name</label>
                <input type="text" name="name" value="{{ old('name') }}" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <!-- Suggestions -->
            <div class="mb-6">
                <label class="block text-gray-700 font-medium">Suggestions</label>
                <ul class="list-disc pl-5 text-gray-600 space-y-1">
                    <li class="flex items-center"><i class="fas fa-check-circle text-blue-500 mr-2"></i> Software Engineer</li>
                    <li class="flex items-center"><i class="fas fa-check-circle text-blue-500 mr-2"></i> Data Scientist</li>
                    <li class="flex items-center"><i class="fas fa-check-circle text-blue-500 mr-2"></i> Web Developer</li>
                    <li class="flex items-center"><i class="fas fa-check-circle text-blue-500 mr-2"></i> Product Manager</li>
                    <li class="flex items-center"><i class="fas fa-check-circle text-blue-500 mr-2"></i> Graphic Designer</li>
                </ul>
            </div>

            <!-- Buttons -->
            <div class="flex justify-between">
                <a href="{{ route('careers.index') }}" class="text-gray-700 px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300 transition">
                    <i class="fas fa-times-circle mr-1"></i> Cancel
                </a>
                <button type="submit" class="flex items-center px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                    <i class="fas fa-save mr-1"></i> Save
                </button>
            </div>
        </form>
    </div>

    <!-- Font Awesome Script -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> {{-- Include Font Awesome --}}
@endsection