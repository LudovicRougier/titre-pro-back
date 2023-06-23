<?php

namespace App\GraphQL\Mutations;

use Illuminate\Support\Facades\Auth;

final class RefreshToken
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args): array
    {
        return [
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ];
    }
}
