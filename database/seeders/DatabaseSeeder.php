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
        // User::factory(10)->create();

        User::factory()->create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'age' => 25,
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
            'role' => 'teacher'
        ]);

        User::factory()->create([
            'first_name' => 'Jane',
            'last_name' => 'Smith',
            'age' => 22,
            'email' => 'student@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        $this->call(SubjectSeeder::class);
    }
}
