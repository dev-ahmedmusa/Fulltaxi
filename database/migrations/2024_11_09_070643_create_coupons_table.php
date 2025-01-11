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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('coupon_code')->unique();
            $table->text('coupon_description')->nullable();
            $table->enum('coupon_type',['percentage','cash'])->default('percentage');
            $table->decimal('discount_value')->default(0.0);
            $table->enum('coupon_validity',['permanent','custom'])->default('permanent');
            $table->integer('count_coupon_limit')->default(0);
            $table->integer('used')->default(0);
            $table->date('start_date')->nullable();
            $table->date('expire_date')->nullable();
            
            $table->enum('status',['Active', 'Inactive'])->default('Active');
         
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
