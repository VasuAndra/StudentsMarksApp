<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use App\Student;
use App\Professor;
use App\Course;
use App\Course_Professor;
use Illuminate\Validation\Rule;


class RegisterController extends Controller
{
    //register a student
    public function studentRegister(Request $request) {
        //get insert data
        $data = $request->input();
        
        //validate data
        $validator = $request->validate([
            'lastName' => ['required', 'string', 'max:255'],
            'firstName' => ['required', 'string', 'max:255'],
            'fatherName' => ['required', 'string', 'max:255'],
            'domain' => ['required', Rule::in(['Informatica', 'Matematica', 'Calculatoare si tehnologia informatiei'])],
            'specialization' => ['required', Rule::in(['Matematica', 'Matematica studii avansate', 'Matematici aplicate', 'Informatica', 'Matematica-informatica', 'Matematica-mecanica', 'Calculatoare si tehnologia informatiei'])],
            'address' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'CNP' => ['required', 'string', 'size:13', 'unique:students'],
            'year' => ['required'],
            'group' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8']]);
        
        
           //insert into students table
            $student = Student::create([
                'firstName' => $data['firstName'],
                'lastName' => $data['lastName'],
                'fatherName' => $data['fatherName'],
                'country' => $data['country'],
                'city' => $data['city'],
                'domain' => $data['domain'],
                'specialization' => $data['specialization'],
                'group' => $data['group'],
                'CNP' => $data['CNP'],
                'address' => $data['address'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'year' => $data['year']
                
            ]);
            //insert into users table
            User::create([
                'student_id' => $student->id,
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                "first_name" => $data['firstName'],
                'last_name' => $data['lastName']
            ]);
        
        return view('adminHomePage');
    }

    //register a professor
    public function professorRegister(Request $request) {
        //get insert data
        $data = $request->input();
        
        //validate data
        $validator = $request->validate([
            'lastName' => ['required', 'string', 'max:255'],
            'firstName' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'CNP' => ['required', 'string', 'size:13', 'unique:students'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'courses' => ['required'],
            'password' => ['required', 'string', 'min:8']]);

        //insert into professors table
        $professor = Professor::create([
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'CNP' => $data['CNP'],
            'address' => $data['address'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        foreach($data['courses'] as $course) {
            $courseId = Course::where('name', $course)->first();
            $courseProfessor = new Course_Professor;
            $courseProfessor->professor_id = $professor->id;
            $courseProfessor->course_id = $courseId['id'];
            $courseProfessor->save();
        }

        //insert into users table
        User::create([
            'profesor_id' => $professor->id,
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            "first_name" => $data['firstName'],
            'last_name' => $data['lastName']
        ]);
       
       
        return view('adminHomePage');
    }
}
