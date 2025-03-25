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
        Schema::create('availabilities', function (Blueprint $table) {
            $table->id(); // availability_id (Primary Key)
            $table->date('booking_date'); // Date for the availability
            $table->string('day_of_the_week'); // Day of the week (e.g., Monday, Tuesday)
            $table->enum('status', ['available', 'booked', 'cancelled'])->default('available'); // Status of availability
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('availability');
    }
};
