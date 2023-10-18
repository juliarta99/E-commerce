<header class="sticky top-0 w-full flex justify-between px-9 py-4 bg-slate-800 z-[998]">
    <div class="flex gap-4 w-full items-center">
        <div id="humberger">
            <button id="humberger-bar" class="p-2 bg-slate-600 rounded-sm block md:hidden" onclick="showSidebar()">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-slate-100" viewBox="0 0 448 512"><path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg>
            </button>
            <button id="humberger-x" class="p-2 bg-slate-600 rounded-sm hidden" onclick="hideSidebar()">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-slate-100" viewBox="0 0 384 512"><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>
            </button>
        </div>
        <form action="" method="post" class="flex w-full h-full">
            @csrf
            <input type="text" name="search" placeholder="Cari transaksi" class="w-1/2 lg:w-1/3 bg-slate-100 rounded-l-sm px-2 border-none outline-none">
            <button class="bg-slate-600 text-slate-100 px-4 rounded-r-sm text-xs sm:text-sm">Cari</button>
        </form>
    </div>
    <div class="flex items-center justify-center cursor-pointer" id="profile" onclick="showProfile()">
        <img src="{{ asset('img/profile_default.png') }}" alt="Profile" class="w-6 h-6 mr-1 rounded-full sm:w-8 sm:h-8 object-cover">
        <p class="text-xs first-letter:font-semibold sm:text-sm lg:text-base text-slate-100">{{ Auth::guard('admin')->user()->username }}</p>
        <div id="show-profile" class="absolute hidden p-2 w-max bg-slate-800 rounded-md shadow-md translate-y-12 lg:translate-y-14">
                <div class="mb-1">
                    <a class="flex items-center" href="/logout">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                            </svg>
                            <p class="ml-2 text-xs lg:text-sm text-slate-100">Keluar</p>
                    </a>
                </div>
        </div>
    </div>
</header>