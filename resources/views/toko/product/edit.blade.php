@extends('layouts.main')
@section('content')
<div class="pb-10 px-9 pt-36 lg:pt-24">
      <div class="w-full">
            @if (session()->has('error'))
                  <div class="w-auto p-2 px-2 mt-8 text-sm font-semibold text-center bg-red-500 rounded-t-md lg:mt-4 lg:text-base">{{ session('error') }}</div>
            @endif
            <form action="/toko/product/{{ $product->slug }}" onsubmit="return confirm('Apakah anda yakin ingin mengedit produk {{ $product->name }}?')" method="post" enctype="multipart/form-data" class="flex flex-col max-w-md mx-auto mt-5">
                  @csrf
                  @method('put')
                  <h1 class="font-semibold text-center uppercase text-base lg:text-lg">Edit Product</h1>
            
                  <label class="mt-2 text-sm text-black lg:text-base" for="name">Name Product</label>
                  <input required class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-base @error('name') border-2 border-red-500 @enderror" type="text" name="name" id="name" value="{{ old('name', $product->name) }}">
                  @error('name')
                        <div class="w-full text-sm text-red-500 lg:text-base">{{ $message }}</div>
                  @enderror

                  <label class="mt-2 text-sm text-black lg:text-base" for="stok">Stok</label>
                  <input required class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-base @error('stok') border-2 border-red-500 @enderror" type="text" name="stok" id="stok" value="{{ old('stok', $product->stok) }}">
                  @error('stok')
                        <div class="w-full text-sm text-red-500 lg:text-base">{{ $message }}</div>
                  @enderror

                  <label class="mt-2 text-sm text-black lg:text-base" for="id_kategori">Kategori</label>
                  <select required name="id_kategori" class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-base @error('id_kategori') border-2 border-red-500 @enderror" id="id_kategori">
                        @foreach ($kategoris as $kategori)
                              <option value="{{ $kategori->id }}" selected>{{ $kategori->name }}</option>
                        @endforeach
                  </select>
                  @error('id_kategori')
                        <div class="w-full text-sm text-red-500 lg:text-base">{{ $message }}</div>
                  @enderror
            
                  <label class="mt-2 text-sm text-black lg:text-base" for="harga_awal">Harga Awal</label>
                  <input required class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-base @error('harga_awal') border-2 border-red-500 @enderror" type="text" name="harga_awal" id="harga_awal" value="{{ old('harga_awal', $product->harga_awal) }}">
                  @error('harga_awal')
                        <div class="w-full text-sm text-red-500 lg:text-base">{{ $message }}</div>
                  @enderror
            
                  <label class="mt-2 text-sm text-black lg:text-base" for="harga">Harga</label>
                  <input required class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-base @error('harga') border-2 border-red-500 @enderror" type="text" name="harga" id="harga" value="{{ old('harga', $product->harga) }}">
                  @error('harga')
                        <div class="w-full text-sm text-red-500 lg:text-base">{{ $message }}</div>
                  @enderror

                  <label class="mt-2 text-sm text-black lg:text-base" for="berat">Berat</label>
                  <input required class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-base @error('berat') border-2 border-red-500 @enderror" type="text" name="berat" id="berat" value="{{ old('berat', $product->berat) }}">
                  @error('berat')
                        <div class="w-full text-sm text-red-500 lg:text-base">{{ $message }}</div>
                  @enderror

                  <label class="mt-2 text-sm text-black lg:text-base" for="image">Image</label>
                  <input class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-base @error('image') border-2 border-red-500 @enderror" type="file" name="image" id="image" value="{{ old('image', $product->image) }}">
                  @error('image')
                        <div class="w-full text-sm text-red-500 lg:text-base">{{ $message }}</div>
                  @enderror
            
                  <label class="mt-2 text-sm text-black lg:text-base" for="deskripsi">Deskripsi</label>
                  <input required id="deskripsi" type="hidden" name="deskripsi">
                  <trix-editor input="deskripsi" id="trix" class="w-full h-80 px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-base @error('deskripsi') border-2 border-red-500 @enderror" value="{{ old('deskripsi', $product->deskripsi) }}">{!! $product->deskripsi !!}</trix-editor>
                  @error('deskripsi')
                        <div class="w-full text-sm text-red-500 lg:text-base">{{ $message }}</div>
                  @enderror
            
                  <button class="w-auto p-2 px-4 mx-auto mt-3 text-xs text-white bg-blue-500 rounded-md sm:text-sm">Simpan</button>
            </form>
      </div>
</div>
@endsection