
<form action="{{ route('characters.update', $character->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label for="name">Character Name:</label>
    <input type="text" name="name" id="name" value="{{ old('name', $character->name) }}" required><br>

    <label for="image">Character Image:</label>
    <input type="file" name="image" id="image"><br>

    @if($character->image)
        <img src="{{ asset('storage/' . $character->image) }}" alt="Character Image" width="100"><br>
    @endif

    <button type="submit">Update Character</button>
</form>
