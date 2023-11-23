@extends('dashboard.layouts.main')
@section('content')
    <h1 class="text-xl lg:text-2xl font-bold mb-3">Product - {{ $product->name }}</h1>
    <p class="text-sm">Toko: {{ $product->toko->name }}</p>
    <p class="text-sm capitalize">Kategori: {{ $product->kategori->name }}</p>
    <p class="text-sm">Created on date: {{ date('d F Y, h:i:s A', strtotime($product->created_at)) }}</p>
    <a href="{{ asset('storage/'.$product->image) }}" data-fancybox data-caption="Image by {{ $product->toko->user->name }}">
        <img src="{{ asset('storage/'.$product->image) }}" class="max-h-44 rounded-md transition-all mt-2 hover:scale-95" alt="Image">
    </a>
    <p class="text-sm mt-2">Stok: {{ $product->stok }}</p>
    <p class="text-sm">Terjual: {{ $product->terjual }}</p>
    <p class="text-sm">Berat: {{ $product->berat }}g</p>
    <p class="text-sm">Harga Awal: @currency($product->harga_awal)</p>
    <p class="text-sm">Harga: @currency($product->harga)</p>
    <p class="text-sm">Potongan(diskon): @currency($product->potongan)({{ $product->diskon }}%)</p>
    <p class="text-xs lg:text-sm mt-2">{!! $product->deskripsi !!}</p>
@endsection