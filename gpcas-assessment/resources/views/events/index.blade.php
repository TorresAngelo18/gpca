@extends('layouts.app')

@section('title', 'Events')

@section('content')
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="event-header">
    <h1>🎉 Events</h1>
    <a href="{{ route('events.create') }}" class="btn btn-add color-white">Add Event</a>
</div>

@if($events->isEmpty())
<p class="no-events">No events available.</p>
@else
<div class="row event-list">
    @foreach($events as $event)
    <div class="col-md-6 col-lg-4">
        <div class="card">
            <a href="{{ route('events.show', $event->id) }}">{{ $event->name }}</a>
            <div class="card-details">
                <p>{{ $event->sessions->count() }} Sessions</p>

                <!-- Edit button (optional) -->
                <a href="{{ route('events.edit', $event->id) }}" class="btn btn-add btn-sm color-white editbtn">Edit</a>

                <!-- Delete form with confirmation -->
                <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirmDelete()">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endif

<!-- JS confirmation -->
<script>
    function confirmDelete() {
        return confirm('Are you sure you want to delete this event?');
    }
</script>
@endsection