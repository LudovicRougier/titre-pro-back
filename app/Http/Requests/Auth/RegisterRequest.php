<?php

namespace App\Http\Requests\Auth;

use App\Enums\CountryEnum;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends FormRequest
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
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%^&*()\-_=+{};:,<.>])(?!.*\s).{8,}$/'],
            'country'  => ['required', new Enum(CountryEnum::class)],
            'age'      => ['required', 'integer', 'gt:0'],
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
            'name.required'     => 'The name is required',
            'name.string'       => 'The name must be a string',
            'name.max'          => 'The name must have 255 characters max',
            'email.required'    => 'The email is required',
            'email.email'       => 'The email must be of type email',
            'email.max'         => 'The email must have 255 characters max',
            'email.unique'      => 'The email must be unique in DB',
            'password.required' => 'The password is required',
            'password.string'   => 'The password must be a string',
            'password.regex'    => 'The password must fit the regex',
            'country.required'  => 'The country is required',
            'country.enum'      => 'The country must be in list of country',
            'age.required'      => 'The age is required',
            'age.integer'       => 'The age must be an integer',
            'age.gt'            => 'The age must be positive',
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
