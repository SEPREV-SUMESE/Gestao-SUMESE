<?php

namespace App\Http\Requests;

use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ExpenseCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->category ? $this->category?->user_id === auth()->id() : true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => [
                'required',
                'string',
                'max:55',
                Rule::unique('expense_categories')
                    ->where(fn (Builder $query) => $query->where('user_id', auth()->id()))
                    ->ignore($this->category?->id),
            ],
            'parent_id' => [
                'nullable',
                'exists:expense_categories,id',
            ],
            'subcategories' => ['nullable', 'array'],
            'subcategories.*' => ['required', 'string', 'max:55'],
        ];

        if(in_array($this->method(), ["PUT", "PATCH"])) {
            $rules["subcategories_to_delete"] = ['nullable', 'array'];
            $rules["subcategories_to_delete.*"] = ['integer', 'exists:expense_categories,id'];
            $rules["new_subcategories"] = ['nullable', 'array'];
            $rules["new_subcategories.*"] =  ['required', 'string', 'max:55'];
            
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome da categoria é obrigatório.',
            'name.unique' => 'Você já possui uma categoria com esse nome.',
            'parent_id.exists' => 'A categoria pai selecionada é inválida.',
            'subcategories.array' => 'Subcategorias inválidas.',
            'subcategories.*.required' => 'O nome da subcategoria é obrigatório.',
            'subcategories.*.string' => 'O nome da subcategoria deve ser texto.',
            'subcategories.*.max' => 'O nome da subcategoria não pode exceder 55 caracteres.',
        ];
    }
}
