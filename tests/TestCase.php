<?php

namespace Tests;

use App\Models\User;
use Nuwave\Lighthouse\Testing\MakesGraphQLRequests;
use Nuwave\Lighthouse\Testing\RefreshesSchemaCache;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use MakesGraphQLRequests;
    use RefreshesSchemaCache;

    protected $seed = true;

    public function logUser($emailParam = "vincent@test.com", $passwordParam = "MyPassword1!") {
        $this->graphQL(/** @lang GraphQL */ '
            mutation ($email: String!, $password: String!) {
                login(email: $email, password: $password)
            }
        ', [
            'email' => $emailParam,
            'password' => $passwordParam,
        ]);

        return $this->user();
    }

    public function user() {
        return User::first();
    }
}
