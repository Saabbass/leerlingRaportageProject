<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Subject;
use Illuminate\Http\Request;

class EventController extends Controller
{
  public function create()
  {
    $subjects = Subject::select('id', 'subject_name')->get(); // Fetch all subjects
    return view('event.create', compact('subjects'));
  }

  public function store(Request $request)
  {
    $subject = Subject::find($request->subject_id);

    $request->validate([
      'subject_id' => 'required|exists:subjects,id',
      'subject_date_start' => 'required|date',
      'subject_date_end' => 'required|date',
      'subject_status' => 'required|string',
    ]);


    $event = new Event();
    $event->subject_id = $subject->id;
    $event->subject_name = $subject->subject_name;
    $event->start = $request->input('subject_date_start');
    $event->end = $request->input('subject_date_end');
    $event->status = $request->input('subject_status');
    $event->save();

    return redirect()->route('dashboard')->with('success', 'Les aangemaakt.');
  }

  public function edit($id)
  {
    // $event = Event::findOrFail($id);

    // return view('event.edit', ['event' => $event]);

    $event = Event::findOrFail($id);
    $subjects = Subject::all();
    return view('event.edit', compact('event', 'subjects'));
  }

  public function update(Request $request, $id)
  {
    $event = Event::findOrFail($id);
    $subject = Subject::find($request->subject_id);

    $request->validate([
      'subject_id' => 'required|string|max:255',
      'subject_date_start' => 'required|date',
      'subject_date_end' => 'required|date',
      'subject_status' => 'required|string',
    ]);

    // $event = Event::findOrFail($id);
    $event->subject_id = $subject->id;
    $event->subject_name = $subject->subject_name;
    $event->start = $request->input('subject_date_start');
    $event->end = $request->input('subject_date_end');
    $event->status = $request->input('subject_status');
    $event->save();

    return redirect()->route('dashboard')->with('success', 'De les is succesvol aangepast.');
  }

  public function destroy($id)
  {
    $event = Event::findOrFail($id);
    $event->delete();

    return redirect()->route('dashboard')->with('success', 'Les verwijderd.');
  }
}
