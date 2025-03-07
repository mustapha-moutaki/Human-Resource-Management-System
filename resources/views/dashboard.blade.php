@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-3xl font-bold mb-6 text-gray-800">Welcome to your Dashboard!</h2>
        <p class="text-lg text-gray-600 mb-8">Your personalized workspace to manage everything efficiently.</p>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            <!-- Card 1 -->
            <div class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white shadow-lg rounded-lg p-6">
                <h3 class="text-xl font-semibold mb-2">Quick Stats</h3>
                <p class="text-3xl font-bold">Overview of the latest metrics</p>
            </div>

            <!-- Card 2 -->
            <div class="bg-gradient-to-r from-green-400 to-teal-500 text-white shadow-lg rounded-lg p-6">
                <h3 class="text-xl font-semibold mb-2">Recent Activity</h3>
                <p class="text-3xl font-bold">Recent updates and interactions</p>
            </div>

            <!-- Card 3 -->
            <div class="bg-gradient-to-r from-yellow-400 to-orange-500 text-white shadow-lg rounded-lg p-6">
                <h3 class="text-xl font-semibold mb-2">Upcoming Tasks</h3>
                <p class="text-3xl font-bold">Check your to-do list for the day</p>
            </div>
        </div>

        <div class="mt-10">
            <h3 class="text-2xl font-bold mb-4 text-gray-800">Recent Notifications</h3>
            <ul class="bg-white shadow-lg rounded-lg p-4 space-y-3">
                <li class="border-b border-gray-200 py-2 text-gray-700">You have a new message from your team leader.</li>
                <li class="border-b border-gray-200 py-2 text-gray-700">Your request for vacation time has been approved!</li>
                <li class="border-b border-gray-200 py-2 text-gray-700">A new project has been assigned to you. Check it out!</li>
            </ul>
        </div>

        <div class="mt-10">
            <h3 class="text-2xl font-bold mb-4 text-gray-800">Useful Links</h3>
            <div class="bg-white shadow-lg rounded-lg p-6 grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="text-center">
                    <a href="#" class="text-lg font-medium text-indigo-600 hover:text-indigo-800">Manage Projects</a>
                </div>
                <div class="text-center">
                    <a href="#" class="text-lg font-medium text-indigo-600 hover:text-indigo-800">Profile Settings</a>
                </div>
                <div class="text-center">
                    <a href="#" class="text-lg font-medium text-indigo-600 hover:text-indigo-800">Team Collaboration</a>
                </div>
                <div class="text-center">
                    <a href="#" class="text-lg font-medium text-indigo-600 hover:text-indigo-800">View Reports</a>
                </div>
            </div>
        </div>
    </div>
@endsection
