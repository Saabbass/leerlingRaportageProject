<?php

use App\Models\User;

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

