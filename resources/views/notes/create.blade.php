@extends('notes.layout')

@section('page_title', 'Create Note')
@section('page_subtitle', 'Add a new note with title and content')

@section('content')
    @if($errors->any())
        <div class="errors" style="background-color: #FECACA; padding: 10px; border-radius: 8px;">
            <ul style="color: #B91C1C;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('notes.store') }}" method="POST" style="margin-top: 20px;">
        @csrf

        <div class="form-row" style="margin-bottom: 20px;">
            <label for="title" style="font-weight: bold;">Title</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" placeholder="Enter note title"
                   style="width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #E5E7EB; background-color: #f7fafc;">
        </div>

        <div class="form-row" style="margin-bottom: 20px;">
            <label for="content" style="font-weight: bold;">Content</label>
            <textarea id="content" name="content" placeholder="Write your note here..." 
                      style="width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #E5E7EB; background-color: #f7fafc; min-height: 150px;">
                {{ old('content') }}
            </textarea>
        </div>

        <button class="btn btn-primary" type="submit" style="background-color: #D9007C; color: white; padding: 10px 20px; border-radius: 8px;">Save Note</button>
        <a class="btn" href="{{ route('notes.index') }}" style="margin-left: 10px; background-color: #D1FAE5; color: #10B981; padding: 10px 20px; border-radius: 8px;">Cancel</a>
    </form>
@endsection
