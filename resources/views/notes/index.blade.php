@extends('notes.layout')

@section('page_title', 'All Notes')
@section('page_subtitle', 'Create, view, edit, and delete your notes')

@section('content')
    @if($notes->count() === 0)
        <p>No notes found. Create a new note!</p>
    @else
        <div class="note-list">
            @foreach($notes as $note)
                <div class="note-item">
                    <h3>{{ $note->title }}</h3>
                    <p>{{ \Illuminate\Support\Str::limit($note->content, 120) }}</p>
                    <a href="{{ route('notes.show', $note) }}" class="btn">View</a>
                    <a href="{{ route('notes.edit', $note) }}" class="btn">Edit</a>

                    <form action="{{ route('notes.destroy', $note) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>
    @endif
@endsection
