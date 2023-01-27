@extends('layouts.main')
@section('content')
<div class="pb-10 px-9 pt-36 lg:pt-24">
      <div class="w-full">
            <div class="w-full">
                <div class="flex items-center justify-center gap-4">
                      <a href="/editProfile">
                            <h1 class="text-sm lg:text-md">Biodata diri</h1>
                      </a>
                      <a href="#alamat">
                            <h1 class="text-sm lg:text-md">Daftar alamat</h1>
                      </a>
                </div>
            </div>
            <div class="w-full">
                  <img src="{{ asset('img/profile_default.png') }}" class="w-20 h-20 rounded-full" alt="{{ Auth::user()->name }}">
            </div>
            <div class="w-full">
                  <form action="" method="post">
                        <h1 class="font-semibold text-black text-md lg:text-lg">Ubah Biodata Diri</h1>
                        <h3 class="text-sm lg:text-md">Nama : {{ Auth::user()->name }}</h3>
                        <div class="flex">
                              <h3 class="mr-1 text-sm lg:text-md">Tanggal Lahir :</h3> @if (Auth::user()->tgl_lahir != null)
                                          <h3 class="text-sm lg:text-md">{{ Auth::user()->tgl_lahir }}</h3>
                                    @else
                                          <input type="date" name="tgl_lahir" id="tgl_lahir">
                                    @endif
                        </div>
                        <div class="flex">
                              <h3 class="mr-1 text-sm lg:text-md">Jenis Kelamin :</h3> @if (Auth::user()->jk != null)
                                          <h3 class="text-sm lg:text-md">{{ Auth::user()->jk }}</h3>
                                    @else
                                          <div class="flex flex-col">
                                                <div class="w-full">
                                                      <input type="radio" name="l" id="l">
                                                      <label for="l">Laki - Laki</label>
                                                </div>
                                                <div class="w-full">
                                                      <input type="radio" name="p" id="p">
                                                      <label for="p">Perempuan</label>
                                                </div>
                                          </div>
                                    @endif
                        </div>

                        <h1 class="font-semibold text-black text-md lg:text-lg">Ubah Kontak</h1>
                        <h3>Email : {{ Auth::user()->email  }}</h3>
                        <h3>Nomor HP : {{ Auth::user()->no_hp  }}</h3>
                  </form>
            </div>
      </div>
</div>
@endsection