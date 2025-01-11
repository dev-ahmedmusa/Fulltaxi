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
        Schema::create('driver_login_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('driver_verification_id')->references('id')->on('driver_verifications')->onDelete('cascade');
            $table->foreignId('driver_id')->nullable()->references('id')->on('drivers')->onDelete('cascade');
            $table->string('token');
            $table->string('lang')->default('ar');
            $table->boolean('is_expired')->default(0);
            $table->timestamp('expired_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('driver_login_sessions');
    }
};
