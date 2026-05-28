<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NoteController as ApiNoteController;

Route::apiResource('notes', ApiNoteController::class)->names([
    'index' => 'api.notes.index',
    'store' => 'api.notes.store',
    'show' => 'api.notes.show',
    'update' => 'api.notes.update',
    'destroy' => 'api.notes.destroy',
]);