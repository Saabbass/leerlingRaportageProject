<?php

use App\Models\User;
use App\Models\Attendance;
use App\Models\Subject;

test('can render attendance overview screen for logged in users', function () {
    $response = $this->get('/attendance');

    $user = User::factory()->create();

    $this->actingAs($user)->assertAuthenticated();

    $response = $this->get('/attendance');

    $response->assertStatus(200);

});

test('can render event creation screen for logged in users', function () {
    $user = User::factory()->create();

    $this->actingAs($user)->assertAuthenticated();

    $response = $this->get('/attendance/create'); // Make request after authentication

    $response->assertStatus(200);
});


test('can create an event', function () {
    $user = User::factory()->create();

    $this->actingAs($user)->assertAuthenticated();

    $response = $this->post('/attendance/store', [
        'user_id' => $user->id,
        'subject_id' => 1,
    ]);

    $response->assertStatus(302);
});

test('can render event edit screen for logged in users', function () {
    $user = User::factory()->create(); // Create the user
    $this->actingAs($user)->assertAuthenticated();

    // Create a Subject record with the required fields
    $subject = Subject::create([
        'subject_name' => 'Mathematics', // Provide a value for the NOT NULL field
    ]);

    // Now create the Attendance record
    $attendance = Attendance::create([
        'user_id' => $user->id,
        'subject_id' => $subject->id, // Link to the Subject record
        'date' => '2024-01-01',
        'reason' => 'I was there',
        'status' => 'present',
    ]);

    $response = $this->get("/attendance/{$attendance->id}/edit");
    $response->assertStatus(200);
});

test('can update an event', function () {
    $user = User::factory()->create();

    $this->actingAs($user)->assertAuthenticated();

    $response = $this->patch('/attendance/1', [
        'user_id' => $user->id,
        'subject_id' => 1,
        'date' => '2024-01-01',
        'reason' => 'I was there',
        'status' => 'present',
    ]);

    $response->assertStatus(302);
});
test('can delete an event', function () {
    $user = User::factory()->create();

    $this->actingAs($user)->assertAuthenticated();

    // Create a Subject record to satisfy the foreign key constraint
    $subject = Subject::create([
        'subject_name' => 'Mathematics', // Replace with actual required fields
    ]);

    // Create an Attendance record
    $attendance = Attendance::create([
        'user_id' => $user->id,
        'subject_id' => $subject->id, // Link to the existing Subject
        'date' => '2024-01-01',
        'reason' => 'Test deletion',
        'status' => 'present',
    ]);

    // Send DELETE request for the created Attendance record
    $response = $this->delete("/attendance/{$attendance->id}");

    $response->assertStatus(302); // Expect redirection after deletion
});
