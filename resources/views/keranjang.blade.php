@extends('layouts.main')
@section('content')
<div class="pt-32 pb-10 px-9 lg:pt-24">
  <div class="w-full">
      <form action="keranjang/delete" method="post">
      @csrf
      @method('delete')
      <h1 class="text-md lg:text-lg xl:text-xl font-bold">Keranjang</h1>
      @if (count($keranjangs) == 0)
            <p class="text-sm lg:text-md">Belum ada product dalam keranjang</p>
      @else
            <div class="w-full mt-3">
                  <div class="w-full items-center flex">
                        <div class="mr-2">
                              <input type="checkbox" name="checkAllProduct" onclick="checkAll()" id="checkAllProduct" class="">
                        </div>
                        <button type="submit" class="p-2 rounded-md bg-blue-500 text-white font-bold text-sm lg:text-md">Hapus Keranjang</button>
                  </div>
                  @if (session()->has('succes'))
                        <div class="px-4 py-2 bg-green-500 w-auto mx-auto my-2 rounded-md">{{ session('succes') }}</div>
                  @endif
                  @if (session()->has('error'))
                        <div class="px-4 py-2 bg-red-500 w-auto mx-auto my-2 rounded-md">{{ session('error') }}</div>
                  @endif
                  @error('checkProducts')
                        <div class="px-4 py-2 bg-red-500 w-auto mx-auto my-2 rounded-md">{{ $message }}</div>
                  @enderror
                  <div class="grid lg:grid-cols-5 sm:grid-cols-2 grid-cols-1 gap-y-2 gap-x-4">
                    @foreach ($keranjangs as $keranjang)
                    <div class="w-full mb-4">
                                <label for="checkProduct">
                                    <input type="checkbox" name="checkProducts[]" id="checkProduct" class="w-4 h-4 mb-2 checkProduct" value="{{ $keranjang->id }}">
                                    <div class="flex flex-wrap items-center w-full p-4 mb-4 bg-white shadow-md">
                                          <div class="w-full md:w-1/2 lg:w-full">
                                                <div class="relative">
                                                      @if ($keranjang->product->image != null)
                                                        <img src="{{ asset('storage/'. $keranjang->product->image) }}" class="rounded-md" alt="Product">
                                                      @else
                                                        <img src="https://source.unsplash.com/900x450/?{{ $keranjang->product->kategori->name }}" class="rounded-md" alt="Product">
                                                      @endif
                                                      <p class="absolute top-0 left-0 p-2 text-xs text-white bg-black lg:text-sm rounded-tl-md">{{ $keranjang->product->kategori->name }}</p>
                                                      <p class="absolute top-0 right-0 p-2 text-xs text-white bg-red-500 rounded-tr-md lg:text-sm">{{$keranjang->product->diskon}}%</p>
                                                </div>
                                          </div>
                                          <div class="w-full px-4 md:w-1/2 lg:w-full">
                                                <h2 class="text-sm font-bold text-black lg:text-md">{{ $keranjang->product->name }}</h2>
                                                <h5 class="text-sm font-semibold text-blue-500 lg:text-md">@currency($keranjang->product->harga)</h5>
                                                <h5 class="text-xs line-through opacity-75 lg:text-sm">@currency($keranjang->product->harga_awal)</h5>
                                                <div class="flex items-center">
                                                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                                                            <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                      </svg>
                                                      <p class="text-xs">{{ $keranjang->product->rate }}</p>
                                                </div>
                                                <p class="text-xs lg:text-sm">Terjual {{ $keranjang->product->terjual }}</p>
                                          </div>
                                    </div>
                                </label>
                    </div>
                    @endforeach
                  </div>
            </div>
      @endif
      </form>
      </div>
</div>
@endsection
