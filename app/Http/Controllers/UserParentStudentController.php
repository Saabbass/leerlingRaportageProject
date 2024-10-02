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
}
