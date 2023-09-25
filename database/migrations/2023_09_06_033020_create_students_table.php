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
        Schema::create('students', function (Blueprint $table) {
             $table->bigIncrements('id');
            $table->string('name', 300)->nullable();
            $table->date('dob')->nullable();
            $table->string('guardian', 300)->nullable();
            $table->string('mobile', 25)->nullable();
            $table->string('password', 200)->nullable();
            $table->string('alternative_mobile', 25)->nullable();
            $table->string('email', 150)->nullable();
            $table->string('address', 700)->nullable();
            
            $table->string('class_mode', 20)->nullable();
            $table->integer('branch')->nullable();
            $table->integer('slote')->nullable();
            $table->integer('plan')->nullable();

            $table->string('deposit_status', 20)->nullable();
            $table->string('deposit_method', 20)->nullable();
            $table->string('deposit_amount', 20)->nullable();
            $table->date('deposit_date')->nullable();
            $table->string('deposit_reference_id', 300)->nullable();
            $table->string('deposit_repay_status', 20)->nullable();
            $table->date('deposit_repay_date')->nullable();
            $table->string('deposit_repay_mote',600)->nullable();
            $table->string('deposit_repay_amount',15)->nullable();
            $table->string('payment_status', 20)->nullable();
            $table->string('payment_type', 20)->nullable();
            $table->string('payment_method', 20)->nullable();
            $table->string('fee', 20)->nullable();
            $table->string('extra_fee', 20)->nullable();
            $table->string('paid_amount', 20)->nullable();
            $table->date('payment_date')->nullable();
            $table->string('reference_id', 300)->nullable();
            $table->date('joining_date')->nullable();
            $table->date('valid_from')->nullable();
            $table->date('valid_to')->nullable();

            $table->string('approval', 10)->nullable();
            $table->string('status', 10)->nullable();

            $table->date('rejected_at')->nullable();
            $table->string('rejection_reason',500)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
