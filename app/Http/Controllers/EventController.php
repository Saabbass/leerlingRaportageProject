<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
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

  public function store(StoreEventRequest $request)
  {
      $validated = $request->validated();
      $subject = Subject::find($validated['subject_id']);
  
      $event = new Event();
      $event->subject_id = $subject->id;
      $event->subject_name = $subject->subject_name;
      $event->start = $validated['subject_date_start'];
      $event->end = $validated['subject_date_end'];
      $event->status = $validated['subject_status'];
      $event->save();
  
      return redirect()->route('dashboard')->with('success', 'Subject added to calendar successfully.');
  }

  public function edit($id)
  {
    // $event = Event::findOrFail($id);

    // return view('event.edit', ['event' => $event]);

    $event = Event::findOrFail($id);
    $subjects = Subject::all();
    return view('event.edit', compact('event', 'subjects'));
  }

  public function update(UpdateEventRequest $request, $id)
    {
        $event = Event::findOrFail($id);
        $subject = Subject::find($request->subject_id);

        $validated = $request->validated();

        $event->subject_id = $subject->id;
        $event->subject_name = $subject->subject_name;
        $event->start = $validated['subject_date_start'];
        $event->end = $validated['subject_date_end'];
        $event->status = $validated['subject_status'];
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
