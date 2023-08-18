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
        Schema::create('result_summaries', function (Blueprint $table) {
            $table->id();
            $table->integer('term_id');
            $table->integer('result_index');
            $table->integer('student_id');
            $table->string('principal_remark');
            $table->string('teacher_remark');
            $table->text('locomotive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('result_summaries');
    }
};
