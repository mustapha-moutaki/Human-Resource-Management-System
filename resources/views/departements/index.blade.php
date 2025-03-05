@extends('layouts.app')

@section('title', 'Departements')

@section('content')
    <div class="container mx-auto p-6">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white shadow-md rounded-lg">
                <div class="px-6 py-4 flex justify-between items-center">
                    <h4 class="text-xl font-semibold">Departements</h4>
                    <a href="{{ route('departements.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                        <i class="fas fa-plus"></i> Add Departement
                    </a>
                </div>

                <div class="p-6">
                    <table class="min-w-full bg-white border border-gray-300">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="border px-4 py-2">#</th>
                                <th class="border px-4 py-2">Name</th>
                                <th class="border px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            @foreach ($departements as $departement)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="border px-4 py-2">{{ $departement->id }}</td>
                                <td class="border px-4 py-2">{{ $departement->name }}</td>
                                <td class="border px-4 py-2">
                                    <div class="flex">
                                        <a href="{{ route('departements.edit', $departement->id) }}" class="text-blue-500 hover:underline mr-2">
                                            Edit
                                        </a>
                                        <form action="{{ route('departements.destroy', $departement->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this departement?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:underline">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection