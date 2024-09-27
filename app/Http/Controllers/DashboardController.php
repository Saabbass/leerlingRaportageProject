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
 
        $appointments = Attendance::all();
 
        foreach ($appointments as $appointment) {
            $events[] = [
                'title' => $appointment->user_id,
                'description' => $appointment->reason,
                'date' => $appointment->date,
            ];
        }
 
        return view('dashboard', compact('events'));
    }
}
