<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
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
    public function store(StoreSubjectRequest $request)
    {
        $validated = $request->validated();

        $subject = new Subject();
        $subject->subject_name = $validated['name'];
        $subject->description = $validated['description'];
        $subject->save();

        return redirect()->route('subject.index')->with('success', 'Subject created successfully.');
    }
    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();

        return redirect()->route('subject.index')->with('success', 'Subject deleted successfully.');
    }
    public function update(UpdateSubjectRequest $request, $id)
    {
        $validated = $request->validated();

        $subject = Subject::findOrFail($id);
        $subject->subject_name = $validated['name'];
        $subject->description = $validated['description'];
        $subject->save();

        return redirect()->route('subject.index')->with('success', 'Subject updated successfully.');
    }
}
