<!-- resources/views/characters/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Character Information -->
    <div class="mb-6">
        <h1 class="text-4xl font-bold">{{ $character->name }}</h1>
        
        <!-- Character Image -->
        @if ($character->image)
            <div class="mt-4">
                <img src="{{ asset('storage/' . $character->image) }}" 
                     alt="{{ $character->name }}" 
                     class="border border-gray-300 rounded-md"
                     style="max-width: 300px; max-height: 300px; object-fit: cover;">
            </div>
        @else
            <div class="mt-4 text-gray-500">No image available for this character.</div>
        @endif
    </div>

    <!-- Sections for the Character -->
    <div class="mt-6">
        <h2 class="text-2xl font-semibold">Sections for {{ $character->name }}</h2>

        @foreach ($sections as $section)
            <div class="mt-4 bg-white p-4 border border-gray-300 rounded-md">
                <h3 class="text-xl font-semibold">{{ $section->title }}</h3>
                <p>{!! nl2br(e($section->content)) !!}</p>

                <!-- Action Buttons -->
                <div class="mt-2">
                    <a href="{{ route('sections.edit', $section->id) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-md">Edit</a>
                    <form action="{{ route('sections.destroy', $section->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach

        <!-- Add New Section Button -->
        <div class="mt-6">
            <a href="{{ route('sections.create', ['character_id' => $character->id]) }}" class="px-4 py-2 bg-blue-500 text-white rounded-md">Add New Section</a>
        </div>
    </div>
</div>
@endsection
