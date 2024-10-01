<?php

use App\Models\User;
use Database\Factories\UserFactory;

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
