@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Leave Requests</h1>

    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
        <thead>
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Days Off</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach ($leaves as $leave)
            <tr>
            <td class="px-6 py-4 text-sm text-gray-800">{{ $leave->user->first_name ?? 'No Name' }} {{ $leave->last_name ?? '' }}</td>
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
                    @if($leave->status == 'pending')
                        <!-- Accept Button -->
                        <form action="{{ route('leave.accept', $leave) }}" method="POST" class="inline-block mr-2">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                                Accept
                            </button>
                        </form>

                        <!-- Refuse Button -->
                        <form action="{{ route('leave.refuse', $leave) }}" method="POST" class="inline-block">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                Refuse
                            </button>
                        </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
