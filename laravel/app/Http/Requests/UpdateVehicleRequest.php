<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVehicleRequest extends FormRequest
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
            'license_plate' => 'nullable|string|max:255|unique:vehicles,license_plate,' . $this->vehicle->id,
            'description' => 'nullable|string|max:1000',
            'is_active' => 'required|boolean',
        ];
    }
}
