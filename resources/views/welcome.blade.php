@extends('layouts.main')
@section('content')
      <div class="pb-10 px-9 pt-36 lg:pt-24">
            <div class="w-full">
                  <div class="w-full">
                        <div class="flex flex-wrap">
                              <img src="img/banner-e-commerce.png" class="w-full h-32 rounded-md md:h-40 lg:h-52 xl:h-64" alt="ImageScroll">
                        </div>
                  </div>
                  <div class="w-full mt-5">
                        <h1>Product</h1>
                        <div class="flex flex-wrap">
                              @foreach ($products as $product)    
                                    <div class="w-full">
                                          <div class="w-1/2">
                                          <img src="https://source.unsplash.com/900x450/?{{ $product->kategori->name }}" class="rounded-md" alt="Product">
                                          </div>
                                          <div class="w-1/2">
                                                <h2>{{ $product->name }}</h2>
                                                <h5>{{ $product->harga }}</h5>
                                                <h5>{{ $product->harga_awal }}</h5>
                                                <h5>{{ $product->kategori->name }}</h5>
                                                <p>{{ $product->rate }}</p>
                                                <p>{{ $product->kabupaten }}, {{ $product->provinsi }}</p>
                                          </div>
                                    </div>
                              @endforeach
                        </div>
                  </div>
            </div>
      </div>
@endsection