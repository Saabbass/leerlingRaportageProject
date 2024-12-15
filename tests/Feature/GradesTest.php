<?php

use App\Models\Grades;
use App\Models\User;
use App\Models\Subject;

test('can render grades overview screen for logged in users', function () {
    $response = $this->get('/grades');

    $user = User::factory()->create();

    $this->actingAs($user)->assertAuthenticated();

    $response = $this->get('/grades');

    $response->assertStatus(200);
});

test('cannot render grades overview screen for not logged in users', function(){
    $response = $this->get('/grades');

    $response->assertStatus(302);
});

test('can render grade creation screen for logged in users', function () {
    $user = User::factory()->create([
        'role' => 'teacher', // Assign the required role to the test user
    ]);

    $this->actingAs($user)->assertAuthenticated();

    $response = $this->get('/grades/create'); // Make request after authentication

    $response->assertStatus(200);
});

test('can create a grade', function () {
    $user = User::factory()->create([
        'role' => 'teacher', // Assign the required role to the test user
    ]);

    $this->actingAs($user)->assertAuthenticated();

    $response = $this->post('/grades/store', [
        'user_id' => $user->id,
        'subject_id' => 1,
        'grade' => 'A',
    ]);

    $response->assertStatus(302);
});

test('can render grade edit screen for logged in users', function () {
    $user = User::factory()->create([
        'role' => 'teacher', // Assign the required role to the test user
    ]);
    $this->actingAs($user)->assertAuthenticated();

    // Create a Subject record with the required fields
    $subject = Subject::create([
        'subject_name' => 'Mathematics', // Provide a value for the NOT NULL field
    ]);

    // Now create the Grade record
    $grade = Grades::create([
        'user_id' => $user->id,
        'subject_id' => $subject->id, // Link to the Subject record
        'assignment_name' => 'Midterm Exam', // Provide a value for assignment_name
        'date' => '2024-01-01',
        'grade' => 'A',
    ]);

    $response = $this->get("/grades/{$grade->id}/edit");
    $response->assertStatus(200); // Ensure the edit screen loads
});


test('can update a grade', function () {
    $user = User::factory()->create([
        'role' => 'teacher', // Assign the required role to the test user
    ]);
    $this->actingAs($user)->assertAuthenticated();

    // Create a Subject record with the required fields
    $subject = Subject::create([
        'subject_name' => 'Mathematics', // Provide a value for the NOT NULL field
    ]);

    // Now create the Grade record
    $grade = Grades::create([
        'user_id' => $user->id,
        'subject_id' => $subject->id, // Link to the Subject record
        'assignment_name' => 'Midterm Exam', // Provide a value for assignment_name
        'date' => '2024-01-01',
        'grade' => 'A',
    ]);

    $response = $this->patch("/grades/{$grade->id}", [
        'user_id' => $user->id,
        'subject_id' => $subject->id,
        'grade' => 'B',
        'assignment_name' => 'Final Exam',
        'date' => '2024-01-01',
    ]);

    $response->assertStatus(302);
});

test('can delete a grade', function () {
    $user = User::factory()->create([
        'role' => 'teacher', // Assign the required role to the test user
    ]);
    $this->actingAs($user)->assertAuthenticated();

    // Create a Subject record with the required fields
    $subject = Subject::create([
        'subject_name' => 'Mathematics', // Provide a value for the NOT NULL field
    ]);

    // Now create the Grade record
    $grade = Grades::create([
        'user_id' => $user->id,
        'subject_id' => $subject->id, // Link to the Subject record
        'assignment_name' => 'Midterm Exam', // Provide a value for assignment_name
        'date' => '2024-01-01',
        'grade' => 'A',
    ]);

    $response = $this->delete("/grades/{$grade->id}");

    $response->assertStatus(302);
});
