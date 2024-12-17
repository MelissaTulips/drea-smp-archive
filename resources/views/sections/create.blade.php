@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create New Section</h1>

        <form action="{{ route('sections.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
            </div>

            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                <textarea name="content" id="content" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required></textarea>
            </div>

            <div class="mb-4">
                <label for="is_global" class="block text-sm font-medium text-gray-700">Global Section?</label>
                <select name="is_global" id="is_global" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>

            <!-- Optional: Character select dropdown -->
            <div class="mb-4">
                <label for="character_id" class="block text-sm font-medium text-gray-700">Character (if applicable)</label>
                <select name="character_id" id="character_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    <option value="">-- Select a Character --</option>
                    @foreach ($characters as $character)
                        <option value="{{ $character->id }}" {{ old('character_id') == $character->id ? 'selected' : '' }}>{{ $character->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Create Section</button>
        </form>
    </div>
@endsection
