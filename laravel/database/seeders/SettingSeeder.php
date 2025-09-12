<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            // Logo da Loja (deixamos vazios para serem definidos via upload)
            'logo' => null,
            'logo_alt' => null,
            
            // Informações de Contato
            'phone_1' => '(11) 99999-9999',
            'phone_2' => '(11) 3333-3333',
            'email' => 'contato@hortmanncars.com.br',
            'address' => 'Rua das Flores, 123, Centro, São Paulo - SP, CEP: 01234-567',
            'opening_hours' => 'Segunda a Sexta: 8h às 18h | Sábado: 8h às 12h',
            
            // Redes Sociais
            'instagram_url' => 'https://instagram.com/hortmanncars',
            'facebook_url' => 'https://facebook.com/hortmanncars',
            'linkedin_url' => 'https://linkedin.com/company/hortmann-cars',
            'x_url' => 'https://x.com/hortmanncars',
            
            // Localização
            'google_maps_url' => 'https://maps.google.com/?q=Hortmann+Cars+São+Paulo',
            'google_maps_embed' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.1975!2d-46.6344!3d-23.5505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjPCsDMzJzAxLjgiUyA0NsKwMzgnMDMuOCJX!5e0!3m2!1spt-BR!2sbr!4v1234567890" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
        ]);
    }
}