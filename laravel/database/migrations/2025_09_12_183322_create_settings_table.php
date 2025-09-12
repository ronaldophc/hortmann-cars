<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            
            // Logo da Loja
            $table->string('logo')->nullable()->comment('Caminho da logo principal');
            $table->string('logo_alt')->nullable()->comment('Caminho da logo alternativa');
            
            // Informações de Contato
            $table->string('phone_1')->nullable()->comment('Telefone principal');
            $table->string('phone_2')->nullable()->comment('Telefone secundário');
            $table->string('email')->nullable()->comment('E-mail para contato');
            $table->text('address')->nullable()->comment('Endereço completo');
            $table->string('opening_hours')->nullable()->comment('Horário de funcionamento');
            
            // Redes Sociais
            $table->string('instagram_url')->nullable()->comment('URL do Instagram');
            $table->string('facebook_url')->nullable()->comment('URL do Facebook');
            $table->string('linkedin_url')->nullable()->comment('URL do LinkedIn');
            $table->string('x_url')->nullable()->comment('URL do X (Twitter)');
            
            // Localização
            $table->text('google_maps_url')->nullable()->comment('Link do Google Maps');
            $table->text('google_maps_embed')->nullable()->comment('Código iframe do Google Maps');
            
            // Campos de controle
            $table->timestamps();
            
            // Índices para otimização
            $table->index(['created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
