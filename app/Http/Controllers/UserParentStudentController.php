<?php

namespace App\Http\Controllers;

use App\Models\UserParentStudent;
use App\Models\User;
use Illuminate\Http\Request;

class UserParentStudentController extends Controller
{
    public function index()
    {
        $data = UserParentStudent::with(['parent', 'student'])->get();
        return view('teacher.index', compact('data'));
    }

    // public function index()
    // {
    //     $data = User::with(['parents', 'students'])->get();
    //     return view('teacher.index', compact('data'));
    // }

    // public function index()
    // {
    //     $data = User::table('user_parent_student')
    //         ->join('users as parents', 'user_parent_student.parent_id', '=', 'parents.id')
    //         ->join('users as students', 'user_parent_student.student_id', '=', 'students.id')
    //         ->select('parents.first_name as parent_name', 'students.first_name as student_name')
    //         ->get();

    //     return view('teacher.index', compact('data'));
    // }

    
    public function create()
    {
        return view('teacher.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'parent_id' => 'required|exists:users,id',
            'student_id' => 'required|exists:users,id',
        ]);

        $parent = User::find($validatedData['parent_id']);
        $student = User::find($validatedData['student_id']);

        if ($parent->role !== 'parent' || $student->role !== 'student') {
            return redirect()->back()->withErrors('Invalid parent or student role.');
        }

        UserParentStudent::create($validatedData);

        return redirect()->route('teacher.index')->with('success', 'Record created successfully.');
    }

    public function edit($id)
    {
        $record = UserParentStudent::findOrFail($id);
        return view('teacher.edit', compact('record'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'parent_id' => 'required|exists:users,id',
            'student_id' => 'required|exists:users,id',
        ]);

        $record = UserParentStudent::findOrFail($id);
        $record->update($validatedData);

        return redirect()->route('teacher.index')->with('success', 'Record updated successfully.');
    }

    public function destroy($id)
    {
        $record = UserParentStudent::findOrFail($id);
        $record->delete();

        return redirect()->route('teacher.index')->with('success', 'Record deleted successfully.');
    }
}
