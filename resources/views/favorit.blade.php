@extends('layouts.main')
@section('content')
<div class="pb-10 px-9 pt-36 lg:pt-24">
    @if (session()->has('succes'))
        <div class="w-auto p-2 px-2 mt-8 text-sm font-semibold text-center bg-green-500 rounded-t-md lg:mt-4 lg:text-md">{{ session('succes') }}</div>
    @endif
    @if (session()->has('error'))
        <div class="w-auto p-2 px-2 mt-8 text-sm font-semibold text-center bg-red-500 rounded-t-md lg:mt-4 lg:text-md">{{ session('error') }}</div>
    @endif
    <h1 class="text-md md:text-lg lg:text-xl xl:text-2xl font-bold">Toko Favorit</h1>
    <div class="w-full flex flex-wrap">
        @foreach ($favorits as $favorit)
        <div class="w-full p-4 md:w-1/2 lg:w-1/3">
            <a href="/{{ $favorit->toko->slug }}">
                <div class="w-full flex items-center justify-between bg-white p-4 rounded-md shadow-md">
                    <div class="mr-2 flex items-center">
                        <div class="mr-2">
                            @if ($favorit->toko->image != null)
                                <img src="storage/{{ $favorit->toko->image }}" class="w-10 h-10 rounded-full lg:w-12 lg:h-12" alt="{{ $product->toko->name }}">
                            @else
                                <img src="{{ asset('img/toko_default.jpg') }}" alt="Background Toko" class="w-10 h-10 rounded-full lg:w-12 lg:h-12">
                            @endif
                        </div>
                        <div class="mr-3">
                            <p class="text-sm lg:text-md text-black">{{ $favorit->toko->name }}</p>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                                    <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                </svg> 
                                <p class="text-xs lg:text-sm">{{ $favorit->toko->rate }}</p>
                            </div>
                        </div>
                    </div>
                    <form action="/favorit/delete" method="post" class="">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="id_favorit" value="{{ $favorit->id }}">
                        <button class="bg-red-500 px-2 py-1 rounded-md text-sm lg:text-md">Hapus</button>
                    </form>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection