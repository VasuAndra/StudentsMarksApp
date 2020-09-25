@extends('shared.layout')

@section('content')
    <!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">
					<header class="align-center">
						<h1>Note si puncte</h1>
					</header>
                        <form method = 'POST' action = '{{route('professors.addGrade')}}'>
                            @csrf
                            <input type = "hidden" name = "student_id" value = {{$studentId}}>
                            <select name = 'course_id' data-route={{ route('professors.getStudentMark') }}>
                                <option value disabled selected>Alegeti o materie</option>
                                @foreach ($courses as $course)
                                    <option value = '{{$course->id}}'>{{$course->name}}</option>
                                @endforeach
                            </select>
                            <br>
                            <br>
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
                                            <td>Examinare</td>
                                            <td><input name = 'exam' type="number" min = '0' max = '10'></td>
                                            <td><input name = 'test' type="number" min = '0' max = '10'></td>
                                            <td><input name = 'colloquy' type="number" min = '0' max = '10'></td>
                                        </tr>
                                        <tr>
                                            <td>Teme</td>
                                            <td><input name = 'course_homework' type="number" min = '0' max = '10'></td>
                                            <td><input name = 'seminar_homework' type="number" min = '0' max = '10'></td>
                                            <td><input name = 'lab_homework' type="number" min = '0' max = '10'></td>
                                        </tr>
                                        <tr>
                                            <td>Activitate</td>
                                            <td><input name = 'course_activity' type="number" min = '0' max = '10'></td>
                                            <td><input name = 'seminar_activity' type="number" min = '0' max = '10'></td>
                                            <td><input name = 'lab_activity' type="number" min = '0' max = '10'></td>
                                        </tr>
                                        <tr>
                                            <td>Prezenta</td>
                                            <td><input name = 'course_presence' type="number" min = '0' max = '10' ></td>
                                            <td><input name = 'seminar_presence' type="number" min = '0' max = '10'></td>
                                            <td><input name = 'lab_presence' type="number" min = '0' max = '10'></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <button type = 'submit' class = 'button'>Gata</button>
                        </form>
        
                    <br/>
                    
                    
                   
                    
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

<script>
    $(document).ready(function(){ /* PREPARE THE SCRIPT */
    $("[name='course_id']").change(function() {
        jQuery.ajax({
            url: $(this).data('route'),
            method: 'get',
            data: {
               course_id: $(this).val(),
               student_id: $('input[name="student_id"]').val()
            },
            success: function(result) {
                $.each(result.mark, function (key, value) {
                    $('input[name="' + key + '"]').val(value);
                });

                $.each(result.markingMethod, function (key, value) {
                    $('input[name="' + key + '"]').attr('max', value);
                });
            }
          });      
    });
  });
</script>

@endpush