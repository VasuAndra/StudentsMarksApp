@extends('shared.layout')

@section('content')
    	<!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">
					<header class="align-center">
						<h1>Note si puncte</h1>
						<p>Selectati grupa dorita pentru a adauga note si puncte.</p>
					</header>
                                       
                    <div class="12u$">
				        <div class="select-wrapper">
                <form method = "POST" action = "{{route('professors.chooseStudent')}}">
                    @csrf
                    <select name="group">
                        <option disabled selected>Alege o grupa</option>
                        @foreach ($groups as $group)
                            <option value = {{$group}}>Grupa {{$group}}</option>
                        @endforeach
                    </select>
                    <br>
                    <button type = "submit" class = "button">Continuati</button>
                </form>
				        </div>
				    </div>
                    <br>
                    <br>
                    <ul class="actions" >
                        </li>
                        
					</ul>
                    
                
                    
					
				</div>
            </section>
            
@endsection