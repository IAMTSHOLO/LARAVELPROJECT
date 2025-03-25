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
        Schema::create('external_systems', function (Blueprint $table) {
            $table->id(); // system_id (Primary Key)
            $table->string('system_name'); // Name of the external system
            $table->string('system_type'); // Type of system (e.g., authentication, data processing)
            $table->string('api_endpoint'); // URL of the API endpoint
            $table->string('api_key'); // API key for authentication
            $table->enum('status', ['active', 'inactive'])->default('active'); // System status
            $table->text('supported_features'); // Features supported by the system
            $table->timestamp('last_sync_date')->nullable(); // Last synchronization date
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('external_systems');
    }
};
