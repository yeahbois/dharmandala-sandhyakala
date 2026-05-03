<?php

namespace App\Http\Controllers;

use App\Models\ThanosEvent;
use App\Models\ThanosResponder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ThanosController extends Controller
{
    public function create()
    {
        if (Auth::user()->group !== 'akad' && !Auth::user()->isSuperAdmin()) {
            abort(403);
        }

        $event = ThanosEvent::first();
        return view('dharman_thanos.make', compact('event'));
    }

    public function store(Request $request)
    {
        if (Auth::user()->group !== 'akad' && !Auth::user()->isSuperAdmin()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'deadline' => 'required|date',
            'questions.*' => 'nullable|image|max:2048',
            'question_urls' => 'nullable|string',
            'right_answer' => 'required|string',
        ]);

        $event = ThanosEvent::first();

        $imageUrls = [];

        if ($request->hasFile('questions') || $request->filled('question_urls')) {
            // Delete old local images if we are replacing them
            if ($event && $event->questions) {
                foreach ($event->questions as $oldImage) {
                    if (!\Illuminate\Support\Str::startsWith($oldImage, 'http')) {
                        $oldPath = public_path($oldImage);
                        if (File::exists($oldPath)) {
                            File::delete($oldPath);
                        }
                    }
                }
            }

            if ($request->hasFile('questions')) {
                foreach ($request->file('questions') as $file) {
                    if (count($imageUrls) >= 3) break;
                    $filename = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('images/thanos'), $filename);
                    $imageUrls[] = 'images/thanos/' . $filename;
                }
            }

            if ($request->filled('question_urls')) {
                $urls = explode("\n", $request->question_urls);
                foreach ($urls as $url) {
                    if (count($imageUrls) >= 3) break;
                    $url = trim($url);
                    if ($url) $imageUrls[] = $url;
                }
            }
        } else {
            $imageUrls = $event ? $event->questions : [];
        }

        $eventId = $event ? $event->event_id : 'THANOS-' . time();

        if ($event) {
            $event->update([
                'title' => $request->title,
                'deadline' => $request->deadline,
                'questions' => $imageUrls,
                'right_answer' => $request->right_answer,
            ]);
        } else {
            ThanosEvent::create([
                'title' => $request->title,
                'deadline' => $request->deadline,
                'questions' => $imageUrls,
                'right_answer' => $request->right_answer,
                'event_id' => $eventId,
            ]);
        }

        return redirect()->route('dashboard')->with('success', 'THANOS Event updated successfully!');
    }

    public function delete(Request $request)
    {
        if (Auth::user()->group !== 'akad' && !Auth::user()->isSuperAdmin()) {
            abort(403);
        }

        $event = ThanosEvent::firstOrFail();

        $request->validate([
            'confirm_event_id' => 'required|string',
        ]);

        if ($request->confirm_event_id !== $event->event_id) {
            return back()->with('error', 'Event ID confirmation failed.');
        }

        // Delete images
        if ($event->questions) {
            foreach ($event->questions as $image) {
                $path = public_path($image);
                if (File::exists($path)) {
                    File::delete($path);
                }
            }
        }

        $event->delete(); // This should cascade delete responders

        return redirect()->route('dashboard')->with('success', 'THANOS Event deleted successfully!');
    }

    public function publicIndex()
    {
        $event = ThanosEvent::latest()->first();
        return view('dharman_thanos.thanos', compact('event'));
    }

    public function submitResponse(Request $request)
    {
        $event = ThanosEvent::firstOrFail();

        $request->validate([
            'name' => 'required|string|max:255',
            'question' => 'required|string',
            'payment' => 'required|string',
            'paymentNumber' => 'required|string',
            'usnig' => 'required|string',
        ]);

        ThanosResponder::create([
            'event_id' => $event->event_id,
            'name' => $request->name,
            'answer' => $request->question,
            'payment' => $request->payment,
            'payment_number' => $request->paymentNumber,
            'phone' => $request->usnig,
        ]);

        return back()->with('success', 'Your answer has been submitted!');
    }
}
