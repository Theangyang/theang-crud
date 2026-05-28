<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NoteController as ApiNoteController;

Route::apiResource('notes', ApiNoteController::class);