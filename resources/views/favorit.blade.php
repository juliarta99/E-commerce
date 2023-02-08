@extends('layouts.main')
@section('content')
<div class="pb-10 px-9 pt-36 lg:pt-24">
    <div class="w-full">
        @foreach ($favorits as $favorit)
            <p>{{ $favorit->toko->name }}</p>
        @endforeach
    </div>
</div>
@endsection