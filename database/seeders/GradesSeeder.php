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
            'assignment_name' => 'Wiskunde Huiswerk 1',
            'grade' => 8.5,
            'date' => '2023-09-15',
            'description' => 'Eerste huiswerkopdracht voor de wiskundeles.',
        ]);

        \App\Models\Grades::create([
            'user_id' => 2,
            'subject_id' => 2,
            'assignment_name' => 'Wetenschapsproject',
            'grade' => 9.0,
            'date' => '2023-09-20',
            'description' => 'Groepsproject over hernieuwbare energiebronnen.',
        ]);

        \App\Models\Grades::create([
            'user_id' => 3,
            'subject_id' => 1,
            'assignment_name' => 'Wiskunde Toets 1',
            'grade' => 7.0,
            'date' => '2023-09-25',
            'description' => 'Toets over hoofdstukken 1 en 2.',
        ]);
    }
}
