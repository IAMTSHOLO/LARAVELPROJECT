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
        Schema::create('chattings', function (Blueprint $table) {
            $table->id(); // chat_id (Primary Key)
            $table->text('message'); // Chat message content
            $table->enum('status', ['sent', 'delivered', 'read'])->default('sent'); // Message status
            $table->enum('message_type', ['text', 'image', 'video', 'audio', 'file'])->default('text'); // Type of message
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chattings');
    }
};
