<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
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
        $appointments = Attendance::with(['user', 'subject'])->get();
        // dd($appointments);
 
        foreach ($appointments as $appointment) {
            $events[] = [
                'id' => $appointment->id,
                'title' => $appointment->status,
                'description' => $appointment->reason,
                'start' => $appointment->date,
                'end' => $appointment->date,
                'title' => $appointment->user->first_name,
                'subject_name' => $appointment->subject->subject_name,
            ];
        }
 
        return view('dashboard', compact('events'));
    }
}
