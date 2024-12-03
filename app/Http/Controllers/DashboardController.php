<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Event;
use App\Models\Subject;
use App\Models\User;
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
            $subject = Subject::find($appointment['subject_id']);
            $teacher = User::find($appointment['teacher_id']);
            $events[] = [
                'id' => $appointment->id,
                'title' => $subject->subject_name,
                'description' => $appointment->reason,
                'start' => $appointment->start,
                'end' => $appointment->end,
                'status' => $appointment->status,
                // 'title' => $appointment->user->first_name,
                // 'subject_name' => $appointment->subject->subject_name,
                'url' => route('event.edit', ['id' => $appointment->id]),
                [
                    'url' => 'event/' . $appointment->id,
                ]
            ];
        }

        return view('dashboard', compact('events'));
    }
}
