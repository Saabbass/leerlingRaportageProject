<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGoalRequest;
use App\Http\Requests\UpdateGoalRequest;
use App\Models\Goal;
use App\Models\Grade;
use App\Models\Attendance;
use App\Models\Grades;
use App\Models\User;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    public function index()
    {
        $studentGoals = collect(); // Initialize studentGoals as an empty collection

        // Check if the authenticated user is a teacher
        if (auth()->user()->role === 'teacher') {
            $goals = Goal::with('user')->get(); // Fetch all goals with user data
            $grades = Grades::with('user')->paginate(10); // Fetch all grades with user data
            $attendances = Attendance::with('user')->paginate(10); // Fetch all attendances with user data
        } elseif (auth()->user()->role === 'parent') {
            // Fetch the students associated with the parent
            $childIds = User::whereHas('parents', function ($query) {
                $query->where('parent_id', auth()->id());
            })->pluck('id'); // Get all child IDs

            $studentGoals = Goal::whereIn('user_id', $childIds)->get(); // Fetch goals for all children
            $goals = collect(); // Set goals to an empty collection for parents
        } else {
            // Fetch only the goals, grades, and attendances for the authenticated user
            $goals = Goal::where('user_id', auth()->id())->get(); // Fetch goals for the authenticated user
            // $grades = Grades::where('user_id', auth()->id())->paginate(10);
            $attendances = Attendance::where('user_id', auth()->id())->paginate(10);
        }
        
        $slot = 'Updated content for index';

        return view('goals.index', compact('goals', 'studentGoals', 'slot'));
    }

    public function create()
    {
        // $slot = 'Updated content for create';
        return view('goals.create');
    }

    public function store(StoreGoalRequest $request)
    {
        $validated = $request->validated();

        $goal = new Goal();
        $goal->goal_name = $validated['goal_name'];
        $goal->goal_description = $validated['goal_description'];
        $goal->target_date = $validated['target_date'];
        $goal->user_id = auth()->id();
        $goal->save();

        return redirect()->route('goals.index')->with('success', 'Goal added successfully.');
    }

    public function edit($id)
    {
        $goal = Goal::findOrFail($id);
        $slot = 'Updated content for edit';
        return view('goals.edit', compact('goal', 'slot'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $request->validate([
            'goal_name' => 'required|string|max:255',
            'goal_description' => 'required|string',
            'target_date' => 'required|date',
            'status' => 'required|string|in:active,inactive', // Ensure status is validated
        ]);

        // Find the goal by ID
        $goal = Goal::findOrFail($id);

        // Update the goal with the request data
        $goal->update([
            'goal_name' => $request->input('goal_name'),
            'goal_description' => $request->input('goal_description'),
            'target_date' => $request->input('target_date'),
            'status' => $request->input('status'), // Ensure this line is present
        ]);

        return redirect()->route('goals.index')->with('success', 'Goal updated successfully.');
    }

    public function destroy($id)
    {
        $goal = Goal::findOrFail($id);
        $goal->delete();

        return redirect()->route('goals.index')->with('success', 'Goal deleted successfully.');
    }

}