@extends('layouts.main')
@section('content')
<div class="pt-32 lg:pt-24">
  <div class="w-full min-h-screen">
      <form action="" onsubmit="return confirm('Apakah anda yakin?')" method="post" id="formKeranjang">
      @csrf
      @method('put')
      <h1 class="text-base lg:text-lg xl:text-xl font-bold">Keranjang</h1>
            @if (session()->has('success'))
                  <div class="px-4 py-2 bg-green-500 w-auto mx-auto my-2 rounded-md">{{ session('success') }}</div>
            @endif
            @if (session()->has('error'))
                  <div class="px-4 py-2 bg-red-500 w-auto mx-auto my-2 rounded-md">{{ session('error') }}</div>
            @endif
      @if (count($keranjangs) == 0)
            <p class="text-sm lg:text-base">Belum ada product dalam keranjang</p>
      @else
      <div class="fixed bottom-0 z-[9] flex flex-wrap justify-between items-center w-full left-0 right-0 p-4 lg:px-16 xl:px-20 2xl:px-24 text-white bg-blue-500 rounded-t-md">
            <p class="text-sm lg:text-base font-semibold">Total : @currency($total)</p>
            <div class="">
                  <button onclick="setActionKeranjang('/keranjang/update', 'put')" type="button" class="px-4 duration-500 border-2 border-white rounded-md text-base xl:text-lg hover:text-black hover:bg-white">Perbarui Keranjang</button>
                  <button onclick="setActionKeranjang('/checkout/lokasi', 'get')" type="button" class="px-4 duration-500 border-2 border-white rounded-md text-base xl:text-lg hover:text-black hover:bg-white ml-2">Checkout</button>
            </div>
      </div>
            <div class="w-full mt-3">
                  <div class="w-full">
                        <div class="mr-2">
                              <input type="checkbox" name="checkAllProduct" onclick="checkAll()" id="checkAllProduct" class="">
                              <label for="checkAllProduct">Check All</label>
                        </div>
                        <button type="button" onclick="setActionKeranjang('/keranjang/delete', 'delete')" class="p-2 rounded-md bg-blue-500 text-white font-bold text-sm lg:text-base">Hapus Keranjang</button>
                  </div>
                  @error('checkProducts')
                        <div class="px-4 py-2 bg-red-500 w-auto mx-auto my-2 rounded-md">{{ $message }}</div>
                  @enderror
                  <div class="grid lg:grid-cols-5 sm:grid-cols-2 grid-cols-1 gap-y-2 gap-x-4 mt-3">
                    @foreach ($keranjangs as $keranjang)
                    <div class="w-full mb-4 relative">
                              <input type="checkbox" name="checkProducts[]" id="checkProduct{{ $keranjang->id }}" class="w-4 h-4 mb-2 checkProduct absolute top-1 left-1" value="{{ $keranjang->id }}">
                              <div class="w-full p-4 pl-6 mb-4 bg-white shadow-md">
                                    <a href="/product/{{ $keranjang->product->slug }}">
                                          <div class="w-full">
                                                <div class="relative">
                                                      <img src="{{ asset('storage/'. $keranjang->product->image) }}" class="rounded-md h-52 object-cover w-full" alt="Product">
                                                      <p class="absolute top-0 left-0 p-2 text-xs text-white bg-black rounded-tl-md">{{ $keranjang->product->kategori->name }}</p>
                                                      <p class="absolute top-0 right-0 p-2 text-xs text-white bg-red-500 rounded-tr-md">{{$keranjang->product->diskon}}%</p>
                                                </div>
                                          </div>
                                    </a>
                                    <div class="w-full px-4 mt-2 text-center">
                                          <div class="flex items-center gap-1 justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000" class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
                                                </svg>
                                                <p class="text-xs">{{ $keranjang->product->toko->name }}</p>
                                          </div>
                                          <h2 class="text-sm font-bold text-black">{{ Str::limit($keranjang->product->name, 15) }}</h2>
                                          <p class="text-xs opacity-75">Stok : {{ $keranjang->product->stok }}</p>
                                          <h5 class="text-sm font-semibold text-blue-500" id="totalHarga{{ $keranjang->id }}">@currency($keranjang->product->harga * $keranjang->kuantitas)</h5>
                                    </div>
                                    <div class="flex items-center w-full justify-center my-1">
                                          <div class="px-2 rounded-md bg-black text-white text-sm lg:text-base mr-2 cursor-pointer" id="kuantitasMin" onclick="kuantitasDecrement({{ $keranjang->id }}, {{ $keranjang->product->harga }})">-</div>
                                          <input type="hidden" name="idKeranjangs[]" value="{{ $keranjang->id }}" class="w-1/4 text-black text-center rounded-md bg-gray-50">
                                          <input type="number" name="kuantitass[]" min="1" max="{{ $keranjang->product->stok }}" value="{{ $keranjang->kuantitas }}" id="kuantitas{{ $keranjang->id }}" class="w-1/4 text-black text-center rounded-md bg-gray-50">
                                          <div class="px-2 rounded-md bg-black text-white text-sm lg:text-base ml-2 cursor-pointer" id="kuantitasPlus" onclick="kuantitasIncrement({{ $keranjang->id }}, {{ $keranjang->product->harga }}, {{ $keranjang->product->stok }})">+</div>
                                    </div>
                              </div>
                    </div>
                    @endforeach
                  </div>
            </div>
      @endif
      </form>
      </div>
</div>
@endsection
