<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rules\Password as PasswordRules;  
use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => ["required","string"],
            "username" => ["required","string"],
            "email"=> ["required", "email", "unique:users,email"],
            "password" => [
                "required",
                "confirmed",
                PasswordRules::min(8)->letters()->symbols()->numbers()
            ],
            "role"=>["required","string"],
            "image"=>["nullable", "image", "mimes:jpeg,png,jpg,gif,svg", "max:2048"],
        ];
    }
}
#

