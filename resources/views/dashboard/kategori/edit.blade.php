@extends('dashboard.layouts.main')
@section('content')
    <h1 class="text-xl lg:text-2xl font-bold mb-3">Edit Kategori "{{ $kategori->name }}"</h1>
    <form action="{{ route('kategori.update', $kategori->slug) }}" onsubmit="return confirm('Memperbaharui kategori ini akan membuat produk dengan kategori ini berubah juga!\nApakah anda yakin?')" method="post">
        @csrf
        @method('put')
        <label class="mt-2 text-sm text-gray-200 lg:text-base" for="name">Name</label>
        <input required class="w-full px-4 py-2 text-sm bg-gray-500 rounded-md lg:text-base @error('name') border-2 border-red-500 @enderror" type="text" autofocus name="name" id="name" placeholder="Name" value="{{ old('name', $kategori->name) }}">
        @error('name')
            <div class="w-full text-sm text-red-500 lg:text-base">{{ $message }}</div>
        @enderror
        <button class="mt-3 p-2 px-4 flex items-center gap-3 rounded-md bg-blue-700 text-white text-sm lg:text-base">Submit</button>
    </form>
@endsection