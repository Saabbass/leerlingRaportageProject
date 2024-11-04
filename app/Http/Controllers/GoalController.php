<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    public function index()
    {
        $goals = Goal::paginate(10);
        $slot = 'Your content here';

        return view('goals.index', compact('goals', 'slot'));
    }

    public function create()
    {
        $slot = 'Create a New Goal';
        return view('goals.create', compact('slot'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'goal_name' => 'required|string|max:255',
            'goal_description' => 'required|string',
            'target_date' => 'required|date'
        ]);

        $goal = new Goal();
        $goal->goal_name = $request->goal_name;
        $goal->goal_description = $request->goal_description;
        $goal->target_date = $request->target_date;
        $goal->save();

        return redirect()->route('dashboard')->with('success', 'Goal added successfully.');
    }

    public function edit($id)
    {
        $goal = Goal::findOrFail($id);
        $slot = 'Edit Goal Details';
        return view('goals.edit', compact('goal', 'slot'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'goal_name' => 'required|string|max:255',
            'goal_description' => 'required|string',
            'target_date' => 'required|date'
        ]);

        $goal = Goal::findOrFail($id);
        $goal->goal_name = $request->goal_name;
        $goal->goal_description = $request->goal_description;
        $goal->target_date = $request->target_date;
        $goal->save();

        return redirect()->route('dashboard')->with('success', 'Goal updated successfully.');
    }

    public function destroy($id)
    {
        $goal = Goal::findOrFail($id);
        $goal->delete();

        return redirect()->route('dashboard')->with('success', 'Goal deleted successfully.');
    }
}
