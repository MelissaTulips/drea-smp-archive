@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-4xl font-bold">Dream SMP Archive</h1>
        
        <!-- Display Global Sections -->
        <div class="mt-6">
            <h2 class="text-2xl font-semibold">Global Sections</h2>
            
            <!-- Loop through each global section and display it -->
            @foreach ($globalSections as $section)
                <div class="mt-4 bg-white p-4 border border-gray-300 rounded-md">
                    <h3 class="text-xl">{{ $section->title }}</h3>
                    <p>{!! nl2br(e($section->content)) !!}</p>

                    <!-- Edit and Delete buttons for each section -->
                    <div class="mt-2">
                        <a href="{{ route('sections.edit', $section->id) }}" class="btn btn-primary">Edit</a>

                        <!-- Delete form -->
                        <form action="{{ route('sections.destroy', $section->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach

            <!-- Button to Add New Global Section -->
            <div class="mt-6">
                <a href="{{ route('sections.create') }}" class="btn btn-success">Add New Section</a>
            </div>
        </div>

        <!-- List of Characters -->
        <div class="mt-6">
            <h2 class="text-2xl font-semibold">Characters</h2>
            <ul>
                @foreach ($characters as $character)
                    <li>
                        <a href="{{ route('characters.show', $character->id) }}" class="text-blue-600">{{ $character->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
