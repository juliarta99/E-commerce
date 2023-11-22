@extends('dashboard.layouts.main')
@section('content')
    <h1 class="text-xl lg:text-2xl font-bold mb-3">Toko {{ $toko->name }}</h1>
    <p class="text-sm">User: {{ $toko->user->name }}</p>
    <p class="text-sm">Location: {{ $toko->city->city_name }}, {{ $toko->city->province_name }}</p>
    <p class="text-sm">Created on date: {{ date('d F Y, h:i:s A', strtotime($toko->created_at)) }}</p>
    @if ($toko->image)
        <a href="{{ asset('storage/'.$toko->image) }}" data-fancybox data-caption="Image by {{ $toko->user->name }}">
            <img src="{{ asset('storage/'.$toko->image) }}" class="w-20 h-20 object-cover rounded-full mt-2 hover:scale-95 transition-all" alt="Image">
        </a>
    @endif
    <p class="text-xs lg:text-sm mt-2">{{ $toko->tentang }}</p>
    @if ($toko->backImage)
        <a href="{{ asset('storage/'.$toko->backImage) }}" data-fancybox data-caption="Image by {{ $toko->user->name }}">
            <button class="p-2 rounded-md bg-blue-700 flex items-center gap-2 text-xs lg:text-sm mt-3">
                <p>Background Image</p>
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" class="fill-white" viewBox="0 0 512 512"><path d="M320 0c-17.7 0-32 14.3-32 32s14.3 32 32 32h82.7L201.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L448 109.3V192c0 17.7 14.3 32 32 32s32-14.3 32-32V32c0-17.7-14.3-32-32-32H320zM80 32C35.8 32 0 67.8 0 112V432c0 44.2 35.8 80 80 80H400c44.2 0 80-35.8 80-80V320c0-17.7-14.3-32-32-32s-32 14.3-32 32V432c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16H192c17.7 0 32-14.3 32-32s-14.3-32-32-32H80z"/></svg>
            </button>
        </a>
    @endif
    <a href="{{ asset('storage/'.$toko->izin_usaha) }}" data-fancybox data-caption="Image by {{ $toko->user->name }}">
        <button class="p-2 rounded-md bg-blue-700 flex items-center gap-2 text-xs lg:text-sm mt-3">
            <p>Business Permit</p>
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" class="fill-white" viewBox="0 0 512 512"><path d="M320 0c-17.7 0-32 14.3-32 32s14.3 32 32 32h82.7L201.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L448 109.3V192c0 17.7 14.3 32 32 32s32-14.3 32-32V32c0-17.7-14.3-32-32-32H320zM80 32C35.8 32 0 67.8 0 112V432c0 44.2 35.8 80 80 80H400c44.2 0 80-35.8 80-80V320c0-17.7-14.3-32-32-32s-32 14.3-32 32V432c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16H192c17.7 0 32-14.3 32-32s-14.3-32-32-32H80z"/></svg>
        </button>
    </a>
@endsection