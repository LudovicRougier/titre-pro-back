<?php


test('log valid user', function () {
    $user = $this->user();

    $result = json_decode(json_decode($this->graphQL(/** @lang GraphQL */ '
        mutation {
            login(
                email: "vincent@test.com",
                password: "MyPassword1!",
            )
        }
    ')->content())->data->login, true);

    expect($result['success'])->toBeTrue();

    expect($result['authorization'])->toHaveKey('token');
    expect($result['authorization']['type'])->toBe('bearer');

    expect(intval($result['user']['id']))->toBe($user->id);
    expect($result['user']['name'])->toBe($user->name);
    expect(intval($result['user']['age']))->toBe($user->age);
    expect($result['user']['country'])->toBe($user->country->value);
    expect($result['user']['gender'])->toBe($user->gender->value);
    expect($result['user']['description'])->toBe($user->description);
    expect($result['user']['email'])->toBe($user->email);
    expect($result['user']['wanted_watch_providers'])->toBe($user->wanted_watch_providers);
    expect($result['user']['wanted_genres'])->toBe($user->wanted_genres);
    expect($result['user']['unwanted_genres'])->toBe($user->unwanted_genres);
 });


test('log user with invalid email', function () {
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


test('log user with invalid password', function () {
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
