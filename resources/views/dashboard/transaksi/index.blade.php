@extends('dashboard.layouts.main')
@section('content')
    <table id="table" class="bg-slate-900" style="width:100%;">
        <thead>
            <tr>
                <th>Kode</th>
                <th>User</th>
                <th>Total</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksis as $transaksi)
                <tr>
                    <td>{{ $transaksi->kd }}</td>
                    <td>{{ $transaksi->user->name }}</td>
                    <td>@currency($transaksi->total_transaksi)</td>
                    <td>{{ $transaksi->status }}</td>
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