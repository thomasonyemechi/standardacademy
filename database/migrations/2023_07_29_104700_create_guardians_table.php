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
        Schema::create('guardians', function (Blueprint $table) {
            $table->id();
            $table->string('guardian_name')->nullable();
            $table->string('guardian_email')->nullable();
            $table->string('guardian_phone')->nullable();
            $table->string('guardian_address')->nullable();
            $table->string('password')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_email')->nullable();
            $table->string('mother_address')->nullable();
            $table->string('mother_phone')->nullable();
            $table->string('mother_occupation')->nullable();
            $table->string('mother_office_address')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_email')->nullable();
            $table->string('father_address')->nullable();
            $table->string('father_phone')->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('father_office_address')->nullable();
            $table->string('state')->nullable();
            $table->string('lga')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guardians');
    }
};
