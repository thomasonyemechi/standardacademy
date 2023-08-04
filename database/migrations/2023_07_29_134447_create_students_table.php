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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id');
            $table->integer('class_id');
            $table->integer('arm_id')->nullable();
            $table->string('registration_number')->nullable();
            $table->string('surname');
            $table->string('firstname');
            $table->string('othername')->nullable();
            $table->string('sex')->nullable();
            $table->string('username')->nullable();
            $table->string('password');
            $table->string('photo');
            $table->string('dob')->nullable();
            $table->integer('pwd');
            $table->text('others')->nullable();
            $table->integer('status')->default(1);
            $table->integer('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
