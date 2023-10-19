@extends('dashboard.layouts.main')
@section('content')
    @if (session()->has('success'))
        <div class="w-auto p-2 px-2 mt-8 text-sm font-semibold text-center bg-green-500 rounded-t-md lg:mt-4 lg:text-base">{{ session('success') }}</div>
    @endif
    <h1 class="text-2xl text-slate-200 font-bold mb-4">Toko Approve</h1>
    @if (count($tokos) > 0)
        <table class="text-slate-200 w-full text-center border-2 border-slate-600">
            <thead>
                <tr>
                    <th class="border-2 border-slate-600 p-2">Nama</th>
                    <th class="border-2 border-slate-600 p-2">Alamat</th>
                    <th class="border-2 border-slate-600 p-2">Tentang</th>
                    <th class="border-2 border-slate-600 p-2">Izin Usaha</th>
                    <th class="border-2 border-slate-600 p-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tokos as $toko)
                    <tr class="text-sm">
                        <td class="border-2 border-slate-600 p-2">{{ $toko->name }}</td>
                        <td class="border-2 border-slate-600 p-2">{{ $toko->city->province_name }}, {{ $toko->city->city_name }}, {{ $toko->city->postal_code }}</td>
                        <td class="border-2 border-slate-600 p-2">{{ Str::limit($toko->tentang, 20) }}</td>
                        <td class="border-2 border-slate-600 p-2">
                            <img src="{{ asset('storage/'.$toko->izin_usaha) }}" class="mx-auto w-20 h-20 object-cover" alt="{{ $toko->name }}">
                        </td>
                        <td class="border-2 border-slate-600 p-2">
                            <div class="flex items-center justify-center">
                                <button>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-blue-500" viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg>
                                </button>
                                <form action="{{ route('dashboard.toko.approveToko') }}" onsubmit="return confirm('Apakah anda yakin ingin menyetujui toko ini untuk berjualan?')" class="flex" method="post">
                                    @csrf
                                    @method('put')
                                    <button name="slug" value="{{ $toko->slug }}" class="ml-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-green-500" viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-center text-slate-200">Belum ada toko baru yang mendaftar</p>        
    @endif
@endsection