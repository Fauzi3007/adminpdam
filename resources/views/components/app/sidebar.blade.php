<div>
    <!-- Sidebar backdrop (mobile only) -->
    <div
        class="fixed inset-0 bg-slate-900 bg-opacity-30 z-40 lg:hidden lg:z-auto transition-opacity duration-200"
        :class="sidebarOpen ? 'opacity-100' : 'opacity-0 pointer-events-none'"
        aria-hidden="true"
        x-cloak
    ></div>

    <!-- Sidebar -->
    <div
        id="sidebar"
        class="flex flex-col absolute z-40 left-0 top-0 lg:static lg:left-auto lg:top-auto lg:translate-x-0 h-screen overflow-y-scroll lg:overflow-y-auto no-scrollbar w-64 lg:w-20 lg:sidebar-expanded:!w-64 2xl:!w-64 shrink-0 bg-slate-800 p-4 transition-all duration-200 ease-in-out"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-64'"
        @click.outside="sidebarOpen = false"
        @keydown.escape.window="sidebarOpen = false"
        x-cloak="lg"
    >

        <!-- Sidebar header -->
        <div class="flex justify-between mb-10 pr-3 sm:px-2">
            <!-- Close button -->
            <button class="lg:hidden text-slate-500 hover:text-slate-400" @click.stop="sidebarOpen = !sidebarOpen" aria-controls="sidebar" :aria-expanded="sidebarOpen">
                <span class="sr-only">Close sidebar</span>
                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z" />
                </svg>
            </button>
            <!-- Logo -->
            <a class="block" href="{{ route('dashboard') }}">
                <svg width="32" height="32" viewBox="0 0 32 32">
                    <defs>
                        <linearGradient x1="28.538%" y1="20.229%" x2="100%" y2="108.156%" id="logo-a">
                            <stop stop-color="#A5B4FC" stop-opacity="0" offset="0%" />
                            <stop stop-color="#A5B4FC" offset="100%" />
                        </linearGradient>
                        <linearGradient x1="88.638%" y1="29.267%" x2="22.42%" y2="100%" id="logo-b">
                            <stop stop-color="#38BDF8" stop-opacity="0" offset="0%" />
                            <stop stop-color="#38BDF8" offset="100%" />
                        </linearGradient>
                    </defs>
                    <rect fill="#6366F1" width="32" height="32" rx="16" />
                    <path d="M18.277.16C26.035 1.267 32 7.938 32 16c0 8.837-7.163 16-16 16a15.937 15.937 0 01-10.426-3.863L18.277.161z" fill="#4F46E5" />
                    <path d="M7.404 2.503l18.339 26.19A15.93 15.93 0 0116 32C7.163 32 0 24.837 0 16 0 10.327 2.952 5.344 7.404 2.503z" fill="url(#logo-a)" />
                    <path d="M2.223 24.14L29.777 7.86A15.926 15.926 0 0132 16c0 8.837-7.163 16-16 16-5.864 0-10.991-3.154-13.777-7.86z" fill="url(#logo-b)" />
                </svg>
            </a>
        </div>

        <!-- Links -->
        <div class="space-y-8">
            <!-- Pages group -->
            <div>
                <h3 class="text-xs uppercase text-slate-500 font-semibold pl-3">
                    <span class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6" aria-hidden="true">•••</span>
                    <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">Pages</span>
                </h3>
                <ul class="mt-3">
                    <!-- Dashboard -->
               
                    <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if(in_array(Request::segment(1), ['dashboard'])){{ 'bg-slate-900' }}@endif">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if(in_array(Request::segment(1), ['dashboard'])){{ 'hover:text-slate-200' }}@endif" href="/dashboard">
                            <div class="flex items-center justify-between">
                                <div class="grow flex items-center">
                                    <svg class="shrink-0 h-6 w-6" viewBox="0 0 14 14">
                                        <path class="fill-current @if(in_array(Request::segment(1), ['dashboard'])){{ 'text-indigo-500' }}@else{{ 'text-slate-400' }}@endif" fill="#8fbffa" fill-rule="evenodd" d="M1 0a1 1 0 0 0 -1 1v6a1 1 0 0 0 1 1h4a1 1 0 0 0 1 -1V1a1 1 0 0 0 -1 -1H1Zm7 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v2.01a1 1 0 0 1 -1 1H9a1 1 0 0 1 -1 -1V1Zm0 6a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v6a1 1 0 0 1 -1 1H9a1 1 0 0 1 -1 -1V7Zm-8 3.99a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1V13a1 1 0 0 1 -1 1H1a1 1 0 0 1 -1 -1v-2.01Z" clip-rule="evenodd" stroke-width="1"></path>
                                    </svg>
                                    
                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Dashboard</span>
                                </div>
                                {{-- <!-- Badge -->
                                <div class="flex flex-shrink-0 ml-2">
                                    <span class="inline-flex items-center justify-center h-5 text-xs font-medium text-white bg-indigo-500 px-2 rounded">4</span>
                                </div> --}}
                            </div>
                        </a>
                    </li>
                    <!-- datamaster -->
                    <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if(in_array(Request::segment(1), ['datamaster'])){{ 'bg-slate-900' }}@endif" x-data="{ open: {{ in_array(Request::segment(1), ['datamaster']) ? 1 : 0 }} }">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if(in_array(Request::segment(1), ['datamaster'])){{ 'hover:text-slate-200' }}@endif" href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <svg class="shrink-0 h-6 w-6" viewBox="0 0 14 14">
                                        <path class="fill-current @if(in_array(Request::segment(1), ['datamaster'])){{ 'text-indigo-500' }}@else{{ 'text-slate-400' }}@endif" fill="#8fbffa" fill-rule="evenodd" d="M1.5 0.407a1.5 1.5 0 0 0 -1.5 1.5l0 2.925a1.5 1.5 0 0 0 1.5 1.5h11a1.5 1.5 0 0 0 1.5 -1.5l0 -2.925a1.5 1.5 0 0 0 -1.5 -1.5h-11ZM0 9.168a1.5 1.5 0 0 1 1.5 -1.5h11a1.5 1.5 0 0 1 1.5 1.5l0 2.925a1.5 1.5 0 0 1 -1.5 1.5h-11a1.5 1.5 0 0 1 -1.5 -1.5l0 -2.925Z" clip-rule="evenodd" stroke-width="1"></path>
                                        <path class="fill-current @if(in_array(Request::segment(1), ['datamaster'])){{ 'text-indigo-300' }}@else{{ 'text-slate-600' }}@endif" fill="#2859c5" fill-rule="evenodd" d="M3.171 2.245a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0 -2.25ZM2.046 10.63a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1 -2.25 0Zm4.829 -7.26c0 -0.346 0.28 -0.625 0.625 -0.625H11a0.625 0.625 0 1 1 0 1.25H7.5a0.625 0.625 0 0 1 -0.625 -0.625Zm0.625 6.635a0.625 0.625 0 0 0 0 1.25H11a0.625 0.625 0 1 0 0 -1.25H7.5Z" clip-rule="evenodd" stroke-width="1"></path>
                                    </svg>
                                    
                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Data Master</span>
                                </div>
                                <!-- Icon -->
                                <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                    <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400 @if(in_array(Request::segment(1), ['datamaster'])){{ 'rotate-180' }}@endif" :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                        <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                        <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                            <ul class="pl-9 mt-1 @if(!in_array(Request::segment(1), ['datamaster'])){{ 'hidden' }}@endif" :class="open ? '!block' : 'hidden'">
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if(Route::is('user')){{ '!text-indigo-500' }}@endif" href="/user">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Pengguna</span>
                                    </a>
                                </li>
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if(Route::is('pegawai')){{ '!text-indigo-500' }}@endif" href="/pegawai">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Pegawai</span>
                                    </a>
                                </li>
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if(Route::is('jabatan')){{ '!text-indigo-500' }}@endif" href="/jabatan">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Jabatan</span>
                                    </a>
                                </li>
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if(Route::is('cabang')){{ '!text-indigo-500' }}@endif" href="/cabang">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Cabang</span>
                                    </a>
                                </li>
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if(Route::is('gaji')){{ '!text-indigo-500' }}@endif" href="/gaji">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Gaji</span>
                                    </a>
                                </li>
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if(Route::is('pelanggan')){{ '!text-indigo-500' }}@endif" href="/pelanggan">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Pelanggan</span>
                                    </a>
                                </li>
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if(Route::is('pencatatan')){{ '!text-indigo-500' }}@endif" href="/pencatatan">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Pencatatan</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                 
                    <!-- absensi -->
                    <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if(in_array(Request::segment(1), ['absensi'])){{ 'bg-slate-900' }}@endif">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if(in_array(Request::segment(1), ['absensi'])){{ 'hover:text-slate-200' }}@endif" href="/absensi">
                            <div class="flex items-center justify-between">
                                <div class="grow flex items-center">
                                    <svg class="shrink-0 h-6 w-6" viewBox="0 0 14 14">
                                        <path class="fill-current @if(in_array(Request::segment(1), ['absensi'])){{ 'text-indigo-500' }}@else{{ 'text-slate-400' }}@endif" fill="#8fbffa" fill-rule="evenodd" d="M2.59 0.14C1.7781 0.14 1.12 0.7981 1.12 1.61V12.39C1.12 13.2019 1.7781 13.86 2.59 13.86H11.41C12.2219 13.86 12.88 13.2019 12.88 12.39V4.9557C12.8797 4.566 12.7246 4.1923 12.4488 3.9169L9.1031 0.5702C8.8275 0.2948 8.4539 0.1401 8.0643 0.14H2.59Z" clip-rule="evenodd" stroke-width="1"></path>
                                        <path class="fill-current @if(in_array(Request::segment(1), ['absensi'])){{ 'text-indigo-300' }}@else{{ 'text-slate-600' }}@endif" fill="#2859c5" fill-rule="evenodd" d="M7.0598 6.3875C7.0598 5.9816 7.3888 5.6525 7.7948 5.6525H10.2448C10.8106 5.6525 11.1642 6.265 10.8813 6.755C10.75 6.9824 10.5074 7.1225 10.2448 7.1225H7.7948C7.3889 7.1225 7.0598 6.7934 7.0598 6.3875Z" clip-rule="evenodd" stroke-width="1"></path>
                                        <path class="fill-current @if(in_array(Request::segment(1), ['absensi'])){{ 'text-indigo-300' }}@else{{ 'text-slate-600' }}@endif" fill="#2859c5" fill-rule="evenodd" d="M7.0598 10.2771C7.0598 9.8712 7.3888 9.5421 7.7948 9.5421H10.2448C10.8106 9.5421 11.1642 10.1547 10.8813 10.6446C10.75 10.872 10.5074 11.0121 10.2448 11.0121H7.7948C7.3888 11.0121 7.0598 10.6831 7.0598 10.2771Z" clip-rule="evenodd" stroke-width="1"></path>
                                        <path class="fill-current @if(in_array(Request::segment(1), ['absensi'])){{ 'text-indigo-300' }}@else{{ 'text-slate-600' }}@endif" fill="#2859c5" fill-rule="evenodd" d="M6.1288 8.5288C6.4592 8.7645 6.5359 9.2234 6.3003 9.5539L4.9312 11.4688C4.6671 11.8378 4.135 11.8817 3.814 11.5609L2.9928 10.7407C2.5995 10.3339 2.7941 9.6539 3.343 9.5167C3.5889 9.4553 3.8492 9.5249 4.0316 9.7009L4.2393 9.9086L5.1037 8.6983C5.34 8.3686 5.7989 8.2927 6.1288 8.5288Z" clip-rule="evenodd" stroke-width="1"></path>
                                        <path class="fill-current @if(in_array(Request::segment(1), ['absensi'])){{ 'text-indigo-300' }}@else{{ 'text-slate-600' }}@endif" fill="#2859c5" fill-rule="evenodd" d="M6.1288 4.5774C6.4598 4.8132 6.5366 5.2729 6.3003 5.6035L4.9312 7.5194C4.6671 7.8884 4.135 7.9323 3.814 7.6115L2.9928 6.7903C2.6071 6.3763 2.8141 5.7001 3.3654 5.573C3.6034 5.5182 3.853 5.585 4.0316 5.7515L4.2393 5.9583L5.1037 4.7489C5.3394 4.4186 5.7983 4.3418 6.1288 4.5774Z" clip-rule="evenodd" stroke-width="1"></path>
                                    </svg>
                                    
                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Absensi</span>
                                </div>
                                {{-- <!-- Badge -->
                                <div class="flex flex-shrink-0 ml-2">
                                    <span class="inline-flex items-center justify-center h-5 text-xs font-medium text-white bg-indigo-500 px-2 rounded">4</span>
                                </div> --}}
                            </div>
                        </a>
                    </li>
                    <!-- cuti -->
                    <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if(in_array(Request::segment(1), ['cuti'])){{ 'bg-slate-900' }}@endif">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if(in_array(Request::segment(1), ['cuti'])){{ 'hover:text-slate-200' }}@endif" href="/cuti">
                            <div class="flex items-center">
                                <svg class="shrink-0 h-6 w-6" viewBox="0 0 14 14">
                                    <path class="fill-current @if(in_array(Request::segment(1), ['cuti'])){{ 'text-indigo-500' }}@else{{ 'text-slate-400' }}@endif" fill="#8fbffa" fill-rule="evenodd" d="M5.5 2a2 2 0 1 1 -4 0 2 2 0 0 1 4 0Zm0.045 7.97V10H5.5l-0.445 3.562a0.5 0.5 0 0 1 -0.496 0.438H2.44a0.5 0.5 0 0 1 -0.496 -0.438L1.5 10h-1a0.5 0.5 0 0 1 -0.5 -0.5v-1a3.5 3.5 0 0 1 6.9 -0.832A2.632 2.632 0 0 0 5.545 9.97Z" clip-rule="evenodd" stroke-width="1"></path>
                                    <path class="fill-current @if(in_array(Request::segment(1), ['cuti'])){{ 'text-indigo-300' }}@else{{ 'text-slate-600' }}@endif" fill="#2859c5" fill-rule="evenodd" d="M9.677 7.937a0.25 0.25 0 0 1 0.25 -0.25h0.913a0.25 0.25 0 0 1 0.25 0.25v0.651H9.677v-0.65Zm-1.5 0.651v-0.65c0 -0.967 0.784 -1.75 1.75 -1.75h0.913c0.966 0 1.75 0.783 1.75 1.75v0.65c0.763 0 1.381 0.62 1.381 1.383v2.647c0 0.763 -0.619 1.382 -1.382 1.382H8.177a1.382 1.382 0 0 1 -1.382 -1.382V9.97c0 -0.763 0.619 -1.382 1.382 -1.382Z" clip-rule="evenodd" stroke-width="1"></path>
                                </svg>
                                
                                <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Cuti</span>
                            </div>
                        </a>
                    </li>
                    <!-- laporan -->
                    <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if(in_array(Request::segment(1), ['laporan'])){{ 'bg-slate-900' }}@endif">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if(in_array(Request::segment(1), ['laporan'])){{ 'hover:text-slate-200' }}@endif" href="/laporan">
                            <div class="flex items-center">
                                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                    <path class="fill-current @if(in_array(Request::segment(1), ['laporan'])){{ 'text-indigo-500' }}@else{{ 'text-slate-600' }}@endif" d="M1 3h22v20H1z" />
                                    <path class="fill-current @if(in_array(Request::segment(1), ['laporan'])){{ 'text-indigo-300' }}@else{{ 'text-slate-400' }}@endif" d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                                </svg>
                                <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Laporan</span>
                            </div>
                        </a>
                    </li>
                    
                    
                   
                </ul>
            </div>
            <!-- More group -->
            {{--  --}}
        </div>

        <!-- Expand / collapse button -->
        <div class="pt-3 hidden lg:inline-flex 2xl:hidden justify-end mt-auto">
            <div class="px-3 py-2">
                <button @click="sidebarExpanded = !sidebarExpanded">
                    <span class="sr-only">Expand / collapse sidebar</span>
                    <svg class="w-6 h-6 fill-current sidebar-expanded:rotate-180" viewBox="0 0 24 24">
                        <path class="text-slate-400" d="M19.586 11l-5-5L16 4.586 23.414 12 16 19.414 14.586 18l5-5H7v-2z" />
                        <path class="text-slate-600" d="M3 23H1V1h2z" />
                    </svg>
                </button>
            </div>
        </div>

    </div>
</div>