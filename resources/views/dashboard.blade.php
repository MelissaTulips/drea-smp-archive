@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <h1 class="text-4xl font-bold mb-6">Welcome to the Dream SMP Archive Dashboard</h1>

        <!-- User information -->
        <div class="bg-white p-6 rounded-lg shadow-lg mb-8">
            <h2 class="text-2xl font-semibold">Hello, {{ auth()->user()->name }}!</h2>
            <p class="text-gray-600">You're logged in and ready to manage the content.</p>
        </div>

        <!-- Dashboard Navigation -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Create/Edit Characters Section -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold mb-4">Manage Characters</h3>
                <p class="text-gray-600 mb-4">Create, edit, or delete characters in the Dream SMP Archive.</p>
                <a href="{{ route('characters.create') }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Create New Character</a>
                <a href="{{ route('characters.index') }}" class="inline-block mt-4 px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">View All Characters</a>
            </div>

            <!-- Manage Sections -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold mb-4">Manage Sections</h3>
                <p class="text-gray-600 mb-4">Create and manage sections on the main page or character pages.</p>
                <a href="{{ route('sections.create') }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Create New Section</a>
                <a href="{{ route('sections.index') }}" class="inline-block mt-4 px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">View All Sections</a>
            </div>

            <!-- User Profile Management -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold mb-4">Profile Management</h3>
                <p class="text-gray-600 mb-4">Edit your profile or manage your account settings.</p>
                <a href="{{ route('profile.edit') }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Edit Profile</a>
            </div>
        </div>
    </div>
@endsection
