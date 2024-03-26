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
                <svg width="40" height="40" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="173.688mm" height="130mm" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                viewBox="0 0 17369 13000"
                    xmlns:xlink="http://www.w3.org/1999/xlink">
                    <defs>
                    <style type="text/css">
                    <![CDATA[
                    .fil1 {fill:#009B4C}
                    .fil0 {fill:#00AEEF}
                    .fil2 {fill:#00AEEF;fill-rule:nonzero}
                    ]]>
                    </style>
                    </defs>
                    <g id="Layer_x0020_1">
                    <metadata id="CorelCorpID_0Corel-Layer"/>
                    <path class="fil0" d="M5740 630c1166,0 2117,957 2117,2131 0,1173 -951,2131 -2117,2131 -1166,0 -2117,-957 -2117,-2131 0,-1173 951,-2131 2117,-2131zm0 -412c1392,0 2526,1142 2526,2543 0,1400 -1135,2543 -2526,2543 -1392,0 -2526,-1142 -2526,-2543 0,-1401 1135,-2543 2526,-2543zm0 147c1311,0 2380,1076 2380,2396 0,1320 -1070,2396 -2380,2396 -1311,0 -2381,-1076 -2381,-2396 0,-1320 1070,-2396 2381,-2396z"/>
                    <path class="fil1" d="M2638 8987l-2634 0 0 -5927c0,-1903 1327,-3060 4713,-3060 -759,0 -2079,902 -2079,2322l0 6665z"/>
                    <path class="fil1" d="M8845 8987l2634 0 0 -5927c0,-1903 -1327,-3060 -4713,-3060 759,0 2079,902 2079,2322l0 6665z"/>
                    <path class="fil1" d="M11788 8987l2634 0 0 -5927c0,-1903 -1723,-3060 -5247,-3060 759,0 2614,842 2614,2641l0 6346z"/>
                    <path class="fil1" d="M14730 8987l2634 0 0 -5927c0,-1903 -2238,-3060 -5624,-3060 1017,0 2990,1002 2990,2681l0 6306z"/>
                    <path class="fil2" d="M574 11399l0 -1367 -485 0 0 -278 1299 0 0 278 -484 0 0 1367 -330 0zm1017 0l0 -1645 330 0 0 1645 -330 0zm645 0l0 -1645 695 0c175,0 301,15 381,44 79,29 143,82 190,157 48,76 71,162 71,259 0,123 -36,226 -108,306 -72,80 -180,131 -323,152 72,42 131,88 177,138 46,50 109,139 188,267l200 321 -395 0 -239 -358c-85,-128 -143,-208 -174,-242 -31,-33 -64,-56 -99,-69 -35,-12 -90,-18 -166,-18l-67 0 0 687 -330 0zm330 -950l244 0c158,0 257,-7 297,-20 39,-13 70,-37 92,-70 22,-33 33,-74 33,-123 0,-56 -15,-100 -44,-134 -29,-34 -71,-56 -124,-65 -27,-3 -107,-5 -241,-5l-257 0 0 417zm1685 950l0 -1367 -485 0 0 -278 1299 0 0 278 -484 0 0 1367 -330 0zm2332 0l-359 0 -143 -374 -653 0 -135 374 -350 0 637 -1645 349 0 655 1645zm-608 -651l-225 -611 -221 611 446 0zm1331 -994l603 0c136,0 239,10 311,31 96,28 178,79 246,152 68,72 121,161 156,266 35,105 53,235 53,389 0,135 -17,252 -50,350 -41,119 -99,216 -175,290 -57,56 -134,100 -232,131 -73,23 -170,35 -292,35l-621 0 0 -1645zm330 278l0 1089 246 0c92,0 159,-5 200,-16 53,-13 98,-36 133,-68 35,-32 64,-85 86,-159 22,-74 34,-174 34,-301 0,-127 -11,-224 -34,-293 -22,-68 -54,-121 -94,-159 -40,-38 -91,-64 -153,-77 -46,-11 -136,-16 -271,-16l-148 0zm1321 1367l0 -1645 330 0 0 647 647 0 0 -647 330 0 0 1645 -330 0 0 -719 -647 0 0 719 -330 0zm3122 0l-359 0 -143 -374 -653 0 -135 374 -350 0 637 -1645 349 0 655 1645zm-608 -651l-225 -611 -221 611 446 0zm784 651l0 -1645 695 0c175,0 301,15 381,44 79,29 143,82 190,157 48,76 71,162 71,259 0,123 -36,226 -108,306 -72,80 -180,131 -323,152 72,42 130,88 177,138 46,50 109,139 188,267l200 321 -395 0 -239 -358c-85,-128 -143,-208 -174,-242 -31,-33 -64,-56 -99,-69 -35,-12 -90,-18 -166,-18l-67 0 0 687 -330 0zm330 -950l244 0c158,0 257,-7 297,-20 39,-13 70,-37 92,-70 22,-33 33,-74 33,-123 0,-56 -15,-100 -44,-134 -29,-34 -71,-56 -124,-65 -27,-3 -107,-5 -241,-5l-257 0 0 417zm1313 950l0 -1645 494 0 296 1122 293 -1122 495 0 0 1645 -306 0 0 -1295 -325 1295 -318 0 -324 -1295 0 1295 -306 0zm3380 0l-359 0 -143 -374 -653 0 -135 374 -350 0 637 -1645 349 0 655 1645zm-608 -651l-225 -611 -221 611 446 0z"/>
                    <path class="fil2" d="M0 12987l0 -727 236 0c89,0 147,4 174,11 42,11 77,35 105,71 28,37 42,84 42,142 0,45 -8,82 -24,113 -16,30 -37,54 -62,72 -25,17 -50,29 -76,34 -35,7 -86,10 -152,10l-96 0 0 274 -147 0zm147 -604l0 207 80 0c58,0 96,-4 116,-12 19,-8 35,-19 46,-36 11,-16 17,-35 17,-57 0,-27 -8,-48 -23,-66 -16,-17 -35,-28 -59,-33 -17,-3 -53,-5 -105,-5l-71 0zm530 604l0 -727 538 0 0 123 -391 0 0 162 364 0 0 123 -364 0 0 197 405 0 0 123 -553 0zm678 0l0 -727 309 0c78,0 134,7 169,20 35,13 64,36 85,70 21,34 32,72 32,115 0,55 -16,100 -48,135 -32,36 -80,58 -143,67 32,18 58,39 78,61 21,22 48,62 83,118l89 142 -176 0 -105 -159c-38,-56 -64,-92 -78,-107 -14,-15 -29,-25 -44,-30 -16,-5 -40,-8 -74,-8l-30 0 0 304 -147 0zm147 -420l109 0c70,0 114,-3 132,-9 17,-6 31,-16 41,-31 10,-15 15,-33 15,-55 0,-25 -7,-44 -20,-59 -13,-15 -31,-25 -55,-28 -12,-2 -48,-3 -107,-3l-115 0 0 185zm586 -308l147 0 0 394c0,63 2,103 5,122 6,30 21,54 44,72 24,18 56,27 96,27 41,0 72,-8 93,-26 21,-17 34,-38 38,-63 4,-25 6,-66 6,-124l0 -403 147 0 0 383c0,87 -4,149 -12,185 -8,36 -23,67 -44,91 -21,25 -50,45 -85,59 -36,15 -82,22 -140,22 -69,0 -122,-8 -157,-24 -36,-16 -64,-37 -85,-63 -21,-26 -34,-52 -41,-81 -10,-42 -14,-103 -14,-185l0 -388zm695 492l143 -14c9,48 26,83 52,106 26,22 62,34 106,34 47,0 83,-10 107,-30 24,-20 36,-43 36,-70 0,-17 -5,-32 -15,-44 -10,-12 -28,-23 -53,-31 -17,-6 -56,-17 -117,-32 -78,-20 -133,-44 -165,-72 -45,-40 -67,-89 -67,-147 0,-37 10,-72 31,-104 21,-32 51,-57 91,-74 39,-17 87,-25 143,-25 91,0 159,20 205,61 46,40 70,94 72,162l-147 5c-6,-38 -20,-65 -40,-81 -21,-16 -51,-25 -92,-25 -42,0 -76,9 -99,26 -15,11 -23,26 -23,45 0,17 7,32 22,44 18,16 63,32 135,49 71,17 124,34 158,52 34,18 61,43 80,74 19,31 29,70 29,116 0,42 -12,81 -35,117 -23,36 -56,64 -98,81 -42,18 -95,27 -158,27 -92,0 -163,-21 -212,-64 -49,-42 -79,-104 -88,-185zm1372 236l-159 0 -63 -166 -292 0 -60 166 -156 0 282 -727 156 0 291 727zm-269 -289l-101 -269 -98 269 199 0zm348 289l0 -727 147 0 0 287 287 0 0 -287 147 0 0 727 -147 0 0 -318 -287 0 0 318 -147 0zm1389 0l-159 0 -63 -166 -292 0 -60 166 -156 0 282 -727 156 0 291 727zm-269 -289l-101 -269 -98 269 199 0zm1003 289l-159 0 -63 -166 -292 0 -60 166 -156 0 282 -727 156 0 291 727zm-269 -289l-101 -269 -98 269 199 0zm348 289l0 -727 143 0 299 488 0 -488 136 0 0 727 -147 0 -295 -478 0 478 -136 0zm1016 -727l268 0c60,0 107,5 138,14 43,13 79,35 109,67 30,32 53,71 69,118 16,46 24,104 24,172 0,60 -7,111 -22,155 -18,53 -44,96 -78,129 -25,25 -60,44 -103,58 -32,10 -76,15 -130,15l-276 0 0 -727zm147 123l0 482 109 0c41,0 70,-2 88,-7 24,-6 44,-16 59,-30 16,-14 28,-38 38,-70 10,-33 15,-77 15,-133 0,-56 -5,-99 -15,-129 -10,-30 -24,-54 -41,-70 -18,-17 -40,-28 -68,-34 -20,-5 -60,-7 -120,-7l-66 0zm1242 604l-159 0 -63 -166 -292 0 -60 166 -156 0 282 -727 156 0 291 727zm-269 -289l-101 -269 -98 269 199 0zm348 289l0 -727 538 0 0 123 -391 0 0 162 364 0 0 123 -364 0 0 197 405 0 0 123 -553 0zm678 0l0 -727 309 0c78,0 134,7 169,20 35,13 64,36 85,70 21,34 32,72 32,115 0,55 -16,100 -48,135 -32,36 -80,58 -143,67 32,18 58,39 78,61 21,22 48,62 83,118l89 142 -176 0 -105 -159c-38,-56 -64,-92 -78,-107 -14,-15 -29,-25 -44,-30 -16,-5 -40,-8 -74,-8l-30 0 0 304 -147 0zm147 -420l109 0c70,0 114,-3 132,-9 17,-6 31,-16 41,-31 10,-15 15,-33 15,-55 0,-25 -7,-44 -20,-59 -13,-15 -31,-25 -55,-28 -12,-2 -48,-3 -107,-3l-115 0 0 185zm1242 420l-159 0 -63 -166 -292 0 -60 166 -156 0 282 -727 156 0 291 727zm-269 -289l-101 -269 -98 269 199 0zm348 289l0 -727 147 0 0 287 287 0 0 -287 147 0 0 727 -147 0 0 -318 -287 0 0 318 -147 0zm1634 0l-159 0 -63 -166 -292 0 -60 166 -156 0 282 -727 156 0 291 727zm-269 -289l-101 -269 -98 269 199 0zm343 289l0 -727 147 0 0 727 -147 0zm287 0l0 -727 309 0c78,0 134,7 169,20 35,13 64,36 85,70 21,34 32,72 32,115 0,55 -16,100 -48,135 -32,36 -80,58 -143,67 32,18 58,39 78,61 21,22 48,62 83,118l89 142 -176 0 -105 -159c-38,-56 -64,-92 -78,-107 -14,-15 -29,-25 -44,-30 -16,-5 -40,-8 -74,-8l-30 0 0 304 -147 0zm147 -420l109 0c70,0 114,-3 132,-9 17,-6 31,-16 41,-31 10,-15 15,-33 15,-55 0,-25 -7,-44 -20,-59 -13,-15 -31,-25 -55,-28 -12,-2 -48,-3 -107,-3l-115 0 0 185zm867 420l0 -727 221 0 130 496 129 -496 221 0 0 727 -136 0 0 -573 -143 573 -142 0 -143 -573 -1 573 -136 0zm843 0l0 -727 147 0 0 727 -147 0zm287 0l0 -727 143 0 299 488 0 -488 136 0 0 727 -147 0 -295 -478 0 478 -136 0zm734 -727l147 0 0 394c0,63 2,103 5,122 6,30 21,54 44,72 24,18 56,27 96,27 41,0 72,-8 93,-26 21,-17 34,-38 38,-63 4,-25 6,-66 6,-124l0 -403 147 0 0 383c0,87 -4,149 -12,185 -8,36 -23,67 -44,91 -21,25 -50,45 -85,59 -36,15 -82,22 -140,22 -69,0 -122,-8 -157,-24 -36,-16 -64,-37 -85,-63 -21,-26 -34,-52 -41,-81 -10,-42 -14,-103 -14,-185l0 -388zm732 727l0 -727 221 0 130 496 129 -496 221 0 0 727 -136 0 0 -573 -143 573 -142 0 -143 -573 -1 573 -136 0z"/>
                    </g>
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