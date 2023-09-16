@extends('layouts.main')
@section('content')
<div id="formTambahAlamat">
    <form action="/alamat" method="post" class="flex flex-col max-w-md mx-auto mt-5">
            @csrf
            <h1 class="font-semibold text-center uppercase text-md lg:text-l">Form Tambah Alamat</h1>
            @if (session()->has('succesTambahAlamat'))
            <div class="w-auto mx-auto my-1 overflow-hidden rounded-md">
                <div class="px-4 py-2 bg-green-500 ">{{ session('succesTambahAlamat') }}</div>
            </div>
            @endif
            <input type="hidden" name="id_user" value="{{ Auth::user()->id }} />
            <label class="text-sm text-black lg:text-md" for="penerima">Penerima</label>
            <input class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-md @error('penerima') border-2 border-red-500 @enderror" type="text" name="penerima" id="penerima" value="{{ old('penerima', Auth::user()->name) }}">
            @error('penerima')
                <div class="w-full text-sm text-red-500 lg:text-md">{{ $message }}</div>
            @enderror
            <label class="mt-2 text-sm text-black lg:text-md" for="label">Label</label>
            <select name="label" class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-md @error('label') border-2 border-red-500 @enderror" id="label">
                <option value="Rumah">Rumah</option>
                <option value="Kantor">Kantor</option>
                <option value="Apartemen">Apartemen</option>
                <option value="Kos">Kos</option>
            </select>
            @error('label')
                <div class="w-full text-sm text-red-500 lg:text-md">{{ $message }}</div>
            @enderror
            <label class="mt-2 text-sm text-black lg:text-md" for="kelurahan">Keluharan</label>
            <input class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-md @error('kelurahan') border-2 border-red-500 @enderror" type="text" name="kelurahan" id="kelurahan" value="{{ old('kelurahan') }}">
            @error('kelurahan')
                <div class="w-full text-sm text-red-500 lg:text-md">{{ $message }}</div>
            @enderror
            <label class="mt-2 text-sm text-black lg:text-md" for="kecamatan">Kecamatan</label>
            <input class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-md @error('kecamatan') border-2 border-red-500 @enderror" type="text" name="kecamatan" id="kecamatan" value="{{ old('kecamatan') }}">
            @error('kecamatan')
                <div class="w-full text-sm text-red-500 lg:text-md">{{ $message }}</div>
            @enderror
            <label class="mt-2 text-sm text-black lg:text-md" for="kabupaten">Kabupaten</label>
            <input class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-md @error('kabupaten') border-2 border-red-500 @enderror" type="text" name="kabupaten" id="kabupaten" value="{{ old('kabupaten') }}">
            @error('kabupaten')
                <div class="w-full text-sm text-red-500 lg:text-md">{{ $message }}</div>
            @enderror
            <label class="mt-2 text-sm text-black lg:text-md" for="provinsi">Provinsi</label>
            <input class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-md @error('provinsi') border-2 border-red-500 @enderror" type="text" name="provinsi" id="provinsi" value="{{ old('provinsi') }}">
            @error('provinsi')
                <div class="w-full text-sm text-red-500 lg:text-md">{{ $message }}</div>
            @enderror
            <label class="mt-2 text-sm text-black lg:text-md" for="detail">Detail alamat</label>
            <input class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-md @error('detail') border-2 border-red-500 @enderror" type="text" name="detail" id="detail" value="{{ old('detail') }}">
            @error('detail')
                <div class="w-full text-sm text-red-500 lg:text-md">{{ $message }}</div>
            @enderror
            <label class="mt-2 text-sm text-black lg:text-md" for="catatan">Catatan</label>
            <input class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-md @error('catatan') border-2 border-red-500 @enderror" type="text" name="catatan" id="catatan" value="{{ old('catatan') }}">
            <p class= "text-xs opacity-90">Catatan untuk kurir. Contoh: warna rumah</p>
            @error('catatan')
                <div class="w-full text-sm text-red-500 lg:text-md">{{ $message }}</div>
            @enderror
            <label class="mt-2 text-sm text-black lg:text-md" for="no_hp">Nomor HP</label>
            <input class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-md @error('no_hp') border-2 border-red-500 @enderror" type="tel" name="no_hp" id="no_hp" value="{{ old('no_hp', Auth::user()->no_hp) }}">
            @error('no_hp')
                <div class="w-full text-sm text-red-500 lg:text-md">{{ $message }}</div>
            @enderror
            <button type="submit" class="w-auto p-2 px-4 mx-auto mt-3 text-xs text-white bg-blue-500 rounded-md sm:text-sm">Simpan</button>
    </form>
</div>