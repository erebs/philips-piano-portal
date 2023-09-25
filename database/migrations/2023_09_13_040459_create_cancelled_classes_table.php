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
        Schema::create('cancelled_classes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('class_date')->nullable();
            $table->integer('student_id')->nullable();
            $table->integer('slote')->nullable();
            $table->string('reason',1500)->nullable();
            $table->string('status',15)->nullable();
            $table->string('rebooked_status',15)->nullable();
            $table->string('rebooked_by',15)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cancelled_classes');
    }
};
