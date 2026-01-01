<?php

namespace App\Http\Controllers;

use App\Models\NotificationEventMapping;
use Illuminate\Http\Request;

class NotificationEventTemplateController extends Controller
{
     public function index()
    {
        $mappings = NotificationEventMapping::with(['event', 'template'])
            ->latest()
            ->paginate(10);

        return view('notification-event-templates.index', compact('mappings'));
    }

    public function create()
    {
        $events = fn_get_events();               // helper
        $templates = fn_get_email_templates();   // helper

        return view('notification-event-templates.create', compact('events', 'templates'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'notification_event_id' => 'required|exists:notification_events,id',
            'email_template_id' => 'required|exists:email_templates,id',
        ]);

        NotificationEventMapping::create([
            'notification_event_id' => $request->notification_event_id,
            'email_template_id' => $request->email_template_id,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()
            ->route('notification-event-templates.index')
            ->with('success', 'Mapping created successfully.');
    }

    public function edit(NotificationEventMapping $notificationEventTemplate)
    {
        $events = fn_get_events();
        $templates = fn_get_email_templates();

        return view(
            'notification-event-templates.edit',
            compact('notificationEventTemplate', 'events', 'templates')
        );
    }

    public function update(Request $request, NotificationEventMapping $notificationEventTemplate)
    {
        $request->validate([
            'notification_event_id' => 'required|exists:notification_events,id',
            'email_template_id' => 'required|exists:email_templates,id',
        ]);

        $notificationEventTemplate->update([
            'notification_event_id' => $request->notification_event_id,
            'email_template_id' => $request->email_template_id,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()
            ->route('notification-event-templates.index')
            ->with('success', 'Mapping updated successfully.');
    }

    public function destroy(NotificationEventMapping $notificationEventTemplate)
    {
        $notificationEventTemplate->delete();

        return back()->with('success', 'Mapping deleted successfully.');
    }
}
