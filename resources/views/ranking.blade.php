@extends('shared.layout')

@section('content')
    <!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">
					<header class="align-center">
						<h1>Clasament</h1>
						<p>Situatia ta in ceea ce priveste clasamentul.</p>
						
					</header>
				
					<div class = 'table-wrapper'>
						<table>
							<thead>
								<tr>
									<th>Criteriu</th>
									<th>Pozitia ta</th>
								</tr>
							</thead>
							<tbody>
								
								<tr>
									<td>Pozitia ta: </td>
									<td>{{$studentInfo['position']}}</td>
								
								</tr>
								<tr>
									<td>Media pe semestrul curent: </td>
									<td>{{$studentInfo['current_semester_mark']}}</td>
								</tr>
								<tr>
									<td>Bursa: </td>
									<td>{{$studentInfo['scholarship'] == 1 ? "Da" : "Nu"}}</td>
								</tr>
								<tr>
									<td>Ultima medie la bursa: </td>
									<td>{{$studentInfo['lastSchGrade']}}</td>
								</tr>
							
								<tr>
									<td>Prima medie la taxa: </td>
									<td>{{$studentInfo['firstTaxGrade']}}</td>
								</tr>
								
							</tbody>
						</table>
					</div>
			</div>
            </section>

@endsection