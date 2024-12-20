<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(SubjectSeeder::class);
        $this->call([UserParentStudentSeeder::class,]);
        $this->call([MessageSeeder::class,]);
        $this->call([GradesSeeder::class,]);
        $this->call([AttendanceSeeder::class,]);
        $this->call([EventSubjectSeeder::class,]);
        $this->call([GoalSeeder::class,]);
        
    }
}
