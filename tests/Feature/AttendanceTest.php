<?php

use App\Models\User;

test('can render attendance overview screen for logged in users', function () {
    $response = $this->get('/attendance');

    $user = User::factory()->create();

    $this->actingAs($user)->assertAuthenticated();

    $response = $this->get('/attendance');

    $response->assertStatus(200);

});

test('cannot render attendance overview screen for not logged in users', function(){
    $response = $this->get('/attendance');

    $response->assertStatus(302);
});

