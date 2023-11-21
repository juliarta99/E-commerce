@extends('layouts.main')
@section('content')
<div class="pt-36 lg:pt-24 h-screen">
    <form action="{{ route('comment.update', $comment->id) }}" onsubmit="return confirm('Apakah anda yakin ingin memperbaharui ulasan ini?')" method="post" enctype="multipart/form-data" class="flex flex-col max-w-md mx-auto mt-5">
        @csrf
        @method('put')
        <h1 class="font-semibold text-center uppercase text-base lg:text-lg">Ulasan {{ $comment->transaksi->product->name }}</h1>
        <label class="mt-2 text-sm text-black lg:text-base" for="image">Image</label>
        <input class="image w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-base @error('image') border-2 border-red-500 @enderror" type="file" name="image" id="image" accept="image/*" value="{{ old('image') }}">
        @error('image')
            <div class="w-full text-sm text-red-500 lg:text-base">{{ $message }}</div>
        @enderror

        <label class="mt-2 text-sm text-black lg:text-base" for="rate">Rate</label>
        <select required class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-base @error('rate') border-2 border-red-500 @enderror" id="rate" name="rate" id="rate">
            @foreach ($rates as $rate)
                <option value={{ $rate['value'] }} @selected($rate['value'] == old('rate') || $rate['value'] == $comment->rate)>{{ $rate['value']}}</option>
            @endforeach
        </select>
        @error('rate')
            <div class="w-full text-sm text-red-500 lg:text-base">{{ $message }}</div>
        @enderror
        <label class="mt-2 text-sm text-black lg:text-base" for="body">Ulasan</label>
        <textarea name="body" id="body" cols="30" rows="5" class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-base @error('body') border-2 border-red-500 @enderror" value="{{ $comment->body ?? old('body') }}">{{  $comment->body ?? old('body') }}</textarea>
        @error('body')
            <div class="w-full text-sm text-red-500 lg:text-base">{{ $message }}</div>
        @enderror
        <button class="w-auto p-2 px-4 mx-auto mt-3 text-xs text-white bg-blue-500 rounded-md sm:text-sm">Update</button>
    </form>
</div>
@endsection