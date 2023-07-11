<?php

use App\Models\User;

test('register a valid user', function () {
    $result = json_decode(json_decode($this->graphQL(/** @lang GraphQL */ '
        mutation {
            register(
                name: "user",
                email: "user@test.com",
                password: "MyPassword1!",
                country: "FR",
                age: 20)
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

 test('register a user with invalid password', function () {
     $result = json_decode($this->graphQL(/** @lang GraphQL */ '
         mutation {
             register(
                 name: "user",
                 email: "user@test.com",
                 password: "MyPassword1",
                 country: "FR",
                 age: 20)
         }
     ')->content());

     dd($result);

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
