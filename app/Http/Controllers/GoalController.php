<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGoalRequest;
use App\Http\Requests\UpdateGoalRequest;
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

    public function store(StoreGoalRequest $request)
    {
        $validated = $request->validated();

        $goal = new Goal();
        $goal->goal_name = $validated['goal_name'];
        $goal->goal_description = $validated['goal_description'];
        $goal->target_date = $validated['target_date'];
        $goal->save();

        return redirect()->route('dashboard')->with('success', 'Goal added successfully.');
    }

    public function edit($id)
    {
        $goal = Goal::findOrFail($id);
        $slot = 'Edit Goal Details';
        return view('goals.edit', compact('goal', 'slot'));
    }

    public function update(UpdateGoalRequest $request, $id)
    {
        $validated = $request->validated();

        $goal = Goal::findOrFail($id);
        $goal->goal_name = $validated['goal_name'];
        $goal->goal_description = $validated['goal_description'];
        $goal->target_date = $validated['target_date'];
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
