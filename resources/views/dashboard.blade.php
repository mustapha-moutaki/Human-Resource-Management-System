@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold mb-4 text-gray-800">Welcome to the Dashboard!</h2>
        <p class="text-gray-600 mb-6">Here is where you can manage your content.</p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Card 1 -->
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-xl font-semibold mb-2">Total Users</h3>
                <p class="text-2xl font-bold text-primary">150</p>
            </div>

            <!-- Card 2 -->
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-xl font-semibold mb-2">Active Sessions</h3>
                <p class="text-2xl font-bold text-primary">75</p>
            </div>

            <!-- Card 3 -->
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-xl font-semibold mb-2">Pending Requests</h3>
                <p class="text-2xl font-bold text-primary">10</p>
            </div>
        </div>

        <div class="mt-8">
            <h3 class="text-2xl font-bold mb-4">Recent Activities</h3>
            <ul class="bg-white shadow-lg rounded-lg p-4">
                <li class="border-b border-gray-200 py-2">User John Doe created a new post.</li>
                <li class="border-b border-gray-200 py-2">User Jane Smith updated her profile.</li>
                <li class="border-b border-gray-200 py-2">User Mike Johnson logged in.</li>
            </ul>
        </div>
    </div>
@endsection
