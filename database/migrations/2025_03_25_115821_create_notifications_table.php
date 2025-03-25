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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id(); // notification_id (Primary Key)
            $table->string('notification_type'); // Type of notification (e.g., email, SMS, push)
            $table->text('message'); // Notification message content
            $table->enum('status', ['sent', 'pending', 'failed'])->default('pending'); // Notification status
            $table->string('notification_technique'); // Technique used to send the notification
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
