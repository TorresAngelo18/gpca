<?php

namespace App\Http\Controllers\Api;

use App\Models\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SessionApiController extends Controller
{
    /**
     * Display a listing of all sessions with related event and speakers.
     */
    public function index()
    {
        $sessions = Session::with(['event', 'speakers'])->get();

        return response()->json([
            'success' => true,
            'message' => 'Sessions fetched successfully',
            'data' => $sessions,
        ], 200);
    }

    /**
     * Store a newly created session.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'event_id' => 'required|exists:events,id',
            'speaker_ids' => 'nullable|array',
            'speaker_ids.*' => 'exists:speakers,id',
        ]);

        $session = Session::create([
            'title' => $validated['title'],
            'event_id' => $validated['event_id'],
        ]);

        if (!empty($validated['speaker_ids'])) {
            $session->speakers()->sync($validated['speaker_ids']);
        }

        return response()->json([
            'success' => true,
            'message' => 'Session created successfully',
            'data' => $session->load(['event', 'speakers']),
        ], 201);
    }

    /**
     * Display the specified session with event and speakers.
     */
    public function show(Session $session)
    {
        return response()->json([
            'success' => true,
            'message' => 'Session fetched successfully',
            'data' => $session->load(['event', 'speakers']),
        ], 200);
    }

    /**
     * Update the specified session.
     */
    public function update(Request $request, Session $session)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'speaker_ids' => 'nullable|array',
            'speaker_ids.*' => 'exists:speakers,id',
        ]);

        $session->update(['title' => $validated['title']]);

        if (isset($validated['speaker_ids'])) {
            $session->speakers()->sync($validated['speaker_ids']);
        }

        return response()->json([
            'success' => true,
            'message' => 'Session updated successfully',
            'data' => $session->load(['event', 'speakers']),
        ], 200);
    }

    /**
     * Remove the specified session from storage.
     */
    public function destroy(Session $session)
    {
        $session->delete();

        return response()->json([
            'success' => true,
            'message' => 'Session deleted successfully',
        ], 200);
    }
}
