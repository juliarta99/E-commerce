@extends('layouts.main')
@section('content')
      @foreach (Auth::user()->toko()->get() as $toko)
      <div class="pt-24 pb-10 px-9 lg:pt-16">
            <div class="w-full">
                  <div class="max-w-2xl mx-auto shadow-lg">
                        <div class="flex flex-wrap">
                              <div class="w-full">
                              <div class="relative group">
                                    @if ($toko->backImage != null)
                                          <img src="{{ asset('storage/'. $toko->backImage) }}" alt="Background Toko" class="w-full h-52 object-cover">
                                    @else
                                          <img src="{{ asset('img/back_toko.jpg') }}" alt="Background Toko" class="w-full h-52 object-cover">
                                    @endif
                                    {{-- edit back toko --}}
                                    <a href="/toko/{{ $toko->slug }}/editBack">
                                          <div class="absolute hidden top-6 lg:top-4 group-hover:block right-2">
                                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#fff" class="w-6 h-6">
                                                <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                                <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                                          </svg>
                                          </div>
                                    </a>
                              </div>
                              </div>
                              <div class="w-full px-4 pt-4 pb-2">
                              <div class="flex items-center justify-between w-full ">
                                    <div class="flex items-center w-full">
                                          @if ($toko->image != null)
                                          <img src="{{ asset('storage/'. $toko->image) }}" class="w-10 h-10 object-cover rounded-full" alt="{{ $toko->name }}">
                                          @else
                                          <img src="{{ asset('img/toko_default.jpg') }}" alt="Background Toko" class="w-10 h-10 rounded-full object-cover">
                                          @endif
                                          <div class="ml-2">
                                          <h1 class="text-sm lg:text-base">{{ $toko->name }}</h1>
                                          <a href="/toko/{{ $toko->slug }}/edit" class="text-xs text-blue-500 lg:text-sm">edit toko</a>
                                          </div>
                                    </div>
                                    <a href="/toko/product/create">
                                          <button class="p-2 px-4 text-xs text-white bg-blue-500 rounded-md lg:text-sm">Tambah product</button>
                                    </a>
                              </div>
                              <div class="w-full mt-2">
                                    <div class="flex items-center">
                                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                          <path fill-rule="evenodd" d="M11.54 22.351l.07.04.028.016a.76.76 0 00.723 0l.028-.015.071-.041a16.975 16.975 0 001.144-.742 19.58 19.58 0 002.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 00-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 002.682 2.282 16.975 16.975 0 001.145.742zM12 13.5a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                                          </svg>
                                          <h3 class="ml-1 text-xs lg:Text-sm">{{ $toko->alamat }}</h3>
                                    </div>
                                    <p class="text-xs text-justify opacity-60">{{ $toko->tentang }}</p>
                              </div>
                              </div>
                        </div>
                        {{-- product --}}
                        <div class="w-full pb-5">
                              <div class="sticky top-32 mb-4 lg:top-16 z-[1] w-full p-2 lg:p-3 shadow-md bg-white">
                                    <div class="flex justify-center gap-3 text-black">
                                          <a href="{{ route('toko') }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000" class="w-4 h-4 sm:w-5 sm:h-5">
                                                      <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
                                                </svg>
                                          </a>
                                          <a href="#deskripsi">
                                                <h4 class="text-sm text-black lg:text-base">Deskripsi</h4>
                                          </a>
                                          <a href="#ulasan">
                                                <h4 class="text-sm text-black lg:text-base">Ulasan</h4>
                                          </a>
                                    </div>
                              </div>
                              <div class="flex flex-wrap">
                                    <div class="w-full px-2 md:w-1/2">
                                          <div class="relative w-full">
                                                <img src="{{ asset('storage/'. $product->image) }}" class="rounded-md" alt="Product">
                                                <div class="absolute top-0 right-0 p-2 text-white bg-red-500 rounded-tr-sm">{{ $product->diskon }}%</div>
                                          </div>
                                          <div class="w-full mt-2">
                                                <h1 class="text-xl font-semibold text-center text-black md:text-2xl lg:text-3xl xl:text-4xl">{{ $product->name }}</h1>
                                          </div>
                                    </div>
                                    <div class="w-full px-2 md:w-1/2">
                                          <div class="w-full mt-2" id="deskripsi">
                                                <h1 class="text-lg lg:text-xl">Deskripsi</h1>
                                                <div class="w-24 h-1 mb-2 bg-blue-500"></div>
                                                {{-- isi deskripsi --}}
                                                <h4 class="text-xs text-black lg:text-base">Berat satuan : {{ $product->berat }} g</h4>
                                                <h4 class="text-xs text-black lg:text-base">Kategori : {{ $product->kategori->name }}</h4>
                                                <p class="text-sm text-justify">{!! $product->deskripsi !!}</p>
                                          </div>
                                    </div>
                              </div>
                              <div class="w-full px-2 mt-4" id="ulasan">
                                    <h1 class="text-lg lg:text-xl">Ulasan</h1>
                                    <div class="w-20 h-1 bg-blue-500"></div>
                                    {{-- total ulasan --}}
                                    <div class="w-full mt-2">
                                          <div class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 mr-1">
                                                      <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                </svg>
                                                <h2 class="mr-2 text-2xl xl:text-3xl">{{ $product->rate }}</h2>
                                                <h6 class="text-xs opacity-95">Total ulasan : 100</h6>
                                          </div>
                                          <div class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                                                      <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                </svg>
                                                <h6 class="mr-1 text-black text-base">5</h6>
                                                <input type="range" maxlength="100" value="20">
                                          </div>
                                          <div class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                                                      <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                </svg>
                                                <h6 class="mr-1 text-black text-base">4</h6>
                                                <input type="range" maxlength="100" value="65">
                                          </div>
                                          <div class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                                                      <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                </svg>
                                                <h6 class="mr-1 text-black text-base">3</h6>
                                                <input type="range" maxlength="100" value="5">
                                          </div>
                                          <div class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                                                      <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                </svg>
                                                <h6 class="mr-1 text-black text-base">2</h6>
                                                <input type="range" maxlength="100" value="10">
                                          </div>
                                          <div class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                                                      <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                </svg>
                                                <h6 class="mr-1 text-black text-base">1</h6>
                                                <input type="range" maxlength="100" value="0">
                                          </div>
                                    </div>
                                    {{-- img & video --}}
                                    <div class="w-full">
                                          <img src="" alt="">
                                    </div>
                                    {{-- semua ulasan --}}
                                    <div class="w-full mt-2">
                                          <div class="w-full">
                                                <div class="relative flex items-center">
                                                      <img src="{{ asset('img/profile_default.png') }}" class="w-10 h-10 mr-2 rounded-full" alt="">
                                                      <div class="flex flex-col">
                                                            <p class="text-sm lg:text-base">Nama</p>
                                                            <div class="flex">
                                                                  <div class="mr-1">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                                                                              <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                                        </svg>
                                                                  </div>
                                                                  <div class="mr-1">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                                                                              <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                                        </svg>
                                                                  </div>
                                                                  <div class="mr-1">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                                                                              <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                                        </svg>
                                                                  </div>
                                                                  <div class="mr-1">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                                                                              <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                                        </svg>
                                                                  </div>
                                                                  <div class="mr-1">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#ddd" class="w-4 h-4 mr-1">
                                                                              <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                                        </svg>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                      <p class="absolute bottom-0 right-0 text-xs lg:text-sm opacity-80">Tanggal dan waktu</p>
                                                </div>
                                                <div class="w-full pl-12">
                                                      <p class="text-xs text-justify text-black lg:text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus minus nostrum sint minima repudiandae maxime voluptatum. Adipisci quia optio numquam officia porro incidunt suscipit cum p <a href="" class="text-blue-500">selengkapmya....</a></p>
                                                </div>
                                                <div class="relative flex items-center">
                                                      <img src="{{ asset('img/profile_default.png') }}" class="w-10 h-10 mr-2 rounded-full" alt="">
                                                      <div class="flex flex-col">
                                                            <p class="text-sm lg:text-base">Nama</p>
                                                            <div class="flex">
                                                                  <div class="mr-1">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                                                                              <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                                        </svg>
                                                                  </div>
                                                                  <div class="mr-1">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                                                                              <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                                        </svg>
                                                                  </div>
                                                                  <div class="mr-1">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                                                                              <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                                        </svg>
                                                                  </div>
                                                                  <div class="mr-1">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                                                                              <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                                        </svg>
                                                                  </div>
                                                                  <div class="mr-1">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#ddd" class="w-4 h-4 mr-1">
                                                                              <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                                        </svg>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                      <p class="absolute bottom-0 right-0 text-xs lg:text-sm opacity-80">Tanggal dan waktu</p>
                                                </div>
                                                <div class="w-full pl-12">
                                                      <p class="text-xs text-justify text-black lg:text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus minus nostrum sint minima repudiandae maxime voluptatum. Adipisci quia optio numquam officia porro incidunt suscipit cum p <a href="" class="text-blue-500">selengkapmya....</a></p>
                                                </div>
                                                <div class="relative flex items-center">
                                                      <img src="{{ asset('img/profile_default.png') }}" class="w-10 h-10 mr-2 rounded-full" alt="">
                                                      <div class="flex flex-col">
                                                            <p class="text-sm lg:text-base">Nama</p>
                                                            <div class="flex">
                                                                  <div class="mr-1">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                                                                              <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                                        </svg>
                                                                  </div>
                                                                  <div class="mr-1">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                                                                              <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                                        </svg>
                                                                  </div>
                                                                  <div class="mr-1">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                                                                              <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                                        </svg>
                                                                  </div>
                                                                  <div class="mr-1">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                                                                              <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                                        </svg>
                                                                  </div>
                                                                  <div class="mr-1">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#ddd" class="w-4 h-4 mr-1">
                                                                              <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                                        </svg>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                      <p class="absolute bottom-0 right-0 text-xs lg:text-sm opacity-80">Tanggal dan waktu</p>
                                                </div>
                                                <div class="w-full pl-12">
                                                      <p class="text-xs text-justify text-black lg:text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus minus nostrum sint minima repudiandae maxime voluptatum. Adipisci quia optio numquam officia porro incidunt suscipit cum p <a href="" class="text-blue-500">selengkapmya....</a></p>
                                                </div>
                                                <div class="relative flex items-center">
                                                      <img src="{{ asset('img/profile_default.png') }}" class="w-10 h-10 mr-2 rounded-full" alt="">
                                                      <div class="flex flex-col">
                                                            <p class="text-sm lg:text-base">Nama</p>
                                                            <div class="flex">
                                                                  <div class="mr-1">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                                                                              <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                                        </svg>
                                                                  </div>
                                                                  <div class="mr-1">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                                                                              <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                                        </svg>
                                                                  </div>
                                                                  <div class="mr-1">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                                                                              <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                                        </svg>
                                                                  </div>
                                                                  <div class="mr-1">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                                                                              <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                                        </svg>
                                                                  </div>
                                                                  <div class="mr-1">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#ddd" class="w-4 h-4 mr-1">
                                                                              <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                                        </svg>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                      <p class="absolute bottom-0 right-0 text-xs lg:text-sm opacity-80">Tanggal dan waktu</p>
                                                </div>
                                                <div class="w-full pl-12">
                                                      <p class="text-xs text-justify text-black lg:text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus minus nostrum sint minima repudiandae maxime voluptatum. Adipisci quia optio numquam officia porro incidunt suscipit cum p <a href="" class="text-blue-500">selengkapmya....</a></p>
                                                </div>
                                                <div class="relative flex items-center">
                                                      <img src="{{ asset('img/profile_default.png') }}" class="w-10 h-10 mr-2 rounded-full" alt="">
                                                      <div class="flex flex-col">
                                                            <p class="text-sm lg:text-base">Nama</p>
                                                            <div class="flex">
                                                                  <div class="mr-1">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                                                                              <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                                        </svg>
                                                                  </div>
                                                                  <div class="mr-1">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                                                                              <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                                        </svg>
                                                                  </div>
                                                                  <div class="mr-1">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                                                                              <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                                        </svg>
                                                                  </div>
                                                                  <div class="mr-1">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                                                                              <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                                        </svg>
                                                                  </div>
                                                                  <div class="mr-1">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#ddd" class="w-4 h-4 mr-1">
                                                                              <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                                        </svg>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                      <p class="absolute bottom-0 right-0 text-xs lg:text-sm opacity-80">Tanggal dan waktu</p>
                                                </div>
                                                <div class="w-full pl-12">
                                                      <p class="text-xs text-justify text-black lg:text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus minus nostrum sint minima repudiandae maxime voluptatum. Adipisci quia optio numquam officia porro incidunt suscipit cum p <a href="" class="text-blue-500">selengkapmya....</a></p>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
      @endforeach
@endsection
