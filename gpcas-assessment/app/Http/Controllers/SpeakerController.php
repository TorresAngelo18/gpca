<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\Speaker;

class SpeakerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Event $event)
    {
        // Get all speakers for this event
        $speakers = $event->speakers;

        return view('speakers.index', compact('event', 'speakers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($eventId)
    {
        $event = \App\Models\Event::findOrFail($eventId);
        return view('speakers.create', compact('event'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Event $event)
    {
        //


        $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string',
        ]);

        // Create a speaker under this event
        $event->speakers()->create($request->only('name', 'bio'));

        return redirect()->route('events.show', $event->id)
            ->with('success', 'Speaker added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Speaker $speaker)
    {
        $sessions = $speaker->sessions;
        return view('speakers.show', compact('speaker', 'sessions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $speaker = Speaker::findOrFail($id);
        return view('speakers.edit', compact('speaker'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  Speaker $speaker)
    {
        //
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            // optionally: 'event_id' => 'required|exists:events,id'
        ]);

        $speaker->update($validated);

        return redirect()->route('events.show', $speaker->event_id)->with('success', 'Speaker updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Speaker $speaker)
    {
        //
        $eventId = $speaker->event_id;
        $speaker->delete();

        return redirect()->route('events.show', $eventId)->with('success', 'Speaker deleted successfully.');
    }
}
