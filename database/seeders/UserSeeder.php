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
        //call user factory
        // User::factory(110)->create();

        //create admin user
        // Create admin user
        User::create([
            'id' => 1,
            'first_name' => 'Admin',
            'last_name' => 'User', 
            'age' => 30,
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'role' => 'teacher',
            'remember_token' => Str::random(10),
        ]);

        // Create 40 student users
        User::create([
            'id' => 2,
            'first_name' => 'Student',
            'last_name' => '1',
            'age' => 12,
            'email' => 'student1@example.com',
            'password' => bcrypt('password'),
            'role' => 'student',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'id' => 3,
            'first_name' => 'Student',
            'last_name' => '2',
            'age' => 13,
            'email' => 'student2@example.com',
            'password' => bcrypt('password'),
            'role' => 'student',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'id' => 4,
            'first_name' => 'Student',
            'last_name' => '3',
            'age' => 14,
            'email' => 'student3@example.com',
            'password' => bcrypt('password'),
            'role' => 'student',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'id' => 5,
            'first_name' => 'Student',
            'last_name' => '4',
            'age' => 15,
            'email' => 'student4@example.com',
            'password' => bcrypt('password'),
            'role' => 'student',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'id' => 6,
            'first_name' => 'Student',
            'last_name' => '5',
            'age' => 16,
            'email' => 'student5@example.com',
            'password' => bcrypt('password'),
            'role' => 'student',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'id' => 7,
            'first_name' => 'Student',
            'last_name' => '6',
            'age' => 17,
            'email' => 'student6@example.com',
            'password' => bcrypt('password'),
            'role' => 'student',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'id' => 8,
            'first_name' => 'Student',
            'last_name' => '7',
            'age' => 18,
            'email' => 'student7@example.com',
            'password' => bcrypt('password'),
            'role' => 'student',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'id' => 9,
            'first_name' => 'Student',
            'last_name' => '8',
            'age' => 12,
            'email' => 'student8@example.com',
            'password' => bcrypt('password'),
            'role' => 'student',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'id' => 10,
            'first_name' => 'Student',
            'last_name' => '9',
            'age' => 13,
            'email' => 'student9@example.com',
            'password' => bcrypt('password'),
            'role' => 'student',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'id' => 11,
            'first_name' => 'Student',
            'last_name' => '10',
            'age' => 14,
            'email' => 'student10@example.com',
            'password' => bcrypt('password'),
            'role' => 'student',
            'remember_token' => Str::random(10),
        ]);

        // Create 40 parent users
        User::create([
            'id' => 12,
            'first_name' => 'Parent',
            'last_name' => '1',
            'age' => 35,
            'email' => 'parent1@example.com',
            'password' => bcrypt('password'),
            'role' => 'parent',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'id' => 13,
            'first_name' => 'Parent',
            'last_name' => '2',
            'age' => 36,
            'email' => 'parent2@example.com',
            'password' => bcrypt('password'),
            'role' => 'parent',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'id' => 14,
            'first_name' => 'Parent',
            'last_name' => '3',
            'age' => 37,
            'email' => 'parent3@example.com',
            'password' => bcrypt('password'),
            'role' => 'parent',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'id' => 15,
            'first_name' => 'Parent',
            'last_name' => '4',
            'age' => 38,
            'email' => 'parent4@example.com',
            'password' => bcrypt('password'),
            'role' => 'parent',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'id' => 16,
            'first_name' => 'Parent',
            'last_name' => '5',
            'age' => 39,
            'email' => 'parent5@example.com',
            'password' => bcrypt('password'),
            'role' => 'parent',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'id' => 17,
            'first_name' => 'Parent',
            'last_name' => '6',
            'age' => 40,
            'email' => 'parent6@example.com',
            'password' => bcrypt('password'),
            'role' => 'parent',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'id' => 18,
            'first_name' => 'Parent',
            'last_name' => '7',
            'age' => 41,
            'email' => 'parent7@example.com',
            'password' => bcrypt('password'),
            'role' => 'parent',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'id' => 19,
            'first_name' => 'Parent',
            'last_name' => '8',
            'age' => 42,
            'email' => 'parent8@example.com',
            'password' => bcrypt('password'),
            'role' => 'parent',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'id' => 20,
            'first_name' => 'Parent',
            'last_name' => '9',
            'age' => 43,
            'email' => 'parent9@example.com',
            'password' => bcrypt('password'),
            'role' => 'parent',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'id' => 21,
            'first_name' => 'Parent',
            'last_name' => '10',
            'age' => 44,
            'email' => 'parent10@example.com',
            'password' => bcrypt('password'),
            'role' => 'parent',
            'remember_token' => Str::random(10),
        ]);
    }
}
