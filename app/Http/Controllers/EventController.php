<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class EventController extends Controller
{
  public function create()
  {
    $subjects = Subject::select('id', 'subject_name')->get(); // Fetch all subjects
    $teachers = User::select('id', 'first_name', 'last_name')
      ->where('role', 'teacher')
      ->get(); // Fetch only Users with the role 'teacher'

    return view('event.create', compact('subjects', 'teachers'));
  }

  public function store(StoreEventRequest $request)
  {
    $validated = $request->validated();
    $subject = Subject::find($validated['subject_id']);
    $teacher = User::find($validated['teacher_id']);

    $event = new Event();
    $event->subject_id = $subject->id;
    // $event->subject_name = $subject->subject_name;
    $event->teacher_id = $teacher->id;
    // $event->subject_name = $validated['subject_name'];
    $event->start = $validated['subject_date_start'];
    $event->end = $validated['subject_date_end'];
    $event->status = $validated['subject_status'];
    $event->save();

    return redirect()->route('dashboard')->with('success', 'Les ingepland.');
  }

  public function edit($id)
  {
    // $event = Event::findOrFail($id);

    // return view('event.edit', ['event' => $event]);

    $event = Event::findOrFail($id);
    $subjects = Subject::all();
    $teachers = User::select('id', 'first_name', 'last_name')
    ->where('role', 'teacher')
    ->get(); // Fetch only Users with the role 'teacher'
    return view('event.edit', compact('event', 'subjects', 'teachers'));
  }

  public function update(UpdateEventRequest $request, $id)
  {
    $event = Event::findOrFail($id);
    $subject = Subject::find($request->subject_id);
    $teacher = Subject::find($request->teacher_id);
    
    $validated = $request->validated();
    $event->subject_id = $subject->id;
    // $event->subject_name = $subject->subject_name;
    $event->subject_name = $validated['subject_name'];
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
