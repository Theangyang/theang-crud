<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

Route::get('/', function () {
    return redirect()->route('notes.index');
});

Route::resource('notes', NoteController::class)->names([
    'index' => 'notes.index',
    'create' => 'notes.create',
    'store' => 'notes.store',
    'show' => 'notes.show',
    'edit' => 'notes.edit',
    'update' => 'notes.update',
    'destroy' => 'notes.destroy',
]);