<?php

namespace App\GraphQL\Mutations;

use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Validator;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

final class UpdateMe
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args, GraphQLContext $context)
    {
        $user        = $context->request()->user();
        $input       = $args['input'];
        $userRequest = new UserRequest();
        $rules       = $userRequest->rules();

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return [
                'status'  => 401,
                'success' => false,
                'errors'  => $validator->errors(),
            ];
        }

        if (isset($validator->getData()['new_password'])) {
            $validator->setData([
                ...$validator->getData(),
                'password' => $validator->getData()['new_password']
            ]);
        }

        $user->update($validator->getData());

        return [
            'status'  => 200,
            'success' => true,
            'user'    => $user,
        ];
    }
}
