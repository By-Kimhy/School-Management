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
            $table->id();
            $table->string('teacher_code')->unique();
            $table->string('teacher_name');
            $table->date('teacher_dob');
            $table->string('teacher_email')->nullable();
            $table->string('teacher_phone');
            $table->text('teacher_profile');
            $table->binary('teacher_photo');
            $table->timestamps();

            //foreign key
            $table->unsignedBigInteger('gender_id');
            $table->foreign('gender_id')
            ->references('id')
            ->on('genders')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            
            
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
