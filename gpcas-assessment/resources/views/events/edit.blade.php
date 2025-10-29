@extends('layouts.app')

@section('title', 'Edit Event: ' . $event->name)

@section('content')
<div class="form-card">
    <h1>Edit Event</h1>

    <form action="{{ route('events.update', $event->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Event Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $event->name) }}">
            @error('name')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-add">Update Event</button>
        <a href="{{ route('events.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection