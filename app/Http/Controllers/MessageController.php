<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Models\User;

use Illuminate\Http\Request;
use App\Models\Announcements;
use GuzzleHttp\Psr7\Message;
use Illuminate\Auth\Events\Validated;

class MessageController extends Controller
{
    public function index(Request $request)
{
    $query = Announcements::with(['sentBy', 'user']);

    

    if (auth()->user()->role == 'student') {
        $query->where('user_id', auth()->id());
    } else if (auth()->user()->role == 'teacher') {
        if ($request->has('filter') && $request->filter == 'others') {
            $query->where('sent_by', '!=', auth()->id());
        } else {
            $query->where('sent_by', auth()->id());
        }
    } else if (auth()->user()->role == 'parent') {
        $childIds = auth()->user()->students()->pluck('student_id');
        $query->where(function($q) use ($childIds) {
            $q->where('sent_by', auth()->id())
            ->orWhereIn('user_id', $childIds)
            ->orWhere('user_id', auth()->id());
        });
    }

    $messages = $query->get();



    return view('messages.index', compact('messages'));
}

public function create()
{
    $user = auth()->user();
    $students = [];
    $parents = [];
    $teachers = User::where('role', 'teacher')->get();

    if ($user->role == 'teacher') {
        $students = User::where('role', 'student')->get();
        $parents = User::where('role', 'parent')->get();
    }

    return view('messages.create', compact('students', 'parents', 'teachers'));
}
public function store(StoreMessageRequest $request)
{
    // Create a new announcement with validated data
    $message = new Announcements($request->validated());
    $message->sent_by = auth()->id(); // Set the sent_by field
    $message->save();

    return redirect()->route('messages.index')->with('success', 'Bericht aangemaakt.');
}
 
public function edit($id)
{
    $message = Announcements::findOrFail($id);
    $students = User::where('role', 'student')->get();
    $parents = User::where('role', 'parent')->get();
    $teachers = User::where('role', 'teacher')->get();
    return view('messages.edit', compact('message', 'students', 'parents', 'teachers'));
}
public function update(UpdateMessageRequest $request, $id)
{
    // Update the announcement
    $message = Announcements::findOrFail($id);
    $message->update($request->validated());

    return redirect()->route('messages.index')->with('info', 'Message updated successfully!');
}

    public function destroy($id)
    {
        $message = Announcements::findOrFail($id);
        $message->delete();

        return redirect()->route('messages.index')->with('info', 'Bericht verwijderd!');
    }
}
