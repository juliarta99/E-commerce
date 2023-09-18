@extends('layouts.main')
@section('content')
<div class="pb-10 pt-28 px-9 lg:pt-20">
      <div class="w-full">
            <form action="/toko/{{ $toko->slug }}/editBack" method="post" enctype="multipart/form-data" class="max-w-md p-4 mx-auto">
                  @csrf
                  @method('put')
                  <h1>Ubah Background Toko</h1>
                  <input type="file" name="backImage" class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-base @error('backImage') border-2 border-red-500 @enderror" value="{{ old('backImage', $toko->backImage) }}">
                  @error('backImage')
                        <div class="w-full text-sm text-red-500 lg:text-base">{{ $message }}</div>
                  @enderror
                  {{-- olf iamge --}}
                  <input type="hidden" name="oldBackImage" value="{{ $toko->backImage }}">
                  <div class="mt-3 button">
                  <a href="/toko" class="px-4 py-2 mr-2 rounded-md bg-black text-white text-sm m=lg:text-base">Batal</a>
                  <button class="px-4 py-2 rounded-md bg-blue-500 text-white text-sm m=lg:text-base" type="submit">Ubah</button>
                  </div>
            </form>
      </div>
</div>
@endsection