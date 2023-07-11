<?php


use App\Models\User;


test('register valid user', function () {
    $result = json_decode(json_decode($this->graphQL(/** @lang GraphQL */ '
        mutation {
            register(
                name: "user",
                email: "user@test.com",
                password: "MyPassword1!",
                country: "FR",
                age: 20
            )
        }
    ')->content())->data->register);

    expect(User::all())->toHaveCount(5);
    expect($result->status)->toBe(201);
    expect($result->success)->toBeTrue();
    expect($result->user->id)->toBe(5);
    expect($result->user->name)->toBe('user');
    expect($result->user->email)->toBe('user@test.com');
    expect($result->user->country)->toBe('FR');
    expect($result->user->age)->toBe(20);
    expect($result->user->gender)->toBe('Non Renseigné');
    expect($result->user->description)->toBeEmpty();
    expect($result->user->wanted_genres)->toBeNull();
    expect($result->user->unwanted_genres)->toBeNull();
    expect($result->user->wanted_watch_providers)->toBeNull();
});


test('register user with invalid password', function () {
    $result = json_decode(json_decode($this->graphQL(/** @lang GraphQL */ '
        mutation {
            register(
                name: "user",
                email: "user@test.com",
                password: "MyPassword1",
                country: "FR",
                age: 20
            )
        }
    ')->content())->data->register);

    expect(User::all())->toHaveCount(4);
    expect($result->status)->toBe(401);
    expect($result->success)->toBeFalse();
    expect($result->errors)->toHaveProperty('password');
    expect($result->errors->password)->toBeArray();
    expect($result->errors->password[0])->toBe('The password field format is invalid.');
});


test('register user with existing email', function () {
    $result = json_decode(json_decode($this->graphQL(/** @lang GraphQL */ '
        mutation {
            register(
                name: "user",
                email: "vincent@test.com",
                password: "MyPassword1!",
                country: "FR",
                age: 20
            )
        }
    ')->content())->data->register);

    expect(User::all())->toHaveCount(4);
    expect($result->status)->toBe(401);
    expect($result->success)->toBeFalse();
    expect($result->errors)->toHaveProperty('email');
    expect($result->errors->email)->toBeArray();
    expect($result->errors->email[0])->toBe('The email has already been taken.');
});


test('register user with invalid country', function () {
    $result = json_decode(json_decode($this->graphQL(/** @lang GraphQL */ '
        mutation {
            register(
                name: "user",
                email: "user@test.com",
                password: "MyPassword1!",
                country: "FRR",
                age: 20
            )
        }
    ')->content())->data->register);

    expect(User::all())->toHaveCount(4);
    expect($result->status)->toBe(401);
    expect($result->success)->toBeFalse();
    expect($result->errors)->toHaveProperty('country');
    expect($result->errors->country)->toBeArray();
    expect($result->errors->country[0])->toBe('The selected country is invalid.');
});


test('register user with invalid age', function () {
    $result = json_decode(json_decode($this->graphQL(/** @lang GraphQL */ '
        mutation {
            register(
                name: "user",
                email: "user@test.com",
                password: "MyPassword1!",
                country: "FR",
                age: 2020
            )
        }
    ')->content())->data->register);

    expect(User::all())->toHaveCount(4);
    expect($result->status)->toBe(401);
    expect($result->success)->toBeFalse();
    expect($result->errors)->toHaveProperty('age');
    expect($result->errors->age)->toBeArray();
    expect($result->errors->age[0])->toBe('The age field must be between 1 and 3 digits.');
});
