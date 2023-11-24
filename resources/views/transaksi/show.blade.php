<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
</head>
@php
    use App\Models\Comment;
@endphp
<body class="font-poppins">
    <div class="container mx-auto py-5 min-h-screen">
            <div class="">
                <h1 class="text-lg md:text-xl lg:text-2xl font-bold">Transaksi {{ $transaksi->kd }}</h1>
                <p>Tujuan : {{ $transaksi->deliverys[0]->destination_detail }}, {{ $transaksi->deliverys[0]->destination_city }}, {{ $transaksi->deliverys[0]->destination_province }}</p>
                @if ($transaksi->deliverys[0]->catatan)
                    <p>Catatan : {{ $transaksi->deliverys[0]->catatan }}</p>
                @endif
                <p>Kurir : <span class="uppercase">{{ $transaksi->deliverys[0]->kurir }}</span></p>
                <p>Pembayaran : <span class="capitalize p-2 rounded-full {{ $transaksi->status == 'success' ? 'bg-green-500' : ($transaksi->status == 'cancel' ? 'bg-red-500' : 'bg-yellow-500') }}">{{ $transaksi->status }}</span> 
                    @if ($transaksi->date_done)
                        ({{ date('d F Y, h:i:s A', strtotime($transaksi->date_done)) }})
                    @endif
                </p>
                <div class="flex-col mt-5">
                    @php
                        $prevToko = null;
                    @endphp
                    @foreach ($transaksi->details as $detail)
                        <div class="bg-gray-50 p-4 items-center rounded-md  
                            @if ($detail->product->toko->id != $prevToko)
                                mt-3
                            @endif">
                            @if ($detail->product->toko->id != $prevToko)
                                <div class="flex gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000" class="w-4 h-4 sm:w-5 sm:h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
                                    </svg>
                                    <p>{{ $detail->product->toko->name }}</p>
                                </div>
                                <div class="text-xs opacity-75 mb-2">{{ $detail->product->toko->city->city_name.' , '.$detail->product->toko->city->province_name }}</div>
                            @endif

                            @php
                                $delivery = $transaksi->deliverys->where('id_toko', $detail->product->toko->id)->first();
                            @endphp
                                @if ($delivery->id_toko != $prevToko)
                                    <p class="text-sm font-bold mb-1">Pengiriman</p>
                                    <div class="flex gap-2">
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
                                    <p class="font-bold text-sm mt-2">Detail Pembelian</p>
                                @endif
                            @php
                                $prevToko = $detail->product->toko->id
                            @endphp

                            <div class="flex justify-between relative">
                                <div class="">
                                    @if ($detail->product->show)
                                        <a href="{{ route('product.single.show', $detail->product->slug) }}">
                                    @endif
                                            <img src="{{ asset('storage/'.$detail->product->image) }}" class="w-20 h-20 object-cover" alt="">
                                            <p class="text-xs">@currency($detail->harga)</p>
                                            <h3>{{ $detail->product_name }}</h3>
                                        @if (!$detail->product->show  || !$detail->product->approve)
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
                            @if ($delivery->status == 'success' && Comment::where('id_transaksi', $detail->id)->doesntExist())
                                <a href="{{ route('comment.show', $detail->id) }}">
                                    <button class="flex gap-3 my-2 text-xs md:text-sm px-2 py-1 md:px-4 md:py-2 border-2 hover:border-blue-500 hover:bg-white bg-blue-500 transition-all rounded-lg group">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-slate-100 group-hover:fill-black w-5 h-5" viewBox="0 0 640 512"><path d="M208 352c114.9 0 208-78.8 208-176S322.9 0 208 0S0 78.8 0 176c0 38.6 14.7 74.3 39.6 103.4c-3.5 9.4-8.7 17.7-14.2 24.7c-4.8 6.2-9.7 11-13.3 14.3c-1.8 1.6-3.3 2.9-4.3 3.7c-.5 .4-.9 .7-1.1 .8l-.2 .2 0 0 0 0C1 327.2-1.4 334.4 .8 340.9S9.1 352 16 352c21.8 0 43.8-5.6 62.1-12.5c9.2-3.5 17.8-7.4 25.3-11.4C134.1 343.3 169.8 352 208 352zM448 176c0 112.3-99.1 196.9-216.5 207C255.8 457.4 336.4 512 432 512c38.2 0 73.9-8.7 104.7-23.9c7.5 4 16 7.9 25.2 11.4c18.3 6.9 40.3 12.5 62.1 12.5c6.9 0 13.1-4.5 15.2-11.1c2.1-6.6-.2-13.8-5.8-17.9l0 0 0 0-.2-.2c-.2-.2-.6-.4-1.1-.8c-1-.8-2.5-2-4.3-3.7c-3.6-3.3-8.5-8.1-13.3-14.3c-5.5-7-10.7-15.4-14.2-24.7c24.9-29 39.6-64.7 39.6-103.4c0-92.8-84.9-168.9-192.6-175.5c.4 5.1 .6 10.3 .6 15.5z"/></svg>
                                        <p>Beri Ulasan</p>
                                    </button>
                                </a>
                            @else
                                @if ($delivery->status == 'success')
                                    <p class="text-blue-500 text-xs lg:text-sm">Ulasan telah diberikan!</p>
                                @endif
                            @endif
                        </div>
                    @endforeach
                </div>
                <div class="mt-5">
                    <p class="text-sm">Subtotal : @currency($transaksi->subtotal)</p>
                    <p class="text-sm">Total Beli : @currency($transaksi->total_beli)</p>
                    <p class="text-sm">Potongan Harga : @currency($transaksi->subtotal - $transaksi->total_beli)</p>
                    <p class="text-sm">Total Ongkir : @currency($transaksi->total_ongkir)</p>
                    <p class="font-bold">Total : @currency($transaksi->total_transaksi)</p>
                </div>
            </div>
            @if ($transaksi->status == 'pending')
                <button id="pay-button" class="mt-2 text-xs md:text-sm px-2 py-1 md:px-4 md:py-2 border-2 hover:border-blue-500 hover:bg-white bg-blue-500 transition-all rounded-lg">Bayar</button>
            @endif
    </div>
    <script type="text/javascript">
      var payButton = document.getElementById('pay-button');
      payButton.addEventListener('click', function () {
        window.snap.pay("{{ $transaksi->snap }}", {
          onSuccess: function(result){
            window.location.href = "{{ route('transaksi.show', $transaksi->kd) }}"
          },
          onPending: function(result){
            alert("Wating your payment!");
          },
          onError: function(result){
            alert("Payment failed!");
          },
          onClose: function(){
            alert('You closed the popup without finishing the payment');
          }
        })
      });
    </script>
    @include('layouts.footer')
</body>
</html>