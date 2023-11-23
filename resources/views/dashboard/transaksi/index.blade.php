@extends('dashboard.layouts.main')
@section('content')
    <h1 class="text-xl lg:text-2xl font-bold mb-3">Transaksi</h1>
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
                    <td class="bg-{{ $transaksi->status == 'success' ? 'green' : ($transaksi->status == 'cancel' ? 'red' : 'yellow') }}-500">{{ $transaksi->status }}</td>
                    <td>
                        <a href="{{ route('dashboard.transaksi.show', $transaksi->kd) }}">
                            <button class="p-2 rounded-md bg-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-white" viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg>
                            </button>
                        </a>
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