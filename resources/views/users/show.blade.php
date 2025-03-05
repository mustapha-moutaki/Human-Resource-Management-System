@extends('layouts.app')

@section('content')
    <div class="bg-gray-100 flex items-center justify-center min-h-screen p-4">
        <div class="w-full max-w-xl bg-white shadow-lg rounded-lg overflow-hidden p-8">
            <!-- Employee Details Section -->
            <div class="text-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">{{$user->first_name . ' ' .$user->last_name}}</h2>
                <p class="text-gray-600">{{$user->first_name . ' ' .$user->last_name}}</p>
                <p class="text-sm text-gray-500">{{$user->email}}</p>
            </div>

            <!-- Employee Image -->
            <div class="flex justify-center mb-8">
                <img 
                    src="https://thumbs.dreamstime.com/b/profile-picture-caucasian-male-employee-posing-office-happy-young-worker-look-camera-workplace-headshot-portrait-smiling-190186649.jpg" 
                    alt="Employee" 
                    class="w-40 h-40 rounded-full object-cover border-4 border-blue-500"
                >
            </div>

            <!-- Progress Bar Container -->
            <div class="relative w-full h-4 bg-gray-200 rounded-full mb-16">
                <div class="absolute top-0 left-0 h-4 bg-blue-500 rounded-full" style="width: 75%;"></div>
                <div class="absolute top-1/2 left-0 w-full transform -translate-y-1/2 flex justify-between px-6">
                    <div class="flex flex-col items-center relative group">
                        <div class="w-16 h-16 rounded-full bg-blue-500 text-white flex items-center justify-center shadow-md">
                            <i class="fas fa-user fa-2x"></i>
                        </div>
                        <div class="text-center mt-2">
                            <span class="block text-xs font-semibold">Hire date</span>
                            <span class="block text-xs text-gray-500">{{ $user->created_at->toDateString() }}</span>
                        </div>
                    </div>
                    <div class="flex flex-col items-center relative group">
                        <div class="w-16 h-16 rounded-full bg-blue-500 text-white flex items-center justify-center shadow-md">
                            <i class="fas fa-file-alt fa-2x"></i>
                        </div>
                        <div class="text-center mt-2">
                            <span class="block text-xs font-semibold">Contract</span>
                            <span class="block text-xs text-gray-500">{{ $user->contract ? $user->contract->name : 'No Contract' }}</span>
                        </div>
                    </div>
                    <div class="flex flex-col items-center relative group">
                        <div class="w-16 h-16 rounded-full bg-blue-500 text-white flex items-center justify-center shadow-md">
                            <i class="fas fa-graduation-cap fa-2x"></i>
                        </div>
                        <div class="text-center mt-2">
                            <span class="block text-xs font-semibold">Formation</span>
                            <span class="block text-xs text-gray-500">2023-03-05</span>
                        </div>
                    </div>
                    <div class="flex flex-col items-center relative group">
                        <div class="w-16 h-16 rounded-full bg-blue-500 text-white flex items-center justify-center shadow-md">
                            <i class="fas fa-trophy fa-2x"></i>
                        </div>
                        <div class="text-center mt-2">
                            <span class="block text-xs font-semibold">Graduation</span>
                            <span class="block text-xs text-gray-500">2023-03-05</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Employee Details -->
            <div class="bg-gray-50 p-4 rounded-lg">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Department</p>
                        <p class="text-gray-800">{{$user->departement_id ? $user->departement->name : 'no department'}}</p>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600">Hire Date</p>
                        <p class="text-gray-800">March 5, 2023</p>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600">Phone</p>
                        <p class="text-gray-800">{{$user->phone}}</p>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600">Location</p>
                        <p class="text-gray-800">New York Office</p>
                    </div>
                </div>
            </div>

            <!-- Edit Button -->
            <div class="text-center mt-4">
                <button id="editButton" class="bg-blue-500 text-white px-4 py-2 rounded">Edit</button>
            </div>

            <!-- Additional Form -->
            <div class="bg-gray-50 p-4 rounded-lg mt-4 hidden" id="additionalForm">
                <h3 class="text-lg font-semibold mb-4">Edit Employee Details</h3>
                <form id="editEmployeeForm">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="career" class="text-sm font-medium text-gray-600">Select Career</label>
                            <select id="career" name="career" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                <option value="">Select Career</option>
                                <option value="1">Software Engineer</option>
                                <option value="2">Data Scientist</option>
                                <option value="3">Product Manager</option>
                                <!-- Add more options as needed -->
                            </select>
                        </div>
                        <div>
                            <label for="formation" class="text-sm font-medium text-gray-600">Formation</label>
                            <input type="text" id="formation" name="formation" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Enter formation">
                        </div>
                        <div>
                            <label for="phone" class="text-sm font-medium text-gray-600">Phone</label>
                            <input type="text" id="phone" name="phone" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Enter phone number">
                        </div>
                        <div class="flex items-center justify-end">
                            <button type="button" class="bg-green-500 text-white px-4 py-2 rounded mr-2">Add Formation</button>
                            <button type="button" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Font Awesome Script -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> {{-- Include Font Awesome --}}
    
    <script>
        document.getElementById('editButton').addEventListener('click', function() {
            const additionalForm = document.getElementById('additionalForm');
            additionalForm.classList.toggle('hidden'); // Toggle visibility
        });
    </script>
@endsection