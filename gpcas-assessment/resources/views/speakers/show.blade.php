@extends('layouts.app')

@section('title', $speaker->name)

@section('content')
<div class="section-card speaker-details-card">
    <h1>{{ $speaker->name }}</h1>
    <p class="speaker-bio">{{ $speaker->bio ?? 'No bio available.' }}</p>

    <div class="actions">
        <a href="{{ route('speakers.edit', $speaker->id) }}" class="btn btn-warning btn-sm color-white editbtn">Edit</a>

        <form action="{{ route('speakers.destroy', $speaker->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirmDelete()">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm">Delete</button>
        </form>
    </div>

    <h3>🎯 Sessions</h3>
    @if($speaker->sessions->count())
        <ul class="sessions-list">
            @foreach($speaker->sessions as $session)
                <li class="session-card">{{ $session->title }}</li>
            @endforeach
        </ul>
    @else
        <p>No sessions assigned yet.</p>
    @endif
</div>

<script>
    function confirmDelete() {
        return confirm('Are you sure you want to delete this speaker?');
    }
</script>
@endsection
