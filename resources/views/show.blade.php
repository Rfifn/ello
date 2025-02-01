<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ganesha</title>
    @vite('resources/css/app.css')

    {{-- Script --}}
    <script src="https://cdn.jsdelivr.net/npm/@alpinejs/focus@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

    {{-- Link --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fustat:wght@200..800&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">
</head>

<body class="font-jakarta">
    <!-- Navbar -->
    <div>
        <nav x-data="{ mobileMenuIsOpen: false }" @click.away="mobileMenuIsOpen = false"
            class="flex fixed w-screen items-center justify-between bg-neutral-50 border-b border-neutral-300 gap-4 px-6 py-4 dark:border-neutral-700 dark:bg-neutral-900 z-40"
            aria-label="penguin ui menu">
            <!-- Logo -->
            <a href="#" class="text-2xl font-bold text-neutral-900 dark:text-white">
                <svg width="115" height="19" viewBox="0 0 115 19" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M10.496 10.032V9.456H16.568V15.984C15.832 16.72 14.928 17.296 13.856 17.712C12.8 18.128 11.616 18.336 10.304 18.336C8.96 18.336 7.72 18.12 6.584 17.688C5.448 17.24 4.456 16.624 3.608 15.84C2.76 15.04 2.096 14.112 1.616 13.056C1.152 12 0.92 10.848 0.92 9.6C0.92 8.352 1.152 7.2 1.616 6.144C2.096 5.088 2.76 4.168 3.608 3.384C4.456 2.584 5.448 1.968 6.584 1.536C7.72 1.088 8.96 0.863999 10.304 0.863999C10.88 0.863999 11.504 0.903999 12.176 0.983999C12.864 1.064 13.52 1.176 14.144 1.32C14.768 1.448 15.296 1.608 15.728 1.8L15.608 3.144H15.464C14.824 2.584 14.056 2.16 13.16 1.872C12.264 1.584 11.312 1.44 10.304 1.44C8.8 1.44 7.48 1.784 6.344 2.472C5.208 3.144 4.32 4.096 3.68 5.328C3.056 6.544 2.744 7.968 2.744 9.6C2.744 11.232 3.056 12.664 3.68 13.896C4.32 15.112 5.208 16.064 6.344 16.752C7.48 17.424 8.8 17.76 10.304 17.76C11.232 17.76 12.088 17.632 12.872 17.376C13.672 17.12 14.36 16.752 14.936 16.272V10.032H10.496ZM19.5928 18L26.0488 1.2H27.5368L33.9928 18H32.2408L29.2648 10.128H23.8168L21.3448 18H19.5928ZM26.2168 2.448L23.9848 9.552H29.0488L26.3608 2.448H26.2168ZM37.5256 18L38.1256 0.863999H38.4136L50.4856 15.456H50.6296L50.1016 1.2H51.7336L51.1336 18.336H50.8456L38.7736 3.744H38.6296L39.1576 18H37.5256ZM57.62 18V1.2H64.94V2.376L60.74 1.824C60.004 1.728 59.508 1.68 59.252 1.68V9C59.46 9 59.956 8.976 60.74 8.928L64.676 8.688V9.792L60.74 9.552C59.956 9.504 59.46 9.48 59.252 9.48V17.52C59.54 17.52 60.044 17.472 60.764 17.376L65.012 16.824V18H57.62ZM68.5779 17.472L68.7219 16.032H68.8659C69.4899 16.576 70.1939 17 70.9779 17.304C71.7619 17.608 72.5379 17.76 73.3059 17.76C74.3939 17.76 75.2739 17.464 75.9459 16.872C76.6179 16.264 76.9539 15.456 76.9539 14.448C76.9539 13.888 76.8259 13.368 76.5699 12.888C76.3299 12.408 75.9219 11.92 75.3459 11.424C74.7859 10.928 74.0099 10.392 73.0179 9.816C72.3299 9.416 71.6739 9 71.0499 8.568C70.4259 8.12 69.9139 7.608 69.5139 7.032C69.1139 6.44 68.9139 5.736 68.9139 4.92C68.9139 3.704 69.3539 2.728 70.2339 1.992C71.1139 1.24 72.2739 0.863999 73.7139 0.863999C74.3539 0.863999 75.0419 0.935999 75.7779 1.08C76.5139 1.208 77.0819 1.376 77.4819 1.584L77.3619 2.928H77.2179C76.3059 1.936 75.1379 1.44 73.7139 1.44C72.6899 1.44 71.8659 1.704 71.2419 2.232C70.6179 2.744 70.3059 3.44 70.3059 4.32C70.3059 4.976 70.4739 5.544 70.8099 6.024C71.1619 6.488 71.6099 6.912 72.1539 7.296C72.6979 7.664 73.2819 8.024 73.9059 8.376C74.6259 8.792 75.3219 9.232 75.9939 9.696C76.6819 10.16 77.2419 10.72 77.6739 11.376C78.1219 12.016 78.3459 12.824 78.3459 13.8C78.3459 14.696 78.1379 15.488 77.7219 16.176C77.3059 16.848 76.7139 17.376 75.9459 17.76C75.1939 18.144 74.3139 18.336 73.3059 18.336C72.6659 18.336 71.9139 18.256 71.0499 18.096C70.1859 17.936 69.3619 17.728 68.5779 17.472ZM83.0731 18V1.2H84.7051V8.976H94.7851V1.2H96.4171V18H94.7851V9.552H84.7051V18H83.0731ZM100.171 18L106.627 1.2H108.115L114.571 18H112.819L109.843 10.128H104.395L101.923 18H100.171ZM106.795 2.448L104.563 9.552H109.627L106.939 2.448H106.795Z"
                        fill="#252525" />
                </svg>
            </a>

            <!-- Desktop Menu -->
            <ul class="hidden items-center gap-4 flex-shrink-0 sm:flex">
                <li><a href="{{ url('dashboard') }}"
                        class="font-bold text-blue-500 underline-offset-2 hover:text-black focus:outline-none focus:underline dark:text-white dark:hover:text-white"
                        aria-current="page">Beranda</a></li>
                <li><a href="{{ url('product') }}"
                        class="font-medium text-neutral-600 underline-offset-2 hover:text-black focus:outline-none focus:underline dark:text-neutral-300 dark:hover:text-white">Produk</a>
                </li>
                <li><a href="{{ url('rent') }}"
                        class="font-medium text-neutral-600 underline-offset-2 hover:text-black focus:outline-none focus:underline dark:text-neutral-300 dark:hover:text-white">Pesanan</a>
                </li>
                <li><a href="{{ url('contact') }}"
                        class="font-medium text-neutral-600 underline-offset-2 hover:text-black focus:outline-none focus:underline dark:text-neutral-300 dark:hover:text-white">Hubungi</a>
                </li>
                <!-- User Profile -->
                <li x-data="{ userDropDownIsOpen: false, openWithKeyboard: false }" @keydown.esc.window="userDropDownIsOpen = false, openWithKeyboard = false"
                    class="relative flex items-center">
                    <button @click="userDropDownIsOpen = ! userDropDownIsOpen" :aria-expanded="userDropDownIsOpen"
                        @keydown.space.prevent="openWithKeyboard = true"
                        @keydown.enter.prevent="openWithKeyboard = true" @keydown.down.prevent="openWithKeyboard = true"
                        class="rounded-full focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black dark:focus-visible:outline-white"
                        aria-controls="userMenu">
                        <img src="https://penguinui.s3.amazonaws.com/component-assets/avatar-8.webp" alt="User Profile"
                            class="size-10 rounded-full object-cover" />
                    </button>
                    <!-- User Dropdown -->
                    <ul x-cloak x-show="userDropDownIsOpen || openWithKeyboard" x-transition.opacity
                        x-trap="openWithKeyboard" @click.outside="userDropDownIsOpen = false, openWithKeyboard = false"
                        @keydown.down.prevent="$focus.wrap().next()" @keydown.up.prevent="$focus.wrap().previous()"
                        id="userMenu"
                        class="absolute right-0 top-12 flex w-full min-w-[12rem] flex-col overflow-hidden rounded-md border border-neutral-300 bg-neutral-50 py-1.5 dark:border-neutral-700 dark:bg-neutral-900">
                        <li class="border-b border-neutral-300 dark:border-neutral-700">
                            <div class="flex flex-col px-4 py-2">
                                <span
                                    class="text-sm font-medium text-neutral-900 dark:text-white pb-1.5">{{ Auth::user()->name }}</span>
                                {{-- <p class="text-xs text-neutral-600 dark:text-neutral-300">alice.brown@gmail.com</p> --}}
                            </div>
                        </li>
                        <li><a href="{{ url('dashboard') }}"
                                class="block bg-neutral-50 px-4 py-2 text-sm text-neutral-600 hover:bg-neutral-900/5 hover:text-neutral-900 focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-none dark:bg-neutral-900 dark:text-neutral-300 dark:hover:bg-neutral-50/5 dark:hover:text-white dark:focus-visible:bg-neutral-50/10 dark:focus-visible:text-white">Dashboard</a>
                        </li>
                        <li><a href="{{ url('rent') }}"
                                class="block bg-neutral-50 px-4 py-2 text-sm text-neutral-600 hover:bg-neutral-900/5 hover:text-neutral-900 focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-none dark:bg-neutral-900 dark:text-neutral-300 dark:hover:bg-neutral-50/5 dark:hover:text-white dark:focus-visible:bg-neutral-50/10 dark:focus-visible:text-white">Pesanan</a></li>
                        <li><a href="#"
                                class="block bg-neutral-50 px-4 py-2 text-sm text-neutral-600 hover:bg-neutral-900/5 hover:text-neutral-900 focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-none dark:bg-neutral-900 dark:text-neutral-300 dark:hover:bg-neutral-50/5 dark:hover:text-white dark:focus-visible:bg-neutral-50/10 dark:focus-visible:text-white">Pengaturan</a>
                        </li>
                        <li><a href="#"
                                class="block bg-neutral-50 px-4 py-2 text-sm text-neutral-600 hover:bg-neutral-900/5 hover:text-neutral-900 focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-none dark:bg-neutral-900 dark:text-neutral-300 dark:hover:bg-neutral-50/5 dark:hover:text-white dark:focus-visible:bg-neutral-50/10 dark:focus-visible:text-white">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="" role="menuitem">
                                        {{ __('Log Out') }}
                                    </button>
                                </form>
                            </a></li>
                    </ul>
                </li>
            </ul>

            <!-- Mobile Menu Button -->
            <button @click="mobileMenuIsOpen = !mobileMenuIsOpen" :aria-expanded="mobileMenuIsOpen"
                :class="mobileMenuIsOpen ? 'fixed top-6 right-6 z-20' : null" type="button"
                class="flex text-neutral-600 dark:text-neutral-300 sm:hidden" aria-label="mobile menu"
                aria-controls="mobileMenu">
                <svg x-cloak x-show="!mobileMenuIsOpen" xmlns="http://www.w3.org/2000/svg" fill="none"
                    aria-hidden="true" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
                <svg x-cloak x-show="mobileMenuIsOpen" xmlns="http://www.w3.org/2000/svg" fill="none"
                    aria-hidden="true" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>

            <!-- Mobile Menu -->
            <ul x-cloak x-show="mobileMenuIsOpen"
                x-transition:enter="transition motion-reduce:transition-none ease-out duration-300"
                x-transition:enter-start="-translate-y-full" x-transition:enter-end="translate-y-0"
                x-transition:leave="transition motion-reduce:transition-none ease-out duration-300"
                x-transition:leave-start="translate-y-0" x-transition:leave-end="-translate-y-full"
                class="fixed max-h-svh overflow-y-auto inset-x-0 top-0 z-10 flex flex-col rounded-b-md border-b border-neutral-300 bg-neutral-50 px-8 pb-6 pt-10 dark:border-neutral-700 dark:bg-neutral-900 sm:hidden">
                <li class="mb-4 border-none">
                    <div class="flex items-center gap-2 py-2">
                        <img src="https://penguinui.s3.amazonaws.com/component-assets/avatar-8.webp"
                            alt="User Profile" class="size-12 rounded-full object-cover" />
                        <div>
                            <span class="font-medium text-neutral-900 dark:text-white">{{ Auth::user()->name }}</span>
                            {{-- <p class="text-sm text-neutral-600 dark:text-neutral-300">alice.brown@gmail.com</p> --}}
                        </div>
                    </div>
                </li>
                <li class="p-2"><a href="{{ url('dashboard') }}"
                        class="w-full text-lg font-bold text-black focus:underline dark:text-white"
                        aria-current="page">Beranda</a></li>
                <li class="p-2"><a href="{{ url('product') }}"
                        class="w-full text-lg font-medium text-neutral-600 focus:underline dark:text-neutral-300">Produk</a>
                </li>
                <li class="p-2"><a href="{{ url('rent') }}"
                        class="w-full text-lg font-medium text-neutral-600 focus:underline dark:text-neutral-300">Pesanan</a>
                </li>
                <li class="p-2"><a href="{{ url('contact') }}"
                        class="w-full text-lg font-medium text-neutral-600 focus:underline dark:text-neutral-300">Hubungi</a>
                </li>
                <hr role="none" class="my-2 border-outline dark:border-neutral-700">
                <li class="p-2"><a href="{{ url('profile') }}"
                        class="w-full text-neutral-600 focus:underline dark:text-neutral-300">Pengaturan</a></li>
                <li class="p-2"><a href="#"
                        class="w-full text-neutral-600 focus:underline dark:text-neutral-300">{{ __('Log Out') }}</a>
                </li>
                <!-- CTA Button -->
            </ul>
        </nav>
    </div>



    <div>
        <div class="bg-white pb-10 pl-14 pr-14 rounded-lg pt-32">
            <h1 class="text-left font-bold text-2xl sm:text-2xl md:text-2xl font-jakarta p-4">Riwayat Penyewaan</h1>
        </div>
        <div class="flex justify-center max-h-min pr-[72px] pl-[72px]">
            <div class="overflow-hidden w-full overflow-x-auto rounded-md border border-neutral-300 dark:border-neutral-700">
                <table class="w-full text-left text-sm text-neutral-600 dark:text-neutral-300">
                    <thead class="border-b border-neutral-300 bg-neutral-50 text-sm text-neutral-900 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white">
                        
                        <tr>
                            <th scope="col" class="p-4">User</th>
                            <th scope="col" class="p-4">Produk</th>
                            <th scope="col" class="p-4">Total Harga</th>
                            <th scope="col" class="p-4">Mulai Sewa</th>
                            <th scope="col" class="p-4">Akhir Sewa</th>
                            <th scope="col" class="p-4">Status</th>
                            <th scope="col" class="p-4">Lainnya</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-neutral-300 dark:divide-neutral-700">
                        @foreach($rentals as $rental)
                        @foreach($rental->details as $detail)
                        <tr>
                            <td class="p-4">
                                <div class="flex w-max items-center gap-2">
                                    <div class="flex flex-col">
                                        <span class="text-neutral-900 dark:text-white">{{ $rental->name }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="p-4">{{ $detail->product->name }}</td>
                            <td class="p-4">Rp {{ number_format($rental->price) }}</td>
                            <td class="p-4">{{ Carbon\Carbon::parse($rental->start_time)->format('d/m/Y h.i.s A') }}</td>
                            <td class="p-4">{{ Carbon\Carbon::parse($rental->end_time)->format('d/m/Y h.i.s A') }}</td>
                            <td class="p-4">
                                <span class="inline-flex overflow-hidden rounded-md border px-1 py-0.5 text-xs font-medium 
                                    @if($rental->status == 0) border-yellow-500 text-yellow-500 bg-yellow-500/10
                                    @elseif($rental->status == 1) border-blue-500 text-blue-500 bg-blue-500/10
                                    @elseif($rental->status == 2) border-green-500 text-green-500 bg-green-500/10
                                    @elseif($rental->status == 3) border-gray-500 text-gray-500 bg-gray-500/10
                                    @elseif($rental->status == 4) border-red-500 text-red-500 bg-red-500/10
                                    @else border-purple-500 text-purple-500 bg-purple-500/10 @endif">
                                    
                                    @switch($rental->status)
                                        @case(0) Belum Dikonfirmasi @break
                                        @case(1) Dikonfirmasi @break
                                        @case(2) Disewa @break
                                        @case(3) Dikembalikan @break
                                        @case(4) Dibatalkan @break
                                        @case(5) Belum Diselesaikan @break
                                        @default Tidak Diketahui
                                    @endswitch
                                </span>
                            </td>
                            {{-- <td class="p-4">
                                <a href="/rentals/{{ $rental->id }}/edit" 
                                   class="cursor-pointer whitespace-nowrap rounded-md bg-transparent p-0.5 font-semibold text-black outline-black hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 active:opacity-100 active:outline-offset-0 dark:text-white dark:outline-white">
                                    Edit
                                </a>
                            </td> --}}
                        </tr>
                        @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>
