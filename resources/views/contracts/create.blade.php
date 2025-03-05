
@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="w-full max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-lg">
            <h3 class="text-2xl font-semibold text-gray-800 mb-4">Add New Contract</h3>
            
            <form action="{{ route('contracts.store') }}" method="POST">
                @csrf
                
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Contract Name</label>
                    <input type="text" name="name" id="name" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                </div>
                
                <div class="flex justify-between items-center">
                    <button type="submit" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-md shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 w-full md:w-auto">Add Contract</button>
                    <a href="{{ route('contracts.index') }}" class="text-blue-500 hover:text-blue-600 text-sm">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection
