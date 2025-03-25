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
            $table->id(); // setting_id
            $table->string('language_preference')->default('English'); // language preference
            $table->string('font_size')->default('medium'); // font size
            $table->string('color_mode')->default('light'); // color mode (light/dark)
            $table->boolean('notification_preference')->default(true); // notification preference (true = enabled, false = disabled)
            $table->timestamps();
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
