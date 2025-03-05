@extends('layouts.app')

@section('title', 'Graduation Records')

@section('content')
    <div class="max-w-6xl mx-auto p-8 bg-white shadow-lg rounded-lg mt-8 border border-gray-200">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Graduation Records</h2>

        @if(session('success'))
            <p class="text-green-600 text-center mb-4">{{ session('success') }}</p>
        @endif

        <div class="text-right mb-4">
            <a href="{{ route('grads.create') }}" class="bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700">Add New Graduation Record</a>
        </div>

        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr class="bg-gray-200">
                    <th class="py-2 px-4 border-b text-left">Name</th>
                    <th class="py-2 px-4 border-b text-left">Graduation Date</th>
                    <th class="py-2 px-4 border-b text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($grads as $grad)
                    <tr>
                        <td class="py-2 px-4 border-b text-left">{{ $grad->name }}</td>
                        <td class="py-2 px-4 border-b text-left">{{ $grad->graduation_date }}</td>
                        <td class="py-2 px-4 border-b text-left">
                            <a href="{{ route('grads.edit', $grad->id) }}" class="text-blue-600 hover:text-blue-800">Edit</a>
                            <form action="{{ route('grads.destroy', $grad->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 ml-4">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection