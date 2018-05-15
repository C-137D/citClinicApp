<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta Tags -->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <meta name="keywords" content="clinicapp">
        <link rel="author" href="humans.txt" />
        <!--Shortcut icon-->
        <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
        <title>@yield('title')</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
        <link href="{{ asset('css/bootstrap-material-design.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
        <link href="{{ asset('css/fontawesome-all.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{asset('css/dataTables.bootstrap4.min.css')}}"/>
        <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
    </head>
    <body>

        <div class="container">
            @include('inc.topNavBar')

         <div class="py-5">
         	@include('inc.messages')
             @yield('bodycontent')
         </div>

            {{--  <script src="{{ asset('js/app.js') }}"></script>  --}}
            <script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
            <script src="{{ asset('js/bootstrap-material-design.min.js') }}"></script>
            <script type="text/javascript" src="{{asset('js/jquery.dataTables.min.js')}}"></script>
            <script type="text/javascript" src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>
            <script type="text/javascript" src="{{asset('js/jquery-ui.min.js')}}"></script>
            <script type="text/javascript" src="{{asset('js/select2.full.min.js')}}"></script>

            {{--  <script src="{{ asset('js/material.min.js') }}"></script>  --}}

            <script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
        </body>

</html>