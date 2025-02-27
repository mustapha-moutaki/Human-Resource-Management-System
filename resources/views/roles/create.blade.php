<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Role</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold mb-4 text-center">Create New Role</h1>
        <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Role Name:</label>
        <input type="text" id="name" name="name" required class="border border-gray-300 p-2 rounded-md w-full mb-4 focus:outline-none focus:ring-2 focus:ring-blue-400">

        <label for="guard_name" class="block text-sm font-medium text-gray-700 mb-1">Guard Name:</label>
        <input type="text" id="guard_name" name="guard_name" required class="border border-gray-300 p-2 rounded-md w-full mb-4 focus:outline-none focus:ring-2 focus:ring-blue-400">

        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 transition duration-200">Create Role</button>
    </form>

    </div>
</body>
</html>
