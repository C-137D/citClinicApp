@extends('partials.appex')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">Reset Password</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label for="email" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 control-label">E-Mail Address &nbsp;<i class="fa fa-envelope"></i></label>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <button type="submit" class="btn btn-block btn-green">
                                        Send  Reset Link
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
