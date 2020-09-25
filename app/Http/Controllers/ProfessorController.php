<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Professor;
use App\Course_Professor;
use App\Course;
use Auth;
use App\Student;
use App\Marks;

class ProfessorController extends Controller
{
    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function displayProfessorHomepage() {
        return view('professorHomePage');
    }

   /*redirect to the page where the professor can add a grade
   and send selected student's id for further operation
   and professor's courses to populate the select field*/
    public function redirectToAddGrade(Request $request) {
        $professor = Professor::where('id', Auth::user()->profesor_id)->first();
        $courses = $professor->coursesDet;
        return view('addGrades', ['studentId' => $request->input('stud'), 'courses' => $courses]);
    }

    //insert in DB grade for a student and redirect to home page
    public function addGrade(Request $request) {
        //get selected student
        $studentId = intval($request->input('student_id'));
        $student = Student::where('id', $studentId)->first();
        $courseId = intval($request->input('course_id'));
        //get values for each category
        $exam = intval($request->input('exam'));
        $test = intval($request->input('test'));
        $colloquy = intval($request->input('colloquy'));
        $course_homework = intval($request->input('course_homework'));
        $seminar_homework = intval($request->input('seminar_homework'));
        $lab_homework = intval($request->input('lab_homework'));
        $course_presence = intval($request->input('course_presence'));
        $seminar_presence = intval($request->input('seminar_presence'));
        $lab_presence = intval($request->input('lab_presence'));
        $course_activity = intval($request->input('course_activity'));
        $seminar_activity = intval($request->input('seminar_activity'));
        $lab_activity = intval($request->input('lab_activity'));
        //insert into DB
        $data = [
            'exam' => $exam,
            'course_presence' => $course_presence,
            'course_homework' => $course_homework,
            'course_activity' => $course_activity,
            'test' => $test,
            'seminar_presence' => $seminar_presence,
            'seminar_homework' => $seminar_homework,
            'seminar_activity' => $seminar_activity,
            'colloquy' => $colloquy,
            'lab_presence' => $lab_presence,
            'lab_homework' => $lab_homework,
            'lab_activity' => $lab_activity
        ];
        Marks::where([['student_id', $studentId],
                            ['course_id', $courseId],
                            ['profesor_id', Auth::user()->profesor_id]])
              ->update($data);
        return view ('professorHomePage');
    }
    
    //redirect to marking method page and send professor's courses to populate the select field
    public function markingMethod() {
        $professor = Professor::where('id', Auth::user()->profesor_id)->first();
        $courses = $professor->courses;
        return view('markingMethod', ['courses' => $courses]);
    }

    //used Ajax to populate the tabled according to selected course
    public function selectMarkingMethod(Request $request) {
        $professor = Professor::where('id', Auth::user()->profesor_id)->first();
        $markingMethod = $professor->courses()->where('courses.id', $request->id)->first()->pivot;
        return response()->json($markingMethod);
    }

    //determine to which groups the professor teaches and send them to the view
    public function chooseGroup() {
        //get logged in professor
        $professor = Professor::where('id', Auth::user()->profesor_id)->first();
        
        //get his students
        $marks = Marks::where('profesor_id', $professor['id'])->get();
        $studentsIds = [];
        foreach($marks as $mark) {
            array_push($studentsIds, $mark['student_id']);
        }

        //get his students' groups
        $groups = [];
        foreach($studentsIds as $studentId) {
            $student = Student::where('id', $studentId)->first();
            if (!in_array($student['group'], $groups))
                array_push($groups, $student['group']); 
        }
        
        return view('chooseGroup', ['groups' => $groups]);
    }

    //get students in the selected group and send them to the view
    public function chooseStudent(Request $request) {
        $group = intval($request->input('group'));
        $students = app('App\Http\Controllers\StudentController')->getStudentsByGroup($group);
        return view('chooseStudent', ['students' => $students]);
    }

   
   
    public function updateMarking(Request $request) {
        $input = $request->all();
        $course = Course::find($input['course_id']);
        $aux = Course_Professor::where([['course_id', $course->id],
                                        ['professor_id', Auth::user()->id]])->first();
        
        Course_Professor::where([['course_id', $course->id],
                                 ['professor_id', Auth::user()->profesor_id]])
                         ->update(["exam" => $input['exam'],
                                   'course_presence' => $input['course_presence'],
                                   'course_homework' => $input['course_homework'],
                                   'course_activity' => $input['course_activity'],
                                   'test' => $input['test'],
                                   'seminar_presence' => $input['seminar_presence'],
                                   'seminar_homework' => $input['seminar_homework'],
                                   'seminar_activity' => $input['seminar_activity'],
                                   'colloquy' => $input['colloquy'],
                                   'lab_presence' => $input['lab_presence'],
                                   'lab_homework' => $input['lab_homework'],
                                   'lab_activity' => $input['lab_activity']]);
       
        return view('professorHomePage');
        
    }

    //get marking method and selected student's mark in order to populate the table in add grade page
    //marking method is used to set max value to the filed where the professor enters the grade
    //in order to not enter a bigger grade than the one established in marking method
    //student's marks are used for the teacher to see the grades he already gave to that student
    public function getStudentMark(Request $request) {
        $mark = Marks::where([['student_id', $request->student_id], ['course_id', $request->course_id]])->first();
        $professor = Professor::where('id', Auth::user()->profesor_id)->first();
        $markingMethod = $professor->courses()->where('courses.id', $request->course_id)->first()->pivot;

        return response()->json(['mark' => $mark, 'markingMethod' => $markingMethod]);
    }

   
}
