@extends('dashboard.layouts.main')
@section('content')
    <div class="flex justify-between mb-3">
        <h1 class="text-xl lg:text-2xl font-bold">Kategori</h1>
        <button id="toggle-modal" onclick="showModal()" class="p-2 px-4 flex items-center gap-3 rounded-md bg-blue-700 text-white font-bold text-sm lg:text-base">
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" class="fill-white" viewBox="0 0 448 512"><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>
            <p>Add Kategori</p>
        </button>
    </div>
    <table id="table" class="bg-slate-900" style="width:100%;">
        <thead>
            <tr>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategoris as $kategori)
                <tr>
                    <td>{{ $kategori->name }}</td>
                    <td>aksi</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div id="modal" class="hidden text-black fixed top-0 left-0 w-full h-screen z-[9998]">
        <div class="relative flex justify-center items-center w-full h-full p-4">
            <div onclick="closeModal()" class="bg-[rgba(0,0,0,.5)] absolute top-0 left-0 w-full h-full z-[9998]"></div>
            <div class="bg-white rounded-md p-4 max-w-lg w-[512px] z-[9999]">
                <div class="flex justify-between mb-4">
                    <h1 class="text-center text-base lg:text-lg font-bold">Add Category</h1>
                    <button id="close-modal" onclick="closeModal()">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>
                    </button>
                </div>
                <form action="{{ route('kategori.create') }}" method="post">
                    @csrf
                    <label class="mt-2 text-sm text-black lg:text-base" for="name">Name</label>
                    <input required class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-base @error('name') border-2 border-red-500 @enderror" type="text" name="name" id="name" placeholder="Name" value="{{ old('name') }}">
                    @error('name')
                        <div class="w-full text-sm text-red-500 lg:text-base">{{ $message }}</div>
                    @enderror
                    <button class="mt-3 p-2 px-4 flex items-center gap-3 rounded-md bg-blue-700 text-white text-sm lg:text-base">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        $('#table').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf', 'print'
            ]
        } );
    </script>
@endsection