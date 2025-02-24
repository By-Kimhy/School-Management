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
        Schema::create('teacher_details', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('description');

            //foreign key
            $table->unsignedBigInteger('teacher_id');
            $table->foreign('teacher_id')
            ->references('id')
            ->on('teachers')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->unsignedBigInteger('schedule_id');
            $table->foreign('schedule_id')
            ->references('id')
            ->on('schedules')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->unsignedBigInteger('major_id');
            $table->foreign('major_id')
            ->references('id')
            ->on('majors')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')
            ->references('id')
            ->on('courses')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->unsignedBigInteger('subject_id');
            $table->foreign('subject_id')
            ->references('id')
            ->on('subjects')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_details');
    }
};
