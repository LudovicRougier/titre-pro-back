<?php

namespace App\GraphQL\Mutations;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

final class Login
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args): array
    {
        $validator = Validator::make($args, [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $token = Auth::attempt($validator->getData());

        if ($validator->fails() || !$token) {
            return [
                'status'  => 401,
                'success' => false,
                'message' => 'Unauthorized',
            ];
        }

        return [
            'success'       => true,
            'user'          => Auth::user(),
            'authorization' => [
                    'token' => $token,
                    'type' => 'bearer',
                ]
            ];
    }
}
