@extends('dashboard.layouts.main')
@section('content')
    <h1 class="text-xl lg:text-2xl font-bold mb-3">Comment</h1>
    @if (session()->has('error'))
        <div class="w-auto p-2 px-2 mt-8 text-sm font-semibold text-center bg-red-500 rounded-t-md lg:mt-4 lg:text-base">{{ session('error') }}</div>
    @endif
    @if (session()->has('success'))
        <div class="w-auto p-2 px-2 mt-8 text-sm font-semibold text-center bg-green-500 rounded-t-md lg:mt-4 lg:text-base">{{ session('success') }}</div>
    @endif
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
                    <td class="flex gap-2">
                        <a href="{{ route('dashboard.comment.show', $comment->id) }}">
                            <button class="p-2 rounded-md bg-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-white" viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg>
                            </button>
                        </a>
                        <form action="{{ route('dashboard.comment.delete', $comment->id) }}" onsubmit="return confirm('Apakah anda yakin ingin menghapus comment ini?')" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="p-2 rounded-md bg-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" class="fill-white" viewBox="0 0 448 512"><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                            </button>
                        </form>
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