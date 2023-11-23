@extends('layouts.main')
@section('content')
<div class="pb-10 px-9 pt-36 lg:pt-24">
    @if (session()->has('success'))
        <div class="w-auto p-2 px-2 mt-8 text-sm font-semibold text-center bg-green-500 rounded-t-md lg:mt-4 lg:text-base">{{ session('success') }}</div>
    @endif
    @if (session()->has('error'))
        <div class="w-auto p-2 px-2 mt-8 text-sm font-semibold text-center bg-red-500 rounded-t-md lg:mt-4 lg:text-base">{{ session('error') }}</div>
    @endif
    <h1 class="text-base md:text-lg lg:text-xl xl:text-2xl font-bold">Toko Favorit</h1>
    @if (count($favorits) == null)
        <p class="text-sm lg:text-base">Belum ada toko favorit yang ditambahkan!</p>
    @else
        <div class="w-full flex flex-wrap">
            @foreach ($favorits as $favorit)
            <div class="w-full p-4 md:w-1/2 lg:w-1/3">
                <a href="/{{ $favorit->toko->slug }}">
                    <div class="w-full flex items-center justify-between bg-white p-4 rounded-md shadow-md">
                        <div class="mr-2 flex items-center">
                            <div class="mr-2">
                                @if ($favorit->toko->image != null)
                                    <img src="storage/{{ $favorit->toko->image }}" class="w-10 h-10 rounded-full object-cover lg:w-12 lg:h-12" alt="{{ $favorit->toko->name }}">
                                @else
                                    <img src="{{ asset('img/toko_default.jpg') }}" alt="Background Toko" class="w-10 h-10 rounded-full object-cover lg:w-12 lg:h-12">
                                @endif
                            </div>
                            <div class="mr-3">
                                <p class="text-sm lg:text-base text-black">{{ $favorit->toko->name }}</p>
                            </div>
                        </div>
                </a>
                        <form action="/favorit/delete" onsubmit="return confirm('Apakah anda yakin ingin menghapus toko {{ $favorit->toko->name }} dari daftar favorit anda?')" method="post" class="">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="id_favorit" value="{{ $favorit->id }}">
                            <button class="bg-red-500 px-2 py-1 rounded-md text-sm lg:text-base">Hapus</button>
                        </form>
                        </div>
                    </div>
            </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
