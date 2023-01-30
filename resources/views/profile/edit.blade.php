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
                  <div id="detailBiodata" class="w-full mt-3">
                        <div class="items-center justify-center w-full max-w-5xl mx-auto sm:flex">
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
                                          <div class="flex">
                                                <h3 class="mr-1 text-sm lg:text-md">Nomor HP :</h3>
                                                @if (Auth::user()->no_hp != null)
                                                      <h3 class="text-sm uppercase lg:text-md">{{ Auth::user()->no_hp }}</h3>
                                                @else
                                                      <h3 class="text-sm lg:text-md">Belum ditambahkan</h3>
                                                @endif
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>
                  {{-- form ubah --}}
                  <div id="formUbahBiodata" class="hidden">
                        <form action="/editProfile" method="post" enctype="multipart/form-data" class="flex flex-col max-w-md mx-auto mt-5">
                              @csrf
                              @method('put')
                              <h1 class="font-semibold text-center uppercase text-md lg:text-lg">Ubah Biodata Diri</h1>
                              @if (session()->has('succesUbahProfile'))
                              <div id="sessionSucces1" class="w-auto mx-auto my-1 overflow-hidden rounded-md">
                                    <div class="px-4 py-2 bg-green-500 ">{{ session('succesUbahProfile') }}</div>
                                    <div id="timeSessionSucces" class="h-1 bg-black"></div>
                              </div>
                              @endif
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
                        <div id="showAlamat">
                              <div class="flex flex-col max-w-md mx-auto mt-5">       
                                    @foreach ($alamats as $alamat)
                                    <div class="p-2 px-4 mt-2 bg-blue-500 rounded-md">
                                          <p class="text-sm font-semibold lg:text-md xl:text-lg">{{ $alamat->penerima }}</p>
                                          <div class="flex items-center">
                                                @if ($alamat->label == 'Kantor')
                                                      {{-- office --}}
                                                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
                                                      </svg>
                                                @else
                                                      {{-- home --}}
                                                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                                      </svg>
                                                @endif
                                                <div class="ml-2">
                                                      <p class="text-xs lg:text-sm opacity-80">{{ $alamat->kelurahan }}, {{ $alamat->kecamatan }}, {{ $alamat->kabupaten }}, {{ $alamat->provinsi }}</p>
                                                      <p class="text-xs lg:text-sm opacity-80">{{ $alamat->detail }}</p>
                                                </div>
                                          </div>
                                          @if ($alamat->catatan != null)    
                                                <div class="flex items-center">
                                                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 01-.825-.242m9.345-8.334a2.126 2.126 0 00-.476-.095 48.64 48.64 0 00-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0011.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
                                                      </svg>                                              
                                                      <p class="ml-2 text-xs lg:text-sm">{{ $alamat->catatan }}</p>
                                                </div>
                                          @endif
                                          <div class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                      <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                                </svg>                                                    
                                                <p class="ml-2 text-sm xl:text-md">{{ $alamat->no_hp }}</p>
                                          </div>
                                    </div>
                                    @endforeach
                              </div>
                        </div>
                        {{-- form tambah --}}
                        <div id="formTambahAlamat" class="hidden">
                              <form action="/alamat" method="post" class="flex flex-col max-w-md mx-auto mt-5">
                                    @csrf
                                    <h1 class="font-semibold text-center uppercase text-md lg:text-l">Form Tambah Alamat</h1>
                                    @if (session()->has('succesTambahAlamat'))
                                    <div id="sessionSucces2" class="w-auto mx-auto my-1 overflow-hidden rounded-md">
                                          <div class="px-4 py-2 bg-green-500 ">{{ session('succesTambahAlamat') }}</div>
                                          <div id="timeSessionSucces" class="h-1 bg-black"></div>
                                    </div>
                                     @endif
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