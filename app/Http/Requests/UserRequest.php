<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            "name" => ["required", "max:55"],
            "email" => [
                "required", 
                "email", 
                "max:55", 
                Rule::unique("users")->ignore($this->user->id)
            ],
            "password" => ["required", "confirmed", "min:8"]
        ];

        if(in_array($this->method(), ["PUT", "PATCH"])) {
            unset($rules["password"]);
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            "name.required" => "O nome é obrigatório.",
            "name.max" => "O nome não pode ultrapassar 55 caracteres.",
            "email.required" => "O email é obrigatório.",
            "email.email" => "O email tem que ser válido.",
            "email.max" => "O email não pode ter mais de 55 caracteres.",
            "email.unique" => "O email já existe.",
            "password.required" => "A senha é obrigatória.",
            "password.confirmed" => "As senhas não conferem.",
            "password.min" => "A senha deve ter pelo menos 8 caracteres.",
        ];
    }
}
