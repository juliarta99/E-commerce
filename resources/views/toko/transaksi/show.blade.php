@extends('layouts.main')
@section('content')
<div class="pt-32 pb-10 px-2 lg:pt-24">
    <div class="w-full">
        @if (session()->has('error'))
            <div class="w-auto p-2 px-2 mt-8 text-sm font-semibold text-center bg-red-500 rounded-t-md lg:mt-4 lg:text-base">{{ session('error') }}</div>
        @endif
        @if (session()->has('success'))
            <div class="w-auto p-2 px-2 mt-8 text-sm font-semibold text-center bg-green-500 rounded-t-md lg:mt-4 lg:text-base">{{ session('success') }}</div>
        @endif
        @if ($delivery->transaksi->status == 'success' && !$delivery->no_resi)
            <h1 class="text-base lg:text-lg font-bold">Add Resi Delivery</h1>
            <p class="text-sm text-red-500">Please include delivery receipt number!</p>
            <form action="{{ route('toko.delivery.resi', $delivery->id) }}" class="mb-10 mt-2" method="POST">
                @csrf
                @method('put')
                <label class="text-sm text-black lg:text-base" for="no_resi">No. Resi</label>
                <input required class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-base @error('no_resi') border-2 border-red-500 @enderror" type="text" name="no_resi" id="no_resi" value="{{ old('no_resi') }}">
                @error('no_resi')
                    <div class="w-full text-sm text-red-500 lg:text-base">{{ $message }}</div>
                @enderror
                <button type="submit" class="w-auto p-2 px-4 mx-auto mt-3 text-xs text-white bg-blue-500 rounded-md sm:text-sm">Simpan</button>
            </form>
        @endif
        <h1 class="text-base lg:text-lg font-bold mb-2">Detail Transaction and Delivery</h1>
        @if ($delivery->no_resi)
            <p>No. Resi : {{ $delivery->no_resi }}</p>
        @endif
        <p>Tujuan : {{ $delivery->destination_detail }}, {{ $delivery->destination_city }}, {{ $delivery->destination_province }}</p>
        @if ($delivery->catatan)
            <p>Catatan : {{ $delivery->catatan }}</p>
        @endif
        <p>Kurir : <span class="uppercase">{{ $delivery->kurir }}</span></p>
        <p>Transaction : <span class="capitalize p-2 rounded-full {{ $delivery->transaksi->status == 'success' ? 'bg-green-500' : ($delivery->transaksi->status == 'cancel' ? 'bg-red-500' : 'bg-yellow-500') }}">{{ $delivery->transaksi->status }}</span>
            @if ($delivery->transaksi->date_done)
                ({{ date('d F Y, h:i:s A', strtotime($delivery->transaksi->date_done)) }})
            @endif
        </p>
        <div class="mt-5">
            <p class="font-bold">Delivery</p>
            <div class="w-full  {{ $delivery->status == 'success' ? 'bg-green-500' : ($delivery->status == 'cancel' ? 'bg-red-500' : 'bg-yellow-500') }} p-2 rounded-md flex justify-between">
                <div class="">
                    <h3>{{ $delivery->service }}</h3>
                    <p class="text-sm opacity-75 capitalize">status : {{ $delivery->status }}</p>
                    @if ($delivery->no_resi)
                        <a href="{{ route('delivery.resi', $delivery->no_resi) }}" class="text-sm text-white">Lihat detail</a>
                    @endif
                </div>
                <div class="text-end">
                    <p class="text-sm font-bold">@currency($delivery->cost)</p>
                    <p class="text-sm">Estimasi : {{ $delivery->estimation }} (hari)</p>
                </div>
            </div>
        </div>
        <p class="text-base font-bold mt-3">Detail Transaction</p>
        @foreach ($delivery->transaksi->details as $detail)
            <div class="bg-gray-50 text-black p-4 items-center rounded-md">
                <div class="flex justify-between relative">
                    <div class="">
                        @if ($detail->product->show)
                            <a href="{{ route('dashboard.product.show', $detail->product->slug) }}">
                        @endif
                                <img src="{{ asset('storage/'.$detail->product->image) }}" class="w-20 h-20 object-cover" alt="">
                                <p class="text-xs">@currency($detail->harga)</p>
                                <h3>{{ $detail->product_name }}</h3>
                            @if (!$detail->product->show)
                                <p class="text-xs text-red-500">Product tidak dijual lagi!</p>
                            @endif
                        @if ($detail->product->show)
                            </a>
                        @endif
                    </div>
                    <div class="">
                        <p class="text-end text-xs">{{ $detail->kuantitas }}x</p>
                        <p class="font-bold">@currency($detail->kuantitas * $detail->harga)</p>
                    </div>
                    <p class="absolute bg-red-500 p-2 top-0 left-0 text-xs md:text-md">{{ floor(($detail->harga_awal - $detail->harga) / $detail->harga_awal * 100) }}%</p>
                </div>
            </div>
        @endforeach
        <div class="mt-5">
            <p class="font-bold">Total : @currency($delivery->transaksi->details->sum(function ($detail) {
                return $detail->harga * $detail->kuantitas;
            }))</p>
        </div>
    </div>
</div>
@endsection