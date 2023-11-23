@extends('layouts.main')
@section('content')
<div class="pt-32 pb-10 px-2 lg:pt-24">
    <div class="w-full">
        <h1 class="text-base lg:text-lg xl:text-xl font-bold mb-4">All Transaksi and Delivery</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($deliverys as $delivery)
                <div class="rounded-md shadow-md p-4 bg-{{ $delivery->status == 'success' ? 'green' : ($delivery->status == 'cancel' ? 'red' : 'yellow') }}-500">
                    <div class="flex gap-2 justify-between items-center">
                        <h1 class="text-sm lg:text-base font-bold">#{{ $delivery->transaksi->kd }}</h1>
                        <a href="{{ route('toko.transaksi.show', $delivery->transaksi->kd) }}">
                            <button class="p-2 rounded-md bg-blue-500 text-sm text-white mt-1 flex gap-2 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" class="fill-white" viewBox="0 0 512 512"><path d="M320 0c-17.7 0-32 14.3-32 32s14.3 32 32 32h82.7L201.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L448 109.3V192c0 17.7 14.3 32 32 32s32-14.3 32-32V32c0-17.7-14.3-32-32-32H320zM80 32C35.8 32 0 67.8 0 112V432c0 44.2 35.8 80 80 80H400c44.2 0 80-35.8 80-80V320c0-17.7-14.3-32-32-32s-32 14.3-32 32V432c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16H192c17.7 0 32-14.3 32-32s-14.3-32-32-32H80z"/></svg>
                            </button>
                        </a>
                    </div>
                    <p class="text-xs capitalize">Courier : {{ $delivery->kurir }} <span class="opacity-75 text-xs">({{ $delivery->service }})</span></p>
                    <p class="text-xs capitalize">Est : {{ $delivery->estimation }}</p>
                    <p class="text-sm">Ongkir : @currency($delivery->cost)</p>
                    <p class="text-sm font-bold">Total Transaksi : @currency($delivery->transaksi->total_transaksi)</p>
                    
                    <p class="mt-3 text-sm font-bold capitalize">Status Transaksi : {{ $delivery->transaksi->status }}</p>
                    @if ($delivery->transaksi->status == 'success' && !$delivery->no_resi)
                        <a href="{{ route('toko.transaksi.show', $delivery->transaksi->kd) }}">
                            <button class="p-2 rounded-md bg-blue-500 text-sm text-white mt-1 flex gap-2 items-center">
                                <p>Add No Resi</p>
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" class="fill-white" viewBox="0 0 512 512"><path d="M320 0c-17.7 0-32 14.3-32 32s14.3 32 32 32h82.7L201.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L448 109.3V192c0 17.7 14.3 32 32 32s32-14.3 32-32V32c0-17.7-14.3-32-32-32H320zM80 32C35.8 32 0 67.8 0 112V432c0 44.2 35.8 80 80 80H400c44.2 0 80-35.8 80-80V320c0-17.7-14.3-32-32-32s-32 14.3-32 32V432c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16H192c17.7 0 32-14.3 32-32s-14.3-32-32-32H80z"/></svg>
                            </button>
                        </a>
                    @endif
                    @if ($delivery->transaksi->status == 'success' && $delivery->no_resi)
                        <p class="text-sm font-bold text-white mt-3">Nomor Resi telah ditambahkan!</p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection