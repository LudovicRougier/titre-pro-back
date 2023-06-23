<?php

namespace App\GraphQL\Mutations;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Validator;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

final class DeleteMe
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args, GraphQLContext $context)
    {
        $user = $context->request()->user();
        $user->delete();

        return $user ?? null;
    }
}
