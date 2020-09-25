@extends('shared.layout')

@section('content')
    <!-- One -->
			<section id="one" class="wrapper">
				<div class="inner flex flex-3">
					<div class="flex-item left">
						<div>
							<a href='{{route("admin.addStudent")}}'><h3>Adaugare student</h3></a>
                            <p>Creeaza un student nou.</p>
						</div>
                        <div>
							<a href='{{route("admin.viewStudents")}}'><h3>Vizualizeaza studenti</h3></a>
                            <p>Sterge sau vizualizeaza studenti.</p>
						</div>
                        
					</div>
					<div class="flex-item image fit round">
						<img src="assets/images/univ1.jpg" alt="" />
					</div>
					<div class="flex-item right">
						<div>
							<a href='{{route("admin.addProfessor")}}'><h3>Adaugare profesor</h3></a>
                            <p>Creeaza un profesor nou.</p>
						</div>
                        <div>
							<a href='{{route("admin.viewProfessors")}}'><h3>Vizualizeaza profesori</h3></a>
                            <p>Sterge sau vizualizeaza profesori.</p>
						</div>
					</div>
				</div>
            </section>

@endsection