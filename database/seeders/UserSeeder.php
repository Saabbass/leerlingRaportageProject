<?php

namespace Database\Seeders;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Arrays of random first names and last names
        $firstNames = ['Alice', 'Bob', 'Charlie', 'David', 'Eva', 'Frank', 'Grace', 'Hannah', 'Ian', 'Jack', 'Liam', 'Mia', 'Noah', 'Olivia', 'Sophia', 'James', 'Ava', 'Isabella', 'Lucas', 'Amelia'];
        $lastNames = ['Smith', 'Johnson', 'Williams', 'Jones', 'Brown', 'Davis', 'Miller', 'Wilson', 'Moore', 'Taylor', 'Anderson', 'Thomas', 'Jackson', 'White', 'Harris', 'Martin', 'Thompson', 'Garcia', 'Martinez', 'Robinson'];

        // Create admin user with random names
        User::create([
            'id' => 1,
            'first_name' => "admin", // Random first name
            'last_name' => "admin",   // Random last name
            'age' => 30,
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'role' => 'teacher',
            'remember_token' => Str::random(10),
        ]);

        // Create 40 student users
        for ($i = 2; $i <= 41; $i++) {
            User::create([
                'id' => $i,
                'first_name' => $firstNames[array_rand($firstNames)], // Random first name
                'last_name' => $lastNames[array_rand($lastNames)],   // Random last name
                'age' => rand(12, 18), // Random age between 12 and 18
                'email' => 'student' . ($i - 1) . '@example.com',
                'password' => bcrypt('password'),
                'role' => 'student',
                'remember_token' => Str::random(10),
            ]);
        }
        
        // Create 40 parent users
        for ($i = 42; $i <= 81; $i++) {
            User::create([
                'id' => $i,
                'first_name' => $firstNames[array_rand($firstNames)], // Random first name
                'last_name' => $lastNames[array_rand($lastNames)],   // Random last name
                'age' => rand(35, 45), // Random age between 35 and 45
                'email' => 'parent' . ($i - 41) . '@example.com',
                'password' => bcrypt('password'),
                'role' => 'parent',
                'remember_token' => Str::random(10),
            ]);
        }
    }
}
