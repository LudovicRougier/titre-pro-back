<?php


test('refresh auth users\'s token', function () {
    $this->logUser();

    $result = json_decode(json_decode($this->graphQL(/** @lang GraphQL */ '
        mutation { refreshToken }
    ')->content())->data->refreshToken);

    expect($result->authorisation)->toHaveProperty('token');
    expect($result->authorisation->type)->toBe('bearer');
 });


 test('refresh unauth user\'s token', function () {
     $result = json_decode($this->graphQL(/** @lang GraphQL */ '
        mutation { refreshToken }
    ')->content());

     expect($result)->toHaveProperty('errors');
  });
