<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Event;
use App\Models\Subject;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $events = [];
 
        // $appointments = Attendance::all();
        $appointments = Event::with(['user'])->get();
        // dd($appointments);
 
        foreach ($appointments as $appointment) {
            $events[] = [
                'id' => $appointment->id,
                'title' => $appointment->subject_name,
                'description' => $appointment->reason,
                'start' => $appointment->start,
                'end' => $appointment->end,
                // 'title' => $appointment->user->first_name,
                // 'subject_name' => $appointment->subject->subject_name,
                'url' => route('event.edit', ['id' => $appointment->id]),
                [
                    'url' => 'event/' .$appointment->id,
                ]
            ];
        }
 
        return view('dashboard', compact('events'));
    }
}
