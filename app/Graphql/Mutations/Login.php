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
            'email' => 'required|string|email|exists:users,email',
            'password' => 'required|string',
        ]);

        $token = Auth::attempt($validator->getData());

        if ($validator->fails() || !$token) {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }

        return [
            'user' => Auth::user(),
            'authorization' => [
                    'token' => $token,
                    'type' => 'bearer',
                ]
            ];
    }
}
