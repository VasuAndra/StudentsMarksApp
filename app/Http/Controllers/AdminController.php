<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\User;
use App\Professor;

class AdminController extends Controller
{   
    //get all students from DB and send them to the view
    public function viewStudents() {
        $students = Student::all();
        return view('displayStudents', ['students' => $students]);
    }

    //delete selected student and redirect to home page
    public function deleteStudents(Request $request) {
        User::where('student_id', $request->input('student'))->delete();
        return view('adminHomePage');
    }

    //get all professors from DB and send them to the view
    public function viewProfessors() {
        $professors = Professor::all();
        return view('displayProfessors', ['professors' => $professors]);
    }

    //delete selected professor and redirect to home page
    public function deleteProfessor(Request $request) {
        User::where('profesor_id', $request->input('professor'))->delete();
        return view('adminHomePage');
    }

    public function addStudent() {
        return view ('addStudent');
    }

    public function addProfessor() {
        return view ('addProfessor');
    }
}
