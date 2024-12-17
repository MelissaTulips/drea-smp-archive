@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center text-4xl mt-10">Dream SMP Archive Sections</h1>

    <div class="mt-6">
        <a href="{{ route('sections.create') }}" class="px-4 py-2 bg-green-500 text-white rounded-md">Create New Section</a>
    </div>

    <div class="mt-6">
        @foreach($sections as $section)
            <div class="bg-white p-4 mt-4 border border-gray-300 rounded-md">
                <h2 class="text-2xl">{{ $section->title }}</h2>
                <p>{{ \Illuminate\Support\Str::limit($section->content, 150) }}</p>

                <div class="mt-4">
                    <a href="{{ route('sections.edit', $section->id) }}" class="text-blue-500">Edit</a> | 
                    <form action="{{ route('sections.destroy', $section->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
