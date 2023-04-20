<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <title>Faboce S.R.L.</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- ******************************************************************************************* -->
    <!-- Icon -->
    <link rel="icon" type="image/png" href="icon/favicon.png">
    <!-- ******************************************************************************************* -->

    <!-- ******************************************************************************************* -->
    <!-- Styles -->
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
    <!-- ******************************************************************************************* -->

</head>

<body>
    @yield('content')
</body>

</html>
