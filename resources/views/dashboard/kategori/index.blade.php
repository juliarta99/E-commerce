@extends('dashboard.layouts.main')
@section('content')
    <div class="flex justify-between mb-3">
        <h1 class="text-xl lg:text-2xl font-bold">Kategori</h1>
        <button id="toggle-modal" onclick="showModal()" data-target="modal" class="p-2 px-4 flex items-center gap-3 rounded-md bg-blue-700 text-white font-bold text-sm lg:text-base">
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" class="fill-white" viewBox="0 0 448 512"><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>
            <p>Add Kategori</p>
        </button>
    </div>
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
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategoris as $kategori)
                <tr>
                    <td>{{ $kategori->name }}</td>
                    <td class="flex gap-2">
                        <a href="{{ route('kategori.edit', $kategori->slug) }}">
                            <button type="button" class="p-2 rounded-md bg-yellow-500">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" class="fill-white" viewBox="0 0 512 512"><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg>
                            </button>
                        </a>
                        @if(count($kategori->products) == 0)
                            <form action="{{ route('kategori.delete', $kategori->slug) }}" onsubmit="return confirm('Apakah anda yakin ingin menghapus kategori ini?')" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="p-2 rounded-md bg-red-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" class="fill-white" viewBox="0 0 448 512"><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                                </button>
                            </form>
                        @endif
                    </td>
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