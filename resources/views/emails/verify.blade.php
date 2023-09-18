<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="w-full p-4 max-w-md flex flex-col items-center justify-center mx-auto">
        @if (session()->has('succes'))
            <div class="w-auto p-2 px-2 mt-8 text-sm font-semibold text-center bg-green-500 rounded-t-md lg:mt-4 lg:text-base mb-2">{{ session('succes') }}</div>
        @endif
        @if (session()->has('error'))
            <div class="w-auto p-2 px-2 mt-8 text-sm font-semibold text-center bg-red-500 rounded-t-md lg:mt-4 lg:text-base mb-2">{{ session('error') }}</div>
        @endif
        <h1 class="text-base lg:text-lg xl:text-xl font-semibold uppercase mb-1">Verification Email</h1>
        <form action="{{ route('verification.send') }}" method="post">
            @csrf
            <button type="submit" class="bg-green-500 px-2 py-1 rounded-md text-sm lg:text-base">Kirim Email</button>
        </form>
    </div>
</body>
</html>