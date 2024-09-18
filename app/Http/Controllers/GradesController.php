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
        return view('grades.index', compact('grades'));
    }

    public function create()
    {
        $subjects = Subject::select('id', 'subject_name')->get(); // Fetch all subjects with id and subject_name
        $users = User::select('id', 'name')->get(); // Fetch all users with id and name
        return view('grades.create', compact('subjects', 'users')); // Pass subjects and users to the view
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'subject_id' => 'required|exists:subjects,id',
            'assignment_name' => 'required|string|max:255',
            'grade' => 'required|numeric|min:0|max:100', // Ensure 'grade' is required and numeric between 0 and 100
            'date' => 'required|date', // Ensure 'date' is required and a valid date
            'description' => 'nullable|string',
        ]);

        Grades::create([
            'user_id' => $request->user_id,
            'subject_id' => $request->subject_id,
            'assignment_name' => $request->assignment_name,
            'grade' => $request->grade, // Store the 'grade'
            'date' => $request->date, // Store the 'date'
            'description' => $request->description,
        ]);

        return redirect()->route('grades.index')->with('success', 'Grade created successfully.');
    }

    public function edit($id)
    {
        $grade = Grades::findOrFail($id);
        $subjects = Subject::select('id', 'subject_name')->get(); // Fetch all subjects for editing
        $users = User::select('id', 'name')->get(); // Fetch all users for editing
        return view('grades.edit', compact('grade', 'subjects', 'users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'subject_id' => 'required|exists:subjects,id',
            'assignment_name' => 'required|string|max:255',
            'grade' => 'required|numeric|min:0|max:100', // Ensure 'grade' is required and numeric between 0 and 100
            'description' => 'nullable|string',
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
