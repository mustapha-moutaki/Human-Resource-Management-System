@extends('layouts.app')

@section('title', 'Create Graduation Record')

@section('content')
    <div class="max-w-3xl mx-auto p-8 bg-white shadow-lg rounded-lg mt-8 border border-gray-200">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Create Graduation Record</h2>

        @if(session('success'))
            <p class="text-green-600 text-center mb-4">{{ session('success') }}</p>
        @endif

        <form action="{{ route('grads.store') }}" method="POST">
            @csrf

            <div class="mb-6">
                <label for="name" class="block text-gray-700 font-medium mb-2">Name:</label>
                <input type="text" id="name" name="name" required 
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200 ease-in-out">
            </div>

            <div class="mb-6">
                <label for="graduation_date" class="block text-gray-700 font-medium mb-2">Graduation Date:</label>
                <input type="date" id="graduation_date" name="graduation_date" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200 ease-in-out">
            </div>


            <div class="text-center">
                <button type="submit" class="w-full py-3 px-4 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200 ease-in-out">
                    Save Graduation Record
                </button>
            </div>
        </form>
    </div>
@endsection