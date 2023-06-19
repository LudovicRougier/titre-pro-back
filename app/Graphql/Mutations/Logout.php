<?php

namespace App\GraphQL\Mutations;

use Illuminate\Support\Facades\Auth;

final class Logout
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke(): array
    {
        Auth::logout();
        return [
            'message' => 'Successfully logged out',
            'success' => true,
        ];
    }
}
