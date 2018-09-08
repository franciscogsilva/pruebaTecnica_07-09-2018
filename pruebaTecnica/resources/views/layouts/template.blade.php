<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('/img/system32/icon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>{{ env('APP_NAME') }}</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href="{{ asset('plugins/materialize/css/materialize.min.css') }}" rel="stylesheet"/>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
    <meta name="google" value="notranslate">
</head>
<body style="background-color: #000; margin: 60px auto;">
    <main class="main_admin">            
        @yield('content')
    </main>
</body>
    <!--   Core JS Files   -->
    <script src="{{ asset('plugins/materialize/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('plugins/materialize/js/materialize.min.js') }}"></script>
</html>
