<?php


use App\Models\User;


test('log a valid user', function () {
    $user = User::find(1);

    $result = json_decode(json_decode($this->graphQL(/** @lang GraphQL */ '
        mutation {
            login(
                email: "vincent@test.com",
                password: "MyPassword1!",
            )
        }
    ')->content())->data->login);

    expect($result->success)->toBeTrue();
    expect((array) $result->user)->toBe($user->toArray());
    expect($result->authorization)->toHaveProperty('token');
    expect($result->authorization->type)->toBe('bearer');
 });


test('log a user with invalid email', function () {
    $result = json_decode(json_decode($this->graphQL(/** @lang GraphQL */ '
        mutation {
            login(
                email: "user@test.com",
                password: "MyPassword1!",
            )
        }
    ')->content())->data->login);

    expect($result->status)->toBe(401);
    expect($result->success)->toBeFalse();
    expect($result->message)->toBe('Unauthorized');
});


test('log a user with invalid password', function () {
    $result = json_decode(json_decode($this->graphQL(/** @lang GraphQL */ '
        mutation {
            login(
                email: "vincent@test.com",
                password: "MyPassword1",
            )
        }
    ')->content())->data->login);

    expect($result->status)->toBe(401);
    expect($result->success)->toBeFalse();
    expect($result->message)->toBe('Unauthorized');
});
