<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GradesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Grades::create([
            'user_id' => 1,
            'subject_id' => 1,
            'assignment_name' => 'Math Homework 1',
            'grade' => 8.5,
            'date' => '2023-09-15',
            'description' => 'First homework assignment for Math class.',
        ]);

        \App\Models\Grades::create([
            'user_id' => 2,
            'subject_id' => 2,
            'assignment_name' => 'Science Project',
            'grade' => 9.0,
            'date' => '2023-09-20',
            'description' => 'Group project on renewable energy sources.',
        ]);

        \App\Models\Grades::create([
            'user_id' => 3,
            'subject_id' => 1,
            'assignment_name' => 'Math Quiz 1',
            'grade' => 7.0,
            'date' => '2023-09-25',
            'description' => 'Quiz covering chapters 1 and 2.',
        ]);
    }
}
