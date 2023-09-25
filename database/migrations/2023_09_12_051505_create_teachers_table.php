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
        Schema::create('teachers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100)->nullable()->default('admin');
           $table->bigInteger('mobile')->nullable()->default(0);
            $table->string('password', 100)->nullable()->default('admin');
            $table->rememberToken();
            $table->string('mail_id', 100)->nullable()->default('admin@gmail.com');
            $table->string('facebook', 100)->nullable()->default('0');
            $table->string('instagram', 100)->nullable()->default('0');
            $table->string('twitter', 100)->nullable()->default('0');
            $table->string('details', 1000)->nullable();
            $table->string('profile_image', 100)->nullable()->default('image');
            $table->string('status', 15)->nullable();
            $table->string('block_reason', 600)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
