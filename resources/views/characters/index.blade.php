<!-- resources/views/characters/index.blade.php -->

<h1>Dream SMP Characters</h1>

<a href="{{ route('characters.create') }}">Add New Character</a>

<ul>
    @foreach ($characters as $character)
        <li>
            <a href="{{ route('characters.show', $character) }}">{{ $character->name }}</a>

            <!-- Optional: display the image -->
            @if ($character->image)
                <img src="{{ asset('storage/' . $character->image) }}" alt="Character Image" width="200">


            @endif

            @auth
                <a href="{{ route('characters.edit', $character) }}">Edit</a>
                <form action="{{ route('characters.destroy', $character) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            @endauth
        </li>
    @endforeach
</ul>
