<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();

        return view('subject.index', ['subject' => $subjects]);
    
    }
    public function create()
    {
        return view('subject.create');
    }

    public function edit($id)
    {
        $subject = Subject::findOrFail($id);

        return view('subject.edit', ['subject' => $subject]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $subject = new Subject();
        $subject->subject_name = $request->input('name');
        $subject->description = $request->input('description');
        $subject->save();

        return redirect()->route('subject.index')->with('success', 'Subject created successfully.');
    }
    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();

        return redirect()->route('subject.index')->with('success', 'Subject deleted successfully.');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $subject = Subject::findOrFail($id);
        $subject->subject_name = $request->input('name');
        $subject->description = $request->input('description');
        $subject->save();

        return redirect()->route('subject.index')->with('success', 'Subject updated successfully.');
    }
}
