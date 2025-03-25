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
        Schema::create('consultations', function (Blueprint $table) {
            $table->id(); // consultation_id (Primary Key)
            $table->date('date'); // Date of consultation
            $table->time('time'); // Time of consultation
            $table->string('technique'); // Technique used for consultation (e.g., online, in-person)
            $table->string('area_of_consultation'); // Area of consultation (e.g., family law, business law)
            $table->enum('status', ['pending', 'completed', 'canceled'])->default('pending'); // Status of consultation
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};
