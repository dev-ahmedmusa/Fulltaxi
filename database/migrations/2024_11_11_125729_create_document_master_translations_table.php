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
        // Schema::create('document_master_translations', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('locale')->index();

        //     // Foreign key to the main model
        //     $table->unique(['document_master_id', 'locale']);
        //     $table->foreignId('document_master_id')->references('id')->on('document_masters')->onDelete('cascade');

        //     // fields you want to translate
        //     $table->string('name');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_master_translations');
    }
};
