<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course_Professor extends Model
{
    protected $table = 'course-professor';
    protected $fillable = ['professor_id', 'course_id', 'exam', 'course_presence', 'course_homework', 'course_activity', 'test', 'seminar_presence', 'seminar_homework', 'seminar_activity', 'colloquy', 'lab_presence', 'lab_homework', 'lab_activity'];
}
