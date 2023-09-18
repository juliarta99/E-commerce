@extends('layouts.main')
@section('content')
<div class="w-full">
    <form action="/alamat/{{ $alamat->id }}" method="post" class="flex flex-col max-w-md mx-auto mt-5">
          @csrf
          @method('put')
          <h1 class="font-semibold text-center uppercase text-base lg:text-l">Edit Alamat</h1>
         
          <label class="text-sm text-black lg:text-base" for="penerima">Penerima</label>
          <input class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-base @error('penerima') border-2 border-red-500 @enderror" type="text" name="penerima" id="penerima" value="{{ old('penerima', $alamat->penerima) }}">
          @error('penerima')
                <div class="w-full text-sm text-red-500 lg:text-base">{{ $message }}</div>
          @enderror

          <label class="mt-2 text-sm text-black lg:text-base" for="label">Label</label>
          <select name="label" class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-base @error('label') border-2 border-red-500 @enderror" id="label">
                @if ($alamat->label == 'Rumah')    
                      <option value="Rumah">Rumah</option>
                      <option value="Kantor">Kantor</option>
                      <option value="Apartemen">Apartemen</option>
                      <option value="Kos">Kos</option>
                @endif
                @if ($alamat->label == 'Kantor')
                      <option value="Rumah">Rumah</option>
                      <option value="Kantor" selected>Kantor</option>
                      <option value="Apartemen">Apartemen</option>
                      <option value="Kos">Kos</option>
                @endif
                @if ($alamat->label == 'Apartemen')
                      <option value="Rumah">Rumah</option>
                      <option value="Kantor">Kantor</option>
                      <option value="Apartemen" selected>Apartemen</option>
                      <option value="Kos">Kos</option>
                @endif
                @if ($alamat->label == 'Kos')
                      <option value="Rumah">Rumah</option>
                      <option value="Kantor">Kantor</option>
                      <option value="Apartemen">Apartemen</option>
                      <option value="Kos" selected>Kos</option>
                @endif
          </select>
          @error('label')
                <div class="w-full text-sm text-red-500 lg:text-base">{{ $message }}</div>
          @enderror

          <label class="mt-2 text-sm text-black lg:text-base" for="kelurahan">Keluharan</label>
          <input class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-base @error('kelurahan') border-2 border-red-500 @enderror" type="text" name="kelurahan" id="kelurahan" value="{{ old('kelurahan', $alamat->kelurahan) }}">
          @error('kelurahan')
                <div class="w-full text-sm text-red-500 lg:text-base">{{ $message }}</div>
          @enderror

          <label class="mt-2 text-sm text-black lg:text-base" for="kecamatan">Kecamatan</label>
          <input class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-base @error('kecamatan') border-2 border-red-500 @enderror" type="text" name="kecamatan" id="kecamatan" value="{{ old('kecamatan', $alamat->kecamatan) }}">
          @error('kecamatan')
                <div class="w-full text-sm text-red-500 lg:text-base">{{ $message }}</div>
          @enderror

          <label class="mt-2 text-sm text-black lg:text-base" for="kabupaten">Kabupaten</label>
          <input class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-base @error('kabupaten') border-2 border-red-500 @enderror" type="text" name="kabupaten" id="kabupaten" value="{{ old('kabupaten', $alamat->kabupaten) }}">
          @error('kabupaten')
                <div class="w-full text-sm text-red-500 lg:text-base">{{ $message }}</div>
          @enderror

          <label class="mt-2 text-sm text-black lg:text-base" for="provinsi">Provinsi</label>
          <input class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-base @error('provinsi') border-2 border-red-500 @enderror" type="text" name="provinsi" id="provinsi" value="{{ old('provinsi', $alamat->provinsi) }}">
          @error('provinsi')
                <div class="w-full text-sm text-red-500 lg:text-base">{{ $message }}</div>
          @enderror

          <label class="mt-2 text-sm text-black lg:text-base" for="detail">Detail alamat</label>
          <input class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-base @error('detail') border-2 border-red-500 @enderror" type="text" name="detail" id="detail" value="{{ old('detail', $alamat->detail) }}">
          @error('detail')
                <div class="w-full text-sm text-red-500 lg:text-base">{{ $message }}</div>
          @enderror

          <label class="mt-2 text-sm text-black lg:text-base" for="catatan">Catatan</label>
          <input class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-base @error('catatan') border-2 border-red-500 @enderror" type="text" name="catatan" id="catatan" value="{{ old('catatan', $alamat->catatan) }}">
          <p class= "text-xs opacity-90">Catatan untuk kurir. Contoh: warna rumah</p>
          @error('catatan')
                <div class="w-full text-sm text-red-500 lg:text-base">{{ $message }}</div>
          @enderror

          <label class="mt-2 text-sm text-black lg:text-base" for="no_hp">Nomor HP</label>
          <input class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-base @error('no_hp') border-2 border-red-500 @enderror" type="tel" name="no_hp" id="no_hp" value="{{ old('no_hp', $alamat->no_hp) }}">
          @error('no_hp')
                <div class="w-full text-sm text-red-500 lg:text-base">{{ $message }}</div>
          @enderror

          <button type="submit" class="w-auto p-2 px-4 mx-auto mt-3 text-xs text-white bg-blue-500 rounded-md sm:text-sm">Simpan</button>
    </form>
</div>