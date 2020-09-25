@extends('shared.layout')

@section('content')
<section id="banner1">
		<div class="content">
			<h1>Bine ati venit!</h1>
			<p>Acum este mult mai usor sa tineti evidenta notelor si sa prezentati studentilor punctele obtinute.</p>			<ul class="actions">
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
							<a href="{{route('professors.chooseGroup')}}"><h3>Note si puncte</h3></a>
							<p>Adaugati puncte pentru o anumita grupa.</p>
						</div>
						<div>
							<a href="{{route('professors.markingMethod')}}"><h3>Metoda de notare</h3></a>
							<p>La inceput de semestru, seteaza metoda pe care o veti folosi pentru a puncta activitatea studentilor.</p>
						</div>
					</div>
					<div class="flex-item image fit round">
						<img src="assets/images/univ1.jpg" alt="" />
					</div>
					<div class="flex-item right">
						<div>
							<a href="http://moodle.fmi.unibuc.ro/"><h3>Moodle</h3></a>
							<p>Aici puteti incarca cursurile sau orice materiale necesare studentilor.</p>
						</div>
						<div>
							<a href="http://fmi.unibuc.ro/ro/orar/2018_2019/semestrul_II/"><h3>Orar</h3></a>
							<p>Aflati orarul studentilor, dar si pe cel al profesorilor.</p>
						</div>
					</div>
				</div>
            </section>
            
@endsection