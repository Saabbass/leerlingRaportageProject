<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserParentStudentRequest;
use App\Http\Requests\UpdateUserParentStudentRequest;
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
        $parents = User::where('role', 'parent')->get();
        $students = User::where('role', 'student')->get();

        return view('teacher.create', compact('parents', 'students'));
    }


    public function store(StoreUserParentStudentRequest $request)
    {
        $validated = $request->validated();

        UserParentStudent::create([
            'parent_id' => $validated['parent_id'],
            'student_id' => $validated['student_id'],
        ]);

        return redirect()->route('teacher.index')->with('success', 'Record created successfully.');
    }


    public function edit($parent_id, $student_id)
    {
        $userParentStudent = UserParentStudent::where('parent_id', $parent_id)->where('student_id', $student_id)->firstOrFail();
        $parents = User::where('role', 'parent')->get();
        $students = User::where('role', 'student')->get();

        return view('teacher.edit', compact('userParentStudent', 'parents', 'students'));
    }


    public function update(UpdateUserParentStudentRequest $request, $parent_id, $student_id)
    {
        $validated = $request->validated();

        UserParentStudent::where('parent_id', $parent_id)
            ->where('student_id', $student_id)
            ->update($validated);

        return redirect()->route('teacher.index')->with('success', 'Record updated successfully.');
    }


    public function destroy($parent_id, $student_id)
    {
        // $userParentStudent = UserParentStudent::where('parent_id', $parent_id)
        //     ->where('student_id', $student_id)
        //     ->first();

        // if ($userParentStudent) {
        //     $userParentStudent->delete();
        //     // return redirect()->route('teacher.index')->with('success', 'Record deleted successfully.');
        //     dd($userParentStudent);
        // } else {
        //     return redirect()->route('teacher.index')->with('error', 'Record not found.');
        // }

        UserParentStudent::where('parent_id', $parent_id)
                 ->where('student_id', $student_id)
                 ->delete();

        // return response()->json(['message' => 'Order item deleted successfully']);
        return redirect()->route('teacher.index')->with('success', 'Record deleted successfully.');
    }
}
