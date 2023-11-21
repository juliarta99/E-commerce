@extends('layouts.main')
@section('content')
      <div class="pt-32 lg:pt-24 pb-20">
            <div class="w-full min-h-screen">
                  @if (session()->has('success'))
                        <div class="w-auto p-2 px-2 mt-8 text-sm font-semibold text-center bg-green-500 rounded-t-md lg:mt-4 lg:text-base">{{ session('success') }}</div>
                  @endif
                  @if (session()->has('error'))
                        <div class="w-auto p-2 px-2 mt-8 text-sm font-semibold text-center bg-red-500 rounded-t-md lg:mt-4 lg:text-base">{{ session('error') }}</div>
                  @endif
                  <div class="fixed bottom-0 z-[9] flex flex-wrap w-full justify-center left-0 right-0 p-4 text-white bg-blue-500 rounded-t-md">
                        @guest
                              <a href="/login">
                                    <button class="p-4 h-full duration-500 h-100 bg-black rounded-md text-base xl:text-lg hover:text-black hover:bg-white hover:fill-black fill-white" type="submit">
                                          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 576 512">
                                                <path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96zM252 160c0 11 9 20 20 20h44v44c0 11 9 20 20 20s20-9 20-20V180h44c11 0 20-9 20-20s-9-20-20-20H356V96c0-11-9-20-20-20s-20 9-20 20v44H272c-11 0-20 9-20 20z"/>
                                          </svg>
                                    </button>
                              </a>
                        @endguest
                        @auth
                              @if (Auth::user()->is_toko == 1 && Auth::user()->toko->id == $product->toko->id )
                              <a href="/toko" class="mr-2">
                                    <button class="px-4 border-2 border-white duration-500 bg-black rounded-md text-base xl:text-lg hover:text-black hover:bg-white">Buka Toko</button>
                              </a>
                              @else
                              @if(count(Auth::user()->keranjangs->where('id_product', $product->id)) == 0)
                                    <form action="/keranjang/create" class="mr-4" method="post">
                                          @csrf
                                          <input type="hidden" name="id_product" value="{{ $product->id }}">
                                          <button class="p-4 h-full duration-500 h-100 bg-black rounded-md text-base xl:text-lg hover:text-black hover:bg-white hover:fill-black fill-white" type="submit">
                                          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 576 512">
                                                <path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96zM252 160c0 11 9 20 20 20h44v44c0 11 9 20 20 20s20-9 20-20V180h44c11 0 20-9 20-20s-9-20-20-20H356V96c0-11-9-20-20-20s-20 9-20 20v44H272c-11 0-20 9-20 20z"/>
                                          </svg>
                                          </button>
                                    </form>
                              @else
                                    <a href="/keranjang" class="mr-2">
                                          <button class="px-4 duration-500 border-2 border-white bg-black rounded-md text-base xl:text-lg hover:text-black hover:bg-white">Lihat keranjang</button>
                                    </a>
                              @endif
                              @endif
                        @endauth
                  </div>
                  <div class="sticky top-32 mb-4 lg:top-16 z-[1] w-full p-2 lg:p-3 shadow-md bg-white">
                        <div class="flex justify-center gap-3 text-black">
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
                                    <img src="{{ asset('storage/'. $product->image) }}" class="rounded-md mx-auto" alt="Product">
                                    <div class="absolute top-0 right-0 p-2 text-white bg-red-500 rounded-tr-sm">{{ $product->diskon }}%</div>
                              </div>
                              <div class="w-full mt-2">
                                    <h1 class="text-lg font-semibold text-center text-black md:text-xl lg:text-2xl">{{ $product->name }}</h1>
                              </div>
                        </div>
                        <div class="w-full px-2 md:w-1/2">
                              <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-3 h-3 mr-1">
                                          <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                    </svg>
                                    <p class="text-xs">{{ 
                                            $product->transaksis->avg('comment.rate') ? $product->transaksis->avg('comment.rate') : '0'
                                    }}</p>
                              </div>
                              <p class="text-xs">Terjual : {{ $product->terjual }}</p>
                              <p class="text-xs">Stok : {{ $product->stok }}</p>
                              <div class="w-full mt-2" id="deskripsi">
                                    <h1 class="text-base lg:text-lg">Deskripsi</h1>
                                    <div class="w-24 h-1 mb-2 bg-blue-500"></div>
                                    {{-- isi deskripsi --}}
                                    <h4 class="text-xs text-black">Berat satuan : {{ $product->berat }} g</h4>
                                    <h4 class="text-xs text-black">Kategori : {{ $product->kategori->name }}</h4>
                                    <div class="text-justify text-xs md:text-sm">
                                          <p>{!! $product->deskripsi !!}</p>
                                    </div>
                              </div>
                        </div>
                  </div>
                  <div class="w-full px-5 py-2 my-3 border-2 border-black rounded-md border-opacity-5">
                        <div class="flex items-center">
                              <div class="flex justify-between w-full items-center">
                                    <a href="{{ route('toko.show', $product->toko->slug) }}" class="flex items-center">
                                          <div class="mr-3">
                                                @if ($product->toko->image != null)
                                                      <img src="{{ asset('storage/'. $product->toko->image) }}" class="w-10 h-10 rounded-full object-cover lg:w-12 lg:h-12" alt="{{ $product->toko->name }}">
                                                @else
                                                      <img src="{{ asset('img/toko_default.jpg') }}" alt="Background Toko" class="w-10 h-10 rounded-full object-cover lg:w-12 lg:h-12">
                                                @endif
                                          </div>
                                          <div class="mr-2">
                                                <h6 class="text-sm">{{ $product->toko->name }}</h6>
                                                <div class="text-xs opacity-75">{{ $product->toko->city->city_name.' , '.$product->toko->city->province_name }}</div>
                                                <div class="flex items-center">
                                                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                                                            <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                      </svg>
                                                      <p class="text-sm">{{ $avgToko }}</p>
                                                </div>
                                          </div>
                                    </a>
                                    @guest
                                          <a href="/login">
                                                <button class="px-4 py-2 bg-blue-500 text-sm rounded-md">Tambah ke favorit</button>
                                          </a>
                                    @endguest
                                    @auth
                                          @if (Auth::user()->is_toko == 1)
                                          @if ( Auth::user()->toko->id == $product->toko->id )
                                                <a href="/toko">
                                                      <button class="px-4 py-2 bg-blue-500 text-sm rounded-md">Lihat Toko</button>
                                                </a>
                                          @endif
                                          @else
                                          @if (count(Auth::user()->favorits->where('id_toko', $product->toko->id)) == 1)
                                                <form action="/favorit/delete" method="post" class="">
                                                      @csrf
                                                      @method('delete')
                                                      <input type="hidden" name="id_favorit" value="{{ Auth::user()->favorits->where('id_toko', $product->toko->id)->first()->id }}">
                                                      <button class="bg-red-500 p-2 rounded-md text-sm" type="submit">Hapus dari favorit</button>
                                                </form>
                                          @else
                                                <form action="/favorit/create" method="post" class="">
                                                      @csrf
                                                      <input type="hidden" name="id_toko" value="{{ $product->toko->id }}">
                                                      <button class="bg-blue-500 p-2 rounded-md text-sm" type="submit">Tambah ke favorit</button>
                                                </form>
                                          @endif
                                          @endif
                                    @endauth
                              </div>
                        </div>
                  </div>
                  <div class="w-full px-2 mt-4" id="ulasan">
                        @if ($cComment > 0)
                              <h1 class="text-lg lg:text-xl">Ulasan</h1>
                              <div class="w-20 h-1 bg-blue-500"></div>
                              {{-- total ulasan --}}
                              <div class="w-full mt-2">
                                    <div class="flex items-center">
                                          <h6 class="text-sm lg:text-base opacity-95">Total ulasan : {{ $cComment }}</h6>
                                    </div>
                                    <div class="flex items-center">
                                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                                                <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                          </svg>
                                          <h6 class="mr-1 text-black text-xs lg:text-sm">5</h6>
                                          <input type="range" disabled max={{ $cComment ? $cComment : 1 }} value="{{ $c5 }}">
                                    </div>
                                    <div class="flex items-center">
                                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                                                <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                          </svg>
                                          <h6 class="mr-1 text-black text-xs lg:text-sm">4/4.5</h6>
                                          <input type="range" disabled max={{ $cComment ? $cComment : 1 }} value="{{ $c4 }}">
                                    </div>
                                    <div class="flex items-center">
                                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                                                <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                          </svg>
                                          <h6 class="mr-1 text-black text-xs lg:text-sm">3/3.5</h6>
                                          <input type="range" disabled max={{ $cComment ? $cComment : 1 }} value="{{ $c3 }}">
                                    </div>
                                    <div class="flex items-center">
                                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                                                <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                          </svg>
                                          <h6 class="mr-1 text-black text-xs lg:text-sm">2/2.5</h6>
                                          <input type="range" disabled max={{ $cComment ? $cComment : 1 }} value="{{ $c2 }}">
                                    </div>
                                    <div class="flex items-center">
                                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                                                <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                          </svg>
                                          <h6 class="mr-1 text-black text-xs lg:text-sm">1/1.5</h6>
                                          <input type="range" disabled max={{ $cComment ? $cComment : 1 }} value="{{ $c1 }}">
                                    </div>
                                    <div class="flex items-center">
                                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                                                <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                          </svg>
                                          <h6 class="mr-1 text-black text-xs lg:text-sm">0/0.5</h6>
                                          <input type="range" disabled max={{ $cComment ? $cComment : 1 }} value="{{ $c0 }}">
                                    </div>
                              </div>
                              {{-- semua ulasan --}}
                              <div class="w-full mt-5">
                                    @foreach ($product->transaksis as $transaksi)
                                          @if ($transaksi->comment)
                                                <div class="w-full">
                                                      <div class="flex justify-between">
                                                            <div class="flex items-center">
                                                                  <img src="{{ asset('storage/'.$transaksi->transaksi->user->image) }}" class="w-10 h-10 mr-2 rounded-full" alt="">
                                                                  <div class="flex flex-col">
                                                                        <p class="text-sm">{{ $transaksi->transaksi->user->name }}</p>
                                                                        <div class="flex">
                                                                              <div class="mr-1">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                                                                                          <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                                                    </svg>
                                                                              </div>
                                                                              <h6 class="mr-1 text-black text-xs lg:text-sm">{{ $transaksi->comment->rate }}</h6>
                                                                        </div>
                                                                  </div>
                                                            </div>
                                                            <div class="">
                                                                  @auth
                                                                        @if ($transaksi->transaksi->user->id == Auth::user()->id)
                                                                              <div class="flex gap-3 justify-end">
                                                                                    <a href="{{ route('comment.edit', $transaksi->comment->id) }}">
                                                                                          <svg xmlns="http://www.w3.org/2000/svg" class="fill-yellow-500 w-4 h-4" viewBox="0 0 512 512"><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg>
                                                                                    </a>
                                                                                    <form action="{{ route('comment.delete', $transaksi->comment->id) }}" onsubmit="return confirm('Apakah anda yakin menghapus ulasan ini?')" method="post">
                                                                                          @csrf
                                                                                          <button type="submit">
                                                                                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-red-500 w-4 h-4" viewBox="0 0 448 512"><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                                                                                          </button>
                                                                                    </form>
                                                                              </div>
                                                                        @endif
                                                                  @endauth
                                                                  @if ($transaksi->comment->created_at != $transaksi->comment->updated_at)
                                                                        <p class="text-xs lg:text-sm opacity-80 text-end">(edited)</p>
                                                                  @endif
                                                                  <p class="text-xs lg:text-sm opacity-80 text-end">{{ date('j F Y, H:i',strtotime($transaksi->comment->created_at)) }}</p>
                                                            </div>
                                                      </div>
                                                      <div class="w-full pl-12">
                                                            @if ($transaksi->comment->image)
                                                                  <a href={{ asset('storage/'.$transaksi->comment->image) }} data-fancybox data-caption="By {{ $transaksi->transaksi->user->name }}">
                                                                        <img src="{{ asset('storage/'.$transaksi->comment->image) }}" class="max-w-xs max-h-36 mt-2 rounded-md hover:scale-95 transition-all object-cover" alt="">
                                                                  </a>
                                                            @endif
                                                            <p class="text-xs text-justify text-black lg:text-sm">{{ $transaksi->comment->body }}</p>
                                                      </div>
                                                </div>
                                          @endif
                                    @endforeach
                              </div>
                        @else
                              <p class="text-center text-sm lg:text-base text-gray-800 mt-16">Belum ada ulasan</p>
                        @endif
                  </div>
            </div>
      </div>
@endsection
