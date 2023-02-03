@extends('layouts.main')
@section('content')
    <div class="pt-38">
      @foreach ($keranjangs as $keranjang)
          
      <p>{{ $keranjang->product->name }}</p>
      @endforeach
    </div>
@endsection