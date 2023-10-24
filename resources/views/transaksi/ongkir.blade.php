<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout | Pilih Lokasi</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
</head>
<body class="font-poppins">
    <div class="container mx-auto py-5 min-h-screen">
        <form action="{{ route('checkout.bayar') }}" onsubmit="return confirm('Apakah anda yakin ingin melanjutkan transaksi ini?')" method="post">
        @csrf
            <div class="">
                <h1 class="text-lg md:text-xl lg:text-2xl font-bold">Pilih Service Pengiriman</h1>
                <p>Kurir : {{ $ongkirs[0]['results']['code'] }}</p>
                <div class="flex-col">
                    @php
                        $prevToko = null;
                    @endphp
                    @foreach (Auth::user()->keranjangs()->whereHas('product.toko', function ($query) {
                        $query->orderBy('name', 'ASC');
                    })->get() as $keranjang)
                        <div class="bg-gray-50 p-4 items-center rounded-md  
                            @if ($keranjang->product->toko->id != $prevToko)
                                mt-3
                            @endif">
                            @if ($keranjang->product->toko->id != $prevToko)
                                <div class="flex gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000" class="w-4 h-4 sm:w-5 sm:h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
                                    </svg>
                                    <p>{{ $keranjang->product->toko->name }}</p>
                                </div>
                                <div class="text-xs opacity-75 mb-2">{{ $keranjang->product->toko->city->city_name.' , '.$keranjang->product->toko->city->province_name }}</div>
                            @endif

                            @php
                                $ongkir = $ongkirs->where('id_toko', $keranjang->product->toko->id)->first();
                            @endphp
                            @if ($ongkir)
                                @if ($ongkir['id_toko'] != $prevToko)
                                    <p class="text-sm font-bold mb-1">Pilih Pengiriman</p>
                                    <input type="hidden" name="tujuan" value={{ $alamat->id }}>
                                    <input type="hidden" name="kurir" value={{ $ongkir['results']['code'] }}>
                                    <div class="flex gap-2">
                                        @foreach ($ongkir['results']['costs'] as $cost)
                                            <input required type="radio" class="hidden" name="ongkir-{{ $ongkir['id_toko'] }}" id="ongkir-{{ $ongkir['id_toko']. '-' .$cost['service'] }}" value="{{ json_encode($cost) }}">
                                            <label for="ongkir-{{ $ongkir['id_toko']. '-' .$cost['service'] }}" class="bg-slate-200 p-2 rounded-md cursor-pointer">
                                                <h3>{{ $cost['service'] }}</h3>
                                                <p class="text-sm opacity-75">{{ $cost['description'] }}</p>
                                                <p class="text-sm font-bold">@currency($cost['cost'][0]['value'])</p>
                                                <p class="text-sm">Estimasi : {{ $cost['cost'][0]['etd'] }} (hari)</p>
                                            </label>
                                        @endforeach
                                    </div>
                                    <p class="font-bold text-sm mt-2">Detail Pembelian</p>
                                @endif
                            @endif
                            @php
                                $prevToko = $keranjang->product->toko->id
                            @endphp

                            <div class="flex justify-between relative">
                                <div class="">
                                    <img src="{{ asset('storage/'.$keranjang->product->image) }}" class="w-20 h-20 object-cover" alt="">
                                    <p class="text-xs">@currency($keranjang->product->harga)</p>
                                    <h3>{{ $keranjang->product->name }}</h3>
                                </div>
                                <div class="">
                                    <p class="text-end text-xs">{{ $keranjang->kuantitas }}x</p>
                                    <p class="font-bold">@currency($keranjang->kuantitas * $keranjang->product->harga)</p>
                                </div>
                                <p class="absolute bg-red-500 p-2 top-0 left-0 text-xs md:text-md">{{ $keranjang->product->diskon }}%</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="mt-2 text-xs md:text-sm px-2 py-1 md:px-4 md:py-2 border-2 hover:border-blue-500 hover:bg-white bg-blue-500 transition-all rounded-lg">Lanjut</button>
            </div>
        </form>
    </div>
    @include('layouts.footer')
</body>
</html>