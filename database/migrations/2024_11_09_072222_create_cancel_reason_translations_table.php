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
        Schema::create('cancel_reason_translations', function (Blueprint $table) {
            $table->id();
            $table->string('locale')->index();
            $table->string('reason');
            // Foreign key to the main model
            $table->unique(['cancel_reason_id', 'locale']);
            $table->foreignId('cancel_reason_id')->references('id')->on('cancel_reasons')->onDelete('cascade');

          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cancel_reason_translations');
    }
};
