<?php

use App\Models\User;

test('can render subject overview screen for logged in users', function () {
    $response = $this->get('/subject');

    $user = User::factory()->create();

    $this->actingAs($user)->assertAuthenticated();

    $response = $this->get('/subject');

    $response->assertStatus(200);
});

test('cannot render subject overview screen for not logged in users', function(){
    $response = $this->get('/subject');

    $response->assertStatus(302);
});

test('can render subject creation screen for logged in users', function () {
    $user = User::factory()->create();

    $this->actingAs($user)->assertAuthenticated();

    $response = $this->get('/subject/create'); // Make request after authentication

    $response->assertStatus(200);
});

test('can create a subject', function () {
    $user = User::factory()->create();

    $this->actingAs($user)->assertAuthenticated();

    $response = $this->post('/subject/store', [
        'subject_name' => 'Mathematics',
    ]);

    $response->assertStatus(302);
});

test('can delete a subject', function () {

    $response = $this->delete('/subject/1');

    $response->assertStatus(302);
});
