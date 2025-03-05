@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="w-full max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-lg">
            <h3 class="text-2xl font-semibold text-gray-800 mb-4">Edit Contract</h3>

            <!-- Form for updating the contract -->
            <form action="{{ route('contracts.update', $contract->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Contract Name</label>
                    <input type="text" name="name" id="name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('name', $contract->name) }}" required>
                    @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-md shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    Update Contract
                </button>
                <a href="{{ route('contracts.index') }}" class="ml-2 bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded-md">Cancel</a>
            </form>
        </div>
    </div>
@endsection
