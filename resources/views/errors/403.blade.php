<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page 403</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="w-full h-screen flex flex-col items-center justify-center">
        <img src="{{ asset('img/403.png') }}" class="w-64 h-64" alt="Error 403">
        <h1 class="text-base md:text-lg lg:text-xl xl:text-2xl">Error 403</h1>
        <p class="text-sm lg:text-base text-red-500">Akses anda ditolak</p>
        <p class="text-sm lg:text-base text-red-500">Jangan coba-coba ya</p>
    </div>
</body>
</html>
