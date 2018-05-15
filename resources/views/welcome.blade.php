<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CituClinic</title>

        <!-- Fonts -->
        <link href="{{ asset('css/bootstrap-material-design.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
        <link href="{{ asset('css/fontawesome-all.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body class="home">
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="row text-left vh-align">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="jumbotron bg-inherit text-white ">
                                <div class="container">
                                    <h1  style="font-weight:800; font-size:100px">Clin<i class="fa fa-stethoscope"></i>c<sup><em class="font70"><span class="text-cyan">beta</span></em></sup>&nbsp;</h1>
                                    <p>Fast it Shall Heal</p>
                                    <p>
                                        <a href="{{ route('login') }}" class="btn btn-cyan">Login</a>
                                        <a href="{{ route('register') }}" class="btn btn-green">Register</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>

        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/bootstrap-material-design.min.js') }}"></script>
        {{--  <script src="{{ asset('js/material.min.js') }}"></script>  --}}
        <script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
        <script type="text/javascript" src="{{asset('js/jquery.dataTables.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/dataTables.bootstrap.min.js')}}"></script>
    </body>
</html>
