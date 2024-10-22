<?php

namespace App\Http\Controllers;

use App\Models\Grades;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class GradesController extends Controller
{
    public function index()
    {
        $grades = Grades::all();
        $subjects = Subject::select('id', 'subject_name')->get(); // Fetch all subjects
        $users = User::select('id', 'first_name', 'last_name', 'role')->get(); // Fetch all users with their roles
        return view('grades.index', compact('grades', 'subjects', 'users'));
    }



    public function create()
    {
        $subjects = Subject::select('id', 'subject_name')->get(); // Fetch all subjects
        $users = User::select('id', 'first_name', 'last_name', 'role')->get(); // Fetch all users with their roles
        return view('grades.create', compact('subjects', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'subject_id' => 'required|exists:subjects,id',
            'assignment_name' => 'required|string|max:255',
            'grade' => 'required|numeric|min:0|max:10',
            'date' => 'required|date',
            'description' => 'nullable|string|max:255',
        ]);

        $grade = new Grades();
        $grade->user_id = $request->input('user_id');
        $grade->subject_id = $request->input('subject_id');
        $grade->assignment_name = $request->input('assignment_name');
        $grade->grade = $request->input('grade');
        $grade->date = $request->input('date');
        $grade->description = $request->input('description');
        $grade->save();

        return redirect()->route('grades.index')->with('success', 'Grade created successfully.');
    }

    public function edit($id)
    {
        $grade = Grades::findOrFail($id);
        $subjects = Subject::select('id', 'subject_name')->get(); // Fetch all subjects for editing with subject name
        $users = User::select('id', 'first_name', 'last_name')->get(); // Fetch all users for editing
        return view('grades.edit', compact('grade', 'subjects', 'users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'subject_id' => 'required|exists:subjects,id',
            'assignment_name' => 'required|string|max:255',
            'grade' => 'required|numeric|min:0|max:10', // Ensure 'grade' is required and numeric between 0 and 10
            'description' => 'nullable|string|max:255',
        ]);

        $grade = Grades::findOrFail($id);
        $grade->update([
            'user_id' => $request->user_id,
            'subject_id' => $request->subject_id,
            'assignment_name' => $request->assignment_name,
            'grade' => $request->grade,
            'description' => $request->description,
        ]);

        return redirect()->route('grades.index')->with('success', 'Grade updated successfully.');
    }

    public function destroy($id)
    {
        $grade = Grades::findOrFail($id);
        $grade->delete();

        return redirect()->route('grades.index')->with('success', 'Grade deleted successfully.');
    }
}
