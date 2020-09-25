<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="/assets/css/main.css">
    </head>
    <body>
        <div class="limiter">
            <div class="cont">
                <div class="wrap-login100 p-t-50 p-b-90">
                        
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <h1 id = 'title'>CHANGE PASSWORD</h1>
                            <div class="card-body">
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                            </div>
                            <div class="wrap-input100 validate-input m-b-16">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                                <input id="email" type="email" class="input100 form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <br>
                            <br>
                            <button type = "submit" class="login100-form-btn">{{ __('Trimite link de resetare') }}</button>
                        </form>
                </div>
            </div>
        </div>
    </body>
</html>
