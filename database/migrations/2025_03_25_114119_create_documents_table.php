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
        Schema::create('documents', function (Blueprint $table) {
            $table->id(); // document_id
            $table->string('document_name'); // Name of the document
            $table->string('document_type'); // Type of the document (e.g., PDF, DOCX)
            $table->timestamp('upload_date')->useCurrent(); // Upload date (default: current timestamp)
            $table->timestamp('last_modified_date')->nullable()->useCurrentOnUpdate(); // Last modified date
            $table->enum('status', ['active', 'archived', 'deleted'])->default('active'); // Status of the document
            $table->integer('document_size'); // Size of the document in KB or MB
            $table->string('document_file_path'); // Path to the stored document file
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
