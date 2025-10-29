    @extends('layouts.app')

    @section('title', $event->name)

    @section('content')
    <div class="event-card">
        <h1>{{ $event->name }}</h1>

        <!-- Speakers Section -->
        <div class="section-card">
            <div class="section-header">
                <h2>👤 Speakers</h2>
                <a class="btn btn-add color-white" href="{{ route('speakers.create', $event->id) }}">Add Speaker</a>
            </div>

            @if($event->speakers->count())
            <ul class="list">
                @foreach($event->speakers as $speaker)
                <li>
                    <a href="{{ route('speakers.show', $speaker->id) }}" class="speaker-link">
                        {{ $speaker->name }}
                    </a>
                </li>
                @endforeach
            </ul>
            @else
            <p>No speakers added yet.</p>
            @endif
        </div>

       <!-- Sessions Section -->
<div class="section-card">
    <div class="section-header">
        <h2>🎯 Sessions</h2>
        <a class="btn btn-add color-white" href="{{ route('sessions.create', $event->id) }}">Add Session</a>
    </div>
    @if($event->sessions->count())
    <ul class="list">
        @foreach($event->sessions as $session)
        <li>
            <h4 style="font-weight: bold;">{{ $session->title }}</h4>
    
            <span class="speakers-label">Speaker/s:</span>
            
            @foreach($session->speakers as $speaker)
            <span class="speaker-name">{{ $speaker->name }}</span>{{ !$loop->last ? ',' : '' }}
            @endforeach
            
<div style="margin-top: 20px;">
            <!-- Edit button -->
            <a href="{{ route('sessions.edit', $session->id) }}" class="btn btn-add btn-sm color-white editbtn">Edit</a>

            <!-- Delete form with confirmation -->
            <form action="{{ route('sessions.destroy', $session->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this session?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">Delete</button>
            </form>
            </div>
        </li>
        @endforeach
    </ul>
    @else
    <p>No sessions added yet.</p>
    @endif
</div>

    </div>
    @endsection