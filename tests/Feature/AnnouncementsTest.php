<?php

use App\Models\Announcements;
use App\Models\User;

test('can render announcement overview screen for loggen in users', function () {
    $response = $this->get('/messages');

    $user = User::factory()->create();

    $this->actingAs($user)->assertAuthenticated();

    $response = $this->get('/messages');

    $response->assertStatus(200);

});

test('cannot render messages overview screen for not logged in users', function(){
    $response = $this->get('/messages');

    $response->assertStatus(302);
});

test('can render announcement creation screen for logged in users', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get('/messages/create');

    $response->assertStatus(200);
});

test('can create an announcement', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/messages/store', [
        'title' => 'Test Title',
        'content' => 'Test Content',
        'user_id' => $user->id,
        'recipient_type' => 'student',
    ]);

    $response->assertRedirect('/messages');

    $this->assertDatabaseHas('announcements', [
        'title' => 'Test Title',
        'content' => 'Test Content',
        'user_id' => $user->id,
        'sent_by' => $user->id,
    ]);
});

test('can render announcement edit screen for logged in users', function () {

    $user = User::factory()->create();

    $message = Announcements::create([
        'title' => 'Test Title',
        'content' => 'Test Content',
        'user_id' => $user->id,
        'recipient_type' => 'student',
        'sent_by' => $user->id,
    ]);

    $response = $this->actingAs($user)->get("/messages/{$message->id}/edit");

    $response->assertStatus(200);
});

test('can update an announcement', function () {
    $user = User::factory()->create();
    $message = Announcements::create([
        'title' => 'Test Title',
        'content' => 'Test Content',
        'user_id' => $user->id,
        'sent_by' => $user->id,
    ]);

    $response = $this->actingAs($user)->patch("/messages/{$message->id}", [
        'title' => 'Test Title Updated',
        'content' => 'Test Content Updated',
        'user_id' => $user->id,
        'recipient_type' => 'student', // Add recipient_type field
    ]);

    $response->assertRedirect('/messages');

    $this->assertDatabaseHas('announcements', [
        'title' => 'Test Title Updated',
        'content' => 'Test Content Updated',
    ]);
});

test('can delete an announcement', function () {
    $user = User::factory()->create();
    $message = Announcements::create([
        'title' => 'Test Title',
        'content' => 'Test Content',
        'user_id' => $user->id,
        'sent_by' => $user->id,
    ]);

    $response = $this->actingAs($user)->delete("/messages/{$message->id}");

    $response->assertRedirect('/messages');

    $this->assertDatabaseMissing('announcements', [
        'title' => 'Test Title',
        'content' => 'Test Content',
    ]);
});