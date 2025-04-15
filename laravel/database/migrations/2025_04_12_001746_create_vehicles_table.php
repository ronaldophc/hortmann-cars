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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // Carro ou moto.
            $table->string('model'); // Gol, Palio, CB300, Peugeot
            $table->string('manufacturer'); // Hyundai, Ford, Honda, Yamaha
            $table->string('fuel_type')->nullable(); // Gasolina, Álcool, Flex, Diesel
            $table->string('steering_type')->nullable(); // Mecânica, Hidráulica, Elétrica
            $table->string('transmission')->nullable(); // Automática, Manual
            $table->integer('doors')->nullable(); // Número de portas (aplicável apenas para automóveis)
            $table->string('year')->nullable(); // Ano do modelo
            $table->string('mileage')->nullable(); // Quilometragem atual
            $table->decimal('price', 10, 2); // Preço
            $table->string('license_plate')->nullable()->unique(); // Não exibido publicamente - Placa do veículo
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true); // Se o veículo está ativo ou não
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
