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

    public function logUser() {
        $this->graphQL(/** @lang GraphQL */ '
            mutation {
                login(
                    email: "vincent@test.com",
                    password: "MyPassword1!",
                )
            }
        ');

        return User::find(1);
    }
}
