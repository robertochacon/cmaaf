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
        Schema::create('shifts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('identification')->nullable();
            $table->string('patient_name')->nullable();
            $table->string('code')->nullable();
            $table->string('service')->nullable();
            $table->string('note')->nullable();
            $table->string('room')->nullable();
            $table->string('area')->nullable();
            $table->string('window')->nullable();
            $table->enum('status',['call','wait','wait_doctor','done','cancel'])->default('wait');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shifts');
    }
};
