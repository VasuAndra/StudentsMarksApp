@extends('shared.layout')

@section('content')
    <!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">
					<header class="align-center">
						<h1>Creeaza profesor nou</h1>
						<p>Adauga datele necesare.</p>
					</header>
                    
                    <div class="signup-form">
                    <form method="POST" action = "{{ route('register.professorRegister') }}"class="register-form" id="register-form">
                        @csrf
                        <div class="form-row">
                            <div class="form-group">
                                <label for="lastName">Nume :</label>
                                <input type="text" name="lastName" id="lastName" required/>
                                @if ($errors->has('lastName'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong class = "error">{{ $errors->first('lastName') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="firstName">Prenume :</label>
                                <input type="text" name="firstName" id="firstName" required/>
                                @if ($errors->has('firstName'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong class = "error">{{ $errors->first('firstName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address">Adresa:</label>
                            <input type="text" name="address" id="address" required/>
                            @if ($errors->has('address'))
                                <span class="invalid-feedback" role="alert">
                                    <strong class = "error">{{ $errors->first('address') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="country">Tara :</label>
                                <input type="text" name="country" id="country" required/>
                                @if ($errors->has('country'))
                                <span class="invalid-feedback" role="alert">
                                    <strong class = "error">{{ $errors->first('country') }}</strong>
                                </span>
                            @endif
                            </div>
                            <div class="form-group">
                                <label for="city">Oras :</label>
                                <input type="text" name="city" id="city" required/>
                                @if ($errors->has('city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong class = "error">{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="CNP">CNP :</label>
                            <input type="text" name="CNP" id="CNP">
                            @if ($errors->has('CNP'))
                                <span class="invalid-feedback" role="alert">
                                    <strong class = "error">The CNP is invalid</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="courses">Materia :</label>
                            <select name = "courses[]" multiple >
                                <option value = "Programare Procedurala">Programare Procedurala</option>
                                <option value = "Algebra">Algebra</option>
                                <option value = "Geometrie Computationala">Geometrie Computationala</option>
                            </select>
                            @if ($errors->has('courses'))
                                <span class="invalid-feedback" role="alert">
                                    <strong class = "error">{{ $errors->first('year') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" />
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong class = "error">{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class = "form-group">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" autocomplete="new-password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong class = "error">{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br>
                        <button type = "submit">Gata</button>
                </div>					
				</div>
            </section>
            
@endsection