<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:settings.customers,name',
            'domain' => 'required|string|max:255|unique:settings.customers,domain',
            'subdomains' => 'nullable|array',
        ];
    }

    public function messages(): array
    {
        return [
            'name.unique' => 'O nome da empresa já está em uso.',
            'name.required' => 'O nome da empresa é obrigatório.',
            'name.string' => 'O nome da empresa deve ser uma string.',
            'name.max' => 'O nome da empresa não pode ter mais de 255 caracteres.',
            'domain.required' => 'O domínio da empresa é obrigatório.',
            'domain.string' => 'O domínio da empresa deve ser uma string.',
            'domain.max' => 'O domínio da empresa não pode ter mais de 255 caracteres.',
            'domain.unique' => 'O domínio da empresa já está em uso.',
            'subdomains.array' => 'Os subdomínios devem ser um array.',
            'subdomains.*.required' => 'Nome do subdomínio é obrigatório.',
            'subdomains.*.string' => 'Subdomínio deve ser uma string.',
            'subdomains.*.max' => 'Subdomínio não pode ter mais de 15 caracteres.',
            'subdomains.*.regex' => 'Subdomínio não pode conter espaços.',
            'subdomains.*.unique' => 'O nome do subdomínio já está em uso.',
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'active' => $this->has('active') ? true : false,
        ]);
    }
}
