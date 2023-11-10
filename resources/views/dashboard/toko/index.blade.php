@extends('dashboard.layouts.main')
@section('content')
    @if (session()->has('error'))
        <div class="w-auto p-2 px-2 mt-8 text-sm font-semibold text-center bg-red-500 rounded-t-md lg:mt-4 lg:text-base">{{ session('error') }}</div>
    @endif
    @if (session()->has('success'))
        <div class="w-auto p-2 px-2 mt-8 text-sm font-semibold text-center bg-green-500 rounded-t-md lg:mt-4 lg:text-base">{{ session('success') }}</div>
    @endif
    <table id="table" class="bg-slate-900" style="width:100%;">
        <thead>
            <tr>
                <th>Name</th>
                <th>User</th>
                <th>City</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tokos as $toko)
                <tr>
                    <td>{{ $toko->name }}</td>
                    <td>{{ $toko->user->name }}</td>
                    <td>{{ $toko->city->city_name }}, {{ $toko->city->province_name }}</td>
                    <td class="flex gap-2">
                        <form action="">
                            @csrf
                            <button class="p-2 rounded-md bg-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-white" viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg>
                            </button>
                        </form>
                        <a href={{ asset('storage/'. $toko->izin_usaha) }} data-fancybox data-caption="Izin Usaha {{ $toko->name }}">
                            <button class="p-2 rounded-md bg-yellow-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-white" viewBox="0 0 384 512"><path d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM64 256a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm152 32c5.3 0 10.2 2.6 13.2 6.9l88 128c3.4 4.9 3.7 11.3 1 16.5s-8.2 8.6-14.2 8.6H216 176 128 80c-5.8 0-11.1-3.1-13.9-8.1s-2.8-11.2 .2-16.1l48-80c2.9-4.8 8.1-7.8 13.7-7.8s10.8 2.9 13.7 7.8l12.8 21.4 48.3-70.2c3-4.3 7.9-6.9 13.2-6.9z"/></svg>
                            </button>
                        </a>
                        @if ($toko->approve)
                            <form action={{ route('dashboard.toko.notApprove', $toko->slug) }} onsubmit="return confirm('Apakah anda yakin untuk melarang toko {{ $toko->name }} untuk berjualan?')" method="POST">
                                @csrf
                                @method('put')
                                <button class="p-2 rounded-md bg-red-500">
                                    <svg xmlns="http://www.w3.org/2000/svg"  class="h-4 w-4 fill-white" viewBox="0 0 640 512"><path d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7l-54.8-43V224H512V376L384 275.7V224H320v1.5L277.2 192H603.2c20.3 0 36.8-16.5 36.8-36.8c0-7.3-2.2-14.4-6.2-20.4L558.2 21.4C549.3 8 534.4 0 518.3 0H121.7c-16 0-31 8-39.9 21.4L74.1 32.8 38.8 5.1zM36.8 192h85L21 112.5 6.2 134.7c-4 6.1-6.2 13.2-6.2 20.4C0 175.5 16.5 192 36.8 192zM320 384H128V224H64V384v80c0 26.5 21.5 48 48 48H336c26.5 0 48-21.5 48-48V398.5l-64-50.4V384z"/></svg>
                                </button>
                            </form>
                        @else
                            <form action={{ route('dashboard.toko.approve', $toko->slug) }} onsubmit="return confirm('Apakah anda yakin untuk mengizinkan toko {{ $toko->name }} untuk berjualan?')" method="POST">
                                @csrf
                                @method('put')
                                <button class="p-2 rounded-md bg-green-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-white" viewBox="0 0 448 512"><path d="M342.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 178.7l-57.4-57.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l80 80c12.5 12.5 32.8 12.5 45.3 0l160-160zm96 128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 402.7 54.6 297.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l256-256z"/></svg>
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        $('#table').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf', 'print'
            ]
        } );
    </script>
@endsection