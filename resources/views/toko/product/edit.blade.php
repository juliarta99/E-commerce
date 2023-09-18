@extends('layouts.main')
@section('content')
<div class="pb-10 px-9 pt-36 lg:pt-24">
      <div class="w-full">
            <form action="/toko/product/{{ $product->slug }}" method="post" enctype="multipart/form-data" class="flex flex-col max-w-md mx-auto mt-5">
                  @csrf
                  @method('put')
                  <h1 class="font-semibold text-center uppercase text-base lg:text-lg">Edit Product</h1>
            
                  <label class="mt-2 text-sm text-black lg:text-base" for="name">Name Product</label>
                  <input class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-base @error('name') border-2 border-red-500 @enderror" type="text" name="name" id="name" value="{{ old('name', $product->name) }}">
                  @error('name')
                        <div class="w-full text-sm text-red-500 lg:text-base">{{ $message }}</div>
                  @enderror

                  <label class="mt-2 text-sm text-black lg:text-base" for="id_kategori">Kategori</label>
                  <select name="id_kategori" class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-base @error('id_kategori') border-2 border-red-500 @enderror" id="id_kategori">
                        @if ($product->image != null)
                              @foreach ($kategoris as $kategori)
                              <option value="{{ $kategori->id }}" selected>{{ $kategori->name }}</option>
                              @endforeach
                        @else    
                              @foreach ($kategoris as $kategori)
                              <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                              @endforeach
                        @endif
                  </select>
                  @error('id_kategori')
                        <div class="w-full text-sm text-red-500 lg:text-base">{{ $message }}</div>
                  @enderror
            
                  <label class="mt-2 text-sm text-black lg:text-base" for="harga_awal">Harga Awal</label>
                  <input class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-base @error('harga_awal') border-2 border-red-500 @enderror" type="text" name="harga_awal" id="harga_awal" value="{{ old('harga_awal', $product->harga_awal) }}">
                  @error('harga_awal')
                        <div class="w-full text-sm text-red-500 lg:text-base">{{ $message }}</div>
                  @enderror
            
                  <label class="mt-2 text-sm text-black lg:text-base" for="harga">Harga</label>
                  <input class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-base @error('harga') border-2 border-red-500 @enderror" type="text" name="harga" id="harga" value="{{ old('harga', $product->harga) }}">
                  @error('harga')
                        <div class="w-full text-sm text-red-500 lg:text-base">{{ $message }}</div>
                  @enderror

                  <label class="mt-2 text-sm text-black lg:text-base" for="berat">Berat</label>
                  <input class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-base @error('berat') border-2 border-red-500 @enderror" type="text" name="berat" id="berat" value="{{ old('berat', $product->berat) }}">
                  @error('berat')
                        <div class="w-full text-sm text-red-500 lg:text-base">{{ $message }}</div>
                  @enderror

                  <label class="mt-2 text-sm text-black lg:text-base" for="image">image</label>
                  <input class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-base @error('image') border-2 border-red-500 @enderror" type="file" name="image" id="image" value="{{ old('image', $product->image) }}">
                  @error('image')
                        <div class="w-full text-sm text-red-500 lg:text-base">{{ $message }}</div>
                  @enderror

                  <label class="mt-2 text-sm text-black lg:text-base" for="kabupaten">Kabupaten</label>
                  <input class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-base @error('kabupaten') border-2 border-red-500 @enderror" type="text" name="kabupaten" id="kabupaten" value="{{ old('kabupaten',$product->kabupaten) }}">
                  @error('kabupaten')
                        <div class="w-full text-sm text-red-500 lg:text-base">{{ $message }}</div>

                  @enderror
                  <label class="mt-2 text-sm text-black lg:text-base" for="provinsi">Provinsi</label>
                  <input class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-base @error('provinsi') border-2 border-red-500 @enderror" type="text" name="provinsi" id="provinsi" value="{{ old('provinsi', $product->provinsi) }}">
                  @error('provinsi')
                        <div class="w-full text-sm text-red-500 lg:text-base">{{ $message }}</div>
                  @enderror
            
                  <label class="mt-2 text-sm text-black lg:text-base" for="deskripsi">Deskripsi</label>
                  <input id="deskripsi" type="hidden" name="deskripsi">
                  <trix-editor input="deskripsi" id="trix" class="w-full h-80 px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-base @error('deskripsi') border-2 border-red-500 @enderror" value="{{ old('deskripsi', $product->deskripsi) }}">{!! $product->deskripsi !!}</trix-editor>
                  @error('deskripsi')
                        <div class="w-full text-sm text-red-500 lg:text-base">{{ $message }}</div>
                  @enderror
            
                  <button class="w-auto p-2 px-4 mx-auto mt-3 text-xs text-white bg-blue-500 rounded-md sm:text-sm">Simpan</button>
            </form>
      </div>
</div>
@endsection