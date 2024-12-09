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
        // Eager load relationships
        $query = Announcements::with(['sentBy', 'users']); // Note the change to 'users' instead of 'user'
    
        if (auth()->user()->role == 'student') {
            // Filter announcements where the current student is a recipient
            $query->whereHas('users', function ($q) {
                $q->where('user_id', auth()->id());
            });
        } elseif (auth()->user()->role == 'teacher') {
            if ($request->has('filter') && $request->filter == 'others') {
                $query->where('sent_by', '!=', auth()->id());
            } else {
                $query->where('sent_by', auth()->id());
            }
        } elseif (auth()->user()->role == 'parent') {
            $childIds = User::whereHas('parents', function ($query) {
                $query->where('parent_id', auth()->id());
            })->pluck('id'); // Get all child IDs
    
            $query->where(function ($q) use ($childIds) {
                $q->whereHas('users', function ($subQuery) use ($childIds) {
                    $subQuery->whereIn('user_id', $childIds);
                })->orWhere('sent_by', auth()->id());
            });
        }
    
        $messages = $query->get();

        $messages = $query->paginate(20); // Paginate the results, 20 messages per page
    
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

    if ($request->has('user_id') && is_array($request->user_id)) {
        $message->users()->attach($request->user_id); // Attach the users
    }

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
