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
        Schema::create('feria_emprendedor', function (Blueprint $table) {
            $table->id();
            $table->foreignId('feria_id')->constrained()->onDelete('cascade');
            $table->foreignId('emprendedor_id')->constrained('emprendedores')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('feria_emprendedor');
    }
};
