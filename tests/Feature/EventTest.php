<?php

use App\Models\User;
use App\Models\Event;
use App\Models\Subject;
use Database\Seeders\SubjectSeeder;
use Database\Seeders\UserSeeder;

beforeEach(function () {
    $this->seed(SubjectSeeder::class); // Seed the subjects table
    $this->subject = Subject::create([
        'id' => 100, // Set a high value for the subject ID to avoid conflicts
        'subject_name' => 'Test Subject'
    ]);
    $this->subject = Subject::create([
        'id' => 200, // Set a high value for the subject ID to avoid conflicts
        'subject_name' => 'Updated Event'
    ]);
    $this->seed(UserSeeder::class); // Seed the subjects table
    $this->teacher = User::create([
        'id' => 100, // Set a high value for the subject ID to avoid conflicts
        'first_name' => 'Test Subject',
        'last_name' => 'dirk',
        'email' => 'email@eamil.com',
        'password' => 'epassword',
        'age' => '25',
        'role' => 'teacher'
    ]);
    $this->teacher = User::create([
        'id' => 200, // Set a high value for the subject ID to avoid conflicts
        'first_name' => 'update Subject',
        'last_name' => 'dirk',
        'email' => 'email@amil.com',
        'password' => 'epassword',
        'age' => '25',
        'role' => 'teacher'
    ]);
});

test('can render event creation screen for logged in users', function () {
    $user = User::factory()->create([
        'role' => 'teacher', // Assign the required role to the test user
    ]);

    $response = $this->actingAs($user)->get('/event/create');

    $response->assertStatus(200);
});

test('can create an event', function () {
    $user = User::factory()->create([
        'role' => 'teacher', // Assign the required role to the test user
    ]);

    $response = $this->actingAs($user)->post('/event/store', [
        'subject_id' => (string) $this->subject->id, // Cast to string
        'teacher_id' => (string) $this->teacher->id, // Match the teacher id created by the seeder
        'subject_date_start' => '2023-12-31 00:00:00', // Updated field name
        'subject_date_end' => '2024-01-01 00:00:00',   // Updated field name
        'subject_status' => 'upcoming',                // Updated field name
    ]);

    $response->assertRedirect('/dashboard'); // Updated redirect URL
    $this->assertDatabaseHas('events', [
        'subject_id' => (string) $this->subject->id, // Cast to string
        'teacher_id' => (string) $this->teacher->id, // Match the teacher id created by the seeder
        'start' => '2023-12-31 00:00:00', // Updated field name
        'end' => '2024-01-01 00:00:00',   // Updated field name
        'status' => 'upcoming',
    ]);
});

test('can render event edit screen for logged in users', function () {
    $user = User::factory()->create([
        'role' => 'teacher', // Assign the required role to the test user
    ]);
    $event = Event::create([
        'subject_id' => (string) $this->subject->id, // Cast to string
        'teacher_id' => (string) $this->teacher->id, // Match the teacher id created by the seeder
        'start' => '2023-12-31 00:00:00', // Updated field name
        'end' => '2024-01-01 00:00:00',   // Updated field name
        'status' => 'upcoming',
    ]);

    $response = $this->actingAs($user)->get("/event/{$event->id}/edit");

    $response->assertStatus(200);
});

test('can update an event', function () {
    $user = User::factory()->create([
        'role' => 'teacher', // Assign the required role to the test user
    ]);
    $event = Event::create([
        'subject_id' => (string) $this->subject->id, // Cast to string
        'teacher_id' => (string) $this->teacher->id, // Match the teacher id created by the seeder
        'start' => '2023-12-31 00:00:00', // Updated field name
        'end' => '2024-01-01 00:00:00',   // Updated field name
        'status' => 'upcoming',
    ]);

    $response = $this->actingAs($user)->patch("/event/{$event->id}", [
        'subject_id' => (string) $this->subject->id, // Cast to string
        'teacher_id' => (string) $this->teacher->id, // Match the teacher id created by the seeder
        'subject_date_start' => '2024-01-01 00:00:00', // Updated field name
        'subject_date_end' => '2024-01-02 00:00:00',   // Updated field name
        'subject_status' => 'completed',               // Updated field name
    ]);

    $response->assertRedirect('/dashboard'); // Updated redirect URL
    $this->assertDatabaseHas('events', [
        'id' => $event->id,
        'subject_id' => (string) $this->subject->id, // Cast to string
        'teacher_id' => (string) $this->teacher->id, // Match the teacher id created by the seeder
        'start' => '2024-01-01 00:00:00', // Updated field name
        'end' => '2024-01-02 00:00:00',   // Updated field name
        'status' => 'completed',
    ]);
});

test('can delete an event', function () {
    $user = User::factory()->create([
        'role' => 'teacher', // Assign the required role to the test user
    ]);
    $event = Event::create([
        'subject_id' => (string) $this->subject->id, // Cast to string
        'teacher_id' => (string) $this->teacher->id, // Match the teacher id created by the seeder
        'start' => '2023-12-31 00:00:00', // Updated field name
        'end' => '2024-01-01 00:00:00',   // Updated field name
        'status' => 'upcoming',
    ]);

    $response = $this->actingAs($user)->delete("/event/{$event->id}");

    $response->assertRedirect('/dashboard'); // Updated redirect URL
    $this->assertDatabaseMissing('events', [
        'id' => $event->id,
    ]);
});