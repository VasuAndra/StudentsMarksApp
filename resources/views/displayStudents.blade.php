@extends('shared.layout')

@section('content')
    <!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">
					<header class="align-center">
						<h1>Vizualizare studenti</h1>
					</header>
                    
                    <br>
                    <br>
                    
                    <div class="table-wrapper">
                        <form method = "POST" action = "{{route('admin.deleteStudents')}}">
                            @csrf
                            <table>
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Nume</th>
                                        <th>Prenume</th>
                                        <th>CNP</th>
                                        <th>Grupa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                    <tr>
                                        <td>
                                            <div>
                                                <input type="radio" name="student" id="{{$student->id}}" value = {{$student->id}}>
                                                <label for="{{$student->id}}"></label>  
                                            </div>
                                        </td>
                                        <td>{{$student->lastName}}</td>
                                        <td>{{$student->firstName}}</td>
                                        <td>{{$student->CNP}}</td>
                                        <td>{{$student->group}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <br>
                            <button type = "submit" class = "button">Sterge</button>
                        </form>
						</div>
                    
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