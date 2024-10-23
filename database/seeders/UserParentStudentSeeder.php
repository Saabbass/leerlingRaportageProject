<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserParentStudentSeeder extends Seeder
{
    public function run()
    {
        DB::table('user_parent_student')->insert([
            // Parent 1 with students 1 and 2
            [
                'parent_id' => 12,
                'student_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'parent_id' => 12,
                'student_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Parent 2 with students 3 and 4
            [
                'parent_id' => 13,
                'student_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'parent_id' => 13,
                'student_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Parent 3 with students 5 and 6
            [
                'parent_id' => 14,
                'student_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'parent_id' => 14,
                'student_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Parent 4 with students 7 and 8
            [
                'parent_id' => 15,
                'student_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'parent_id' => 15,
                'student_id' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Parent 5 with students 9 and 10
            [
                'parent_id' => 16,
                'student_id' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'parent_id' => 16,
                'student_id' => 11,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Parent 6 with students 1 and 2
            [
                'parent_id' => 17,
                'student_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'parent_id' => 17,
                'student_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Parent 7 with students 3 and 4
            [
                'parent_id' => 18,
                'student_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'parent_id' => 18,
                'student_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Parent 8 with students 5 and 6
            [
                'parent_id' => 19,
                'student_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'parent_id' => 19,
                'student_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Parent 9 with students 7 and 8
            [
                'parent_id' => 20,
                'student_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'parent_id' => 20,
                'student_id' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Parent 10 with students 9 and 10
            [
                'parent_id' => 21,
                'student_id' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'parent_id' => 21,
                'student_id' => 11,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
