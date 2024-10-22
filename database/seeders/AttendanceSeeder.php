<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Attendance::create([
            'user_id' => 1,
            'subject_id' => 1,
            'date' => '2023-09-01',
            'status' => 'present',
            'reason' => null,
        ]);

        \App\Models\Attendance::create([
            'user_id' => 2,
            'subject_id' => 1,
            'date' => '2023-09-01',
            'status' => 'absent',
            'reason' => 'Sick',
        ]);

        \App\Models\Attendance::create([
            'user_id' => 3,
            'subject_id' => 1,
            'date' => '2023-09-01',
            'status' => 'present',
            'reason' => null,
        ]);

        \App\Models\Attendance::create([
            'user_id' => 1,
            'subject_id' => 1,
            'date' => '2023-09-02',
            'status' => 'present',
            'reason' => null,
        ]);

        \App\Models\Attendance::create([
            'user_id' => 2,
            'subject_id' => 1,
            'date' => '2023-09-02',
            'status' => 'present',
            'reason' => null,
        ]);

        \App\Models\Attendance::create([
            'user_id' => 3,
            'subject_id' => 1,
            'date' => '2023-09-02',
            'status' => 'absent',
            'reason' => 'Family emergency',
        ]);
    }
}
