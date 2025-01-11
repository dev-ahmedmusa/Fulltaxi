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
        Schema::create('service_type_translations', function (Blueprint $table) {
            $table->id();
            $table->string('locale')->index();
            $table->longText('note')->nullable();
            // Foreign key to the main model
            $table->unique(['locale','service_type_id']);
            $table->foreignId('service_type_id')->references('id')->on('service_types')->onDelete('cascade');

            // fields you want to translate
            $table->string('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_type_translations');
    }
};
