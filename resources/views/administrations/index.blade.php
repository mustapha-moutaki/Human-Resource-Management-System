@extends('layouts.app') <!-- Extend your base layout -->

@section('content') <!-- Start the content section -->

<div class="container mx-auto px-4 py-8">
    <h1 class="text-xl font-semibold mb-4">Leave Requests</h1>
    
    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
        <thead>
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Days Off</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th> <!-- New column for actions -->
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach ($leaves as $leave)
            <tr>
                <td class="px-6 py-4 text-sm text-gray-800">{{ $leave->days_off }}</td>
                <td class="px-6 py-4 text-sm text-gray-800">{{ $leave->description }}</td>
                <td class="px-6 py-4 text-sm">
                    <span class="px-2 py-1 text-xs font-semibold 
                    @if($leave->status == 'accepted') bg-green-100 text-green-800
                    @elseif($leave->status == 'refused') bg-red-100 text-red-800
                    @else bg-yellow-100 text-yellow-800 @endif
                    rounded-full">
                    {{ $leave->status }}
                    </span>
                </td>
                <td class="px-6 py-4 text-sm">
                   

                    <!-- Delete Button -->
                    <form action="{{ route('leave.destroy', $leave->id) }}" method="POST" class="inline-block ml-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection <!-- End the content section -->
