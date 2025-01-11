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
        Schema::create('vehicle_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_type_id')->references('id')->on('service_types')->onDelete('cascade');
            $table->double('baseFare');
            $table->double('minPrice');
            $table->double('pricePerKM');
            $table->double('pricePerMin');
            $table->time('daySurgeStart');
            $table->time('daySurgeEnd');
            $table->double('daySurgepriceKM');
            $table->time('nightSurgeStart');
            $table->time('nightSurgeEnd');
            $table->double('nightSurgepriceKM');

            $table->integer('trip_deduction_percent');
            $table->double('trip_deduction_amount');
            $table->string('person_size');
            $table->string('vehicleImage')->nullable();
            $table->double('waiting_fees');
            $table->double('waiting_feet_time_limit');
            $table->double('radius');
      
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_types');
    }
};
