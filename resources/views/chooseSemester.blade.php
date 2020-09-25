/@extends('shared.layout')

@section('content')
    <!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">
					<header class="align-center">
						<h1>Note si puncte</h1>
						<p>Selecteaza semestrul dorit pentru a vedea situatia notelor si a punctelor.</p>
					</header>
                                       
                    <div class="12u$">
				        <div class="select-wrapper">
							<form method = 'get' action = "{{ route('courses.index') }}">
								<select name="category" >
									<option disabled selected>Alege un semestru</option>
									@for($i = 1; $i < $year; $i++)
										@for ($s = 1; $s <= 2; $s++)
											<option value = {{$i . '_' . $s}}>An {{$i}} Semestrul {{$s}}</option>
										@endfor	
									@endfor
									<option value = {{ $i . "_" . "1"}}>An {{$i}} Semestrul 1</option>
									@if ($semester == 2)
										<option value = {{ $i . "_" . "2" }}>An {{$i}} Semestrul 2</option>
									@endif								
									</select>
									<br>
								<button type = 'submit' class="button" value="Sa incepem">Continuare</button>
							</form>
				        </div>
				    </div>
                    <br>
				</div>
			</section>

@endsection