<?php


test('update name with auth user', function () {
    $this->logUser();

    $result = json_decode(json_decode($this->graphQL(/** @lang GraphQL */ '
        mutation {
            updateMe (input: { name: "vincent" })
        }
    ')->content())->data->updateMe, true);

    expect($result['success'])->toBeTrue();
    expect($result['status'])->toBe(200);
    expect($result['user']['name'])->toBe($this->user()->name);
    expect($result['user']['name'])->toBe('vincent');
});


test('update age with auth user', function () {
    $this->logUser();

    $result = json_decode(json_decode($this->graphQL(/** @lang GraphQL */ '
        mutation {
            updateMe (input: { age: 25 })
        }
    ')->content())->data->updateMe, true);

    expect($result['success'])->toBeTrue();
    expect($result['status'])->toBe(200);
    expect($result['user']['age'])->toBe($this->user()->age);
    expect($result['user']['age'])->toBe(25);
});


test('update country with auth user', function () {
    $this->logUser();

    $result = json_decode(json_decode($this->graphQL(/** @lang GraphQL */ '
        mutation {
            updateMe (input: { country: "FR" })
        }
    ')->content())->data->updateMe, true);

    expect($result['success'])->toBeTrue();
    expect($result['status'])->toBe(200);
    expect($result['user']['country'])->toBe($this->user()->country->value);
    expect($result['user']['country'])->toBe('FR');
});


test('update gender with auth user', function () {
    $this->logUser();

    $result = json_decode(json_decode($this->graphQL(/** @lang GraphQL */ '
        mutation {
            updateMe (input: { gender: "Homme" })
        }
    ')->content())->data->updateMe, true);

    expect($result['success'])->toBeTrue();
    expect($result['status'])->toBe(200);
    expect($result['user']['gender'])->toBe($this->user()->gender->value);
    expect($result['user']['gender'])->toBe('Homme');
});


test('update description with auth user', function () {
    $this->logUser();

    $result = json_decode(json_decode($this->graphQL(/** @lang GraphQL */ '
        mutation {
            updateMe (input: { description: "Description test" })
        }
    ')->content())->data->updateMe, true);

    expect($result['success'])->toBeTrue();
    expect($result['status'])->toBe(200);
    expect($result['user']['description'])->toBe($this->user()->description);
    expect($result['user']['description'])->toBe('Description test');
});


test('update email with auth user', function () {
    $this->logUser();

    $result = json_decode(json_decode($this->graphQL(/** @lang GraphQL */ '
        mutation {
            updateMe (input: { email: "test@test.com" })
        }
    ')->content())->data->updateMe, true);

    expect($result['success'])->toBeTrue();
    expect($result['status'])->toBe(200);
    expect($result['user']['email'])->toBe($this->user()->email);
    expect($result['user']['email'])->toBe('test@test.com');
});


test('update password with auth user', function () {
    $this->logUser();

    $result = json_decode(json_decode($this->graphQL(/** @lang GraphQL */ '
        mutation {
            updateMe (input: { current_password: "MyPassword1!", new_password: "MyPassword2!" })
        }
    ')->content())->data->updateMe, true);


    expect($result['success'])->toBeTrue();
    expect($result['status'])->toBe(200);

    $user = $this->logUser($this->user()->email, 'MyPassword2!');

    expect($user->toArray())->toBe($this->user()->toArray());
});

//  wanted_watch_providers: [MediaProviderInput!]
//  wanted_genres: [GenreInput!]
//  unwanted_genres: [GenreInput!]

