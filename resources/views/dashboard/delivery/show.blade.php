@extends('dashboard.layouts.main')
@section('content')
<h1 class="text-lg md:text-xl lg:text-2xl font-bold">Pengiriman {{ $delivery->origin_city }} to {{ $delivery->destination_city }}</h1>
<div class="flex gap-2 mt-3">
    <div class="w-full  {{ $delivery->status == 'success' ? 'bg-green-500' : ($delivery->status == 'cancel' ? 'bg-red-500' : 'bg-yellow-500') }} p-2 rounded-md flex justify-between">
        <div class="">
            <h3>{{ $delivery->service }}</h3>
            <p class="text-sm opacity-75 capitalize">status : {{ $delivery->status }}</p>
        </div>
        <div class="text-end">
            <p class="text-sm font-bold">@currency($delivery->cost)</p>
            <p class="text-sm">Estimasi : {{ $delivery->estimation }} (hari)</p>
        </div>
    </div>
</div>
<div class="my-5">
    <div class="flex gap-1">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff" class="w-4 h-4 sm:w-5 sm:h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
        </svg>
        <p>{{ $delivery->transaksi->details[0]->product->toko->name }}</p>
    </div>
    <div class="text-xs opacity-75 mb-2">{{ $delivery->transaksi->details[0]->product->toko->city->city_name.' , '.$delivery->transaksi->details[0]->product->toko->city->province_name }}</div>
</div>
@foreach ($delivery->transaksi->details as $detail)
    <div class="bg-gray-50 text-black p-4 items-center rounded-md mt-3">
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
@endsection