@extends('shared.layout')

@section('content')
  
			<section id="main" class="wrapper">
				<div class="inner">
					<header class="align-center">
						<h1>Alege o materie</h1>
					</header>
                    
                    <div class="select-wrapper">
                        <select name="courses_select" data-route={{ route('students.grades') }}>
                            <option disabled selected>Alege o materie</option>
                            @foreach($courses as $course)
                                <option value = {{$course->id}}>{{$course->name}}</option>
                            @endforeach
                        </select>
				    </div>
                    <br>
             
                    <header class="align-center">
						<h1>Note si puncte</h1>
					</header>
                    
									<div class="table-wrapper">
										<table id="marks">
                                            <thead>
                                                <th></th>
                                                <th>Curs</th>
                                                <th>Seminar</th>
                                                <th>Laborator</th>
                                            </thead>
                                            <tbody>
                                        <tr id = "exam">
                                            <td>Examinare</td>
                                            <td id = "course_exam"></td>
                                            <td id = "seminar_exam"></td>
                                            <td id = "lab_exam"></td>
                                        </tr>
                                        <tr id = "homework">
                                            <td>Teme</td>
                                            <td id = "course_homework"></td>
                                            <td id = "seminar_homework"></td>
                                            <td id = "lab_homework"></td>
                                        </tr>
                                        <tr id = "activity">
                                            <td>Activitate</td>
                                            <td id = "course_activity"></td>
                                            <td id = "seminar_activity"></td>
                                            <td id = "lab_activity"></td>
                                        </tr>
                                        <tr id = "presence">
                                            <td>Prezenta</td>
                                            <td id = "course_presence"></td>
                                            <td id = "seminar_presence"></td>
                                            <td id = "lab_presence"></td>
                                        </tr>
                                    </tbody>
                                                                            
                                        </table>
									</div>
                    
                    <br/>
                    
                    
                    <header class="align-center">
						<h1>Metoda de notare</h1>
					</header>
                    
									<div class="table-wrapper">
										<table>
                                            <thead>
                                                <th></th>
                                                <th>Curs</th>
                                                <th>Seminar</th>
                                                <th>Laborator</th>
                                            </thead>
                                            <tbody>
                                        <tr>
                                            <td>Examen</td>
                                            <td id = "course_exam_notation"></td>
                                            <td id = "seminar_exam_notation"></td>
                                            <td id = "lab_exam_notation"></td>
                                        </tr>
                                        <tr>
                                            <td>Teme</td>
                                            <td id = "course_homework_notation"></td>
                                            <td id = "seminar_homework_notation"></td>
                                            <td id = "lab_homework_notation"></td>
                                        </tr>
                                        <tr>
                                            <td>Activitate</td>
                                            <td id = "course_activity_notation"></td>
                                            <td id = "seminar_activity_notation"></td>
                                            <td id = "lab_activity_notation"></td>
                                        </tr>
                                        <tr>
                                            <td>Prezenta</td>
                                            <td id = "course_presence_notation"></td>
                                            <td id = "seminar_presence_notation"></td>
                                            <td id = "lab_presence_notation"></td>
                                        </tr>
                                    </tbody>
                                        
                                        
                                        
                                        
                                        </table>
                    <br/>
                    <br/>
					<div class="image fit">
						<img src="assets/images/univ2.jpg" alt="" />
					</div>
					<p>Universitatea din București este o universitate de stat din București și una dintre cele mai prestigioase instituții de învățământ superior din România. Fondată în 1864, Universitatea din București este a doua universitate modernă a României, după Universitatea din Iași. Mai mulți absolvenți ai Universității s-au afirmat ca personalități de seamă: profesori și cercetători la alte universități din lume, membri ai Academiei Române și ai unor academii din alte țări, scriitori, politicieni (parlamentari, miniștri, prim-miniștri, președinți), diplomați etc. </p>
                    <p>O parte din facultățile Universității sunt amplasate în Palatul Universității din Piața Universității.
                    Universitatea din București oferă numeroase programe de studii, la toate nivelurile și formele de pregătire universitară: 22 programe de scurtă durată, peste 75 de programe de lungă durată, 12 programe în forma de învățământ deschis și la distanță, peste 120 programe de masterat, peste 50 programe de doctorat, programe de înalte studii postuniversitare, programe de reconversie profesională și de perfecționare.</p>

                    <p>În 2011, Universitatea din București a fost clasificată în prima categorie din România, cea a universităților de cercetare avansată și educație.</p>
					
				</div>
            </section>
            
@endsection

@push('js')
<script src="assets/js/select.js"></script>
@endpush