<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course_Professor;

class Course_ProfessorController extends Controller
{
    //get marking method for a certain course and a certain teacher
    public function getNotationMethod ($course_id, $professor_id) {
        $notation_method = Course_Professor::where([['course_id', $course_id], ['professor_id', $professor_id]])->first();
        return $notation_method;
    }
}
