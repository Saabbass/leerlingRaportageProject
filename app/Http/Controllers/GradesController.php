<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGradeRequest;
use App\Http\Requests\UpdateGradeRequest;
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

    public function store(StoreGradeRequest $request)
    {
        $validated = $request->validated();

        $grade = new Grades();
        $grade->user_id = $validated['user_id'];
        $grade->subject_id = $validated['subject_id'];
        $grade->assignment_name = $validated['assignment_name'];
        $grade->grade = $validated['grade'];
        $grade->date = $validated['date'];
        $grade->description = $validated['description'];
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

    public function update(UpdateGradeRequest $request, $id)
    {
        $validated = $request->validated();

        $grade = Grades::findOrFail($id);
        $grade->update($validated);

        return redirect()->route('grades.index')->with('success', 'Grade updated successfully.');
    }

    public function destroy($id)
    {
        $grade = Grades::findOrFail($id);
        $grade->delete();

        return redirect()->route('grades.index')->with('success', 'Grade deleted successfully.');
    }
}
