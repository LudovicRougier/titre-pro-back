<?php


test('logout auth user', function () {
    $this->logUser();

    $result = json_decode(json_decode($this->graphQL(/** @lang GraphQL */ '
        mutation { logout }
    ')->content())->data->logout);

    expect($result->success)->toBeTrue();
    expect($result->message)->toBe('Successfully logged out');
 });


test('logout unauth user', function () {
    $result = json_decode($this->graphQL(/** @lang GraphQL */ '
        mutation { logout }
    ')->content());

    expect($result)->toHaveProperty('errors');
});
