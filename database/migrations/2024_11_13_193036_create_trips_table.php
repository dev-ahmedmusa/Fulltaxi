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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->decimal('from_lat', 10, 8);
			$table->decimal('from_lng', 11, 8);
			$table->decimal('to_lat', 10, 8);
			$table->decimal('to_lng', 11, 8);
            $table->string('from_address');
            $table->string('to_address');
            $table->string('vehicle_name');
            $table->foreignId('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreignId('driver_id')->references('id')->on('drivers')->onDelete('cascade');
            //$table->integer('vehicle_type_id');
            $table->integer('status_id');
            $table->integer('user_id');
            $table->double('cost')->default(0);
            $table->double('distance');
            $table->decimal('trip_deduction')->default(0);
            $table->boolean('open_trip')->default(0);
            $table->float('time_cost')->nullable()->default(0);
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
