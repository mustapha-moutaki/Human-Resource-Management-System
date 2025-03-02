<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit formation</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="max-w-4xl mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg">
        <h2 class="text-2xl font-semibold mb-6">dit Formation</h2>

        <form method="POST" action="{{ route('formations.update', $formation->id) }}">
            @csrf
            @method('PUT')

            <!-- Titre -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium">Title</label>
                <input type="text" name="title" value="{{ old('title', $formation->title) }}" 
                       class="w-full p-2 border border-gray-300 rounded-lg">
            </div>

            <!-- Compétence -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium">Skill</label>
                <input type="text" name="skill" value="{{ old('skill', $formation->skill) }}" 
                       class="w-full p-2 border border-gray-300 rounded-lg">
            </div>

            <!-- Date d'achèvement -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium">Completion Date</label>
                <input type="date" name="completion_date" value="{{ old('completion_date', $formation->completion_date) }}" 
                       class="w-full p-2 border border-gray-300 rounded-lg">
            </div>

            <!-- Type -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium">Type</label>
                <select name="type" class="w-full p-2 border border-gray-300 rounded-lg">
                    <option value="course" {{ $formation->type == 'course' ? 'selected' : '' }}>course</option>
                    <option value="Diplome" {{ $formation->type == 'Diplome' ? 'selected' : '' }}>Diplome</option>
                    <option value="hybrid" {{ $formation->type == 'hybrid' ? 'selected' : '' }}>hybrid</option>
                </select>
            </div>

            <!-- create at -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium">Created at</label>
                <input type="text" value="{{ $formation->created_at }}" disabled 
                       class="w-full p-2 bg-gray-200 border border-gray-300 rounded-lg">
            </div>

            <!-- Update at -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium">Update at</label>
                <input type="text" value="{{ $formation->updated_at }}" disabled 
                       class="w-full p-2 bg-gray-200 border border-gray-300 rounded-lg">
            </div>

            <!-- Boutons -->
            <div class="flex justify-between">
                <a href="{{ route('formations.index') }}" class="text-gray-700 px-4 py-2 bg-gray-200 rounded-lg">
                    Annuler
                </a>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg">
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
</body>
</html>
