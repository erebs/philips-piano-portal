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
        Schema::create('credit_classes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('student_id')->nullable();
            $table->string('details',1000)->nullable();
            $table->longText('note')->nullable();
            $table->string('type',20)->nullable();
            $table->string('paid_amount',10)->nullable();
            $table->string('payment_method',20)->nullable();
            $table->date('payment_date')->nullable();
            $table->string('reference_id',200)->nullable();
            $table->string('cancel_reason',700)->nullable();
            $table->string('status',15)->nullable();
            $table->integer('slote')->nullable(); 
            $table->date('booked_date')->nullable();
            $table->string('attendance',15)->nullable();
            $table->string('added_by',20)->nullable();
            $table->string('updated_by',20)->nullable();   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credit_classes');
    }
};
