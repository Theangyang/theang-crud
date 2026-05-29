@extends('notes.layout')

@section('content')
    <h2>{{ $note->title }}</h2>
    <p>{{ $note->content }}</p>

    <a href="{{ route('notes.index') }}">Back</a>
@endsection
