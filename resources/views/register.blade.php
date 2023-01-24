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
      <div class="flex items-center justify-center w-full h-screen">
            <div class="flex w-full px-4">
                  <div class="hidden w-1/2 lg:block">
                        <div class="w-full h-1 bg-red-200"></div>
                        <img src="" alt="Ini gambarnya">
                  </div>
                  <div class="w-full lg:w-1/2">
                        <div class="w-5/6 px-4 py-6 mx-auto rounded-md shadow-md lg:w-3/4 bg-slate-100">
                              <h1 class="text-xl font-semibold text-center xl:text-3xl lg:text-2xl">Sign Up</h1>
                              <form action="/register" method="post" class="flex flex-col w-full">
                                    @csrf
                                    <label class="mt-2" for="name">Name</label>
                                    <input type="text" name="name" id="name" class="@error('name') border-2 border-red-500 @enderror w-full px-3 py-2 bg-white rounded-md" value="{{ old('name') }}" placeholder="name">
                                          @error('name')
                                              <div class="w-full text-sm text-red-500 md:text-md">{{ $message }}</div>
                                          @enderror
                                    <label class="mt-2" for="username">Username</label>
                                    <input type="text" name="username" id="username" class="@error('username') border-2 border-red-500 @enderror w-full px-3 py-2 bg-white rounded-md" value="{{ old('username') }}" placeholder="username">
                                          @error('username')
                                              <div class="w-full text-sm text-red-500 md:text-md">{{ $message }}</div>
                                          @enderror
                                    <label class="mt-2" for="No. Handphone">No. Handphone</label>
                                    <input type="tel" name="no_hp" id="no_hp" class="@error('no_hp') border-2 border-red-500 @enderror w-full px-3 py-2 bg-white rounded-md" value="{{ old('no_hp') }}" placeholder="No. Handphone">
                                          @error('no_hp')
                                              <div class="w-full text-sm text-red-500 md:text-md">{{ $message }}</div>
                                          @enderror
                                    <label class="mt-2" for="email">Email</label>
                                    <input type="email" name="email" id="email" class="@error('email') border-2 border-red-500 @enderror w-full px-3 py-2 bg-white rounded-md peer" value="{{ old('email') }}" placeholder="email">
                                    <p class="hidden text-red-500 peer-invalid:block">
                                          Please provide a valid email address.
                                    </p>
                                          @error('email')
                                              <div class="w-full text-sm text-red-500 md:text-md">{{ $message }}</div>
                                          @enderror
                                    <label class="mt-2" for="password">Password</label>
                                    <input type="password" name="password" id="password" class="@error('email') border-2 border-red-500 @enderror w-full px-3 py-2 bg-white rounded-md" placeholder="password">
                                          @error('password')
                                              <div class="w-full text-sm text-red-500 md:text-md">{{ $message }}</div>
                                          @enderror
                                    <button type="submit" class="w-1/2 px-1 py-2 mt-3 font-semibold bg-blue-500 rounded-md xl:w-1/4 lg:w-1/3">Sign Up</button>
                              </form>
                              <a href="/login" class="mt-1 text-sm lg:text-md">Sudah punya akun?</a>
                        </div>
                  </div>
            </div>
      </div>
</body>
</html>