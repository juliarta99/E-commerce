<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>{{ $title }}</title>
      @vite('resources/css/app.css')
      <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
</head>
<body class="font-poppins">
      <div class="flex items-center justify-center w-full h-screen">
            <div class="flex w-full items-center justify-center px-4">
                  <div class="hidden w-1/2 px-5 lg:block">
                        <img src="{{ asset('img/ilustrasi.png') }}" alt="Ini gambarnya" class="">
                  </div>
                  <div class="w-full lg:w-1/2">
                        <div class="w-5/6 px-4 py-6 mx-auto lg:w-3/4">
                              <h1 class="text-xl uppercase font-semibold text-center xl:text-3xl lg:text-2xl">Login</h1>
                              @if (session()->has('success'))
                                    <div class="w-full text-sm text-center text-green-500 md:text-base">{{ session('success') }}</div>
                              @endif
                              @if ($errors->any())
                                    <div class="w-full text-sm text-center text-red-500 md:text-base">{{ $errors->first() }}</div>
                              @endif
                              <form action={{ route('dashboard.authenticate') }} method="post" class="flex flex-col w-full" autocomplete="off">
                                    @csrf
                                    <label class="mt-2" for="username">Username</label>
                                    <input type="text" name="username" id="username" class="bg-gray-200 @error('username') border-2 border-red-500 @enderror w-full px-3 py-2 rounded-md" value="{{ old('username') }}" placeholder="username">
                                          @error('username')
                                              <div class="w-full text-sm text-red-500 md:text-base">{{ $message }}</div>
                                          @enderror
                                    <label class="mt-2" for="password">Password</label>
                                    <input type="password" name="password" id="password" class="bg-gray-200 @error('password') border-2 border-red-500 @enderror w-full px-3 py-2 rounded-md" placeholder="password">
                                          @error('password')
                                                <div class="w-full text-sm text-red-500 md:text-base">{{ $message }}</div>
                                          @enderror
                                    <div class="w-full mx-auto items-center justify-center text-center flex flex-col">
                                          <button type="submit" class="w-1/2 px-1 py-2 mt-3 font-semibold bg-blue-500 rounded-md xl:w-1/4 lg:w-1/3">Login</button>
                                    </div>
                              </form>
                        </div>
                  </div>
            </div>
      </div>
</body>
</html>