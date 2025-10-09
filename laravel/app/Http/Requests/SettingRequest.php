<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            // Logo (validação de upload será feita no controller)
            'logo' => 'nullable|max:255',
            'logo_alt' => 'nullable|max:255',

            // Informações de Contato
            'phone_1' => 'required|string|min:10|max:20',
            'phone_2' => 'nullable|string|min:10|max:20',
            'email' => 'required|email|max:255',
            'address' => 'nullable|string|max:500',
            'opening_hours' => 'nullable|string|max:255',
            'whatsapp_default_message' => 'nullable|string|max:500',

            // Redes Sociais
            'instagram_url' => 'nullable|url|max:255',
            'facebook_url' => 'nullable|url|max:255',
            'linkedin_url' => 'nullable|url|max:255',
            'x_url' => 'nullable|url|max:255',

            // Localização
            'google_maps_url' => 'nullable|url|max:500',
            'google_maps_embed' => 'nullable|string|max:2000',
        ];
    }
}
