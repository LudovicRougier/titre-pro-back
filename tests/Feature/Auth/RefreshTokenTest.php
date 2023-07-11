<?php


use App\Models\User;


test('refresh auth users\'s token', function () {
    $user = $this->logUser();

    $result = json_decode(json_decode($this->actingAs($user)->graphQL(/** @lang GraphQL */ '
        mutation { refreshToken }
    ')->content())->data->refreshToken);

    expect($result->authorisation)->toHaveProperty('token');
    expect($result->authorisation->type)->toBe('bearer');
 });


 test('refresh unauth user\'s token', function () {
     $user = User::first();

     $result = json_decode($this->actingAs($user)->graphQL(/** @lang GraphQL */ '
        mutation { refreshToken }
    ')->content());

     expect($result)->toHaveProperty('errors');
  });
