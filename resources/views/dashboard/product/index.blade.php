@extends('dashboard.layouts.main')
@section('content')
    <table id="table" class="bg-slate-900" style="width:100%;">
        <thead>
            <tr>
                <th>Name</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->kategori->name }}</td>
                    <td>@currency($product->harga)</td>
                    <td>{{ $product->stok }}</td>
                    <td>aksi</td>
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