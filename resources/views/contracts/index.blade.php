@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="w-full max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-lg">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-2xl font-semibold text-gray-800">All Contracts</h3>
                <a href="{{ route('contracts.create') }}" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-md shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Add New Contract</a>
            </div>
            
            <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 border-b">Contract Name</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 border-b">Created At</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 border-b">Updated At</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contracts as $contract)
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-2 text-sm text-gray-700 border-b">{{ $contract->name }}</td>
                            <td class="px-4 py-2 text-sm text-gray-600 border-b">
                                {{ $contract->created_at ? $contract->created_at->format('Y-m-d H:i') : 'N/A' }}
                            </td>
                            <td class="px-4 py-2 text-sm text-gray-600 border-b">
                                {{ $contract->updated_at ? $contract->updated_at->format('Y-m-d H:i') : 'N/A' }}
                            </td>
                            <td class="px-4 py-2 text-sm text-gray-700 border-b flex space-x-2">
                                <!-- Edit Button -->
                                <a href="{{ route('contracts.edit', $contract->id) }}" class="text-yellow-500 hover:text-yellow-600">Edit</a>
                                <!-- Delete Button -->
                                <form action="{{ route('contracts.destroy', $contract->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-600">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
