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
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <h1 id = 'title'>RESET PASSWORD</h1>
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="wrap-input100 validate-input m-b-16">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="input100 form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="wrap-input100 validate-input m-b-16">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                            <input id="password" type="password" class="input100 form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="wrap-input100 validate-input m-b-16">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                            <input id="password" type="password" class="input100 form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password_confirmation" required>
                        </div>
                        <br>
                        <br>
                        <button type = "submit" class="login100-form-btn">{{ __('Reset Password') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
