@extends('layouts.main')
@section('content')
<div class="pb-10 px-9 pt-36 lg:pt-24">
      <div class="w-full">
            <div class="w-full">
                <div class="flex items-center justify-center gap-4">
                      <button id="buttonBiodata" class="text-blue-500 border-b-2 border-blue-500">
                            <h1 class="text-sm lg:text-md">Infomasi profile</h1>
                      </button>
                      <button id="buttonAlamat" class="border-b-2">
                            <h1 class="text-sm lg:text-md">Daftar alamat</h1>
                      </button>
                </div>
            </div>
            <div id="biodata" class="w-full mt-8">
                  <div class="flex w-50 sm:w-full">
                        <div class="mx-auto">
                              <button id="buttonUbahBiodata" class="p-2 px-4 mr-4 text-xs text-white bg-blue-500 rounded-md sm:text-sm">Ubah biodata</button>
                              <button id="ubahPassword" class="p-2 px-4 text-xs text-white bg-blue-500 rounded-md sm:text-sm">Ubah Password</button>
                        </div>
                  </div>
                  <div id="detailBiodata" class="w-full">
                        <div class="items-center justify-center w-full sm:flex">
                              <div class="w-full sm:w-1/2">
                                    @if (Auth::user()->image != null)
                                          <img src="{{ asset('storage/'. Auth::user()->image) }}" class="w-48 mx-auto rounded-full sm:w-full md:w-1/2" alt="{{ Auth::user()->name }}">
                                    @else
                                          <img src="{{ asset('img/profile_default.png') }}" class="w-48 mx-auto rounded-full sm:w-full md:w-1/2" alt="{{ Auth::user()->name }}">
                                    @endif
                              </div>
                              <div class="flex flex-col w-50 sm:w-1/2">
                                    <div class="mx-auto">
                                          <h1 class="font-semibold text-black text-md lg:text-lg">Biodata Diri</h1>
                                          <h3 class="text-sm lg:text-md">Nama : {{ Auth::user()->name }}</h3>
                                          <div class="flex">
                                                <h3 class="mr-1 text-sm lg:text-md">Tanggal Lahir :</h3> @if (Auth::user()->tgl_lahir != null)
                                                            <h3 class="text-sm lg:text-md">{{ Auth::user()->tgl_lahir }}</h3>
                                                      @else
                                                            <h3 class="text-sm lg:text-md">Belum ditambahkan</h3>
                                                      @endif
                                          </div>
                                          <div class="flex">
                                                <h3 class="mr-1 text-sm lg:text-md">Jenis Kelamin :</h3> @if (Auth::user()->jk != null)
                                                            <h3 class="text-sm uppercase lg:text-md">{{ Auth::user()->jk }}</h3>
                                                      @else
                                                            <h3 class="text-sm lg:text-md">Belum ditambahkan</h3>
                                                      @endif
                                          </div>
                                          <h1 class="mt-5 font-semibold text-black text-md lg:text-lg">Kontak</h1>
                                          <h3 class="text-sm lg:text-md">Email : {{ Auth::user()->email  }}</h3>
                                          <h3 class="text-sm lg:text-md">Nomor HP : {{ Auth::user()->no_hp  }}</h3>
                                    </div>
                              </div>
                        </div>
                  </div>
                  {{-- form ubah --}}
                  <div id="formUbahBiodata" class="hidden">
                        <form action="/editProfile" method="post" enctype="multipart/form-data" class="flex flex-col mt-5">
                              @csrf
                              @method('put')
                              <h1 class="font-semibold text-center uppercase text-md lg:text-lg">Ubah Biodata Diri</h1>
                              <input type="hidden" name="oldImage" value="{{ Auth::user()->image }}">
                              <label class="text-sm text-black lg:text-md" for="image">Image</label>
                              <input class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-md @error('image') border-2 border-red-500 @enderror" type="file" name="image" id="image" value="{{ old('image', Auth::user()->image) }}">
                              @error('image')
                                    <div class="w-full text-sm text-red-500 lg:text-md">{{ $message }}</div>
                              @enderror

                              <label class="mt-2 text-sm text-black lg:text-md" for="name">Name</label>
                              <input class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-md @error('name') border-2 border-red-500 @enderror" type="text" name="name" id="name" value="{{ old('name', Auth::user()->name) }}">
                              @error('name')
                                    <div class="w-full text-sm text-red-500 lg:text-md">{{ $message }}</div>
                              @enderror

                              <label class="mt-2 text-sm text-black lg:text-md" for="tgl_lahir">Tanggal Lahir</label>
                              <input class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-md @error('tgl_lahir') border-2 border-red-500 @enderror" type="date" name="tgl_lahir" id="tgl_lahir" value="{{ old('tgl_lahir', Auth::user()->tgl_lahir) }}">
                              @error('tgl_lahir')
                                    <div class="w-full text-sm text-red-500 lg:text-md">{{ $message }}</div>
                              @enderror

                              <h1 class="mt-2 text-sm lg:text-md">Jenis Kelamin</h1>
                              <div class="flex">
                                    <div class="flex mr-4">
                                          <input class="mr-2" type="radio" name="jk" id="l" value="l" @if (Auth::user()->jk == 'l')
                                              checked
                                          @endif>
                                          <label class="text-sm text-black lg:text-md" for="l">Laki - Laki</label>
                                    </div>
                                    <div class="flex mr-4">
                                          <input class="mr-2" type="radio" name="jk" id="p" value="p" @if (Auth::user()->jk == 'p')
                                                checked
                                          @endif>
                                          <label class="text-sm text-black lg:text-md" for="p">Perempuan</label>
                                    </div>
                              </div>
                              @error('jk')
                                    <div class="w-full text-sm text-red-500 lg:text-md">{{ $message }}</div>
                              @enderror

                              <label class="mt-2 text-sm text-black lg:text-md" for="no_hp">Nomor HP</label>
                              <input class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-md @error('no_hp') border-2 border-red-500 @enderror" type="tel" name="no_hp" id="no_hp" value="{{ old('no_hp', Auth::user()->no_hp)  }}">
                              @error('no_hp')
                                    <div class="w-full text-sm text-red-500 lg:text-md">{{ $message }}</div>
                              @enderror

                              <label class="mt-2 text-sm text-black lg:text-md" for="email">Email</label>
                              <input class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-md @error('email') border-2 border-red-500 @enderror" type="email" name="email" id="email" value="{{ old('email', Auth::user()->email)  }}">
                              @error('email')
                                    <div class="w-full text-sm text-red-500 lg:text-md">{{ $message }}</div>
                              @enderror

                              <button class="w-auto p-2 px-4 mx-auto mt-3 text-xs text-white bg-blue-500 rounded-md sm:text-sm">Simpan</button>
                        </form>
                  </div>
            </div>
            <div id="alamat" class="hidden mt-8">
                  <div class="w-full">
                        <div class="flex w-50 sm:w-full">
                              <div class="mx-auto">
                                    <button id="buttonTambahAlamat" class="p-2 px-4 text-xs text-white bg-blue-500 rounded-md sm:text-sm">Tambah alamat</button>
                              </div>
                        </div>
                        @if (array($alamats) != null)
                              <div class="w-full" id="showAlamat">
                                    @foreach ($alamats as $alamat)
                                    <p>{{ $alamat->penerima }}</p>
                                    @endforeach
                              </div>
                        @else
                              <p class="text-sm opacity-80 lg:text-md">Belum ada alamat</p>
                        @endif
                        {{-- form tambah --}}
                        <div id="formTambahAlamat" class="hidden">
                              <form action="/alamat" method="post" class="flex flex-col mt-5">
                                    @csrf
                                    <h1 class="font-semibold text-center uppercase text-md lg:text-l">Form Tambah Alamat</h1>
                                    <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                                    
                                    <label class="text-sm text-black lg:text-md" for="penerima">Penerima</label>
                                    <input class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-md @error('penerima') border-2 border-red-500 @enderror" type="text" name="penerima" id="penerima" value="{{ old('penerima', Auth::user()->name) }}">
                                    @error('penerima')
                                          <div class="w-full text-sm text-red-500 lg:text-md">{{ $message }}</div>
                                    @enderror
            
                                    <label class="mt-2 text-sm text-black lg:text-md" for="label">Label</label>
                                    <select name="label" class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-md @error('label') border-2 border-red-500 @enderror" id="label">
                                          <option value="Rumah">Rumah</option>
                                          <option value="Kantor">Kantor</option>
                                          <option value="Apartemen">Apartemen</option>
                                          <option value="Kos">Kos</option>
                                    </select>
                                    @error('label')
                                          <div class="w-full text-sm text-red-500 lg:text-md">{{ $message }}</div>
                                    @enderror
            
                                    <label class="mt-2 text-sm text-black lg:text-md" for="kelurahan">Keluharan</label>
                                    <input class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-md @error('kelurahan') border-2 border-red-500 @enderror" type="text" name="kelurahan" id="kelurahan" value="{{ old('kelurahan') }}">
                                    @error('kelurahan')
                                          <div class="w-full text-sm text-red-500 lg:text-md">{{ $message }}</div>
                                    @enderror
            
                                    <label class="mt-2 text-sm text-black lg:text-md" for="kecamatan">Kecamatan</label>
                                    <input class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-md @error('kecamatan') border-2 border-red-500 @enderror" type="text" name="kecamatan" id="kecamatan" value="{{ old('kecamatan') }}">
                                    @error('kecamatan')
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
            
                                    <label class="mt-2 text-sm text-black lg:text-md" for="detail">Detail alamat</label>
                                    <input class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-md @error('detail') border-2 border-red-500 @enderror" type="text" name="detail" id="detail" value="{{ old('detail') }}">
                                    @error('detail')
                                          <div class="w-full text-sm text-red-500 lg:text-md">{{ $message }}</div>
                                    @enderror
            
                                    <label class="mt-2 text-sm text-black lg:text-md" for="catatan">Catatan</label>
                                    <input class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-md @error('catatan') border-2 border-red-500 @enderror" type="text" name="catatan" id="catatan" value="{{ old('catatan') }}">
                                    <p class= "text-xs opacity-90">Catatan untuk kurir. Contoh: warna rumah</p>
                                    @error('catatan')
                                          <div class="w-full text-sm text-red-500 lg:text-md">{{ $message }}</div>
                                    @enderror
            
                                    <label class="mt-2 text-sm text-black lg:text-md" for="no_hp">Nomor HP</label>
                                    <input class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-md @error('no_hp') border-2 border-red-500 @enderror" type="tel" name="no_hp" id="no_hp" value="{{ old('no_hp', Auth::user()->no_hp) }}">
                                    @error('no_hp')
                                          <div class="w-full text-sm text-red-500 lg:text-md">{{ $message }}</div>
                                    @enderror
            
                                    <button type="submit" class="w-auto p-2 px-4 mx-auto mt-3 text-xs text-white bg-blue-500 rounded-md sm:text-sm">Simpan</button>
                              </form>
                        </div>
                  </div>
            </div>
      </div>
</div>
@endsection