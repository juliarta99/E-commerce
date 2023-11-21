@extends('layouts.main')
@section('content')
    <div class="pb-10 px-9 pt-36 lg:pt-24">
        <h1 class="text-base lg:text-lg xl:text-xl font-bold">Transaksi</h1>
        @if (session()->has('success'))
              <div class="px-4 py-2 bg-green-500 w-auto mx-auto my-2 rounded-md">{{ session('success') }}</div>
        @endif
        @if (session()->has('error'))
              <div class="px-4 py-2 bg-red-500 w-auto mx-auto my-2 rounded-md">{{ session('error') }}</div>
        @endif
        @if (count($transaksis) == 0)
            <p class="text-sm lg:text-base">Anda belum pernah melakukan transaksi!</p>
        @else
            <div class="grid gap-3 grid-cols-3 mt-3">
                @foreach ($transaksis as $transaksi)
                    <div class="p-3 rounded-md bg-gray-200">
                        <h1 class="text-sm md:text-base font-bold">#{{ $transaksi->kd }}</h1>
                        <div class="flex gap-2 items-center mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-gray-500" viewBox="0 0 512 512"><path d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/></svg>
                            <p class="text-sm">{{ date('d F Y, h:i:s A', strtotime($transaksi->created_at)) }}</p>
                        </div>
                        <div class="flex gap-2 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 {{ $transaksi->status == 'success' ? 'fill-green-500' : ($transaksi->status == 'cancel' ? 'fill-red-500' : 'fill-yellow-500') }}" viewBox="0 0 640 512"><path d="M535 41c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l64 64c4.5 4.5 7 10.6 7 17s-2.5 12.5-7 17l-64 64c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l23-23L384 112c-13.3 0-24-10.7-24-24s10.7-24 24-24l174.1 0L535 41zM105 377l-23 23L256 400c13.3 0 24 10.7 24 24s-10.7 24-24 24L81.9 448l23 23c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L7 441c-4.5-4.5-7-10.6-7-17s2.5-12.5 7-17l64-64c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9zM96 64H337.9c-3.7 7.2-5.9 15.3-5.9 24c0 28.7 23.3 52 52 52l117.4 0c-4 17 .6 35.5 13.8 48.8c20.3 20.3 53.2 20.3 73.5 0L608 169.5V384c0 35.3-28.7 64-64 64H302.1c3.7-7.2 5.9-15.3 5.9-24c0-28.7-23.3-52-52-52l-117.4 0c4-17-.6-35.5-13.8-48.8c-20.3-20.3-53.2-20.3-73.5 0L32 342.5V128c0-35.3 28.7-64 64-64zm64 64H96v64c35.3 0 64-28.7 64-64zM544 320c-35.3 0-64 28.7-64 64h64V320zM320 352a96 96 0 1 0 0-192 96 96 0 1 0 0 192z"/></svg>
                            <p class="text-sm capitalize {{ $transaksi->status == 'success' ? 'text-green-500' : ($transaksi->status == 'cancel' ? 'text-red-500' : 'text-yellow-500') }}">{{ $transaksi->status }}</p>
                        </div>
                        <div class="flex gap-2">
                            @foreach ($transaksi->deliverys as $delivery)
                                <div title="{{ $delivery->origin_city }} ke {{ $delivery->destination_city }}" class="flex gap-2 items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 {{ $delivery->status == 'success' ? 'fill-green-500' : ($delivery->status == 'cancel' ? 'fill-red-500' : 'fill-yellow-500') }}" viewBox="0 0 640 512"><path d="M112 0C85.5 0 64 21.5 64 48V96H16c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 272c8.8 0 16 7.2 16 16s-7.2 16-16 16H64 48c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 240c8.8 0 16 7.2 16 16s-7.2 16-16 16H64 16c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 208c8.8 0 16 7.2 16 16s-7.2 16-16 16H64V416c0 53 43 96 96 96s96-43 96-96H384c0 53 43 96 96 96s96-43 96-96h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V288 256 237.3c0-17-6.7-33.3-18.7-45.3L512 114.7c-12-12-28.3-18.7-45.3-18.7H416V48c0-26.5-21.5-48-48-48H112zM544 237.3V256H416V160h50.7L544 237.3zM160 368a48 48 0 1 1 0 96 48 48 0 1 1 0-96zm272 48a48 48 0 1 1 96 0 48 48 0 1 1 -96 0z"/></svg>
                                    <p class="text-sm capitalize {{ $delivery->status == 'success' ? 'text-green-500' : ($delivery->status == 'cancel' ? 'text-red-500' : 'text-yellow-500') }}">{{ $delivery->status }}</p>
                                </div>
                            @endforeach
                        </div>
                        <p class="text-sm">Ongkir : @currency($transaksi->total_ongkir)</p>
                        <p class="text-sm font-bold">Total Transaksi : @currency($transaksi->total_transaksi)</p>
                        <a href="{{ route('transaksi.show', $transaksi->kd) }}">
                            <button class="mt-2 text-xs md:text-sm px-2 py-1 md:px-4 md:py-2 border-2 hover:border-blue-500 hover:bg-white bg-blue-500 transition-all rounded-lg">{{ $transaksi->status == 'pending' ? 'Lihat dan Bayar' : 'Lihat'  }}</button>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection