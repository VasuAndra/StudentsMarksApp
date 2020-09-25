@extends('shared.layout')

@section('content')
    <!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">
					<header class="align-center">
						<h1>Creeaza student nou</h1>
						<p>Adauga datele necesare.</p>
					</header>
                    
                    <div class="signup-form">
                    <form method="POST" action="{{ route('register.studentRegister') }}"class="register-form" id="register-form">
                        @csrf
                        <div class="form-row">
                            <div class="form-group">
                                <label for="lastName">Nume: </label>
                                <input id="lastName" type="text" class="form-control{{ $errors->has('lastName') ? ' is-invalid' : '' }}" name="lastName" value="{{ old('lastName') }}"  autocomplete="lastName" autofocus>
                                @if ($errors->has('lastName'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong class = "error">{{ $errors->first('lastName') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="firstName">Prenume :</label>
                                <input type="text" name="firstName" id="firstName"/>
                                @if ($errors->has('firstName'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong class = "error">{{ $errors->first('firstName') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="fatherName">Prenume tata :</label>
                                <input type="text" name="fatherName" id="fatherName"/>
                                @if ($errors->has('fatherName'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong class = "error">{{ $errors->first('fatherName') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="domain">Domeniu: </label>
                                <input type="text" name="domain" id="domain"/>
                                @if ($errors->has('domain'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong class = "error">{{ $errors->first('domain') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="specialization">Specializare: </label>
                                <input type="text" name="specialization" id="specialization"/>
                                @if ($errors->has('specialization'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong class = "error">{{ $errors->first('specialization') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label for="address">Adresa:</label>
                            <input type="text" name="address" id="address"/>
                            @if ($errors->has('address'))
                                <span class="invalid-feedback" role="alert">
                                    <strong class = "error">{{ $errors->first('address') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="country">Tara :</label>
                                <input type="text" name="country" id="country"/>
                                @if ($errors->has('country'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong class = "error">{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="city">Oras :</label>
                                <input type="text" name="city" id="city"/>
                                @if ($errors->has('city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong class = "error">{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="birth_date">CNP :</label>
                            <input type="text" name="CNP" id="CNP">
                            @if ($errors->has('CNP'))
                                <span class="invalid-feedback" role="alert">
                                    <strong class = "error">The CNP is invalid</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="year">An: </label>
                            <select name = "year">
                                <option value = "1">An 1</option>
                                <option value = "2">An 2</option>
                                <option value = "3">An 3</option>
                                <option value = "4">An 4</option>
                            </select>
                            @if ($errors->has('year'))
                                <span class="invalid-feedback" role="alert">
                                    <strong class = "error">{{ $errors->first('year') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="group">Grupa :</label>
                            <input type="number" name="group" id="group"/>
                            @if ($errors->has('group'))
                                <span class="invalid-feedback" role="alert">
                                    <strong class = "error">{{ $errors->first('group') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="email">Email: </label>
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" autocomplete="email">
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
                    </form>
                </div>					
				</div>
            </section>

@endsection
