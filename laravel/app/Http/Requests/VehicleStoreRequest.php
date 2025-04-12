<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'type' => 'required|string|in:car,motorcycle',
            'model' => 'required|string|max:255',
            'manufacturer' => 'required|string|max:255',
            'fuel_type' => 'nullable|string|in:gasoline,alcohol,flex,diesel',
            'steering_type' => 'nullable|string|in:mechanical,hydraulic,electric',
            'transmission' => 'nullable|string|in:automatic,manual',
            'doors' => 'nullable|integer|min:0|max:5',
            'year' => 'nullable|string|regex:/^\d{4}$/',
            'current_km' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'license_plate' => 'nullable|string|max:255|unique:vehicles,license_plate',
            'description' => 'nullable|string|max:1000',
        ];
    }

    public function messages(): array
    {
        return [
            'type.required' => 'O tipo do veículo é obrigatório.',
            'model.required' => 'O modelo do veículo é obrigatório.',
            'manufacturer.required' => 'O fabricante do veículo é obrigatório.',
            'price.required' => 'O preço do veículo é obrigatório.',
            'price.numeric' => 'O preço deve ser um valor numérico.',
            'license_plate.unique' => 'A placa do veículo já está cadastrada.',
            'year.regex' => 'O ano deve estar no formato YYYY.',
        ];
    }
}