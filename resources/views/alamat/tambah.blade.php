@extends('layouts.main')
@section('content')
<div id="formTambahAlamat" class="pb-10 px-9 pt-36 lg:pt-24">
    <form action="/alamat" method="post" class="flex flex-col max-w-md mx-auto mt-5">
            @csrf
            <h1 class="font-semibold text-center uppercase text-base lg:text-l">Form Tambah Alamat</h1>
            @if (session()->has('succesTambahAlamat'))
            <div class="w-auto mx-auto my-1 overflow-hidden rounded-md">
                <div class="px-4 py-2 bg-green-500 ">{{ session('succesTambahAlamat') }}</div>
            </div>
            @endif
            <label class="text-sm text-black lg:text-base" for="penerima">Penerima</label>
            <input required class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-base @error('penerima') border-2 border-red-500 @enderror" type="text" name="penerima" id="penerima" value="{{ old('penerima', Auth::user()->name) }}">
            @error('penerima')
                <div class="w-full text-sm text-red-500 lg:text-base">{{ $message }}</div>
            @enderror
            <label class="mt-2 text-sm text-black lg:text-base" for="label">Label</label>
            <select required name="label" class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-base @error('label') border-2 border-red-500 @enderror" id="label">
                @foreach ($types as $type)
                    <option value={{ $type['value'] }}>{{ $type['name'] }}</option>
                @endforeach
            </select>
            @error('label')
                <div class="w-full text-sm text-red-500 lg:text-base">{{ $message }}</div>
            @enderror
            <label class="mt-2 text-sm text-black lg:text-base" for="id_city">Kota</label>
            <select required class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-base @error('id_city') border-2 border-red-500 @enderror" id="id_city" name="id_city" id="id_city" value="{{ old('id_city') }}">
                @foreach ($citys as $city)
                    <option value={{ $city->id }}>{{ $city->city_name }}, {{ $city->province_name }}, {{ $city->postal_code }}</option>
                @endforeach
            </select>
            @error('id_city')
                <div class="w-full text-sm text-red-500 lg:text-base">{{ $message }}</div>
            @enderror
            <label class="mt-2 text-sm text-black lg:text-base" for="detail">Detail alamat</label>
            <input required class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-base @error('detail') border-2 border-red-500 @enderror" type="text" name="detail" id="detail" value="{{ old('detail') }}">
            @error('detail')
                <div class="w-full text-sm text-red-500 lg:text-base">{{ $message }}</div>
            @enderror
            <label class="mt-2 text-sm text-black lg:text-base" for="catatan">Catatan</label>
            <input required class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-base @error('catatan') border-2 border-red-500 @enderror" type="text" name="catatan" id="catatan" value="{{ old('catatan') }}">
            <p class= "text-xs opacity-90">Catatan untuk kurir. Contoh: warna rumah</p>
            @error('catatan')
                <div class="w-full text-sm text-red-500 lg:text-base">{{ $message }}</div>
            @enderror
            <label class="mt-2 text-sm text-black lg:text-base" for="no_hp">Nomor HP</label>
            <input required class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-base @error('no_hp') border-2 border-red-500 @enderror" type="tel" name="no_hp" id="no_hp" value="{{ old('no_hp', Auth::user()->no_hp) }}">
            @error('no_hp')
                <div class="w-full text-sm text-red-500 lg:text-base">{{ $message }}</div>
            @enderror
            <button type="submit" class="w-auto p-2 px-4 mx-auto mt-3 text-xs text-white bg-blue-500 rounded-md sm:text-sm">Simpan</button>
    </form>
</div>
@endsection