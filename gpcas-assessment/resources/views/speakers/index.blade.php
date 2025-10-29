@extends('layouts.app')

@section('title', 'Speakers for ' . $event->name)

@section('content')
<div class="section-card">
    <h1>🎤 Speakers for {{ $event->name }}</h1>

    <a href="{{ route('speakers.create', ['event' => $event->id]) }}" class="btn btn-add">Add Speaker</a>

    @if($speakers->isEmpty())
        <p>No speakers yet for this event.</p>
    @else
        <ul class="speaker-list">
            @foreach($speakers as $speaker)
                <li>
                    <strong>{{ $speaker->name }}</strong>
                    <div class="actions">
                        <a href="{{ route('speakers.show', $speaker->id) }}" class="btn btn-sm btn-primary">View</a>
                        <a href="{{ route('speakers.edit', $speaker->id) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('speakers.destroy', $speaker->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirmDelete()">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
</div>

<script>
    function confirmDelete() {
        return confirm('Are you sure you want to delete this speaker?');
    }
</script>
@endsection
