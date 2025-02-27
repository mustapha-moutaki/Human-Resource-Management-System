
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Formation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('formation.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="title" class="block font-medium text-sm text-gray-700">
                                {{ __('Title') }}
                            </label>
                            <input id="title" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full" name="title" value="{{ old('title') }}" required autofocus>
                            @error('title')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="skill" class="block font-medium text-sm text-gray-700">
                                {{ __('Skill') }}
                            </label>
                            <input id="skill" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full" name="skill" value="{{ old('skill') }}" required>
                            @error('skill')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="completion_date" class="block font-medium text-sm text-gray-700">
                                {{ __('Completion Date') }}
                            </label>
                            <input id="completion_date" type="date" class="form-input rounded-md shadow-sm mt-1 block w-full" name="completion_date" value="{{ old('completion_date') }}" required>
                            @error('completion_date')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="type" class="block font-medium text-sm text-gray-700">
                                {{ __('Type') }}
                            </label>
                            <input id="type" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full" name="type" value="{{ old('type') }}" required>
                            @error('type')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                {{ __('Create') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
