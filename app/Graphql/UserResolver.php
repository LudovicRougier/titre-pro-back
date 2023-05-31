<?php

namespace App\Graphql;

use App\Models\User;

class UserResolver
{
    public function country(User $user): string
    {
        return $user->country->value;
    }

    public function gender(User $user): string | null
    {
        return $user->gender->value ?? null;
    }
}
