<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="font-poppins">
      @include('layouts.navbar')
      @yield('content')
      @include('layouts.footer')
</body>
<script src="./assets/vendor/preline/dist/preline.js"></script>
<script src="{{ asset('js/script.js') }}"></script>
</html>