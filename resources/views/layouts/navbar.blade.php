<nav class="w-full shadow-sm fixed bg-white z-[999]">
      <div class="flex items-center justify-between py-4 px-9">
            <div id="logo" class="cursor-pointer">
                  <a href="/">
                        <h1 class="font-semibold text-blue-500 text-md sm:text-xl lg:text-2xl">E-commerce</h1>
                  </a>
            </div>
            <form action="/products" class="hidden w-1/2 lg:block">
                  <div class="flex">
                        <input type="text" name="search" id="search" placeholder="Cari produk pilihan anda" class="w-full px-2 py-1 text-xs rounded-l-lg shadow-md outline-none lg:text-sm lg:px-4 lg:py-2" value="{{ request('search') }}">
                        <button type="submit" class="p-1 bg-gray-200 rounded-r-lg shadow-md lg:p-2">
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 sm:w-6 sm:h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                              </svg>                            
                        </button>
                  </div>
            </form>
            <div class="flex">
                  <div class="flex items-center justify-center mr-4 border-r-2 border-r-gray-500">
                        <div class="mr-2 cursor-pointer">
                              <a href="/keranjang">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="{{ Request::is('keranjang') ? 'blue' : '#000' }}" class="w-4 h-4 sm:w-6 sm:h-6">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                    </svg>
                              </a>
                        </div>
                        @auth    
                              <div class="mr-2 cursor-pointer">
                                    <a href="/notification">
                                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="{{ Request::is('notification') ? 'blue' : '#000' }}" class="w-4 h-4 sm:w-6 sm:h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                                          </svg>
                                    </a>
                              </div>
                              <div class="mr-2 cursor-pointer">
                                    <a href="/chats">
                                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="{{ Request::is('chats') ? 'blue' : '#000' }}" class="w-4 h-4 sm:w-6 sm:h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                          </svg>                            
                                    </a>
                              </div>
                        @endauth
                  </div>
                  @auth
                      <div class="flex items-center justify-center">
                        <div class="mr-2 cursor-pointer" id="toko">
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="{{ Request::is('toko') ? 'blue' : '#000' }}" class="w-4 h-4 sm:w-6 sm:h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
                              </svg>
                              <div id="showToko" class="absolute hidden p-4 -translate-x-4 translate-y-20 bg-white rounded-md shadow-md lg:translate-y-4">
                                    @if (Auth::user()->is_toko == true)
                                          {{-- to toko --}}
                                          <a href="/toko">
                                                <div class="flex items-center">
                                                      @foreach (Auth::user()->toko()->get() as $toko)
                                                            @if ($toko->image != null)
                                                                  <img src="storage/{{ $toko->image }}" alt="mkd" class="w-6 h-6 mr-1 rounded-full">
                                                            @else
                                                                  <img src="{{ asset('img/toko_default.jpg') }}" alt="ProfileToko" class="w-6 h-6 mr-1 rounded-full">
                                                            @endif
                                                            <h1 class="text-xs lg:text-sm">{{ $toko->name }}</h1>
                                                      @endforeach
                                                </div>
                                          </a>
                                    @else
                                          {{-- buat toko --}}
                                          <h1 class="text-xs lg:text-sm">Toko belum dibuat!!</h1>
                                          <a href="/toko/create" class="text-xs text-blue-500 lg:text-sm">Buat Toko</a>
                                    @endif
                              </div>                               
                        </div>
                        <div class="flex items-center justify-center cursor-pointer" id="profile">
                              @if (Auth::user()->image != null)
                                    <img src="{{ asset('storage/'. Auth::user()->image) }}" alt="Profile" class="w-6 h-6 mr-1 rounded-full sm:w-8 sm:h-8">
                              @else
                                    <img src="{{ asset('img/profile_default.png') }}" alt="Profile" class="w-6 h-6 mr-1 rounded-full sm:w-8 sm:h-8">
                              @endif
                              <p class="text-xs first-letter:font-semibold sm:text-sm lg:text-md">{{ Auth::user()->name }}</p>
                              <div id="show-profile" class="absolute hidden p-4 bg-white rounded-md shadow-md translate-y-36 lg:translate-y-24">
                                    <div class="mb-1">
                                          <a class="flex items-center" href="/editProfile">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="{{ Request::is('editProfile') ? 'blue' : '#000' }}" class="w-4 h-4">
                                                      <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                                </svg>
                                                <p class="ml-2 text-sm lg:text-md {{ Request::is('editProfile') ? 'text-blue-500' : '#000' }}">Edit Profile</p>
                                          </a>
                                    </div>
                                    <div class="mb-1">
                                          <a class="flex items-center" href="">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="{{ Request::is('pembelian') ? 'blue' : '#000' }}" class="w-4 h-4 sm:w-6 sm:h-6">
                                                      <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                                </svg>     
                                                <p class="ml-2 text-sm lg:text-md {{ Request::is('pembelian') ? 'text-blue-500' : '#000' }}">Pembelian</p>
                                          </a>
                                    </div>
                                    <div class="mb-1">
                                          <a class="flex items-center" href="/favorit">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="{{ Request::is('favorit') ? 'blue' : '#000' }}" class="w-4 h-4 sm:w-6 sm:h-6">
                                                      <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                                </svg>                              
                                                <p class="ml-2 text-sm lg:text-md {{ Request::is('favorit') ? 'text-blue-500' : '#000' }}">Toko Favorit</p>
                                          </a>
                                    </div>
                                    <div class="mb-1">
                                          <a class="flex items-center" href="/logout">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 sm:w-6 sm:h-6">
                                                      <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                                </svg>                                    
                                                <p class="ml-2 text-sm lg:text-md">Keluar</p>
                                          </a>
                                    </div>
                              </div>
                        </div>
                      </div>
                  @endauth
                  @guest    
                        <div class="guest">
                              <a href="/login">
                                    <button class="px-4 py-2 border-2 border-blue-500 rounded-lg">Login</button>
                              </a>
                              <a href="/register">
                                    <button class="px-4 py-2 text-white bg-blue-500 rounded-lg">Register</button>
                              </a>
                        </div>
                  @endguest
            </div>
      </div>
      <form action="" class="w-full px-4 pb-5 lg:hidden">
            <div class="flex">
                  <input type="text" name="search" id="search" placeholder="Cari produk pilihan anda" class="w-full px-4 py-2 rounded-l-lg shadow-md outline-none">
                  <button class="p-2 bg-gray-200 rounded-r-lg shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 sm:w-6 sm:h-6">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>                            
                  </button>
            </div>
      </form>
</nav>