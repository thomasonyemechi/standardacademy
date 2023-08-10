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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->integer('term_id');
            $table->integer('fee_id')->nullable(0);
            $table->integer('fee_index')->nullable(0);
            $table->integer('class_id');
            $table->integer('student_id');
            $table->integer('amount');
            $table->integer('discount');
            $table->integer('total');
            $table->integer('created_by');
            $table->integer('type')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
