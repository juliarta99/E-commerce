@extends('layouts.main')
@section('content')
<div class="pb-10 px-9 pt-36 lg:pt-24">
      <div id="alamat">
            <div class="w-full">
                  <div class="flex w-50 sm:w-full">
                        <div class="mx-auto">
                              <a href="/alamat/tambah">
                                    <button id="buttonTambahAlamat" class="p-2 px-4 text-xs text-white bg-blue-500 rounded-md sm:text-sm">Tambah alamat</button>
                              </a>
                        </div>
                  </div>
                  <div id="showAlamat">
                        <div class="flex flex-col max-w-md mx-auto mt-5">
                              @if (session()->has('succes'))
                                    <div class="px-4 py-2 text-center bg-green-500 rounded-md">{{ session('succes') }}</div>
                              @endif

                              @if (count(Auth::user()->alamats) == 0)
                                    <p class="text-sm text-center lg:text-base font-semibold">Alamat belum ditambahkan</p>
                              @else
                                    @foreach ($alamats as $alamat)
                                    <div class="relative p-2 px-4 my-2 bg-blue-500 rounded-md">
                                          <p class="text-sm font-semibold lg:text-base xl:text-lg">{{ $alamat->penerima }}</p>
                                          <div class="flex items-center">
                                                @if ($alamat->label == 'kantor')
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
                                                      <p class="text-xs lg:text-sm opacity-80">{{ $alamat->city->city_name }}, {{ $alamat->city->province_name }}, {{ $alamat->city->postal_code }}</p>
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
                                                <p class="ml-2 text-sm xl:text-base">{{ $alamat->no_hp }}</p>
                                          </div>
                                          <div class="absolute flex top-2 right-2">
                                                <a href="/alamat/{{ $alamat->id }}/edit">
                                                      <div class="p-2 mr-2 bg-white rounded-full" id="editAlamat" onclick="klikBtnUbahAlamat()">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                                  <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                            </svg>
                                                      </div>
                                                </a>
                                                <form action="/alamat/{{ $alamat->id }}" method="post">
                                                      @csrf
                                                      @method('delete')
                                                      <button type="submit">
                                                            <div class="p-2 bg-white rounded-full">
                                                                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                                  </svg>
                                                            </div>
                                                      </button>
                                                </form>
                                          </div>
                                    </div>
                                    @endforeach
                              @endif
                        </div>
                  </div>
            </div>
      </div>
</div>
@endsection