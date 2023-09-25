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
        Schema::create('installments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('student_id')->nullable();
             $table->integer('plan_id')->nullable();
            $table->date('payment_date')->nullable();
            $table->date('last_date')->nullable();
            $table->string('fee', 10)->nullable();
            $table->string('paid_amount', 10)->nullable();
            $table->string('reference_id', 10)->nullable();
            $table->string('payment_status', 20)->nullable();
            $table->string('approval_status', 20)->nullable();
            $table->string('payment_method', 20)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('installments');
    }
};
