@extends('layouts.main')
@section('content')
<div class="pt-36 lg:pt-24 pb-10">
      <div class="w-full">
            <div id="biodata" class="w-full">
                  {{-- form ubah --}}
                  <div id="formUbahBiodata">
                        <form action="/editProfile" method="post" enctype="multipart/form-data" class="flex flex-col max-w-md mx-auto mt-5">
                              @csrf
                              @method('put')
                              <h1 class="font-semibold text-center uppercase text-base lg:text-lg">Ubah Biodata Diri</h1>
                              @if (session()->has('success'))
                              <div class="w-auto mx-auto my-1 overflow-hidden rounded-md">
                                    <div class="px-4 py-2 bg-green-500 ">{{ session('success') }}</div>
                              </div>
                              @endif
                              <input type="hidden" name="oldImage" value="{{ Auth::user()->image }}">
                              <label class="text-sm text-black lg:text-base" for="image">Image</label>
                              <input class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-base @error('image') border-2 border-red-500 @enderror" type="file" name="image" id="image" value="{{ old('image', Auth::user()->image) }}">
                              @error('image')
                                    <div class="w-full text-sm text-red-500 lg:text-base">{{ $message }}</div>
                              @enderror

                              <label class="mt-2 text-sm text-black lg:text-base" for="name">Name</label>
                              <input class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-base @error('name') border-2 border-red-500 @enderror" type="text" name="name" id="name" value="{{ old('name', Auth::user()->name) }}">
                              @error('name')
                                    <div class="w-full text-sm text-red-500 lg:text-base">{{ $message }}</div>
                              @enderror

                              <label class="mt-2 text-sm text-black lg:text-base" for="tgl_lahir">Tanggal Lahir</label>
                              <input class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-base @error('tgl_lahir') border-2 border-red-500 @enderror" type="date" name="tgl_lahir" id="tgl_lahir" value="{{ old('tgl_lahir', Auth::user()->tgl_lahir) }}">
                              @error('tgl_lahir')
                                    <div class="w-full text-sm text-red-500 lg:text-base">{{ $message }}</div>
                              @enderror

                              <h1 class="mt-2 text-sm lg:text-base">Jenis Kelamin</h1>
                              <div class="flex">
                                    <div class="flex mr-4">
                                          <input class="mr-2" type="radio" name="jk" id="l" value="l" @if (Auth::user()->jk == 'l')
                                              checked
                                          @endif>
                                          <label class="text-sm text-black lg:text-base" for="l">Laki - Laki</label>
                                    </div>
                                    <div class="flex mr-4">
                                          <input class="mr-2" type="radio" name="jk" id="p" value="p" @if (Auth::user()->jk == 'p')
                                                checked
                                          @endif>
                                          <label class="text-sm text-black lg:text-base" for="p">Perempuan</label>
                                    </div>
                              </div>
                              @error('jk')
                                    <div class="w-full text-sm text-red-500 lg:text-base">{{ $message }}</div>
                              @enderror

                              <label class="mt-2 text-sm text-black lg:text-base" for="no_hp">Nomor HP</label>
                              <input class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-base @error('no_hp') border-2 border-red-500 @enderror" type="tel" name="no_hp" id="no_hp" value="{{ old('no_hp', Auth::user()->no_hp)  }}">
                              @error('no_hp')
                                    <div class="w-full text-sm text-red-500 lg:text-base">{{ $message }}</div>
                              @enderror

                              <label class="mt-2 text-sm text-black lg:text-base" for="email">Email</label>
                              <input class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-base @error('email') border-2 border-red-500 @enderror" type="email" name="email" id="email" value="{{ old('email', Auth::user()->email)  }}">
                              @error('email')
                                    <div class="w-full text-sm text-red-500 lg:text-base">{{ $message }}</div>
                              @enderror

                              <button class="w-auto p-2 px-4 mx-auto mt-3 text-xs text-white bg-blue-500 rounded-md sm:text-sm">Simpan</button>
                        </form>
                  </div>
            </div>
      </div>
</div>
@endsection
