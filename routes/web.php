<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route for login page
Route::get('/', function () {
    return view('auth.login');
});

//Route for students home page
Route::get('/studentHomePage', [
    'as' => 'students.homepage',
    'uses' => 'StudentController@displayStudentHomePage'
]);

//Route for choosing the semester in order to see the grades for that semester
Route::get('/semestru', [
    'as' => 'students.chooseSem',
    'uses' => 'StudentController@chooseSemester'
]);

//Route for displaying ranking information
Route::get('/ranking', [
    'as' => 'students.ranking',
    'uses' => 'StudentController@displayRanking'
]);

//Route for displaying grades
Route::get('/grades', [
    'as' => 'students.grades',
    'uses' => 'StudentController@displayGrades'
]); 

//Route for courses
Route::get('/courses', [
    'as' => 'courses.index',
    'uses' => 'StudentController@courses'
]);

//Route for professor home page
Route::get('/professorHomePage', [
    'as' => 'professors.homepage',
    'uses' => 'ProfessorController@displayProfessorHomepage'
]);

//Route for displaying marking method page
Route::get('/markingMethod', [
    'as' => 'professors.markingMethod',
    'uses' => 'ProfessorController@markingMethod'
]);

//Route for selecting the course in order to add a marking method
Route::get('/professor/selectMarkingMethod', [
    'as' => 'professors.selectMarkingMethod',
    'uses' => 'ProfessorController@selectMarkingMethod'
]);

//Route for getting marking method and student's grade
Route::get('/professor/getStudentMark', [
    'as' => 'professors.getStudentMark',
    'uses' => 'ProfessorController@getStudentMark'
]);

//Route used for the professor to choose the group
Route::get('/chooseGroup', [
    'as' => 'professors.chooseGroup',
    'uses' => 'ProfessorController@chooseGroup'
]);

//Route used for the page where the professor chooses a student
Route::post('/chooseStudent', [
    'as' => 'professors.chooseStudent',
    'uses' => 'ProfessorController@chooseStudent'
]);

//Route for redirecting to the add grade page
Route::post('/addGrade', [
    'as' => 'professors.redirAddGrade',
    'uses' => 'ProfessorController@redirectToAddGrade'
]);

//Routes for auth

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Route for inserting marking method in DB
Route::post('/updateMarking', [
    'as' => 'professors.updateMarking',
    'uses' => 'ProfessorController@updateMarking'
]);

//Route for adding a grade in DB
Route::post('/saveGrade', [
    'as' => 'professors.addGrade',
    'uses' => 'ProfessorController@addGrade'
]);

//Route for logut
Route::get('/logout', [
    'as' => 'users.logout',
    'uses' => 'UserController@logout'
]);

//Route for displaying students
Route::get('/viewStudents', [
    'as' => 'admin.viewStudents',
    'uses' => 'AdminController@viewStudents'
]);

//Route for deleting a student
Route::post('/deleteStudents', [
    'as' => 'admin.deleteStudents',
    'uses' => 'AdminController@deleteStudents'
]);

//Route for displaying professors
Route::get('/viewProfessors', [
    'as' => 'admin.viewProfessors',
    'uses' => 'AdminController@viewProfessors'
]);

//Route for deleting a professor
Route::post('/deleteProfessor', [
    'as' => 'admin.deleteProfessor',
    'uses' => 'AdminController@deleteProfessor'
]);

//Route for inserting a student in DB
Route::get('/addStudent', [
    'as' => 'admin.addStudent',
    'uses' => 'AdminController@addStudent'
]);

//Route for inserting a professor in DB
Route::get('/addProfessor', [
    'as' => 'admin.addProfessor',
    'uses' => 'AdminController@addProfessor'
]);

//Route for register a student
Route::post('/registerStudent', [
    'as' => 'register.studentRegister',
    'uses' => 'RegisterController@studentRegister'
]);

//Route for register a professor
Route::post('/registerProfessor', [
    'as' => 'register.professorRegister',
    'uses' => 'RegisterController@professorRegister'
]);