@extends('layouts.app')

@section('title', 'Edit Session')

@section('content')
<div class="section-card">
    <h1>Edit Session: {{ $session->title }}</h1>

    <form action="{{ route('sessions.update', $session->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Session Title -->
        <div class="form-group">
            <label for="title">Session Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $session->title) }}" required class="form-control">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

       <!-- Assign Speakers -->
<div class="form-group">
    <label>Assign Speakers</label>
    <div class="checkbox-group">
        @foreach($event->speakers as $speaker)
        <div class="form-check">
            <input
                type="checkbox"
                name="speaker_ids[]"
                value="{{ $speaker->id }}"
                id="speaker_{{ $speaker->id }}"
                class="form-check-input"
                {{ in_array($speaker->id, $session->speakers->pluck('id')->toArray()) ? 'checked' : '' }}
            >
            <label for="speaker_{{ $speaker->id }}" class="form-check-label">
                {{ $speaker->name }}
            </label>
        </div>
        @endforeach
    </div>
    @error('speaker_ids')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>


        <button type="submit" class="btn btn-primary">Update Session</button>
        <a href="{{ route('events.show', $event->id) }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
