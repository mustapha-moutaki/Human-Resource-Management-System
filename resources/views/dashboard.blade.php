<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('HRMS Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex h-screen bg-gray-100 dark:bg-gray-900">
        <!-- Sidebar -->
        <aside class="w-64 bg-white dark:bg-gray-800 shadow-md transition-all ease-in-out duration-300">
            <div class="p-6">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Menu</h3>
                <ul class="mt-4">
                    <li class="mb-2">
                        <a href="{{ route('users.create') }}" class="block px-4 py-2 text-gray-700 dark:text-gray-300 ehover:bg-gray-200 dark:hover:bg-gray-700 rounded">
                            <i class="fas fa-user-circle"></i> User Management
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{route('formations.index')}}" class="block px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 rounded">
                            <i class="fas fa-building"></i> formation Management
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('departements.index')}}" class="block px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 rounded">
                            <i class="fas fa-sitemap"></i> Department Management
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="block px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 rounded">
                            <i class="fas fa-shield-alt"></i> Roles & Permissions
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="block px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 rounded">
                            <i class="fas fa-clock"></i> Attendance Tracking
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="block px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 rounded">
                            <i class="fas fa-folder"></i> Document Management
                        </a>
                    </li>
                </ul>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                <h3 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Welcome to the HRMS</h3>
                <p class="text-gray-600 dark:text-gray-400">
                    🚀 Manage your employees, departments, and documents efficiently with our HRMS.
                </p>
            </div>
        </div>
    </div>

    <!-- Include Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</x-app-layout>