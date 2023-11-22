@extends('dashboard.layouts.main')
@section('content')
    <h1 class="text-xl lg:text-2xl font-bold mb-3">Comment by {{ $comment->transaksi->transaksi->user->name }}</h1>
    <p class="text-sm">Transaksi: #{{ $comment->transaksi->transaksi->kd }}</p>
    <p class="text-sm">Product: {{ $comment->transaksi->product->name }}</p>
    <p class="text-sm mt-2">Rate: {{ $comment->rate }}</p>
    @if ($comment->image)
        <a href="{{ asset('storage/'.$comment->image) }}" data-fancybox data-caption="Image by {{ $comment->transaksi->transaksi->user->name }}">
            <img src="{{ asset('storage/'.$comment->image) }}" class="max-w-sm max-h-44 rounded-md mt-2 hover:scale-95 transition-all" alt="Image">
        </a>
    @endif
    <p class="text-xs lg:text-sm mt-2">{{ $comment->body }}</p>
@endsection