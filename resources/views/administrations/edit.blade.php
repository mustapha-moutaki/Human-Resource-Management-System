@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Edit Leave Request</h1>

    <!-- Leave Request Edit Form -->
    <div class="bg-white p-6 rounded-lg shadow-md mb-8">

        <h2 class="text-xl font-semibold mb-4 text-gray-800">Update Leave Request</h2>

        <form action="{{ route('leave.update', $leave->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Use PUT for update request -->
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Days Off Requested -->
                <div>
                    <label for="days_off" class="block text-sm font-medium text-gray-700">Days Off Requested</label>
                    <input type="number" name="days_off" id="days_off" value="{{ old('days_off', $leave->days_off) }}" required
                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Description -->
                <div class="md:col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="3" required
                              class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('description', $leave->description) }}</textarea>
                </div>

                <!-- Leave Date (Min 7 Days Later) -->
                <div>
                    <label for="start_date" class="block text-sm font-medium text-gray-700">Leave Date</label>
                    <input type="date" name="start_date" id="start_date" value="{{ old('start_date', $leave->start_date->toDateString()) }}" required
                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" min="{{ \Carbon\Carbon::today()->addDays(7)->toDateString() }}">
                </div>
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Update Request
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
