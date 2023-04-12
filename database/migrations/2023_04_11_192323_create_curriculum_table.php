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
        Schema::create('curriculum', function (Blueprint $table) {
            $table->id();

            $table->string('name', 250);
            $table->string('email', 150);
            $table->integer('phone');
            $table->string('desired_job', 500);
            $table->string('schooling', 250);
            $table->string('observations', 2500)->nullable(true);
            $table->string('document', 2500);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curriculum');
    }
};
