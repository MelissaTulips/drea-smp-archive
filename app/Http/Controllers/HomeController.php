<?php

namespace App\Http\Controllers;

use App\Models\Section;  // Make sure to import the Section model
use App\Models\Character;  // Make sure to import the Character model

class HomeController extends Controller
{
    // Show the main welcome page with global sections and characters
    public function index()
    {
        // Fetch all global sections (sections without a character_id)
        $globalSections = Section::global()->get();

        // Fetch all characters for the character list
        $characters = Character::all();

        // Return the view with the global sections and characters data
        return view('welcome', compact('globalSections', 'characters'));
    }
}
