@extends('layouts.main')
@section('content')
@foreach (Auth::user()->toko()->get() as $toko)
<div class="pt-24 pb-10 px-2 lg:pt-16">
    <div class="w-full">
        @if (Auth::user()->toko->approve == 0)
            <div class="h-screen flex flex-col items-center justify-center">
                <img src="{{ asset('img/cek-berkas.png') }}" class="h-full max-h-72 object-cover" alt="">
                <p class="mt-5 font-bold">Toko anda masih dalam proses pengecekan berkas</p>
            </div>
        @else
            <div class="max-w-2xl mx-auto shadow-lg">
                {{-- session message --}}
                @if (session()->has('error'))
                    <div class="w-auto p-2 px-2 mt-8 text-sm font-semibold text-center bg-red-500 rounded-t-md lg:mt-4 lg:text-base">{{ session('error') }}</div>
                @endif
                @if (session()->has('success'))
                    <div class="w-auto p-2 px-2 mt-8 text-sm font-semibold text-center bg-green-500 rounded-t-md lg:mt-4 lg:text-base">{{ session('success') }}</div>
                @endif
                {{-- profile start --}}
                    <div class="flex flex-wrap">
                        <div class="w-full">
                            <div class="relative group">
                                @if ($toko->backImage != null)
                                    <img src="{{ 'storage/' . $toko->backImage }}" alt="Background Toko" class="w-full h-52 object-cover">
                                @else
                                    <img src="{{ asset('img/back_toko.jpg') }}" alt="Background Toko" class="w-full h-52 object-cover">
                                @endif
                                {{-- edit back toko --}}
                                <a href="/toko/{{ $toko->slug }}/editBack">
                                    <div class="absolute hidden top-6 lg:top-4 group-hover:block right-2 fill-white hover:fill-black">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6">
                                            <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                            <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                                        </svg>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="w-full px-4 pt-4 pb-2">
                            <div class="flex items-center justify-between w-full ">
                                <div class="flex items-center w-full">
                                    @if ($toko->image != null)
                                        <img src="{{ asset('storage/'. $toko->image) }}" class="object-cover w-10 h-10 rounded-full" alt="{{ $toko->name }}">
                                    @else
                                        <img src="{{ asset('img/toko_default.jpg') }}" alt="Background Toko" class="w-10 h-10 rounded-full object-cover">
                                    @endif
                                    <div class="ml-2">
                                        <h1 class="text-sm lg:text-base">{{ $toko->name }}</h1>
                                        <a href="/toko/{{ $toko->slug }}/edit" class="text-xs text-blue-500 lg:text-sm">edit toko</a>
                                    </div>
                                </div>
                                <a href="/toko/product/create">
                                    <button class="p-2 px-4 text-xs text-white bg-blue-500 rounded-md lg:text-sm">Tambah product</button>
                                </a>
                            </div>
                            <div class="w-full mt-2">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                        <path fill-rule="evenodd" d="M11.54 22.351l.07.04.028.016a.76.76 0 00.723 0l.028-.015.071-.041a16.975 16.975 0 001.144-.742 19.58 19.58 0 002.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 00-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 002.682 2.282 16.975 16.975 0 001.145.742zM12 13.5a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                                    </svg>
                                    <h3 class="ml-1 text-xs lg:Text-sm">{{ $toko->city->city_name. ' , ' .$toko->city->province_name }}</h3>
                                </div>
                                <p class="text-xs text-justify opacity-60">{{ $toko->tentang }}</p>
                            </div>
                        </div>
                    </div>
                {{-- profile end  --}}
                {{-- product toko --}}
                <div class="w-full px-4 py-2 pb-4">
                    <h1 class="font-bold text-base lg:text-lg">Product</h1>
                    <div class="w-16 h-1 bg-blue-500 lg:w-20"></div>
                    @if (count($products) > 0)
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mt-3">
                            @foreach ($products as $product)
                            <div class="w-full">
                                @if ($product->approve)
                                    <a href="/toko/product/{{ $product->slug }}">
                                @endif
                                        <div class="grid grid-cols-1 md:grid-cols-1-2 lg:grid-cols-1 items-center w-full p-4 bg-white shadow-md relative">
                                            <div class="absolute w-full h-full bg-[rgba(0,0,0,.5)] top-0 left-0 z-10 flex justify-center items-center flex-col p-2">
                                                <p class="font-bold text-red-500 rounded-lg text-center text-xs lg:text-sm mb-2 p-1 bg-white">Product dilarang untuk dijual!</p>
                                                <a href="mailto:adij4255@gmail.com" target="_blank" rel="noopener noreferrer">
                                                    <button class="p-2 rounded-md text-xs lg:text-sm bg-red-500 text-white">Ajukan banding</button>
                                                </a>
                                            </div>
                                            <div class="w-full">
                                                    <div class="relative">
                                                            <img src="{{ asset('storage/'. $product->image) }}" class="rounded-md h-52 object-cover w-full" alt="Product">
                                                            <p class="absolute top-0 left-0 p-2 text-xs text-white bg-black rounded-tl-md">{{ $product->kategori->name }}</p>
                                                            <p class="absolute top-0 right-0 p-2 text-xs text-white bg-red-500 rounded-tr-md">{{$product->diskon}}%</p>
                                                    </div>
                                            </div>
                                            <div class="w-full px-4 md:w-1/2 lg:w-full mt-2">
                                                    <h2 class="text-xs font-bold text-black lg:text-sm">{{ Str::limit($product->name, 15) }}</h2>
                                                    <h5 class="text-xs font-semibold text-blue-500 lg:text-sm">@currency($product->harga)</h5>
                                                    <h5 class="text-xs line-through opacity-75">@currency($product->harga_awal)</h5>
                                                    <div class="flex items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-3 h-3 mr-1">
                                                                <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                        </svg>
                                                        <p class="text-xs">{{ 
                                                            $product->transaksis->where('comment.rate', '>', 0)->avg('comment.rate') ? $product->transaksis->where('comment.rate', '>', 0)->avg('comment.rate') : '0'
                                                        }}</p>
                                                    </div>
                                                    <p class="text-xs">Terjual {{ $product->terjual }}</p>
                                                    <div class="flex flex-wrap mt-2">
                                                        @if ($product->approve)
                                                            <a href="/toko/product/{{ $product->slug }}/edit">
                                                                <div class="p-2 rounded-md bg-yellow-500 mr-1">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                                        </svg>
                                                                </div>
                                                            </a>
                                                            <form action="{{ route('toko.product.updateShow', $product->slug) }}" onsubmit="return confirm('Apakah anda yakin ingin untuk {{ $product->show ? 'menyembunyikan' : 'menampilkan' }} product ini?')" class="mr-1" method="post">
                                                                @csrf
                                                                @method('put')
                                                                <button type="submit">
                                                                <div class="p-2 rounded-md bg-blue-500">
                                                                    @if ($product->show)
                                                                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-white w-3 h-3" viewBox="0 0 640 512"><path d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zM373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5L373 389.9z"/></svg>
                                                                    @else
                                                                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-white w-3 h-3" viewBox="0 0 576 512"><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg>
                                                                    @endif
                                                                </div>
                                                                </button>
                                                            </form>
                                                        @endif
                                                        @if (count($product->transaksis) == 0)
                                                            <form action="/toko/product/{{ $product->slug }}" onsubmit="return confirm('Apakah anda yakin ingin menghapus produk {{ $product->name }}?')" class="z-20" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit">
                                                                <div class="p-2 rounded-md bg-red-500">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                                    </svg>
                                                                </div>
                                                                </button>
                                                            </form>
                                                        @endif
                                                    </div>
                                            </div>
                                        </div>
                                @if ($product->approve)
                                    </a>
                                @endif
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-sm md:text-base font-semibold text-red-500">Anda belum mempunyai product!</p>
                    @endif
                    <div class="flex justify-center mb-10">
                        {{ $products->links() }}
                    </div>
                </div>
                {{-- product toko end--}}
            </div>
        @endif
    </div>
</div>
@endforeach
@endsection
