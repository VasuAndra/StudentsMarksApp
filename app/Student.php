<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
       'firstName', 'lastName', 'fatherName', 'country', 'city', 'year', 'domain', 'specialization', 'group', 'CNP', 'address', 'email', 'password'
    ];
    public function courses() {
        return $this->belongsToMany('App\Course', 'marks', 'student_id', 'course_id')
                    ->withPivot('exam', 'course_presence', 'course_homework', 'course_activity', 'test', 'seminar_presence', 'seminar_homework', 'seminar_activity', 'colloquy', 'lab_presence', 'lab_homework', 'lab_activity', 'profesor_id');
    }
}
