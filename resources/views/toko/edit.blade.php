@extends('layouts.main')
@section('content')
      <div class="pb-10 px-9 pt-36 lg:pt-24">
            <div class="w-full">
                  <form action="/toko/{{ $toko->slug }}" method="post" enctype="multipart/form-data" class="flex flex-col max-w-md mx-auto mt-5">
                        @csrf
                        @method('put')
                        <h1 class="font-semibold text-center uppercase text-base lg:text-lg">Edit Toko</h1>

                        <label class="mt-2 text-sm text-black lg:text-base" for="name">Name Toko</label>
                        <input required class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-base @error('name') border-2 border-red-500 @enderror" type="text" name="name" id="name" value="{{ old('name', $toko->name) }}">
                        @error('name')
                              <div class="w-full text-sm text-red-500 lg:text-base">{{ $message }}</div>
                        @enderror
                  
                        <label class="mt-2 text-sm text-black lg:text-base" for="image">Profile Image</label>
                        <input class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-base @error('image') border-2 border-red-500 @enderror" type="file" name="image" id="image" value="{{ old('image', $toko->image) }}">
                        @error('image')
                              <div class="w-full text-sm text-red-500 lg:text-base">{{ $message }}</div>
                        @enderror
                  
                        <label class="mt-2 text-sm text-black lg:text-base" for="id_city">Kota</label>
                        <select required class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-base @error('id_city') border-2 border-red-500 @enderror" id="id_city" name="id_city" id="id_city" value="{{ old('id_city', $toko->id_city) }}">
                        @foreach ($citys as $city)
                              <option value={{ $city->id }} @selected($city->id == $toko->id_city)>{{ $city->city_name }}, {{ $city->province_name }}, {{ $city->postal_code }}</option>
                        @endforeach
                        </select>
                        @error('id_city')
                        <div class="w-full text-sm text-red-500 lg:text-base">{{ $message }}</div>
                        @enderror
                  
                        <label class="mt-2 text-sm text-black lg:text-base" for="tentang">Tentang</label>
                        <textarea required name="tentang" id="tentang" cols="30" rows="5" class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-base @error('tentang') border-2 border-red-500 @enderror" value="{{ old('tentang', $toko->tentang) }}">{{ old('tentang', $toko->tentang) }}</textarea>
                        @error('tentang')
                              <div class="w-full text-sm text-red-500 lg:text-base">{{ $message }}</div>
                        @enderror
                  
                        <button class="w-auto p-2 px-4 mx-auto mt-3 text-xs text-white bg-blue-500 rounded-md sm:text-sm">Simpan</button>
                  </form>
            </div>
      </div>
@endsection