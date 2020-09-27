<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    @yield('title')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">

    <link href="{{asset('/')}}main.css" rel="stylesheet">
    <!-- Jquery  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script defer src="https://unpkg.com/ziggy-js@0.9.x/dist/js/route.min.js"></script>
    @yield('linkhead')
    <style>
    body {background: linear-gradient(180deg, #12C3CE 0%, #D7E8E9 100% ) no-repeat center  fixed;}
    .card{
        box-shadow: 2px 2px 10px rgba(48, 10, 64, 0.5);
        margin-bottom: 20px;
    }
    .card-header { background: rgba(26, 166, 65, 0.47);}
    </style>
</head>

<body>
@yield('content')
    <script type="text/javascript" src="{{asset('assets/scripts/main.js')}}"></script>
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
</body>
@yield('js')
@yield('chart')
</html>
