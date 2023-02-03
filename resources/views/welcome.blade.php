@extends('layouts.main')
@section('content')
      <div class="pb-10 px-9 pt-36 lg:pt-24">
            <div class="w-full">
                  <div class="w-full">
                        <div class="flex flex-wrap">
                              <img src="img/banner-e-commerce.png" class="w-full h-32 rounded-md md:h-40 lg:h-52 xl:h-64" alt="ImageScroll">
                        </div>
                  </div>
                  <div class="w-full mt-8">
                        <a href="/products">
                              <h1 class="text-2xl font-bold text-black lg:text-3xl xl:text-4xl">Product</h1>
                        </a>
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
                                                                  <p class="absolute top-0 left-0 p-2 text-sm text-white bg-black rounded-tl-md lg:text-md">{{ $product->kategori->name }}</p>
                                                                  <p class="absolute top-0 right-0 p-2 text-sm text-white bg-red-500 rounded-tr-md lg:text-md">{{$product->diskon}}%</p>
                                                            </div>
                                                      </div>
                                                      <div class="w-full px-4 md:w-1/2 lg:w-full">
                                                            <h2 class="text-lg font-bold text-black lg:text-xl xl:text-2xl">{{ $product->name }}</h2>
                                                            <h5 class="text-lg font-semibold text-blue-500 lg:text-xl xl:text-2xl">@currency($product->harga)</h5>
                                                            <h5 class="text-sm line-through opacity-75 lg:text-md">@currency($product->harga_awal)</h5>
                                                            <div class="flex items-center">
                                                                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                                  </svg> 
                                                                  <p class="text-sm">{{ $product->rate }}</p>
                                                            </div>
                                                            <div class="flex items-center">
                                                                  <div class="flex items-center">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                                                                              <path fill-rule="evenodd" d="M11.54 22.351l.07.04.028.016a.76.76 0 00.723 0l.028-.015.071-.041a16.975 16.975 0 001.144-.742 19.58 19.58 0 002.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 00-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 002.682 2.282 16.975 16.975 0 001.145.742zM12 13.5a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                                                                        </svg>   
                                                                        <p class="text-sm lg:text-md">{{ $product->kabupaten }}, {{ $product->provinsi }}</p>
                                                                  </div>
                                                                  <p class="pl-2 ml-2 text-sm border-l-2 border-blue-500 lg:text-md">Terjual {{ $product->terjual }}</p>
                                                            </div>
                                                      </div>
                                                </div>
                                          </a>
                                    </div>
                              @endforeach
                        </div>
                  </div>
            </div>
      </div>
@endsection