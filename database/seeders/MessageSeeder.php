<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                // Get all users with the role of 'student'
                $studentIds = User::where('role', 'student')->pluck('id')->toArray();
                $teacherIds = User::where('role', 'teacher')->pluck('id')->toArray();
        $messages = [
            [
                'title' => 'Hello World',
                'content' => 'This is a test message.',
                'user_id' => $studentIds[array_rand($studentIds)], // Random student ID
                'sent_by' => $teacherIds[array_rand($teacherIds)], // Random teacher ID
            ],
            [
                'title' => 'Hello World 2',
                'content' => 'This is another test message.',
                'user_id' => $studentIds[array_rand($studentIds)], // Random student ID
                'sent_by' => $teacherIds[array_rand($teacherIds)], // Random teacher ID
            ],
        ];

        foreach ($messages as $message) {
            DB::table('announcements')->insert([
                'title' => $message['title'],
                'content' => $message['content'],
                'user_id' => $message['user_id'], // Include user_id in the insert statemen
                'sent_by' => $message['sent_by'], // Include sent_by in the insert statement
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
