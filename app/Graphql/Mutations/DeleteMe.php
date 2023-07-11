<?php

namespace App\GraphQL\Mutations;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

final class DeleteMe
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $password = $args['input'];
        $user = Auth::user();

        if(Hash::check($password, $user->password)) {
            $user->delete();
            return [
                'status' => 200,
                'success' => true,
            ];
        }

        return [
            'status' => 401,
            'success' => false,
            'error' => 'The password doesn\'t match your actual password'
        ];
    }
}
