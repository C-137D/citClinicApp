@extends('partials.appex')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">Register</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label for="name" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 control-label">Name&nbsp;<i class="fa fa-user"></i></label>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <input placeholder="Michael" id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 control-label">E-Mail Address&nbsp;<i class="fa fa-envelope"></i></label>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <input placeholder="Michael@gmail.com" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

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
                                <input placeholder="Only Michael knows" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Confirm Password</label>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <button type="submit" class="btn btn-block btn-green">
                                        Register
                                    </button>
                                </div>
                            </div>
                            <div class="form-group">
                                    <div class="col-lg-12 col-md-12 col-ms-12 col-xs-12">
                                        <a href="{{ route('login') }}" class="btn btn-block btn-cyan">Login</a>
                                    </div>
                                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
