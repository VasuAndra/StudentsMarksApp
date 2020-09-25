<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use DB;
use Auth;
use App\Course;
use App\Marks;
use App\Course_Professor;

class StudentController extends Controller
{
    public function displayStudentHomePage() {
        return view('studentHomePage');                                                         
    }
    
    
    public function getStudent() {
        $student = Student::where('id', Auth::user()->student_id)->first();
        return $student;
    }


    public function getStudentsByGroup(int $group) {
        $students = Student::where('group', $group)->get();
        return $students;
    }
    
   
    //get courses for selected year and semester
    public function courses(Request $request) {
        $year = $request->category[0];
        $semester = $request->category[2];
        $student = $this->getStudent();
        $courses = $student->courses()->where([['year', $year], ['semester', $semester]])->get();
        return view('grades', ['courses' => $courses, 'year' => $year, 'semester' =>  $semester]);
    }

    public function displayGrades(Request $request) {
        //get logged in student
        $student = $this->getStudent();
        //get selected course
        $selectedCourse = $student->courses()->where('courses.id', $request->input('id'))->first();
        //get his teacher
        $professorId = $selectedCourse->pivot->profesor_id;
        //get notation method for selected course with that professor
        $notationMethod = app('App\Http\Controllers\Course_ProfessorController')->getNotationMethod($selectedCourse['id'], $professorId);
        $grade = 0;

        //if the teacher doesn't give points for a field, a '-' should be displayed
        //otherwise the grade should be displayed
        //0 is the default value for the the marking method and it means that the teacher doesn't give points for that field
        if ($notationMethod['exam'] == 0)
            $selectedCourse->pivot->exam = '-';
        else $grade += $selectedCourse->pivot->exam;
        if ($notationMethod['course_presence'] == 0)
            $selectedCourse->pivot->course_presence = '-';
        else $grade += $selectedCourse->pivot->course_presence;
        if ($notationMethod['course_homework'] == 0)
            $selectedCourse->pivot->course_homework = '-';
        else $grade += $selectedCourse->pivot->course_homework;
        if ($notationMethod['course_activity'] == 0)
            $selectedCourse->pivot->course_activity = '-';
        else $grade += $selectedCourse->pivot->course_activity;
        if ($notationMethod['test'] == 0)
            $selectedCourse->pivot->test  = '-';
        else $grade += $selectedCourse->pivot->test;
        if ($notationMethod['seminar_presence'] == 0)
            $selectedCourse->pivot->seminar_presence = '-';
        else $grade += $selectedCourse->pivot->seminar_presence;
        if ($notationMethod['seminar_homework'] == 0)
            $selectedCourse->pivot->seminar_homework = '-';
        else $grade += $selectedCourse->pivot->seminar_homework;
        if ($notationMethod['seminar_activity'] == 0)
            $selectedCourse->pivot->seminar_activity = '-';
        else $grade += $selectedCourse->pivot->seminar_activity;
        if ($notationMethod['colloquy'] == 0)
            $selectedCourse->pivot->colloquy = '-';
        else $grade += $selectedCourse->pivot->colloquy;
        if ($notationMethod['lab_presence'] == 0)
            $selectedCourse->pivot->lab_presence = '-';
        else $grade += $selectedCourse->pivot->lab_presence;
        if ($notationMethod['lab_homework'] == 0)
            $selectedCourse->pivot->lab_homework = '-';
        else $grade += $selectedCourse->pivot->lab_homework; 
        if ($notationMethod['lab_activity'] == 0)
            $selectedCourse->pivot->lab_activity = '-';
        else $grade += $selectedCourse->pivot->lab_activity;
        $grade = min(10, $grade);
        $selectedCourse['grade'] = $grade;
        //used Ajax for selecting the course
        if (request()->ajax()) {
            return response()->json(['marks' => $selectedCourse->pivot, 'notationMethod' => $notationMethod]);
        }
    }

    public function chooseSemester() {
        //get logged in student
        $student = $this->getStudent();
        //send to the view student's semester
        return view('chooseSemester', ['year' => $student->year, 'semester' => $student->semester]);
    }

    public function displayRanking() {
        //get logged in student
        $currentStudent = $this->getStudent();
        //get students from DB at
        $students = Student::where([['year', $currentStudent->year], 
                                    ['domain', $currentStudent->domain], 
                                    ['specialization', $currentStudent->specialization]])
                             ->orderBy('current_semester_mark', 'desc')->get();
  
        $position;
        //get logged in student's position among all students
        for ($i = 0; $i < sizeof($students); $i++)
            if ($students[$i]->id == $currentStudent->id) {
                $position = $i;
                break;
            }
        $studentsNum = sizeof($students);
        $studentInfo = [];
        $studentInfo['position'] = $position + 1;
        $studentInfo['current_semester_mark'] = $students[$position]->current_semester_mark;
        //if logged in student is in the first 20% students, he has scholarship
        if ($position <= ceil(0.2 * $studentsNum))
            $studentInfo['scholarship'] = 1;
        
        else 
            $studentInfo['scholarship'] = 0;
        
        //grade of student that has last scholarship
        $studentInfo['lastSchGrade'] = $students[round(0.2 * $studentsNum)]->current_semester_mark;
        
        //position of student that has last scholarship
        $studentInfo['lastSchPos'] = round(0.2 * $studentsNum) + 1;
        
        //if logged in student is in the last 10% students, he is at tax
        if ($position >= $studentsNum - 0.1 * $studentsNum)
            $studentInfo['tax'] = 1;
        else 
            $studentInfo['tax'] = 0;
        
        //grade and position of the student that is the first at tax
        $studentInfo['firstTaxGrade'] = $students[floor($studentsNum - 0.2 * $studentsNum)]->current_semester_mark;
        $studentInfo['firstTaxPos'] = floor($studentsNum - 0.2 * $studentsNum + 1);
        return view('ranking', ['studentInfo' => $studentInfo]);
    }
    
}
