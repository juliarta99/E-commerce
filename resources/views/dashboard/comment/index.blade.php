@extends('dashboard.layouts.main')
@section('content')
    <table id="table" class="bg-slate-900" style="width:100%;">
        <thead>
            <tr>
                <th>User</th>
                <th>Rate</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comments as $comment)
                <tr>
                    <td>{{ $comment->transaksi->transaksi->user->name }}</td>
                    <td>{{ $comment->rate }}</td>
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