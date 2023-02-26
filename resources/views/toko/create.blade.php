@extends('layouts.main')
@section('content')
<div class="pb-10 px-9 pt-36 lg:pt-24">
      <div class="w-full">
            <form action="/toko/create" method="post" enctype="multipart/form-data" class="flex flex-col max-w-md mx-auto mt-5">
                  @csrf
                  <h1 class="font-semibold text-center uppercase text-md lg:text-lg">Buat Toko</h1>
                  @if (session()->has('succesBuatToko'))
                  <div id="sessionSucces" class="w-auto mx-auto my-1 overflow-hidden rounded-md">
                        <div class="px-4 py-2 bg-green-500 ">{{ session('succesBuatToko') }}</div>
                        <div id="timeSessionSucces" class="h-1 bg-black"></div>
                  </div>
                  @endif
                  <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                  <label class="mt-2 text-sm text-black lg:text-md" for="name">Name Toko</label>
                  <input class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-md @error('name') border-2 border-red-500 @enderror" type="text" name="name" id="name" value="{{ old('name', Auth::user()->name) }}">
                  @error('name')
                        <div class="w-full text-sm text-red-500 lg:text-md">{{ $message }}</div>
                  @enderror
            
                  <label class="mt-2 text-sm text-black lg:text-md" for="image">Profile Image</label>
                  <input class="image w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-md @error('image') border-2 border-red-500 @enderror" type="file" name="image" id="image" value="{{ old('image') }}">
                  @error('image')
                        <div class="w-full text-sm text-red-500 lg:text-md">{{ $message }}</div>
                  @enderror
            
                  <label class="mt-2 text-sm text-black lg:text-md" for="alamat">Alamat</label>
                  <input class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-md @error('alamat') border-2 border-red-500 @enderror" type="alamat" name="alamat" id="alamat" value="{{ old('alamat') }}">
                  @error('alamat')
                        <div class="w-full text-sm text-red-500 lg:text-md">{{ $message }}</div>
                  @enderror
            
                  <label class="mt-2 text-sm text-black lg:text-md" for="tentang">Tentang</label>
                  <textarea name="tentang" id="tentang" cols="30" rows="5" class="w-full px-4 py-2 text-sm bg-gray-200 rounded-md lg:text-md @error('tentang') border-2 border-red-500 @enderror" value="{{ old('tentang') }}">{{ old('tentang') }}</textarea>
                  @error('tentang')
                        <div class="w-full text-sm text-red-500 lg:text-md">{{ $message }}</div>
                  @enderror
            
                  <button class="w-auto p-2 px-4 mx-auto mt-3 text-xs text-white bg-blue-500 rounded-md sm:text-sm">Simpan</button>
            </form>
            {{-- <button type="button" class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800" data-hs-overlay="#modal-cropImage">
                  Open modal
                </button> --}}
            {{-- modal crop image --}}
                <div id="modal-cropImage" class="pb-10 px-9 pt-36 lg:pt-24 hs-overlay hidden w-full h-full fixed top-0 left-0 z-[60] overflow-x-hidden overflow-y-auto">
                  <div class="hs-overlay-open:opacity-100 hs-overlay-open:duration-500 opacity-0 transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                    <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                      <div class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
                        <h3 class="font-bold text-gray-800 dark:text-white">
                          Crop Image
                        </h3>
                        <button onclick="destroyCrop()" type="button" class="hs-dropdown-toggle inline-flex flex-shrink-0 justify-center items-center h-8 w-8 rounded-md text-gray-500 hover:text-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-white transition-all text-sm dark:focus:ring-gray-700 dark:focus:ring-offset-gray-800" data-hs-overlay="#modal-cropImage">
                          <span class="sr-only">Close</span>
                          <svg class="w-3.5 h-3.5" width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.258206 1.00652C0.351976 0.912791 0.479126 0.860131 0.611706 0.860131C0.744296 0.860131 0.871447 0.912791 0.965207 1.00652L3.61171 3.65302L6.25822 1.00652C6.30432 0.958771 6.35952 0.920671 6.42052 0.894471C6.48152 0.868271 6.54712 0.854471 6.61352 0.853901C6.67992 0.853321 6.74572 0.865971 6.80722 0.891111C6.86862 0.916251 6.92442 0.953381 6.97142 1.00032C7.01832 1.04727 7.05552 1.1031 7.08062 1.16454C7.10572 1.22599 7.11842 1.29183 7.11782 1.35822C7.11722 1.42461 7.10342 1.49022 7.07722 1.55122C7.05102 1.61222 7.01292 1.6674 6.96522 1.71352L4.31871 4.36002L6.96522 7.00648C7.05632 7.10078 7.10672 7.22708 7.10552 7.35818C7.10442 7.48928 7.05182 7.61468 6.95912 7.70738C6.86642 7.80018 6.74102 7.85268 6.60992 7.85388C6.47882 7.85498 6.35252 7.80458 6.25822 7.71348L3.61171 5.06702L0.965207 7.71348C0.870907 7.80458 0.744606 7.85498 0.613506 7.85388C0.482406 7.85268 0.357007 7.80018 0.264297 7.70738C0.171597 7.61468 0.119017 7.48928 0.117877 7.35818C0.116737 7.22708 0.167126 7.10078 0.258206 7.00648L2.90471 4.36002L0.258206 1.71352C0.164476 1.61976 0.111816 1.4926 0.111816 1.36002C0.111816 1.22744 0.164476 1.10028 0.258206 1.00652Z" fill="currentColor"/>
                          </svg>
                        </button>
                      </div>
                      <div class="p-4 overflow-y-auto">
                        <div class="flex">
                              <div class="w-4/6">
                                    <img src="https://avatars0.githubusercontent.com/u/3456749" alt="image" id="imageCrop">
                              </div>
                              <div class="w-2/6">
                                    <div class="preview"></div>
                              </div>
                        </div>
                      </div>
                      <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-gray-700">
                        <button onclick="destroyCrop()" type="button" class="hs-dropdown-toggle py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800" data-hs-overlay="#modal-cropImage">
                          Close
                        </button>
                        <button class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800" onclick="saveCrop()" id="crop">
                          Save changes
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
      </div>
</div>
@endsection