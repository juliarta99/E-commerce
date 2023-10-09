@extends('layouts.main')
@section('content')
@foreach (Auth::user()->toko()->get() as $toko)
<div class="pt-24 pb-10 px-9 lg:pt-16">
    <div class="w-full">
        <div class="max-w-2xl mx-auto shadow-lg">
            {{-- session message --}}
            @if (session()->has('error'))
                <div class="w-auto p-2 px-2 mt-8 text-sm font-semibold text-center bg-red-500 rounded-t-md lg:mt-4 lg:text-base">{{ session('error') }}</div>
            @endif
            @if (session()->has('success'))
                <div class="w-auto p-2 px-2 mt-8 text-sm font-semibold text-center bg-green-500 rounded-t-md lg:mt-4 lg:text-base">{{ session('success') }}</div>
            @endif
            {{-- profile start --}}
                <div class="flex flex-wrap">
                    <div class="w-full">
                        <div class="relative group">
                            @if ($toko->backImage != null)
                                <img src="{{ 'storage/' . $toko->backImage }}" alt="Background Toko" class="w-full h-52 object-cover">
                            @else
                                <img src="{{ asset('img/back_toko.jpg') }}" alt="Background Toko" class="w-full h-52 object-cover">
                            @endif
                            {{-- edit back toko --}}
                            <a href="/toko/{{ $toko->slug }}/editBack">
                                <div class="absolute hidden top-6 lg:top-4 group-hover:block right-2 fill-white hover:fill-black">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6">
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
                                    <img src="{{ asset('storage/'. $toko->image) }}" class="object-cover w-10 h-10 rounded-full" alt="{{ $toko->name }}">
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
                                <h3 class="ml-1 text-xs lg:text-sm">{{ $toko->alamat }}</h3>
                            </div>
                            <p class="text-xs text-justify opacity-60">{{ $toko->tentang }}</p>
                        </div>
                    </div>
                </div>
            {{-- profile end  --}}
            {{-- product toko --}}
            <div class="w-full px-4 py-2 pb-4">
                <h1 class="font-bold text-base lg:text-lg">Product</h1>
                <div class="w-16 h-1 bg-blue-500 lg:w-20"></div>
                <div class="flex flex-wrap">

                    @foreach ($products as $product)
                    <div class="w-full mb-4 lg:p-2 xl:w-1/3 lg:w-1/2">
                          <a href="/toko/product/{{ $product->slug }}">
                                <div class="flex flex-wrap items-center w-full p-4 mb-4 bg-white shadow-md">
                                      <div class="w-full md:w-1/2 lg:w-full">
                                            <div class="relative">
                                                    <img src="{{ asset('storage/'. $product->image) }}" class="rounded-md h-52 object-cover w-full" alt="Product">
                                                    <p class="absolute top-0 left-0 p-2 text-xs text-white bg-black rounded-tl-md">{{ $product->kategori->name }}</p>
                                                    <p class="absolute top-0 right-0 p-2 text-xs text-white bg-red-500 rounded-tr-md">{{$product->diskon}}%</p>
                                            </div>
                                      </div>
                                      <div class="w-full px-4 md:w-1/2 lg:w-full mt-2">
                                            <h2 class="text-xs font-bold text-black lg:text-sm">{{ Str::limit($product->name, 15) }}</h2>
                                            <h5 class="text-xs font-semibold text-blue-500 lg:text-sm">@currency($product->harga)</h5>
                                            <h5 class="text-xs line-through opacity-75">@currency($product->harga_awal)</h5>
                                            <div class="flex items-center">
                                                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-3 h-3 mr-1">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                  </svg>
                                                  <p class="text-xs">{{ $product->rate }}</p>
                                            </div>
                                            <p class="text-xs">Terjual {{ $product->terjual }}</p>
                                            <div class="flex flex-wrap mt-2">
                                                <a href="/toko/product/{{ $product->slug }}/edit">
                                                      <div class="p-2 rounded-md mr-2 bg-yellow-500">
                                                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                                                                  <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                            </svg>
                                                      </div>
                                                </a>
                                                <form action="/toko/product/{{ $product->slug }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit">
                                                    <div class="p-2 rounded-md bg-red-500">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                        </svg>
                                                    </div>
                                                    </button>
                                                </form>
                                            </div>
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
@endforeach
@endsection
