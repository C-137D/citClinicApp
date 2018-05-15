@extends('partials.appex')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">Login</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label for="email" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 control-label">E-Mail Address &nbsp;<i class="fa fa-envelope"></i></label>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 control-label">Password&nbsp;<i class="fa fa-key"></i></label>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="checkbox">
                                        <label class="col-md-12 control-label">
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                    <div class="col-lg-12 col-md-12 col-ms-12 col-xs-12">
                                        <button type="submit" class="btn btn-block btn-cyan" style="">
                                            Login
                                        </button>
                                    </div>
                            </div>
                            <div class="form-group">
                                    <div class="col-lg-12 col-md-12 col-ms-12 col-xs-12">
                                        <a href="{{ route('password.request') }}" class="btn btn-block btn-red">Forgot Password?</a>
                                    </div>
                                </div>
                        <div class="form-group">
                                <div class="col-lg-12 col-md-12 col-ms-12 col-xs-12">
                                    <a href="{{ route('register') }}" class="btn btn-block btn-orange">Register</a>
                                </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
