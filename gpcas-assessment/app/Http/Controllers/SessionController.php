<?php

namespace App\Http\Controllers;


use App\Models\Session;
use App\Models\Event;
use App\Models\Speaker;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Event $event)
    {
        $speakers = $event->speakers; // for assignment
        return view('sessions.create', compact('event', 'speakers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Event $event)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'speaker_ids' => 'array',
    ]);

    // Create the session and associate with the event
    $session = new Session($request->only('title'));
    $session->event()->associate($event);
    $session->save();

    // Attach valid speakers
    if ($request->has('speaker_ids')) {
        $validSpeakerIds = Speaker::whereIn('id', $request->speaker_ids)
                                  ->where('event_id', $event->id)
                                  ->pluck('id')
                                  ->toArray();

  if (!empty($validSpeakerIds)) {
              $session->speakers()->sync($validSpeakerIds); // safe now
       }
    }

    // Redirect back to the event page
    return redirect()->route('events.show', $event->id)
                     ->with('success', 'Session created successfully!');

                     
}


public function edit(Session $session)
{
    $event = $session->event;
    $speakers = $event->speakers; 
    $assignedSpeakers = $session->speakers->pluck('id')->toArray();

    return view('sessions.edit', compact('session', 'event', 'speakers', 'assignedSpeakers'));
}

public function update(Request $request, Session $session)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'speaker_ids' => 'array',
    ]);

    $session->update($request->only('title'));

    // Sync speakers safely (only those belonging to the same event)
    if ($request->has('speaker_ids')) {
        $validSpeakerIds = Speaker::whereIn('id', $request->speaker_ids)
                                  ->where('event_id', $session->event_id)
                                  ->pluck('id')
                                  ->toArray();
        $session->speakers()->sync($validSpeakerIds);
    } else {
        $session->speakers()->sync([]); // remove all if none selected
    }

    return redirect()->route('events.show', $session->event_id)
                     ->with('success', 'Session updated successfully!');
}



public function destroy(Session $session)
{
    $eventId = $session->event_id;
    $session->delete();

    return redirect()->route('events.show', $eventId)
                     ->with('success', 'Session deleted successfully!');
}

}