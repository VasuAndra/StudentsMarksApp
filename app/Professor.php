<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $fillable = ['firstName', 'lastName', 'country', 'city', 'CNP', 'address', 'email', 'password'];

    public function courses() {
        return $this->belongsToMany('App\Course', 'course-professor')->withPivot(['exam', 'course_presence', 'course_homework', 'course_activity', 'test', 'seminar_presence', 'seminar_homework', 'seminar_activity', 'colloquy', 'lab_presence', 'lab_homework', 'lab_activity', 'seted']);
    }

    public function coursesDet() {
        return $this->belongsToMany('App\Course', 'course-professor');
    }
}
