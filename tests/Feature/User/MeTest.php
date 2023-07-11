<?php


test('query me with auth user', function () {
    $user = $this->logUser();

    $result = json_decode($this->graphQL(/** @lang GraphQL */ '
        query {
            me {
                id
                name
                age
                country
                gender
                description
                email
                wanted_watch_providers {provider_id, provider_name, display_priority, logo_path}
                wanted_genres {id, name}
                unwanted_genres {id, name}
                prompts {id}
            }
        }
    ')->content(), true)['data']['me'];

    expect(intval($result['id']))->toBe($user->id);
    expect($result['name'])->toBe($user->name);
    expect(intval($result['age']))->toBe($user->age);
    expect($result['country'])->toBe($user->country->value);
    expect($result['gender'])->toBe($user->gender->value);
    expect($result['description'])->toBe($user->description);
    expect($result['email'])->toBe($user->email);
    expect($result['wanted_watch_providers'])->toBe($user->wanted_watch_providers);
    expect($result['wanted_genres'])->toBe($user->wanted_genres);
    expect($result['unwanted_genres'])->toBe($user->unwanted_genres);
    expect($result['prompts'])->toBe($user->prompts->toArray());
 });


 test('query me with unauth user', function () {
     $result = json_decode($this->graphQL(/** @lang GraphQL */ '
         query {
             me {
                 id
                 name
                 age
                 country
                 gender
                 description
                 email
                 wanted_watch_providers {provider_id, provider_name, display_priority, logo_path}
                 wanted_genres {id, name}
                 unwanted_genres {id, name}
                 prompts {id}
             }
         }
     ')->content());

     expect($result->data->me)->toBeNUll();
  });
