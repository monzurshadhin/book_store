<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('bootstrap-assets')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('frontend-assets')}}/assets/css/style.css">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body>


@include('frontEnd.include.header')
@yield('content')
@include('frontEnd.include.footer')
@include('sweetalert::alert')

<script src="{{asset('bootstrap-assets')}}/js/bootstrap.bundle.min.js"></script>
</body>
</html>
