<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseProfessorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course-professor', function (Blueprint $table) {
            $table->bigInteger('professor_id')
                  ->references('id')->on('professors');
            $table->bigInteger('course_id')
                  ->references('id')->on('courses');
            $table->bigIncrements('id');
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
            $table->unique(['professor_id', 'course_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
