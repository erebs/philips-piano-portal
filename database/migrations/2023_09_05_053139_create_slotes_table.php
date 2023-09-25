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
        Schema::create('slotes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('class_mode', 15)->nullable();
            $table->integer('branch')->nullable();
            $table->string('day', 20)->nullable();
            $table->time('slote')->nullable();
            $table->integer('slote_limit')->nullable();
            $table->string('status', 10)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slotes');
    }
};
