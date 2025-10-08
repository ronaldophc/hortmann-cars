<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('settings')->create('sub_domains', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            $table->string('subdomain');
            $table->boolean('active')->default(1);
            $table->string('connection_name')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::connection('settings')->dropIfExists('sub_domains');
    }
};
