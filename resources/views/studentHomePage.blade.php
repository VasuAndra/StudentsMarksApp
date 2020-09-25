@extends('shared.layout')


@section('content')
<!-- Banner -->
<section id="banner">
	<div class="content">
		<h1>Bine ati venit!</h1>
		<p>Acum este mult mai usor sa fii la curent cu situatia ta scolara.<br />Platforma NoteOnline iti arata in timp real informatii despre note, burse, dar si altele.</p>
		<ul class="actions">
			<!--<li><a href="#one" class="button scrolly">Sa incepem</a></li>-->
			
			<li>
				<a href="#one" class="button scrolly" >Sa incepem</a>
		
			</li>
		</ul>
	</div>
</section>
<!-- One -->
<section id="one" class="wrapper">
	<div class="inner flex flex-3">
		<div class="flex-item left">
			<div>
				<a href="{{route('students.chooseSem')}}"><h3>Note si puncte</h3></a>
				<p>Vezi situatia notelor tale, pentru fiecare materie.</p>
			</div>
			<div>
				<a href="{{route('students.ranking')}}"><h3>Clasament</h3></a>
				<p>Afla pe ce loc esti in clasament. Poti vedea si alte detalii despre situatia ta scolara.</p>
			</div>
		</div>
		<div class="flex-item image fit round">
			<img src="assets/images/univ1.jpg" alt="" />
		</div>
		<div class="flex-item right">
			<div>
				<a href="http://moodle.fmi.unibuc.ro/"><h3>Moodle</h3></a>
				<p>Aici poti gasi cursurile de care ai nevoie. Majoritatea profesorilor incarca <br />materiale si teme pe moodle.</p>
			</div>
			<div>
				<a href="http://fmi.unibuc.ro/ro/orar/2018_2019/semestrul_II/"><h3>Orar</h3></a>
				<p>Afla ce ore ai, atat tu, cat si profesorii tai.</p>
			</div>
		</div>
	</div>
</section>

@endsection