<?php

namespace App\Http\Controllers\Api;

use App\Models\Speaker;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SpeakerApiController extends Controller
{
    /**
     * Display a listing of all speakers with their events and sessions.
     */
    public function index()
    {
        $speakers = Speaker::with(['event', 'sessions'])->get();

        return response()->json([
            'success' => true,
            'message' => 'Speakers fetched successfully',
            'data' => $speakers,
        ], 200);
    }

    /**
     * Store a newly created speaker.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'event_id' => 'required|exists:events,id',
        ]);

        $speaker = Speaker::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Speaker created successfully',
            'data' => $speaker->load('event'),
        ], 201);
    }

    /**
     * Display the specified speaker with related event and sessions.
     */
    public function show(Speaker $speaker)
    {
        return response()->json([
            'success' => true,
            'message' => 'Speaker fetched successfully',
            'data' => $speaker->load(['event', 'sessions']),
        ], 200);
    }

    /**
     * Update the specified speaker.
     */
    public function update(Request $request, Speaker $speaker)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'event_id' => 'sometimes|exists:events,id',
        ]);

        $speaker->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Speaker updated successfully',
            'data' => $speaker->load('event'),
        ], 200);
    }

    /**
     * Remove the specified speaker from storage.
     */
    public function destroy(Speaker $speaker)
    {
        $speaker->delete();

        return response()->json([
            'success' => true,
            'message' => 'Speaker deleted successfully',
        ], 200);
    }
}
