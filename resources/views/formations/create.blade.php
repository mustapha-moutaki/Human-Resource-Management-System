<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Formation</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="max-w-4xl mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg">
        <h2 class="text-2xl font-semibold mb-6">Create Formation</h2>

        <form method="POST" action="{{ route('formations.store') }}">
            @csrf

            <!-- Title -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium">Title</label>
                <input type="text" name="title" value="{{ old('title') }}" class="w-full p-2 border border-gray-300 rounded-lg" required>
            </div>

            <!-- Skill -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium">Skill</label>
                <input type="text" name="skill" value="{{ old('skill') }}" class="w-full p-2 border border-gray-300 rounded-lg" required>
            </div>

            <!-- Completion Date -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium">Completion Date</label>
                <input type="date" name="completion_date" value="{{ old('completion_date') }}" class="w-full p-2 border border-gray-300 rounded-lg" required>
            </div>

            <!-- Type -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium">Type</label>
                <select name="type" class="w-full p-2 border border-gray-300 rounded-lg" required>
                    <option value="course" {{ old('type') == 'course' ? 'selected' : '' }}>Course</option>
                    <option value="Diplome" {{ old('type') == 'Diplome' ? 'selected' : '' }}>Diplome</option>
                    <option value="hybrid" {{ old('type') == 'hybrid' ? 'selected' : '' }}>Hybrid</option>
                </select>
            </div>

            <!-- Buttons -->
            <div class="flex justify-between">
                <a href="{{ route('formations.index') }}" class="text-gray-700 px-4 py-2 bg-gray-200 rounded-lg">
                    Cancel
                </a>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg">
                    Save
                </button>
            </div>
        </form>
    </div>
</body>
</html>
