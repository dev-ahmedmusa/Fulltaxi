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
        Schema::create('document_masters', function (Blueprint $table) {
            $table->id();
            $table->string('doc_type');
            $table->string('doc_for');
            $table->string('name');
            $table->string('name_ar');
            $table->tinyInteger('expire_valid_for')->nullable(); // expire per years like 5
            $table->enum('status',['Active','InActive'])->default('Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_masters');
    }
};
