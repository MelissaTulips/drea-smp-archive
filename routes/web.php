<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\SectionController;
use Illuminate\Support\Facades\Route;
use App\Models\Section;
use App\Models\Character;


Route::get('/', function () {
    $globalSections = Section::where('is_global', true)->get();
    $characters = Character::all();
    return view('welcome', compact('globalSections', 'characters'));
})->name('welcome');

Route::resource('characters', CharacterController::class);

Route::resource('sections', SectionController::class);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes (authenticated access required)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
