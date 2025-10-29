@extends('layouts.app')

@section('title', 'Add Speaker for ' . $event->name)

@section('content')
<div class="form-card">
    <h1>Add Speaker for {{ $event->name }}</h1>

    <form action="{{ route('speakers.store', $event->id) }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Name:</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}">
            @error('name')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="bio">Bio:</label>
            <textarea id="bio" name="bio">{{ old('bio') }}</textarea>
            @error('bio')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-add">Add Speaker</button>
        <a href="{{ route('events.show', $event) }}" class="btn btn-secondary">Back to Event</a>
    </form>
</div>
@endsection