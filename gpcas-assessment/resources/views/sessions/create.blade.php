@extends('layouts.app')

@section('title', 'Add Session')

@section('content')
<div class="form-card">
    <h1>Add Session for {{ $event->name }}</h1>

    @if ($errors->any())
    <div class="alert alert-error">
        Please fix the errors below.
    </div>
    @endif

    <form method="POST" action="{{ route('sessions.store', $event) }}">
        @csrf

        <div class="form-group">
            <label for="title">Session Title</label>
            <input type="text" name="title" id="title" placeholder="Session Title" value="{{ old('title') }}">
            @error('title')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group d-flex">
            <h3>Assign Speakers</h3>
            <div class="checkbox-group">
                @foreach($event->speakers as $speaker)
                <label class="checkbox-label">
                    <input type="checkbox" name="speaker_ids[]" value="{{ $speaker->id }}"> {{ $speaker->name }}
                </label>
                @endforeach
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-add">Save Session</button>
            <a href="{{ route('events.show', $event) }}" class="btn btn-secondary">Back to Event</a>
        </div>
    </form>
</div>
@endsection