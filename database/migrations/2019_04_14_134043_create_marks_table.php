<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('student_id')
                  ->references('students')->on('id');
            $table->bigInteger('course_id')
                  ->references('course-professor')->on('id');
            $table->integer('exam')->default(0);
            $table->integer('course_presence')->default(0);
            $table->integer('course_homework')->default(0);
            $table->integer('course_activity')->default(0);
            $table->integer('test')->default(0);
            $table->integer('seminar_presence')->default(0);
            $table->integer('seminar_homework')->default(0);
            $table->integer('seminar_activity')->default(0);
            $table->integer('colloquy')->default(0);
            $table->integer('lab_presence')->default(0);
            $table->integer('lab_homework')->default(0);
            $table->integer('lab_activity')->default(0);
            $table->timestamps();
            $table->unique(['student_id', 'course_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marks');
    }
}
