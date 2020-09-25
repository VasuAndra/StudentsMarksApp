@extends('shared.layout')

@section('content')
    <!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">
					<header class="align-center">
						<h1>Note si puncte</h1>
						<p>Selectati studentul caruia doriti sa ii adaugati note si puncte.</p>
					</header>
                    
                    <div class="table-wrapper">
						<form method = "POST" action = "{{route('professors.redirAddGrade')}}">
							@csrf
							<table>
								<thead>
									<tr>
										<th></th>
										<th>Nume</th>
										<th>Prenume</th>
										<th>Prenume tata</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($students as $student)
										<tr>
											<td>
												<div class="form-radio-item">		
													<input type="radio" name="stud" value = "{{$student->id}}" id = "{{"stud" . $student->id}}">
													<label for = {{"stud" . $student->id}}></label>												
												</div>
											</td>
											<td>{{$student->lastName}}</td>
											<td>{{$student->firstName}}</td>
											<td>{{$student->fatherName}}</td>
										</tr>
									@endforeach				
								</tbody>
							</table>
							<button type = "submit" class = "button">Continua</button>
						</form>
					</div>    					
				</div>
			</section>

@endsection