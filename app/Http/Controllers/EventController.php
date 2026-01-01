<?php

namespace App\Http\Controllers;

use App\Models\NotificationEvent;
use Illuminate\Http\Request;

class EventController extends Controller
{
    
    
    public function index()
    {
        $events = NotificationEvent::latest()->paginate(10);
        return view('notification-events.index', compact('events'));
    }

    public function create()
    {
        return view('notification-events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'key' => 'required|string|unique:notification_events,key',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        NotificationEvent::create($request->all());

        return redirect()->route('notification-events.index')
            ->with('success', 'Notification event created successfully.');
    }

    public function edit(NotificationEvent $notificationEvent)
    {
        return view('notification-events.edit', compact('notificationEvent'));
    }

    public function update(Request $request, NotificationEvent $notificationEvent)
    {
        $request->validate([
            'key' => 'required|string|unique:notification_events,key,' . $notificationEvent->id,
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $notificationEvent->update($request->all());

        return redirect()->route('notification-events.index')
            ->with('success', 'Notification event updated successfully.');
    }

    public function destroy(NotificationEvent $notificationEvent)
    {
        $notificationEvent->delete();

        return redirect()->route('notification-events.index')
            ->with('success', 'Notification event deleted successfully.');
    }

}
