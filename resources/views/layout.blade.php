<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('fontend/main/fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('fontend/main/css/style.css') }}">
</head>
<body>
    <div class="contrainer">
        @yield('content')
    </div>
    <!-- JS -->
    <script src="{{ asset('fontend/main/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('fontend/main/js/main.js') }}"></script>
</body>
</html>
