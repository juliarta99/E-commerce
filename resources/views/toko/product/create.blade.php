@extends('layouts.main')
@section('content')
<div class="pb-10 px-9 pt-36 lg:pt-24">
      <div class="w-full">
            <form action="/toko/product" method="post" enctype="multipart/form-data" class="flex flex-col max-w-md mx-auto mt-5">
                  @csrf
                  <h1 class="font-semibold text-center uppercase text-md lg:text-lg">Tambah Product</h1>
                  @endif
                  <input type="hidden" name="" value="{{ Auth::user()->toko()->get()->id }}">
                  <label class="mt-2 text-sm text-black lg:text-md" for="name">Name Product</label>
                  <input class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-md @error('name') border-2 border-red-500 @enderror" type="text" name="name" id="name" value="{{ old('name') }}">
                  @error('name')
                        <div class="w-full text-sm text-red-500 lg:text-md">{{ $message }}</div>
                  @enderror
            
                  <label class="mt-2 text-sm text-black lg:text-md" for="hargaAwal">Harga Awal</label>
                  <input class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-md @error('hargaAwal') border-2 border-red-500 @enderror" type="text" name="hargaAwal" id="hargaAwal" value="{{ old('hargaAwal') }}">
                  @error('hargaAwal')
                        <div class="w-full text-sm text-red-500 lg:text-md">{{ $message }}</div>
                  @enderror
            
                  <label class="mt-2 text-sm text-black lg:text-md" for="harga">Harga</label>
                  <input class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-md @error('harga') border-2 border-red-500 @enderror" type="text" name="harga" id="harga" value="{{ old('harga') }}">
                  @error('harga')
                        <div class="w-full text-sm text-red-500 lg:text-md">{{ $message }}</div>
                  @enderror

                  <label class="mt-2 text-sm text-black lg:text-md" for="berat">Berat</label>
                  <input class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-md @error('berat') border-2 border-red-500 @enderror" type="text" name="berat" id="berat" value="{{ old('berat') }}">
                  @error('berat')
                        <div class="w-full text-sm text-red-500 lg:text-md">{{ $message }}</div>
                  @enderror

                  <label class="mt-2 text-sm text-black lg:text-md" for="image">image</label>
                  <input class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-md @error('image') border-2 border-red-500 @enderror" type="image" name="image" id="image" value="{{ old('image') }}">
                  @error('image')
                        <div class="w-full text-sm text-red-500 lg:text-md">{{ $message }}</div>
                  @enderror

                  <label class="mt-2 text-sm text-black lg:text-md" for="kabupaten">Kabupaten</label>
                  <input class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-md @error('kabupaten') border-2 border-red-500 @enderror" type="text" name="kabupaten" id="kabupaten" value="{{ old('kabupaten') }}">
                  @error('kabupaten')
                        <div class="w-full text-sm text-red-500 lg:text-md">{{ $message }}</div>

                  @enderror
                  <label class="mt-2 text-sm text-black lg:text-md" for="provinsi">Provinsi</label>
                  <input class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-md @error('provinsi') border-2 border-red-500 @enderror" type="text" name="provinsi" id="provinsi" value="{{ old('provinsi') }}">
                  @error('provinsi')
                        <div class="w-full text-sm text-red-500 lg:text-md">{{ $message }}</div>
                  @enderror
            
                  <label class="mt-2 text-sm text-black lg:text-md" for="deskripsi">Deskripsi</label>
                  <textarea name="deskripsi" id="deskripsi" cols="30" rows="5" class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-md @error('deskripsi') border-2 border-red-500 @enderror" value="{{ old('deskripsi') }}">{{ old('deskripsi') }}</textarea>
                  @error('deskripsi')
                        <div class="w-full text-sm text-red-500 lg:text-md">{{ $message }}</div>
                  @enderror
            
                  <button class="w-auto p-2 px-4 mx-auto mt-3 text-xs text-white bg-blue-500 rounded-md sm:text-sm">Simpan</button>
            </form>
      </div>
</div>
@endsection