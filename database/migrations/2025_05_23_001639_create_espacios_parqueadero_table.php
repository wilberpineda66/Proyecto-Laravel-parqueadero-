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
        Schema::create('espacios_parqueadero', function (Blueprint $table) {
            $table->id();
            $table->string('numero', 10);
            $table->string('tipo', 50)->nullable();
            $table->foreignId('parqueadero_id')->nullable()->constrained('parqueaderos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('espacios_parqueadero');
    }
};