<?php

namespace App\Http\Controllers\Api;

use App\Models\Event;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventApiController extends Controller
{
    /**
     * Display a listing of all events with sessions and speakers.
     */
    public function index()
    {
        try {
            $events = Event::with(['speakers', 'sessions.speakers'])->get();

            return response()->json([
                'success' => true,
                'message' => 'Events fetched successfully',
                'data' => $events,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch events',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Store a newly created event in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
            ]);

            $event = Event::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Event created successfully',
                'data' => $event,
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create event',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified event with sessions and speakers.
     */
    public function show(Event $event)
    {
        try {
            $event->load(['speakers', 'sessions.speakers']);

            return response()->json([
                'success' => true,
                'message' => 'Event fetched successfully',
                'data' => $event,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch event',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Update the specified event in storage.
     */
    public function update(Request $request, Event $event)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
            ]);

            $event->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'Event updated successfully',
                'data' => $event,
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update event',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified event from storage.
     */
    public function destroy(Event $event)
    {
        try {
            $event->delete();

            return response()->json([
                'success' => true,
                'message' => 'Event deleted successfully',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete event',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
