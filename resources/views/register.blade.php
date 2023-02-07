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
      <div class="flex w-full h-screen">
            <div class="flex  items-center justify-center w-full px-4">
                  <div class="hidden w-1/2 lg:block px-5">
                        <img src="{{ asset('img/ilustrasi_login.png') }}"  class alt="Ini gambarnya">
                  </div>
                  <div class="w-full lg:w-1/2">
                        <div class="w-5/6 px-4 py-6 mx-auto lg:w-3/4">
                              <h1 class="text-xl font-semibold text-center xl:text-3xl lg:text-2xl uppercase">Register</h1>
                              <form action="/register" method="post" class="flex flex-col w-full">
                                    @csrf
                                    <label class="mt-2" for="name">Nama</label>
                                    <input type="text" name="name" id="name" class="bg-gray-200 @error('name') border-2 border-red-500 @enderror w-full px-3 py-2 rounded-md" value="{{ old('name') }}" placeholder="name">
                                          @error('name')
                                              <div class="w-full text-sm text-red-500 md:text-md">{{ $message }}</div>
                                          @enderror
                                    <label class="mt-2" for="email">Email</label>
                                    <input type="email" name="email" id="email" class="bg-gray-200 @error('email') border-2 border-red-500 @enderror w-full px-3 py-2 rounded-md peer" value="{{ old('email') }}" placeholder="email">
                                    <p class="hidden text-red-500 peer-invalid:block">
                                          Please provide a valid email address.
                                    </p>
                                          @error('email')
                                              <div class="w-full text-sm text-red-500 md:text-md">{{ $message }}</div>
                                          @enderror
                                    <label class="mt-2" for="password">Password</label>
                                    <input type="password" name="password" id="password" class="bg-gray-200 @error('password') border-2 border-red-500 @enderror w-full px-3 py-2 rounded-md" placeholder="password">
                                          @error('password')
                                              <div class="w-full text-sm text-red-500 md:text-md">{{ $message }}</div>
                                          @enderror
                                    <label class="mt-2" for="konfirmasiPassword">Konfirmasi Password</label>
                                    <input type="password" name="konfirmasiPassword" id="konfirmasiPassword" class="bg-gray-200 @error('konfirmasiPassword') border-2 border-red-500 @enderror w-full px-3 py-2 rounded-md" placeholder="Konfirmasi Password">
                                          @error('konfirmasiPassword')
                                              <div class="w-full text-sm text-red-500 md:text-md">{{ $message }}</div>
                                          @enderror
                                    <div class="w-full mx-auto items-center justify-center text-center flex flex-col">
                                          <button type="submit" class="w-1/2 px-1 py-2 mt-3 font-semibold bg-blue-500 rounded-md xl:w-1/4 lg:w-1/3">Register</button>
                                          <a href="/login" class="mt-1 text-sm lg:text-md">Sudah punya akun?</a>
                                    </div>
                              </form>
                              <div class="w-full">
                                    <div class="w-full h-1 bg-gray-200 mt-2"></div>
                                    <p class="text-xs md:text-sm mt-2 text-center mb-2">Atau registrasi dengan</p>
                                    <div class="w-full flex items-center justify-center">
                                          <div class="rounded-full bg-gray-200 p-2">
                                                <img src="{{ asset('img/google-logo.png') }}" class="w-6 h-6" alt="">
                                          </div>
                                          <div class="rounded-full bg-gray-200 ml-2 p-2">
                                                <img src="{{ asset('img/Facebook_logo.png') }}" class="w-6 h-6" alt="">
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</body>
</html>