@extends('layouts.main')
@section('content')
      <div class="pt-24 pb-10 px-9 lg:pt-16">
      <div class="w-full">
            <div class="max-w-2xl mx-auto shadow-lg">
                  {{-- session message --}}
                  {{-- profile start --}}  
                  <div class="flex flex-wrap">
                        <div class="w-full">
                              <div class="relative group">
                              @if ($toko->backImage != null)
                                    <img src="{{ 'storage/' . $toko->backImage }}" alt="Background Toko" class="w-full h-auto">
                              @else    
                                    <img src="{{ asset('img/back_toko.jpg') }}" alt="Background Toko" class="w-full">
                              @endif
                              </div>
                        </div>
                        <div class="w-full px-4 pt-4 pb-2">
                              <div class="flex items-center justify-between w-full ">
                              <div class="flex items-center w-full">
                                    @if ($toko->image != null)
                                          <img src="storage/{{ $toko->image }}" class="w-10 h-10 rounded-full" alt="{{ $toko->name }}">
                                    @else
                                          <img src="{{ asset('img/toko_default.jpg') }}" alt="Background Toko" class="w-10 h-10 rounded-full">
                                    @endif
                                    <div class="ml-2">
                                          <h1 class="text-sm lg:text-md">{{ $toko->name }}</h1>
                                          <div class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                                                      <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                </svg> 
                                                <p class="text-sm lg:text-md">{{ $toko->rate }}</p>
                                          </div>
                                    </div>
                              </div>
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
                  {{-- profile end  --}}
                  {{-- product toko --}}
                  <div class="w-full px-4 py-2 pb-4">
                        <h1 class="font-bold text-md lg:text-lg">Product</h1>
                        <div class="w-16 h-1 bg-blue-500 lg:w-20"></div>
                        <div class="flex flex-wrap">
                              @foreach ($products as $product)    
                              <div class="w-full mb-4 lg:p-2 xl:w-1/3 lg:w-1/2">
                                    <a href="/product/{{ $product->slug }}">
                                          <div class="flex flex-wrap items-center w-full p-4 mb-4 bg-white shadow-md">
                                                <div class="w-full md:w-1/2 lg:w-full">
                                                      <div class="relative">
                                                            @if ($product->image != null)
                                                            <img src="storage/{{ $product->kategori->name }}" class="rounded-md" alt="Product">
                                                            @else
                                                            <img src="https://source.unsplash.com/900x450/?{{ $product->kategori->name }}" class="rounded-md" alt="Product">
                                                            @endif
                                                            <p class="absolute top-0 left-0 p-2 text-xs text-white bg-black lg:text-sm rounded-tl-md">{{ $product->kategori->name }}</p>
                                                            <p class="absolute top-0 right-0 p-2 text-xs text-white bg-red-500 rounded-tr-md lg:text-sm">{{$product->diskon}}%</p>
                                                      </div>
                                                </div>
                                                <div class="w-full px-4 md:w-1/2 lg:w-full">
                                                      <h2 class="text-sm font-bold text-black lg:text-md">{{ $product->name }}</h2>
                                                      <h5 class="text-sm font-semibold text-blue-500 lg:text-md">@currency($product->harga)</h5>
                                                      <h5 class="text-xs line-through opacity-75 lg:text-sm">@currency($product->harga_awal)</h5>
                                                      <div class="flex items-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                                                                  <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                            </svg> 
                                                            <p class="text-xs">{{ $product->rate }}</p>
                                                      </div>
                                                      <p class="text-xs lg:text-sm">Terjual {{ $product->terjual }}</p>
                                                </div>
                                          </div>
                                    </a>
                              </div>
                              @endforeach    
                        </div>
                        </div>
                  </div>
                  {{-- product toko end--}}
            </div>
      </div>
      </div>
@endsection