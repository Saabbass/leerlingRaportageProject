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
        User::factory(110)->create();

        //create admin user
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'age' => 30,
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'role' => 'teacher',
            'remember_token' => Str::random(10),
        ]);
    }
}
