<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Formations</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body class="bg-gray-100 p-10">

    <h1 class="text-3xl font-bold text-center mb-8">Formations list</h1>

    <!-- Button to create new formation -->
    <div class="text-right mb-6">
        <a href="{{ route('formations.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
            <i class="fas fa-plus-circle mr-2"></i> Create Formation
        </a>
    </div>

    <div class="max-w-7xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200 text-center">
                    <th class="border border-gray-300 px-4 py-2">#</th>
                    <th class="border border-gray-300 px-4 py-2">Title</th>
                    <th class="border border-gray-300 px-4 py-2">Skill</th>
                    <th class="border border-gray-300 px-4 py-2">Completion Date</th>
                    <th class="border border-gray-300 px-4 py-2">Type</th>
                    <th class="border border-gray-300 px-4 py-2">Created At</th>
                    <th class="border border-gray-300 px-4 py-2">Updated At</th>
                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($formations as $formation)
                <tr class="text-center">
                    <td class="border border-gray-300 px-4 py-2">{{ $formation->id }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $formation->title }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $formation->skill }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $formation->completion_date }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $formation->type }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $formation->created_at }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $formation->updated_at }}</td>
                    <td class="border border-gray-300 px-4 py-2 flex justify-center space-x-2">
                        <!-- Edit Button -->
                        <a href="{{ route('formations.edit', $formation->id) }}" class="text-blue-500 text-lg mx-2">
                            <i class="fas fa-edit"></i>
                        </a>

                        <!-- Delete Button -->
                        <form method="POST" action="{{ route('formations.destroy', $formation->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 text-lg mx-2">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
