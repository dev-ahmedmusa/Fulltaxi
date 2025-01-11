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
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('password')->nullable();
            $table->string('image')->nullable();
            $table->string('gender');
            $table->date('birth_date')->nullable();
            $table->string('avg_rating')->nullable();
            $table->boolean('verified')->nullable();
            $table->boolean('is_blocked')->default(0);
            $table->string('lang');
            $table->boolean('status');  
            $table->string('country_code');
            $table->string('device_type')->nullable();
            $table->string('app_version')->nullable();
            $table->string('firebase_token')->nullable();
            $table->text('access_token')->nullable();
            $table->boolean('email_verified')->nullable();
            $table->boolean('phone_verified')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};
