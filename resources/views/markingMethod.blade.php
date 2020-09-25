@extends('shared.layout')

@section('content')
    <!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">
					<header class="align-center">
						<h1>Metoda de notare</h1>
					</header>
                  
                     <form method = 'POST' action = '{{route('professors.updateMarking')}}'>
                         @csrf
                         <select name = 'course_id', data-route={{ route('professors.selectMarkingMethod') }}>
                             <option disabled selected>Alegeti o materie</option>
                            @foreach ($courses as $course)
                                <option value = '{{$course->id}}'>{{$course->name}}</option>
                            @endforeach
                         </select>
                         <br>
                         <br>
                         <div style="display: none;" class="table-wrapper">
                             <table>
                                 <thead>
                                     <th></th>
                                     <th>Curs</th>
                                     <th>Seminar</th>
                                     <th>Laborator</th>
                                 </thead>
                                 <tbody>
                                     <tr data-name="exam">
                                         <td>Examinare</td>
                                         <td><input name = 'exam' type="number" min = '1' max = '10'></td>
                                         <td><input name = 'test' type="number" min = '1' max = '10'></td>
                                         <td><input name = 'colloquy' type="number" min = '1' max = '10'></td>
                                     </tr>
                                     <tr data-name="homework">
                                         <td>Teme</td>
                                         <td><input name = 'course_homework' type="number" min = '1' max = '10'></td>
                                         <td><input name = 'seminar_homework' type="number" min = '1' max = '10'></td>
                                         <td><input name = 'lab_homework' type="number" min = '1' max = '10'></td>
                                     </tr>
                                     <tr data-name="activity">
                                         <td>Activitate</td>
                                         <td><input name = 'course_activity' type="number" min = '1' max = '10'></td>
                                         <td><input name = 'seminar_activity' type="number" min = '1' max = '10'></td>
                                         <td><input name = 'lab_activity' type="number" min = '1' max = '10'></td>
                                     </tr>
                                     <tr data-name="presence">
                                         <td>Prezenta</td>
                                         <td><input name = 'course_presence' type="number" min = '1' max = '10' ></td>
                                         <td><input name = 'seminar_presence' type="number" min = '1' max = '10'></td>
                                         <td><input name = 'lab_presence' type="number" min = '1' max = '10'></td>
                                     </tr>
                                 </tbody>
                             </table>
                         </div>
                         <button style="display: none;" type = 'submit' class = 'button'>Gata</button>
                     </form>
                    
                    <br>
                    <br>
                    
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
<script src="assets/js/mark_method.js"></script>
@endpush