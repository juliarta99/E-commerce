@extends('layouts.main')
@section('content')
      <div class="pt-32 pb-10 px-9 lg:pt-24">
            <div class="w-full">
                  @if (session()->has('succes'))
                        <div class="w-auto p-2 px-2 mt-8 text-sm font-semibold text-center bg-green-500 rounded-t-md lg:mt-4 lg:text-md">{{ session('succes') }}</div>
                  @endif
                  @if (session()->has('sudahAda'))
                        <div class="w-auto p-2 px-2 mt-8 text-sm font-semibold text-center bg-red-500 rounded-t-md lg:mt-4 lg:text-md">{{ session('succes') }}</div>
                  @endif
                  <div class="fixed bottom-0 z-[9] flex flex-col w-auto p-4 text-white bg-blue-500 right-9 rounded-t-md">
                        <h1 class="text-sm lg:text-md xl:text-lg opacity-95">Harga : @currency($product->harga)</h1>
                        <h1 class="text-sm lg:text-md opacity-95">Potongan : @currency($product->harga_awal * 2 - $product->harga * 2)</h1>
                        <h1 class="text-md lg:text-lg xl:text-xl">Total : @currency(2 * $product->harga)</h1>
                        @if(count(Auth::user()->keranjang->where('id_product', $product->id)) == 0)
                        <form action="/keranjang/create" method="post" class="mx-auto">
                              @csrf
                              <input type="hidden" name="id_product" value="{{ $product->id }}">
                              <button class="px-4 py-1 mt-2 duration-500 bg-black rounded-md text-md xl:text-lg hover:text-black hover:bg-white" type="submit">+ Keranjang</button>
                        </form>
                        @else
                              @foreach (Auth::user()->keranjang->where('id_product', $product->id) as $keranjang)
                                    <a href="/keranjang">
                                          <button class="px-4 py-1 mt-2 duration-500 bg-black rounded-md text-md xl:text-lg hover:text-black hover:bg-white">Lihat keranjang</button>
                                    </a>
                              @endforeach
                        @endif
                        <a href="" class="mx-auto">
                              <button class="px-4 py-1 mt-2 duration-500 border-2 border-white rounded-md text-md xl:text-lg hover:text-black hover:bg-white">Beli</button>
                        </a>
                  </div>
                  <div class="sticky top-32 mb-4 lg:top-16 z-[1] w-full p-2 lg:p-3 shadow-md bg-white">
                        <div class="flex justify-center gap-3 text-black">
                              <a href="#deskripsi">
                                    <h4 class="text-sm text-black lg:text-md">Deskripsi</h4>
                              </a>
                              <a href="#ulasan">
                                    <h4 class="text-sm text-black lg:text-md">Ulasan</h4>
                              </a>
                        </div>
                  </div>
                  <div class="flex flex-wrap">
                        <div class="w-full px-2 md:w-1/2">
                              <div class="relative w-full">
                                    <img src="https://source.unsplash.com/900x450/?{{ $product->kategori->name }}" class="w-full rounded-sm" alt="{{ $product->name }}">
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
                                    <h4 class="text-xs text-black lg:text-md">Berat satuan : {{ $product->berat }} g</h4>
                                    <h4 class="text-xs text-black lg:text-md">Kategori : {{ $product->kategori->name }}</h4>
                                    <p class="text-sm text-justify">{!! $product->deskripsi !!}</p>
                              </div>
                        </div>
                  </div>
                  <div class="w-auto px-5 py-2 my-3 border-2 border-black rounded-md border-opacity-5">
                        <a href="/{{ $product->toko->slug }}">
                        
                              <div class="flex items-center">
                                    <div class="mr-3">
                                          @if ($product->toko->image != null)
                                                <img src="storage/{{ $product->toko->image }}" class="w-10 h-10 rounded-full lg:w-12 lg:h-12" alt="{{ $product->toko->name }}">
                                          @else
                                                <img src="{{ asset('img/toko_default.jpg') }}" alt="Background Toko" class="w-10 h-10 rounded-full lg:w-12 lg:h-12">
                                          @endif
                                    </div>
                                    <div class="w-full">
                                          <h6 class="text-sm lg:text-md">{{ $product->toko->name }}</h6>
                                          <div class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                                                      <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                </svg> 
                                                <p class="text-sm lg:text-md">{{ $product->toko->rate }}</p>
                                          </div>
                                    </div>
                              </div>
                        </a>
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
                                    <h6 class="mr-1 text-black text-md">5</h6>
                                    <input type="range" disabled maxlength="100" value="20">
                              </div>
                              <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                                          <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                    </svg> 
                                    <h6 class="mr-1 text-black text-md">4</h6>
                                    <input type="range" disabled maxlength="100" value="65">
                              </div>
                              <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                                          <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                    </svg> 
                                    <h6 class="mr-1 text-black text-md">3</h6>
                                    <input type="range" disabled maxlength="100" value="5">
                              </div>
                              <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                                          <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                    </svg> 
                                    <h6 class="mr-1 text-black text-md">2</h6>
                                    <input type="range" disabled maxlength="100" value="10">
                              </div>
                              <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                                          <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                    </svg> 
                                    <h6 class="mr-1 text-black text-md">1</h6>
                                    <input type="range" disabled maxlength="100" value="0">
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
                                                <p class="text-sm lg:text-md">Nama</p>
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
@endsection