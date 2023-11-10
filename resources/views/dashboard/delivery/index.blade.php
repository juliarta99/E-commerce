@extends('dashboard.layouts.main')
@section('content')
    <table id="table" class="bg-slate-900" style="width:100%;">
        <thead>
            <tr>
                <th>Transaksi</th>
                <th>Origin</th>
                <th>Destination</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($deliverys as $delivery)
                <tr>
                    <td>{{ $delivery->transaksi->kd }}</td>
                    <td>{{ $delivery->origin_city }}, {{ $delivery->origin_province }}</td>
                    <td>{{ $delivery->destination_city }}, {{ $delivery->destination_province }}</td>
                    <td>{{ $delivery->status }}</td>
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