<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserParentStudent;
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


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'parent_id' => 'required|exists:users,id',
            'student_id' => 'required|exists:users,id',
        ]);
    
        // Check if the connection already exists
        $exists = UserParentStudent::where('parent_id', $validatedData['parent_id'])
                    ->where('student_id', $validatedData['student_id'])
                    ->exists();
    
        if ($exists) {
            return redirect()->route('teacher.index')->with('error', 'De ouder is al aan het kind gekoppeld.');
        }
    
        // Create the new record
        UserParentStudent::create([
            'parent_id' => $validatedData['parent_id'],
            'student_id' => $validatedData['student_id'],
        ]);
    
        return redirect()->route('teacher.index')->with('success', 'De koppeling is gelukt.');
    }
    


    public function edit($parent_id, $student_id)
    {
        $userParentStudent = UserParentStudent::where('parent_id', $parent_id)->where('student_id', $student_id)->firstOrFail();
        $parents = User::where('role', 'parent')->get();
        $students = User::where('role', 'student')->get();

        return view('teacher.edit', compact('userParentStudent', 'parents', 'students'));
    }


    public function update(Request $request, $parent_id, $student_id)
    {
        $validatedData = $request->validate([
            'parent_id' => 'required|exists:users,id',
            'student_id' => 'required|exists:users,id',
        ]);

        UserParentStudent::where('parent_id', $parent_id)
        ->where('student_id', $student_id)
        ->update($validatedData);

        return redirect()->route('teacher.index')->with('success', 'Koppeling aangepast.');
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
