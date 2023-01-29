<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('karma/img/fav.png') }}">
    <meta name="author" content="CodePixar">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta charset="UTF-8">
    <title>Karma Shop</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('karma/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('karma/css/main.css') }}" />
</head>

<body>

    @yield('content')

</body>

</html>
