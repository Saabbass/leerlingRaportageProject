<?php

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