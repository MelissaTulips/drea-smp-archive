<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Models\Character;

class SectionController extends Controller
{


    public function index()
    {
 
        $sections = Section::all();


        return view('sections.index', compact('sections'));
    }

    public function create(Request $request)
    {
        $characterId = $request->get('character_id'); 
        $characters = Character::all(); 
    
        return view('sections.create', compact('characterId', 'characters'));
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'is_global' => 'required|boolean',
            'character_id' => 'nullable|exists:characters,id', 
        ]);
    
     
        Section::create([
            'title' => $request->title,
            'content' => $request->content,
            'is_global' => $request->is_global, 
            'character_id' => $request->character_id, 
        ]);
    

        return redirect()->route('sections.index')->with('success', 'Section created successfully!');
    }


    

    public function edit($id)
    {
        $section = Section::findOrFail($id);
        return view('sections.edit', compact('section'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $section = Section::findOrFail($id);
        $section->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('welcome');
    }

 public function destroy(Section $section)
{
    $section->delete();


    return redirect()->route('welcome')->with('success', 'Section deleted successfully!');
}

}
