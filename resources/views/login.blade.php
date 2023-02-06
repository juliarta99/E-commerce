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
                              <h1 class="text-xl font-semibold text-center xl:text-3xl lg:text-2xl">Login</h1>
                              @if (session()->has('succes'))
                                    <div class="w-full text-sm text-center text-green-500 md:text-md">{{ session('succes') }}</div>
                              @endif
                              @if ($errors->any())
                                    <div class="w-full text-sm text-center text-red-500 md:text-md">{{ $errors->first() }}</div>
                              @endif
                              <form action="/login" method="post" class="flex flex-col w-full" autocomplete="off">
                                    @csrf
                                    <label class="mt-2" for="email">Email</label>
                                    <input type="email" name="email" id="email" class="@error('email') border-2 border-red-500 @enderror w-full px-3 py-2 bg-white rounded-md peer" value="{{ old('email') }}" placeholder="email">
                                    <p class="hidden text-red-500 peer-invalid:block">
                                          Please provide a valid email address.
                                    </p>
                                          @error('email')
                                              <div class="w-full text-sm text-red-500 md:text-md">{{ $message }}</div>
                                          @enderror
                                    <label class="mt-2" for="password">Password</label>
                                    <input type="password" name="password" id="password" class="@error('password') border-2 border-red-500 @enderror w-full px-3 py-2 bg-white rounded-md" placeholder="password">
                                          @error('password')
                                                <div class="w-full text-sm text-red-500 md:text-md">{{ $message }}</div>
                                          @enderror
                                    
                                    {{-- hidden image --}}
                                    <input type="hidden" name="image" id="image" value="img/profile_default.png">
                                    <button type="submit" class="w-1/2 px-1 py-2 mt-3 font-semibold bg-blue-500 rounded-md xl:w-1/4 lg:w-1/3">Login</button>
                              </form>
                              <a href="/register" class="mt-1 text-sm lg:text-md">Belum punya akun?</a>
                        </div>
                  </div>
            </div>
      </div>
</body>
</html>