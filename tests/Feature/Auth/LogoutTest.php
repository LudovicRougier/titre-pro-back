<?php


test('logout an auth user', function () {

    $user = $this->logUser();

    $result = json_decode(json_decode($this->actingAs($user)->graphQL(/** @lang GraphQL */ '
        mutation { logout }
    ')->content())->data->logout);

    expect($result->success)->toBeTrue();
    expect($result->message)->toBe('Successfully logged out');
 });
