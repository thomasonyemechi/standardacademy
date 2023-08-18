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
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->integer('result_id');
            $table->integer('subject_id');
            $table->integer('student_id');
            $table->integer('class_id');
            $table->integer('t1')->default(0);
            $table->integer('t2')->default(0);
            $table->integer('t3')->default(0);
            $table->integer('t4')->default(0);
            $table->integer('exam')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
