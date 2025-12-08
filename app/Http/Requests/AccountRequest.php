<?php

namespace App\Http\Requests;

use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->account ? $this->account?->user_id === auth()->id() : true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => [
                "required", 
                "max:55",
                Rule::unique('accounts')
                    ->where(fn (Builder $query) => $query->where('user_id', auth()->id()))
                    ->ignore($this->account?->id),
            ],
            "due_day" => ["nullable", "integer", "between:1,31"]
        ];
    }


    public function messages(): array
    {
        return [
            'name.required' => 'O nome da conta é obrigatório.',
            'name.max' => 'O nome da conta não pode ter mais que 55 caracteres.',
            'name.unique' => 'Você já possui uma conta com esse nome.',

            'due_day.integer' => 'O dia de vencimento deve ser um número inteiro.',
            'due_day.between' => 'O dia de vencimento deve estar entre 1 e 31.',
        ];
    }
}
