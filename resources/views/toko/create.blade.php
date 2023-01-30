@extends('layouts.main')
@section('content')
<div class="pb-10 px-9 pt-36 lg:pt-24">
      <div class="w-full">
            <form action="/toko/create" method="post" enctype="multipart/form-data" class="flex flex-col max-w-md mx-auto mt-5">
                  @csrf
                  <h1 class="font-semibold text-center uppercase text-md lg:text-lg">Buat Toko</h1>
                  @if (session()->has('succesBuatToko'))
                  <div id="sessionSucces" class="w-auto mx-auto my-1 overflow-hidden rounded-md">
                        <div class="px-4 py-2 bg-green-500 ">{{ session('succesBuatToko') }}</div>
                        <div id="timeSessionSucces" class="h-1 bg-black"></div>
                  </div>
                  @endif
                  <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                  <label class="mt-2 text-sm text-black lg:text-md" for="name">Name Toko</label>
                  <input class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-md @error('name') border-2 border-red-500 @enderror" type="text" name="name" id="name" value="{{ old('name', Auth::user()->name) }}">
                  @error('name')
                        <div class="w-full text-sm text-red-500 lg:text-md">{{ $message }}</div>
                  @enderror
            
                  <label class="mt-2 text-sm text-black lg:text-md" for="image">Profile Image</label>
                  <input class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-md @error('image') border-2 border-red-500 @enderror" type="file" name="image" id="image" value="{{ old('image') }}">
                  @error('image')
                        <div class="w-full text-sm text-red-500 lg:text-md">{{ $message }}</div>
                  @enderror
            
            
                  <label class="mt-2 text-sm text-black lg:text-md" for="alamat">Alamat</label>
                  <input class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-md @error('alamat') border-2 border-red-500 @enderror" type="alamat" name="alamat" id="alamat" value="{{ old('alamat') }}">
                  @error('alamat')
                        <div class="w-full text-sm text-red-500 lg:text-md">{{ $message }}</div>
                  @enderror
            
                  <label class="mt-2 text-sm text-black lg:text-md" for="tentang">Tentang</label>
                  <textarea name="tentang" id="tentang" cols="30" rows="5" class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-md @error('tentang') border-2 border-red-500 @enderror" value="{{ old('tentang') }}">{{ old('tentang') }}</textarea>
                  @error('tentang')
                        <div class="w-full text-sm text-red-500 lg:text-md">{{ $message }}</div>
                  @enderror
            
                  <button class="w-auto p-2 px-4 mx-auto mt-3 text-xs text-white bg-blue-500 rounded-md sm:text-sm">Simpan</button>
            </form>
      </div>
</div>
@endsection