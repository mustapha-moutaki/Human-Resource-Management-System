<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('HRMS Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex h-screen bg-gray-100 dark:bg-gray-900">
        <!-- Sidebar -->
        <aside class="w-64 bg-white dark:bg-gray-800 shadow-md">
            <div class="p-4">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Menu</h3>
                <ul class="mt-4">
                    <li class="mb-2">
                        <a href="{{ route('users.index') }}" class="block px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 rounded">
                            👤 Gestion des Utilisateurs
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('employees.index') }}" class="block px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 rounded">
                            🏢 Gestion des Employés
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('departments.index') }}" class="block px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 rounded">
                            🌐 Gestion des Départements
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('roles.index') }}" class="block px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 rounded">
                            🛡️ Gestion des Rôles & Permissions
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('attendance.index') }}" class="block px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 rounded">
                            ⏳ Suivi des Présences
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('documents.index') }}" class="block px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 rounded">
                            📂 Gestion des Documents
                        </a>
                    </li>
                </ul>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                <h3 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Bienvenue dans le HRMS</h3>
                <p class="text-gray-600 dark:text-gray-400">
                    🚀 Gérez vos employés, départements et documents efficacement avec notre HRMS.
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
