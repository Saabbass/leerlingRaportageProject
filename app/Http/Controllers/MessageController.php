<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use App\Models\Announcements;

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
public function store(Request $request)
{
    // Validate the request data
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'user_id' => 'required|exists:users,id',
        'recipient_type' => 'required|in:student,parent,teacher',
    ]);
    
    $message = new Announcements();
    $message->title = $request->input('title');
    $message->content = $request->input('content');
    $message->user_id = $request->input('user_id');
    $message->sent_by = auth()->id(); // Set the sent_by field
    $message->save();

    return redirect()->route('messages.index')->with('success', 'Message created successfully.');
}
 
public function edit($id)
{
    $message = Announcements::findOrFail($id);
    $students = User::where('role', 'student')->get();
    $parents = User::where('role', 'parent')->get();
    $teachers = User::where('role', 'teacher')->get();
    return view('messages.edit', compact('message', 'students', 'parents', 'teachers'));
}
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'user_id' => 'required|exists:users,id',
        ]);

        // Update the announcement
        $message = Announcements::findOrFail($id);
        $message->update([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('messages.index')->with('status', 'Message updated successfully!');
    }
    public function destroy($id)
    {
        $message = Announcements::findOrFail($id);
        $message->delete();

        return redirect()->route('messages.index')->with('status', 'Message deleted successfully!');
    }
}
