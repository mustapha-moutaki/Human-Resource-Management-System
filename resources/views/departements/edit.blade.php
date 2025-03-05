@extends('layouts.app')

@section('title', 'Edit Departement')

@section('content')
    <div class="max-w-md mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-4">
            <h4 class="text-xl font-semibold">Edit Departement</h4>
            <a href="{{ route('departements.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                <i class="fas fa-arrow-left"></i> Back to Departements
            </a>
        </div>

        <form action="{{ route('departements.update', $departement->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $departement->name) }}" 
                       class="w-full p-2 border border-gray-300 rounded-lg @error('name') border-red-500 @enderror" required>
                @error('name')
                <div class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                <i class="fas fa-save"></i> Update
            </button>
        </form>
    </div>
@endsection
