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
        Schema::create('document_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('docmaster_id')->references('id')->on('document_masters')->onDelete('cascade');
            // vehicle document
            //$table->foreignId('docmaster_id')->references('id')->on('document_masters')->onDelete('cascade');
            $table->foreignId('driver_id')->references('id')->on('drivers')->onDelete('cascade');
            $table->string('doc_file');
            $table->date('expire_date')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_lists');
    }
};
