

<form action="{{ route('characters.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Name Field -->
    <label for="name">Character Name:</label>
    <input type="text" name="name" id="name" value="{{ old('name') }}" required><br>

    <!-- Image Upload -->
    <label for="image">Character Image:</label>
    <input type="file" name="image" id="image"><br>

    <button type="submit">Create Character</button>
</form>
