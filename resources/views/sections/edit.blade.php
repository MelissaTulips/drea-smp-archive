@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Section: {{ $section->title }}</h2>

        <form action="{{ route('sections.update', $section->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Section Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $section->title }}" required>
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" class="form-control" rows="5" required>{{ $section->content }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update Section</button>
        </form>
    </div>
@endsection
