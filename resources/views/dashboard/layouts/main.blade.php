<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
</head>
<body class="font-poppins bg-slate-700">
    <div class="flex h-screen w-full overflow-hidden">
        @include('dashboard.layouts.navbar')
        <div class="w-full overflow-y-auto overflow-x-hidden">
            @include('dashboard.layouts.header')
            <div class="container mx-auto py-2 min-h-screen">
                @yield('content')
            </div>
            @include('dashboard.layouts.footer')
        </div>
    </div>
</body>
<script src="{{ asset('js/script.js') }}"></script>
</html>
