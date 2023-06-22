<?php

namespace App\GraphQL\Mutations;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Auth\RegisterRequest;

final class Register
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args): array
    {
        $registerRequest = new RegisterRequest();
        $rules = $registerRequest->rules();

        $validator = Validator::make($args, $rules);

        if ($validator->fails()) {
            return [
                'status'  => 401,
                'success' => false,
                'errors'  => $validator->errors(),
            ];
        }

        $user = User::create($validator->getData());

        return [
            'status'  => 201,
            'success' => true,
            'user'    => $user,
        ];
    }
}
