<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page 404</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="w-full h-screen flex flex-col items-center justify-center">
        <img src="{{ asset('img/404.png') }}" class="h-64 w-64" alt="Error 404">
        <h1 class="text-md md:text-lg lg:text-xl xl:text-2xl">Error 404</h1>
        <p class="text-sm lg:text-md text-red-500">Halaman tidak ditemukan</p>
    </div>
</body>
</html>
