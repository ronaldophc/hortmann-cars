<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVehicleRequest extends FormRequest
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
            'mileage' => 'nullable|string|max:255',
            'price' => 'required',
            'license_plate' => 'nullable|string|max:255|unique:vehicles,license_plate',
            'description' => 'nullable|string|max:1000',
            'is_active' => 'required|boolean',
            'user_id' => 'nullable|exists:users,id',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
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
            'doors.integer' => 'O número de portas deve ser um número inteiro.',
            'doors.min' => 'O número de portas deve ser pelo menos 0.',
            'doors.max' => 'O número de portas não pode ser maior que 5.',
            'current_km.string' => 'A quilometragem atual deve ser uma string.',
            'current_km.max' => 'A quilometragem atual não pode ter mais de 255 caracteres.',
            'description.string' => 'A descrição deve ser uma string.',
            'description.max' => 'A descrição não pode ter mais de 1000 caracteres.',
            'is_active.required' => 'O status de atividade do veículo é obrigatório.',
            'is_active.boolean' => 'O status de atividade do veículo deve ser verdadeiro ou falso.',
            'fuel_type.string' => 'O tipo de combustível deve ser uma string.',
            'steering_type.string' => 'O tipo de direção deve ser uma string.',
            'transmission.string' => 'A transmissão deve ser uma string.',
            'transmission.in' => 'A transmissão deve ser automática ou manual.',
            'steering_type.in' => 'O tipo de direção deve ser mecânica, hidráulica ou elétrica.',
            'fuel_type.in' => 'O tipo de combustível deve ser gasolina, álcool, flex ou diesel.',
            'model.string' => 'O modelo deve ser uma string.',
            'manufacturer.string' => 'O fabricante deve ser uma string.',
            'license_plate.string' => 'A placa deve ser uma string.',
            'license_plate.max' => 'A placa não pode ter mais de 255 caracteres.',
        ];
    }
}
