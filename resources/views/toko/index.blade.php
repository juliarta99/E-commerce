@extends('layouts.main')
@section('content')
<div class="pt-24 pb-10 px-9 lg:pt-16">
    <div class="w-full">
        <div class="max-w-2xl mx-auto shadow-lg">
            {{-- session message --}}
            @if (session()->has('sudahBuatToko'))
                <div class="w-auto p-2 px-2 text-sm font-semibold text-center bg-red-500 rounded-md lg:text-md">{{ session('sudahBuatToko') }}</div>
            @endif
            @if (session()->has('succesBuatToko'))
                <div class="w-auto p-2 px-2 text-sm font-semibold text-center bg-red-500 rounded-md lg:text-md">{{ session('succesBuatToko') }}</div>
            @endif
            {{-- profile start --}}
            @foreach (Auth::user()->toko()->get() as $toko)    
                <div class="flex flex-wrap">
                    <div class="w-full">
                        <div class="relative group">
                            @if ($toko->backImage != null)
                                <img src="{{ 'storage/' . $toko->backImage }}" alt="Background Toko" class="w-full h-auto">
                            @else    
                                <img src="{{ asset('img/back_toko.jpg') }}" alt="Background Toko" class="w-full">
                            @endif
                            <div class="absolute hidden top-4 group-hover:block right-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#fff" class="w-6 h-6">
                                    <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                    <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                                </svg>                              
                            </div>
                        </div>
                    </div>
                    <div class="w-full px-4 pt-4 pb-2">
                        <div class="flex items-center justify-between w-full ">
                            <div class="flex items-center w-full">
                                @if ($toko->image != null)
                                    <img src="{{ $toko->image }}" alt="{{ $toko->name }}">
                                @else
                                    <img src="{{ asset('img/toko_default.jpg') }}" alt="Background Toko" class="w-16 h-16 rounded-full">
                                @endif
                                <div class="ml-2">
                                    <h1 class="text-sm lg:text-md">{{ $toko->name }}</h1>
                                    <a href="/toko/edit" class="text-xs text-blue-500 lg:text-sm">edit toko</a>
                                </div>
                            </div>
                            <a href="/product/create/{{ $toko->slug }}">
                                <button class="p-2 px-4 text-xs text-white bg-blue-500 rounded-md lg:text-sm">Tambah product</button>
                            </a>
                        </div>
                        <div class="w-full mt-2">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                    <path fill-rule="evenodd" d="M11.54 22.351l.07.04.028.016a.76.76 0 00.723 0l.028-.015.071-.041a16.975 16.975 0 001.144-.742 19.58 19.58 0 002.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 00-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 002.682 2.282 16.975 16.975 0 001.145.742zM12 13.5a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                                </svg>
                                <h3 class="ml-1 text-xs lg:Text-sm">{{ $toko->alamat }}</h3>
                            </div>
                            <p class="text-xs text-justify">{{ $toko->tentang }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- profile end  --}}
            {{-- product toko --}}
            <div class="w-full px-4 py-2 pb-4">
                <h1 class="font-bold text-md lg:text-lg">Product</h1>
                <div class="w-16 h-1 bg-blue-500 lg:w-20"></div>
                
            </div>
            {{-- product toko end--}}
        </div>
    </div>
</div>
    
@endsection