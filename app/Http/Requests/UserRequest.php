<?php

namespace App\Http\Requests;

use App\Enums\CountryEnum;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Foundation\Http\FormRequest;

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
            'name'                       => ['string', 'max:255'],
            'email'                      => ['email', 'max:255', Rule::unique('users')->ignore(Auth::user()->id)],
            'current_password'           => ['required_unless:new_password,null', 'current_password'],
            'new_password'               => ['required_unless:current_password,null', 'string', 'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%^&*()\-_=+{};:,<.>])(?!.*\s).{8,}$/'],
            'country'                    => [new Enum(CountryEnum::class)],
            'age'                        => ['integer', 'gt:0'],
            'gender'                     => [new Enum(GenderEnum::class)],
            'description'                => ['nullable', 'string'],
            'wanted_watch_providers'     => ['nullable', 'array'],
            'wanted_watch_providers.*'   => ['array:provider_id,provider_name,display_priority,logo_path'],
            'wanted_watch_providers.*.*' => ['required'],
            'wanted_genres'              => ['nullable', 'array'],
            'wanted_genres.*'            => ['nullable', 'array'],
            'wanted_genres.*.id'         => ['integer'],
            'wanted_genres.*.name'       => ['string'],
            'unwanted_genres'            => ['nullable', 'array'],
            'unwanted_genres.*'          => ['nullable', 'array:id,name'],
            'unwanted_genres.*.id'       => ['integer'],
            'unwanted_genres.*.name'     => ['string'],
        ];
    }
}
