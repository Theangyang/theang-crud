<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    // READ (List)
    public function index()
    {
        $notes = Note::latest()->get();
        return view('notes.index', compact('notes')); // data passing
    }

    // CREATE (Form)
    public function create()
    {
        return view('notes.create');
    }

    // STORE (Save new)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'nullable',
        ]);

        Note::create($validated);

        return redirect()->route('notes.index')->with('success', 'Note created!');
    }

    // READ (Single)
    public function show(Note $note)
    {
        return view('notes.show', compact('note'));
    }

    // UPDATE (Edit form)
    public function edit(Note $note)
    {
        return view('notes.edit', compact('note'));
    }

    // UPDATE (Save changes)
    public function update(Request $request, Note $note)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'nullable',
        ]);

        $note->update($validated);

        return redirect()->route('notes.index')->with('success', 'Note updated!');
    }

    // DELETE
    public function destroy(Note $note)
    {
        $note->delete();
        return redirect()->route('notes.index')->with('success', 'Note deleted!');
    }
}
