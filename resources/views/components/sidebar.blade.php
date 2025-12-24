<!-- Sidebar -->
<div class="sidebar bg-white text-teal-500 h-screen w-64 fixed left-0 top-0 overflow-y-auto">
    <!-- Logo Header -->
    <div class="p-4">
        <div class="flex justify-center">
            <img src="{{ asset('images/logopijat.in.png') }}" alt="Logo" class="h-15 w-60 mt-1">
        </div>
    </div>

    <!-- Navigation Menu -->

        <ul class="space-y-0.1 px-2.5">
            <!-- Dashboard -->
            <li>
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-teal-400 transition-colors duration-200 {{ request()->routeIs('dashboard') ? 'bg-teal-500 text-white' : 'text-teal-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" class="w-5 h-5 fill-current">
                        <path d="M24.0636 13.7521C25.2717 13.7521 26.2511 14.7315 26.2511 15.9396V24.0646C26.2511 25.2727 25.2717 26.2521 24.0636 26.2521H18.4386C17.2305 26.2521 16.2511 25.2727 16.2511 24.0646V15.9396C16.2511 14.7315 17.2305 13.7521 18.4386 13.7521H24.0636ZM11.5864 18.7676C12.7945 18.7676 13.7738 19.747 13.7738 20.9551V24.0646C13.7738 25.2727 12.7945 26.2521 11.5864 26.2521H5.94336C4.73523 26.2521 3.75586 25.2727 3.75586 24.0646V20.9551C3.75586 19.747 4.73523 18.7676 5.94336 18.7676H11.5864ZM24.0636 15.6271H18.4386C18.266 15.6271 18.1261 15.767 18.1261 15.9396V24.0646C18.1261 24.2372 18.266 24.3771 18.4386 24.3771H24.0636C24.2362 24.3771 24.3761 24.2372 24.3761 24.0646V15.9396C24.3761 15.767 24.2362 15.6271 24.0636 15.6271ZM11.5864 20.6426H5.94336C5.77077 20.6426 5.63086 20.7825 5.63086 20.9551V24.0646C5.63086 24.2372 5.77077 24.3771 5.94336 24.3771H11.5864C11.759 24.3771 11.8989 24.2372 11.8989 24.0646V20.9551C11.8989 20.7825 11.759 20.6426 11.5864 20.6426ZM11.5684 3.75C12.7765 3.75 13.7558 4.72938 13.7558 5.9375V14.0625C13.7558 15.2102 12.872 16.1515 11.7478 16.2428L11.5684 16.25H5.94336C4.73523 16.25 3.75586 15.2706 3.75586 14.0625V5.9375C3.75586 4.72938 4.73523 3.75 5.94336 3.75H11.5684ZM11.5684 5.625H5.94336C5.77077 5.625 5.63086 5.76491 5.63086 5.9375V14.0625C5.63086 14.2351 5.77077 14.375 5.94336 14.375H11.5684L11.64 14.3667C11.7781 14.3344 11.8809 14.2104 11.8809 14.0625V5.9375C11.8809 5.76491 11.7409 5.625 11.5684 5.625ZM24.0636 3.75C25.2717 3.75 26.2511 4.72938 26.2511 5.9375V9.0625C26.2511 10.2706 25.2717 11.25 24.0636 11.25H18.4386C17.2305 11.25 16.2511 10.2706 16.2511 9.0625V5.9375C16.2511 4.72938 17.2305 3.75 18.4386 3.75H24.0636ZM18.4386 5.625C18.266 5.625 18.1261 5.76491 18.1261 5.9375V9.0625C18.1261 9.23509 18.266 9.375 18.4386 9.375H24.0636C24.2362 9.375 24.3761 9.23509 24.3761 9.0625V5.9375C24.3761 5.76491 24.2362 5.625 24.0636 5.625H18.4386Z"/>
                    </svg>
                    <h1 class="font-poppins">Dashboard</h1>
                </a>
            </li>

            <!-- Order -->
            <li x-data="{ open: {{ request()->routeIs('order*') ? 'true' : 'false' }} }" class="relative">
                <div :class="open ? 'bg-teal-500 text-white' : 'text-teal-600'" 
                    class="rounded-lg transition-colors duration-200">

                <!-- Parent button -->
                <button @click="open = !open"
                    class="flex items-center justify-between w-full p-3 rounded-lg transition-colors duration-200
                    {{ request()->routeIs('pages.order.*') ? 'bg-teal-500 text-white' : 'text-teal-600 hover:bg-teal-400' }}">
                    <div class="flex items-center space-x-3">
                        <!-- Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" class="w-5 h-5 fill-current">
                        <path d="M21.2879 13.7879C21.654 13.4218 21.654 12.8282 21.2879 12.4621C20.9218 12.096 20.3282 12.096 19.9621 12.4621L13.75 18.6741L11.2879 16.2121C10.9218 15.846 10.3282 15.846 9.96209 16.2121C9.59597 16.5782 9.59597 17.1718 9.96209 17.5379L13.0871 20.6629C13.4532 21.029 14.0468 21.029 14.4129 20.6629L21.2879 13.7879ZM19.9925 5.10561C19.8866 3.64891 18.6713 2.5 17.1875 2.5H12.8125C11.3651 2.5 10.173 3.5934 10.0172 4.9993L7.8125 5C6.2592 5 5 6.2592 5 7.8125V24.6875C5 26.2407 6.2592 27.5 7.8125 27.5H22.1875C23.7407 27.5 25 26.2407 25 24.6875V7.8125C25 6.2592 23.7407 5 22.1875 5L19.9827 4.9993C19.9866 5.03455 19.9899 5.06999 19.9925 5.10561ZM12.8125 8.125H17.1875C18.1625 8.125 19.0218 7.62884 19.5263 6.8752L22.1875 6.875C22.7052 6.875 23.125 7.29474 23.125 7.8125V24.6875C23.125 25.2052 22.7052 25.625 22.1875 25.625H7.8125C7.29474 25.625 6.875 25.2052 6.875 24.6875V7.8125C6.875 7.29474 7.29474 6.875 7.8125 6.875L10.4738 6.87525C10.9783 7.62887 11.8375 8.125 12.8125 8.125ZM12.8125 4.375H17.1875C17.7052 4.375 18.125 4.79474 18.125 5.3125C18.125 5.83026 17.7052 6.25 17.1875 6.25H12.8125C12.2947 6.25 11.875 5.83026 11.875 5.3125C11.875 4.79474 12.2947 4.375 12.8125 4.375Z"/>
                    </svg>
                        <label>Order</label>
                    </div>
                    <!-- Arrow -->
                    <svg :class="{'rotate-180': open}" class="w-4 h-4 transform transition-transform" fill="none" stroke="currentColor"
                        stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <!-- Submenu -->
                <ul 
                    x-show="open || '{{ request()->routeIs('pages.order.*') ? 'true' : 'false' }}' === 'true'" 
                    x-cloak 
                    x-transition 
                    class="ml-8 mt-2 space-y-1 text-sm"
                >
                    <li>
                        <a href="{{ route('pages.order.semua') }}"
                            class="flex items-center space-x-2 p-2 rounded-lg transition-colors duration-200
                            {{ request()->routeIs('pages.order.semua') ? 'bg-teal-600 text-white' : 'text-teal-600 hover:bg-teal-200' }}">
                            
                            <img src="{{ asset('images/down-option.png') }}" alt="Down" class="h-4 w-4 ml-2">
                            <span>Semua</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('pages.order.berlangsung') }}"
                            class="flex items-center space-x-2 p-2 rounded-lg transition-colors duration-200
                            {{ request()->routeIs('pages.order.berlangsung') ? 'bg-teal-600 text-white' : 'text-teal-600 hover:bg-teal-200' }}">
                            
                            <img src="{{ asset('images/down-option.png') }}" alt="Down" class="h-4 w-4 ml-2">
                            <span>Berlangsung</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('pages.order.selesai') }}"
                            class="flex items-center space-x-2 p-2 rounded-lg transition-colors duration-200
                            {{ request()->routeIs('pages.order.selesai') ? 'bg-teal-600 text-white' : 'text-teal-600 hover:bg-teal-200' }}">
                            
                            <img src="{{ asset('images/down-option.png') }}" alt="Down" class="h-4 w-4 ml-2">
                            <span>Selesai</span>
                        </a>
                    </li>
                </ul>





            <!-- Data Customer -->
            <li x-data="{ open: {{ request()->routeIs('pelanggan*') ? 'true' : 'false' }} }" class="relative">
                <div :class="open ? 'bg-teal-500 text-white' : 'text-teal-600'" 
                    class="rounded-lg transition-colors duration-200">

                <!-- Parent button -->
                <button @click="open = !open"
                    class="flex items-center justify-between w-full p-3 rounded-lg transition-colors duration-200
                    {{ request()->routeIs('pages.data-pelanggan.*') ? 'bg-teal-500 text-white' : 'text-teal-600 hover:bg-teal-400' }}">
                    <div class="flex items-center space-x-3">
                        <!-- Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                        </svg>

                        <label>Data Pelanggan</label>
                    </div>
                    <!-- Arrow -->
                    <svg :class="{'rotate-180': open}" class="w-4 h-4 transform transition-transform" fill="none" stroke="currentColor"
                        stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <!-- Submenu -->
                <ul 
                    x-show="open || '{{ request()->routeIs('pages.pelanggan.*') ? 'true' : 'false' }}' === 'true'" 
                    x-cloak 
                    x-transition 
                    class="ml-8 mt-2 space-y-1 text-sm">
                    <li>
                        <a href="{{ route('pages.data-pelanggan.akun') }}"
                            class="flex items-center space-x-2 p-2 rounded-lg transition-colors duration-200
                            {{ request()->routeIs('pages.data-pelanggan.akun') ? 'bg-teal-600 text-white' : 'text-teal-600 hover:bg-teal-200' }}">
                            
                            <img src="{{ asset('images/down-option.png') }}" alt="Down" class="h-4 w-4 ml-2">
                            <span>Akun</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('pages.data-pelanggan.verifikasi') }}"
                            class="flex items-center space-x-2 p-2 rounded-lg transition-colors duration-200
                            {{ request()->routeIs('pages.data-planggan.verifikasi') ? 'bg-teal-600 text-white' : 'text-teal-600 hover:bg-teal-200' }}">
                            
                            <img src="{{ asset('images/down-option.png') }}" alt="Down" class="h-4 w-4 ml-2">
                            <span>Verifikasi</span>
                        </a>
                    </li>
                </ul>



 

            <!-- Data Terapis -->
            <li x-data="{ open: {{ request()->routeIs('terapis*') ? 'true' : 'false' }} }" class="relative">
                <div :class="open ? 'bg-teal-500 text-white' : 'text-teal-600'" 
                    class="rounded-lg transition-colors duration-200">
                <!-- parent button --> 
                <button @click="open = !open"
                    class="flex items-center justify-between w-full p-3 rounded-lg hover:bg-teal-400 transition-colors duration-200
                    {{ request()->routeIs('data-terapis.terapis') ? 'bg-teal-500 text-white' : 'text-teal-600' }}">
                    <div class="flex items-center space-x-3">
                        <!-- Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" class="w-5 h-5 fill-current">
                        <path d="M4.5 6.5C4.5 4.567 6.067 3 8 3H22C23.933 3 25.5 4.567 25.5 6.5V23.5C25.5 25.433 23.933 27 22 27H8C6.067 27 4.5 25.433 4.5 23.5V6.5ZM8 5C7.172 5 6.5 5.672 6.5 6.5V23.5C6.5 24.328 7.172 25 8 25H22C22.828 25 23.5 24.328 23.5 23.5V6.5C23.5 5.672 22.828 5 22 5H8ZM10 7H20V9H10V7ZM10 11H20V13H10V11ZM10 15H16V17H10V15Z"/>
                    </svg>
                        <label>Data Terapis</label>
                    </div>
                    <!-- Arrow -->
                    <svg :class="{'rotate-180': open}" class="w-4 h-4 transform transition-transform" fill="none" stroke="currentColor"
                        stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <!-- Submenu -->
                <ul x-show="open" x-cloak x-transition class="ml-8 mt-2 space-y-1 text-sm">
                    <li>
                        <a href="{{ route('data-terapis.terapis') }}"
                            class="flex items-center space-x-2 p-2 rounded-lg hover:bg-teal-700 transition-colors duration-200
                            {{ request()->routeIs('data-terapis.terapis') ? 'bg-teal-500 text-white' : 'text-teal-600' }}">
                            
                            <img src="{{ asset('images/down-option.png') }}" alt="Down" class="h-4 w-4 ml-2">
                            <span>Data Terapis</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('data-terapis.rating') }}"
                            class="flex items-center space-x-2 p-2 rounded-lg hover:bg-teal-700 transition-colors duration-200
                            {{ request()->routeIs('data-terapis.rating') ? 'bg-teal-500 text-white' : 'text-teal-600' }}">
                            
                            <img src="{{ asset('images/down-option.png') }}" alt="Down" class="h-4 w-4 ml-2">
                            <span>Rating & Ulasan</span>
                        </a>
                    </li>
                </ul>
            </li>


            <!-- Penangguhan -->
            <li>
                <a href="{{ route('suspended') }}" 
                class="flex items-center space-x-3 p-3 rounded-lg hover:bg-teal-400 transition-colors duration-200 
                {{ request()->routeIs('suspended') ? 'bg-teal-500 text-white' : 'text-teal-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="w-5 h-5 fill-current">
                        <path d="M22.3765 15.0001C26.1733 15.0001 29.2515 18.0781 29.2515 21.8751C29.2515 25.672 26.1733 28.7501 22.3765 28.7501C18.5795 28.7501 15.5015 25.672 15.5015 21.8751C15.5015 18.0781 18.5795 15.0001 22.3765 15.0001ZM15.5292 17.4993C15.1583 18.0784 14.859 18.7076 14.6435 19.3746L5.81836 19.375C5.30058 19.375 4.88086 19.7948 4.88086 20.3125V21.4466C4.88086 22.2663 5.23835 23.045 5.85981 23.5793C7.43242 24.9314 9.80243 25.6264 13.0015 25.6264C13.75 25.6264 14.4532 25.5884 15.1116 25.5128C15.4227 26.1379 15.815 26.7176 16.2728 27.2383C15.2701 27.4141 14.1788 27.5014 13.0015 27.5014C9.38956 27.5014 6.59103 26.6806 4.63745 25.001C3.60167 24.1106 3.00586 22.8126 3.00586 21.4466V20.3125C3.00586 18.7591 4.26506 17.5 5.81836 17.5L15.5292 17.4993ZM26.513 19.0654L19.5667 26.0116C20.3675 26.5565 21.3347 26.8751 22.3765 26.8751C25.1378 26.8751 27.3765 24.6365 27.3765 21.8751C27.3765 20.8334 27.0578 19.8661 26.513 19.0654ZM22.3765 16.8751C19.615 16.8751 17.3765 19.1136 17.3765 21.8751C17.3765 22.9168 17.695 23.884 18.24 24.6848L25.1861 17.7386C24.3853 17.1936 23.4181 16.8751 22.3765 16.8751ZM13.0015 2.50586C16.4532 2.50586 19.2515 5.30408 19.2515 8.75586C19.2515 12.2076 16.4532 15.0059 13.0015 15.0059C9.54965 15.0059 6.75142 12.2076 6.75142 8.75586C6.75142 5.30408 9.54965 2.50586 13.0015 2.50586ZM13.0015 4.38086C10.5852 4.38086 8.62642 6.33962 8.62642 8.75586C8.62642 11.1721 10.5852 13.1309 13.0015 13.1309C15.4177 13.1309 17.3765 11.1721 17.3765 8.75586C17.3765 6.33962 15.4177 4.38086 13.0015 4.38086Z"/>
                    </svg>
                    <span>Penangguhan</span>
                </a>
            </li>

            <!-- Aduan Pelanggan -->
            <li>
                <a href="{{ route('report') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-teal-400 transition-colors duration-200 
                {{ request()->routeIs('report') ? 'bg-white text-teal-600' : 'text-teal-600' }}">
                    <svg class="w-5 h-5 fill-none stroke-current" viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 3.125L1.25 26.875H28.75L15 3.125Z" stroke-width="2.5" stroke-linejoin="round"/>
                        <path d="M15 21.875V22.5M15 11.875L15.005 18.125" stroke-width="2.5" stroke-linecap="round"/>
                    </svg>
                    <span>Report</span>
                </a>
            </li>

        </ul>
    </nav>

    <!-- Logout Button at Bottom -->
    <div class="absolute bottom-4 flex px-4 rounded-lg bg-red-500 text-white">
        <a href="#" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-red-700 transition-colors duration-200 w-full">
            <img src="{{ asset('images/logout.svg') }}" alt="Logout Icon" class="w-5 h-5">
            <span>Keluar Akun</span>
        </a>
    </div>
</div>

