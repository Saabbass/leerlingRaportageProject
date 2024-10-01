<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        // Fetch attendances with user data and filter by status
        $attendances = Attendance::with('user')
            ->whereIn('status', ['present', 'absent', 'late'])
            ->get();

        return view('attendance.index', ['attendances' => $attendances]);
    }
    public function create()
    {
        $users = User::select('id', 'first_name', 'last_name')->get(); // Fetch all users
        $subjects = Subject::select('id', 'subject_name')->get(); // Fetch all subjects with correct column name
        return view('attendance.create', compact('users', 'subjects'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'subject_id' => 'required|exists:subjects,id',
            'date' => 'required|date',
            'status' => 'required|string|in:present,absent,late',
            'reason' => 'nullable|string|max:255',
        ]);

        $attendance = new Attendance();
        $attendance->user_id = $request->input('user_id');
        $attendance->subject_id = $request->input('subject_id');
        $attendance->date = $request->input('date');
        $attendance->status = $request->input('status');
        $attendance->reason = $request->input('reason');
        $attendance->save();

        return redirect()->route('attendance.index')->with('success', 'Attendance recorded successfully.');
    }
    public function edit($id)
    {
        $attendance = Attendance::findOrFail($id);
        $users = User::select('id', 'first_name', 'last_name')->get(); // Fetch all users for editing
        $subjects = Subject::select('id', 'subject_name')->get(); // Fetch all subjects for editing
        return view('attendance.edit', compact('attendance', 'users', 'subjects'));
    
    
        $attendance = Attendance::findOrFail($id);
        $users = User::select('id', 'name')->get(); // Fetch all users for editing
        return view('attendance.edit', compact('attendance', 'users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'subject_id' => 'required|exists:subjects,id',
            'date' => 'required|date',
            'status' => 'required|string|in:present,absent,late',
            'reason' => 'nullable|string|max:255',
        ]);

        $attendance = Attendance::findOrFail($id);
        $attendance->user_id = $request->input('user_id');
        $attendance->subject_id = $request->input('subject_id');
        $attendance->date = $request->input('date');
        $attendance->status = $request->input('status');
        $attendance->reason = $request->input('reason');
        $attendance->save();

        return redirect()->route('attendance.index')->with('success', 'Attendance updated successfully.');
    }

    public function destroy($id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->delete();

        return redirect()->route('attendance.index')->with('success', 'Attendance deleted successfully.');
    }
}
