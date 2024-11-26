<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Announcements;
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
                'title' => 'Cijfers',
                'content' => 'hey, je cijfers kunnen wel wat verbeteren, kom donderdag op gesprek.',
                'user_ids' => [$studentIds[array_rand($studentIds)]], // Random student ID
                'sent_by' => $teacherIds[array_rand($teacherIds)], // Random teacher ID
            ],
            // Add more messages as needed
        ];

        foreach ($messages as $messageData) {
            // Insert the announcement
            $announcement = Announcements::create([
                'title' => $messageData['title'],
                'content' => $messageData['content'],
                'sent_by' => $messageData['sent_by'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Attach users to the announcement
            $announcement->users()->attach($messageData['user_ids']);
        }
    }
}