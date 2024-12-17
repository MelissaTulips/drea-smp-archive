<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CharacterController extends Controller
{
    // Show the list of characters
    public function index()
    {
        // Fetch all characters from the database
        $characters = Character::all();
    
        // Pass the characters to the 'index' view
        return view('characters.index', compact('characters'));
    }

    // Show the form to create a new character
    public function create()
    {
        return view('characters.create');
    }

    // Store the new character in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image type and size
        ]);

        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public'); // Store image in the 'public/images' directory
        }

        // Create the character
        Character::create([
            'name' => $request->name,
            'image' => $imagePath, // Store the image path in the database
        ]);

        return redirect()->route('characters.index');
    }



    public function show(Character $character)
    {
   
        $sections = $character->sections;

    return view('characters.show', compact('character', 'sections'));
    }
    

    // Show the form to edit a character
    public function edit($id)
    {
        $character = Character::findOrFail($id); // Find the character by ID
        return view('characters.edit', compact('character')); // Pass the character to the view
    }

    // Update the character in the database
    public function update(Request $request, Character $character)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image type and size
        ]);

        // Store the existing image path if no new image is uploaded
        $imagePath = $character->image;

        // If a new image is uploaded, delete the old one and store the new one
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($imagePath && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }

            // Store the new image
            $imagePath = $request->file('image')->store('images', 'public');
        }

        // Update the character with the new data
        $character->update([
            'name' => $request->name,
            'image' => $imagePath, // Store the new image path in the database
        ]);

        return redirect()->route('characters.index');
    }

    // Delete the character from the database
    public function destroy(Character $character)
    {
        // Delete the associated image if it exists
        if ($character->image && Storage::disk('public')->exists($character->image)) {
            Storage::disk('public')->delete($character->image);
        }

        // Delete the character record
        $character->delete();

        return redirect()->route('characters.index');
    }
}
