@extends('partials.appex')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">Reset Password</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.request') }}">
                        {{csrf_field()}}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group">
                            <label for="email" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 control-label">E-Mail Address &nbsp;<i class="fa fa-envelope"></i></label>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email or old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-form-label">Password</label>

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
                            <label for="password-confirm" class="col-lg-3 col-md-4 col-sm-12 col-xs-12 col-form-label">Confirm Password</label>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <input id="password-confirm" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <button type="submit" class="btn btn-block btn-green">
                                        Reset Password
                                    </button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
