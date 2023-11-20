@extends('dashboard.layouts.main')
@section('content')
<div class="w-full text-black">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
        <div class="rounded-md bg-slate-200 py-2 md:py-4 px-4 md:px-6 border-b-4 border-green-500">
            <div class="flex gap-3 md:gap-5 items-center h-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 fill-green-500" viewBox="0 0 640 512"><path d="M535 41c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l64 64c4.5 4.5 7 10.6 7 17s-2.5 12.5-7 17l-64 64c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l23-23L384 112c-13.3 0-24-10.7-24-24s10.7-24 24-24l174.1 0L535 41zM105 377l-23 23L256 400c13.3 0 24 10.7 24 24s-10.7 24-24 24L81.9 448l23 23c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L7 441c-4.5-4.5-7-10.6-7-17s2.5-12.5 7-17l64-64c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9zM96 64H337.9c-3.7 7.2-5.9 15.3-5.9 24c0 28.7 23.3 52 52 52l117.4 0c-4 17 .6 35.5 13.8 48.8c20.3 20.3 53.2 20.3 73.5 0L608 169.5V384c0 35.3-28.7 64-64 64H302.1c3.7-7.2 5.9-15.3 5.9-24c0-28.7-23.3-52-52-52l-117.4 0c4-17-.6-35.5-13.8-48.8c-20.3-20.3-53.2-20.3-73.5 0L32 342.5V128c0-35.3 28.7-64 64-64zm64 64H96v64c35.3 0 64-28.7 64-64zM544 320c-35.3 0-64 28.7-64 64h64V320zM320 352a96 96 0 1 0 0-192 96 96 0 1 0 0 192z"/></svg>
                <div class="mx-auto">
                    <h1 class="uppercase text-lg lg:text-xl xl:text-2xl text-center text-green-500 font-bold">{{ $cSTransaksi }}</h1>
                    <p class="text-center text-sm lg:text-base">Transaksi Sukses</p>
                </div>
            </div>
        </div>
        <div class="rounded-md bg-slate-200 py-2 md:py-4 px-4 md:px-6 border-b-4 border-green-500">
            <div class="flex gap-3 md:gap-5 items-center h-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 fill-green-500" viewBox="0 0 640 512"><path d="M48 0C21.5 0 0 21.5 0 48V368c0 26.5 21.5 48 48 48H64c0 53 43 96 96 96s96-43 96-96H384c0 53 43 96 96 96s96-43 96-96h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V288 256 237.3c0-17-6.7-33.3-18.7-45.3L512 114.7c-12-12-28.3-18.7-45.3-18.7H416V48c0-26.5-21.5-48-48-48H48zM416 160h50.7L544 237.3V256H416V160zM112 416a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm368-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg>
                <div class="mx-auto">
                    <h1 class="uppercase text-lg lg:text-xl xl:text-2xl text-center text-green-500 font-bold">{{ $cSDelivery }}</h1>
                    <p class="text-center text-sm lg:text-base">Pengiriman Sukses</p>
                </div>
            </div>
        </div>
        <div class="rounded-md bg-slate-200 py-2 md:py-4 px-4 md:px-6 border-b-4 border-blue-500">
            <div class="flex gap-3 md:gap-5 items-center h-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="fill-blue-500 w-8 h-8" viewBox="0 0 576 512"><path d="M547.6 103.8L490.3 13.1C485.2 5 476.1 0 466.4 0H109.6C99.9 0 90.8 5 85.7 13.1L28.3 103.8c-29.6 46.8-3.4 111.9 51.9 119.4c4 .5 8.1 .8 12.1 .8c26.1 0 49.3-11.4 65.2-29c15.9 17.6 39.1 29 65.2 29c26.1 0 49.3-11.4 65.2-29c15.9 17.6 39.1 29 65.2 29c26.2 0 49.3-11.4 65.2-29c16 17.6 39.1 29 65.2 29c4.1 0 8.1-.3 12.1-.8c55.5-7.4 81.8-72.5 52.1-119.4zM499.7 254.9l-.1 0c-5.3 .7-10.7 1.1-16.2 1.1c-12.4 0-24.3-1.9-35.4-5.3V384H128V250.6c-11.2 3.5-23.2 5.4-35.6 5.4c-5.5 0-11-.4-16.3-1.1l-.1 0c-4.1-.6-8.1-1.3-12-2.3V384v64c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V384 252.6c-4 1-8 1.8-12.3 2.3z"/></svg>
                <div class="mx-auto">
                    <h1 class="uppercase text-lg lg:text-xl xl:text-2xl text-center text-blue-500 font-bold">{{ $cToko }}</h1>
                    <p class="text-center text-sm lg:text-base">Jumlah Toko</p>
                </div>
            </div>
        </div>
        <div class="rounded-md bg-slate-200 py-2 md:py-4 px-4 md:px-6 border-b-4 border-purple-500">
            <div class="flex gap-3 md:gap-5 items-center h-full">
                <svg xmlns="http://www.w3.org/2000/svg"  class="fill-purple-500 w-8 h-8" viewBox="0 0 640 512"><path d="M211.8 0c7.8 0 14.3 5.7 16.7 13.2C240.8 51.9 277.1 80 320 80s79.2-28.1 91.5-66.8C413.9 5.7 420.4 0 428.2 0h12.6c22.5 0 44.2 7.9 61.5 22.3L628.5 127.4c6.6 5.5 10.7 13.5 11.4 22.1s-2.1 17.1-7.8 23.6l-56 64c-11.4 13.1-31.2 14.6-44.6 3.5L480 197.7V448c0 35.3-28.7 64-64 64H224c-35.3 0-64-28.7-64-64V197.7l-51.5 42.9c-13.3 11.1-33.1 9.6-44.6-3.5l-56-64c-5.7-6.5-8.5-15-7.8-23.6s4.8-16.6 11.4-22.1L137.7 22.3C155 7.9 176.7 0 199.2 0h12.6z"/></svg>
                <div class="mx-auto">
                    <h1 class="uppercase text-lg lg:text-xl xl:text-2xl text-center text-purple-500 font-bold">{{ $cProduct }}</h1>
                    <p class="text-center text-sm lg:text-base">Jumlah Produk</p>
                </div>
            </div>
        </div>
        <div class="rounded-md bg-slate-200 py-2 md:py-4 px-4 md:px-6 border-b-4 border-yellow-500">
            <div class="flex gap-3 md:gap-5 items-center h-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="fill-yellow-500 w-8 h-8" viewBox="0 0 576 512"><path d="M0 112.5V422.3c0 18 10.1 35 27 41.3c87 32.5 174 10.3 261-11.9c79.8-20.3 159.6-40.7 239.3-18.9c23 6.3 48.7-9.5 48.7-33.4V89.7c0-18-10.1-35-27-41.3C462 15.9 375 38.1 288 60.3C208.2 80.6 128.4 100.9 48.7 79.1C25.6 72.8 0 88.6 0 112.5zM288 352c-44.2 0-80-43-80-96s35.8-96 80-96s80 43 80 96s-35.8 96-80 96zM64 352c35.3 0 64 28.7 64 64H64V352zm64-208c0 35.3-28.7 64-64 64V144h64zM512 304v64H448c0-35.3 28.7-64 64-64zM448 96h64v64c-35.3 0-64-28.7-64-64z"/></svg>
                <div class="mx-auto">
                    <h1 class="uppercase text-lg lg:text-xl xl:text-2xl text-center text-yellow-500 font-bold">{{ $cPTransaksi }}</h1>
                    <p class="text-center text-sm lg:text-base">Transaksi Pending</p>
                </div>
            </div>
        </div>
        <div class="rounded-md bg-slate-200 py-2 md:py-4 px-4 md:px-6 border-b-4 border-yellow-500">
            <div class="flex gap-3 md:gap-5 items-center h-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 fill-yellow-500" viewBox="0 0 640 512"><path d="M112 0C85.5 0 64 21.5 64 48V96H16c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 272c8.8 0 16 7.2 16 16s-7.2 16-16 16H64 48c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 240c8.8 0 16 7.2 16 16s-7.2 16-16 16H64 16c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 208c8.8 0 16 7.2 16 16s-7.2 16-16 16H64V416c0 53 43 96 96 96s96-43 96-96H384c0 53 43 96 96 96s96-43 96-96h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V288 256 237.3c0-17-6.7-33.3-18.7-45.3L512 114.7c-12-12-28.3-18.7-45.3-18.7H416V48c0-26.5-21.5-48-48-48H112zM544 237.3V256H416V160h50.7L544 237.3zM160 368a48 48 0 1 1 0 96 48 48 0 1 1 0-96zm272 48a48 48 0 1 1 96 0 48 48 0 1 1 -96 0z"/></svg>
                <div class="mx-auto">
                    <h1 class="uppercase text-lg lg:text-xl xl:text-2xl text-center text-yellow-500 font-bold">{{ $cPDelivery }}</h1>
                    <p class="text-center text-sm lg:text-base">Pengiriman Pending</p>
                </div>
            </div>
        </div>
        <div class="rounded-md bg-slate-200 py-2 md:py-4 px-4 md:px-6 border-b-4 border-fuchsia-500">
            <div class="flex gap-3 md:gap-5 items-center h-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 fill-fuchsia-500" viewBox="0 0 576 512"><path d="M264.5 5.2c14.9-6.9 32.1-6.9 47 0l218.6 101c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 149.8C37.4 145.8 32 137.3 32 128s5.4-17.9 13.9-21.8L264.5 5.2zM476.9 209.6l53.2 24.6c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 277.8C37.4 273.8 32 265.3 32 256s5.4-17.9 13.9-21.8l53.2-24.6 152 70.2c23.4 10.8 50.4 10.8 73.8 0l152-70.2zm-152 198.2l152-70.2 53.2 24.6c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 405.8C37.4 401.8 32 393.3 32 384s5.4-17.9 13.9-21.8l53.2-24.6 152 70.2c23.4 10.8 50.4 10.8 73.8 0z"/></svg>
                <div class="mx-auto">
                    <h1 class="uppercase text-lg lg:text-xl xl:text-2xl text-center text-fuchsia-500 font-bold">{{ $cKategori }}</h1>
                    <p class="text-center text-sm lg:text-base">Jumlah Kategori</p>
                </div>
            </div>
        </div>
        <div class="rounded-md bg-slate-200 py-2 md:py-4 px-4 md:px-6 border-b-4 border-sky-500">
            <div class="flex gap-3 md:gap-5 items-center h-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 fill-sky-500" viewBox="0 0 640 512"><path d="M208 352c114.9 0 208-78.8 208-176S322.9 0 208 0S0 78.8 0 176c0 38.6 14.7 74.3 39.6 103.4c-3.5 9.4-8.7 17.7-14.2 24.7c-4.8 6.2-9.7 11-13.3 14.3c-1.8 1.6-3.3 2.9-4.3 3.7c-.5 .4-.9 .7-1.1 .8l-.2 .2 0 0 0 0C1 327.2-1.4 334.4 .8 340.9S9.1 352 16 352c21.8 0 43.8-5.6 62.1-12.5c9.2-3.5 17.8-7.4 25.3-11.4C134.1 343.3 169.8 352 208 352zM448 176c0 112.3-99.1 196.9-216.5 207C255.8 457.4 336.4 512 432 512c38.2 0 73.9-8.7 104.7-23.9c7.5 4 16 7.9 25.2 11.4c18.3 6.9 40.3 12.5 62.1 12.5c6.9 0 13.1-4.5 15.2-11.1c2.1-6.6-.2-13.8-5.8-17.9l0 0 0 0-.2-.2c-.2-.2-.6-.4-1.1-.8c-1-.8-2.5-2-4.3-3.7c-3.6-3.3-8.5-8.1-13.3-14.3c-5.5-7-10.7-15.4-14.2-24.7c24.9-29 39.6-64.7 39.6-103.4c0-92.8-84.9-168.9-192.6-175.5c.4 5.1 .6 10.3 .6 15.5z"/></svg>
                <div class="mx-auto">
                    <h1 class="uppercase text-lg lg:text-xl xl:text-2xl text-center text-sky-500 font-bold">{{ $cComment }}</h1>
                    <p class="text-center text-sm lg:text-base">Jumlah Ulasan</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection