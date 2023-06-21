<?php

namespace App\Http\Requests;

use App\Enums\CountryEnum;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'                            => ['nullable', 'string', 'max:255'],
            'email'                           => ['nullable', 'email', 'max:255', 'unique:users,email'],
            'password'                        => ['nullable', 'string', 'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%^&*()\-_=+{};:,<.>])(?!.*\s).{8,}$/'],
            'country'                         => ['nullable', new Enum(CountryEnum::class)],
            'age'                             => ['nullable', 'integer', 'gt:0'],
            'gender'                          => ['nullable', new Enum(GenderEnum::class)],
            'description'                     => ['nullable', 'string'],
            'wanted_watch_providers'          => ['nullable', 'array', 'max:3'],
            'wanted_watch_providers.buy'      => ['nullable', 'array'],
            'wanted_watch_providers.rent'     => ['nullable', 'array'],
            'wanted_watch_providers.flatrate' => ['nullable', 'array'],
            'wanted_genres'                   => ['nullable', 'array'],
            'wanted_genres.*'                 => ['nullable', 'array'],
            'wanted_genres.*.id'              => ['nullable', 'integer'],
            'wanted_genres.*.name'            => ['nullable', 'string'],
            'unwanted_genres'                 => ['nullable', 'array'],
            'unwanted_genres.*'               => ['nullable', 'array'],
            'unwanted_genres.*.id'            => ['nullable', 'integer'],
            'unwanted_genres.*.name'          => ['nullable', 'string'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.string'                           => 'The name must be a string',
            'name.max'                              => 'The name must have 255 characters max',
            'email.email'                           => 'The email must be of type email',
            'email.max'                             => 'The email must have 255 characters max',
            'email.unique'                          => 'The email must be unique in DB',
            'password.string'                       => 'The password must be a string',
            'password.regex'                        => 'The password must fit the regex',
            'country.enum'                          => 'The country must be in list of country',
            'age.integer'                           => 'The age must be an integer',
            'age.gt'                                => 'The age must be positive',
            'description.string'                    => 'The description must be a string',
            'wanted_watch_providers.array'          => 'The wanted_watch_providers must be an array',
            'wanted_watch_providers.max'            => 'The wanted_watch_providers must have a length of 3 max',
            'wanted_watch_providers.buy.array'      => 'The wanted_watch_providers.buy must be an array',
            'wanted_watch_providers.rent.array'     => 'The wanted_watch_providers.rent must be an array',
            'wanted_watch_providers.flatrate.array' => 'The wanted_watch_providers.flatrate must be an array',
            'wanted_genres'                         => 'The wanted_genres must be an array',
            'wanted_genres.*'                       => 'The wanted_genres.* must be an array',
            'wanted_genres.*.id'                    => 'The wanted_genres.id must be an integer',
            'wanted_genres.*.name'                  => 'The wanted_genres.name must be as string',
            'unwanted_genres'                       => 'The unwanted_genres must be an array',
            'unwanted_genres.*'                     => 'The unwanted_genres.* must be an array',
            'unwanted_genres.*.id'                  => 'The unwanted_genres.id must be an integer',
            'unwanted_genres.*.name'                => 'The unwanted_genres.name must be as string',
        ];
    }

    protected function failedValidation(Validator $validator) {
        $errors = (new ValidationException($validator))->errors();

        throw new HttpResponseException(
            response()->json([
                'errors' => $errors
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
        );
    }
}
