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
                <li><a href="{{ url('show') }}"
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
                        <li><a href="{{ url('show') }}"
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
                        class="w-full text-lg font-bold text-black focus:underline dark:text-white"aria-current="page">Beranda</a></li>
                <li class="p-2"><a href="{{ url('product') }}"
                        class="w-full text-lg font-medium text-neutral-600 focus:underline dark:text-neutral-300">Produk</a>
                </li>
                <li class="p-2"><a href="{{ url('show') }}"
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

    {{-- Content --}}
    <section class="text-gray-600 body-font">
        <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
            <img class="lg:w-2/6 md:w-3/6 w-5/6 mb-10 p-10 object-cover object-center rounded" alt="hero"
                src="{{ asset('build/assets/ganeshabl.svg') }}">
            <div class="text-center lg:w-2/3 w-full">
                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Penyewaan Alat Pesta Dengan
                    Harga Terjangkau</h1>
                <p class="mb-8 leading-relaxed">MKami menyediakan berbagai kebutuhan pesta, mulai dari dekorasi mewah, meja dan kursi elegan, hingga pencahayaan yang kami sediakan. Dengan layanan lengkap, mudah, dan hemat, kami hadir untuk membuat acara Anda lebih spesial tanpa repot. Yuk, wujudkan momen tak terlupakan bersama Ganesha!</p>
                <div class="flex justify-center">
                <a href="{{ url('product') }}">
                <button class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Lihat
                        Produk</button>
                </div>
                </a>
            </div>
        </div>
    </section>

    {{-- Carousel --}}
    <div class="pb-10 xl:pb-10" id="carousel-card">
        <div x-data="{
            autoplayIntervalTime: 4000,
            slides: [{
                    imgSrc: 'https://penguinui.s3.amazonaws.com/component-assets/carousel/default-slide-1.webp',
                    imgAlt: 'Vibrant abstract painting with swirling blue and light pink hues on a canvas.',
                    title: 'Rangkaian Sempurna untuk Hari Istimewa',
                    description: 'Kami menyediakan solusi lengkap untuk segala kebutuhan pesta dan pernikahan Anda.',
                },
                {
                    imgSrc: 'https://penguinui.s3.amazonaws.com/component-assets/carousel/default-slide-2.webp',
                    imgAlt: 'Vibrant abstract painting with swirling red, yellow, and pink hues on a canvas.',
                    title: 'Praktis dan siap digunakan',
                    description: 'Peralatan yang siap sedia digunakan untuk setiap acara spesial Anda.',
                },
                {
                    imgSrc: 'https://penguinui.s3.amazonaws.com/component-assets/carousel/default-slide-3.webp',
                    imgAlt: 'Vibrant abstract painting with swirling blue and purple hues on a canvas.',
                    title: 'Harga sewa yang terjangkau',
                    description: 'Penyewaan dengan harga terjangkau untuk setiap orang.',
                },
            ],
            currentSlideIndex: 1,
            isPaused: false,
            autoplayInterval: null,
            previous() {
                if (this.currentSlideIndex > 1) {
                    this.currentSlideIndex = this.currentSlideIndex - 1
                } else {
                    // If it's the first slide, go to the last slide           
                    this.currentSlideIndex = this.slides.length
                }
            },
            next() {
                if (this.currentSlideIndex < this.slides.length) {
                    this.currentSlideIndex = this.currentSlideIndex + 1
                } else {
                    // If it's the last slide, go to the first slide    
                    this.currentSlideIndex = 1
                }
            },
            autoplay() {
                this.autoplayInterval = setInterval(() => {
                    if (!this.isPaused) {
                        this.next()
                    }
                }, this.autoplayIntervalTime)
            },
            // Updates interval time   
            setAutoplayInterval(newIntervalTime) {
                clearInterval(this.autoplayInterval)
                this.autoplayIntervalTime = newIntervalTime
                this.autoplay()
            },
        }" x-init="autoplay" class="relative w-full overflow-hidden">

            <!-- slides -->
            <div class="relative min-h-[50svh] w-full">
                <template x-for="(slide, index) in slides">
                    <div x-cloak x-show="currentSlideIndex == index + 1" class="absolute inset-0"
                        x-transition.opacity.duration.1000ms>

                        <!-- Title and description -->
                        <div
                            class="lg:px-32 lg:py-14 absolute inset-0 z-10 flex flex-col items-center justify-end gap-2 bg-gradient-to-t from-neutral-950/85 to-transparent px-16 py-12 text-center">
                            <h3 class="w-full lg:w-[80%] text-balance text-2xl lg:text-3xl font-bold text-white"
                                x-text="slide.title" x-bind:aria-describedby="'slide' + (index + 1) + 'Description'">
                            </h3>
                            <p class="lg:w-1/2 w-full text-pretty text-sm text-neutral-300" x-text="slide.description"
                                x-bind:id="'slide' + (index + 1) + 'Description'"></p>
                        </div>

                        <img class="absolute w-full h-full inset-0 object-cover text-neutral-600 dark:text-neutral-300"
                            x-bind:src="slide.imgSrc" x-bind:alt="slide.imgAlt" />
                    </div>
                </template>
            </div>

            <!-- Pause/Play Button -->
            <button type="button"
                class="absolute bottom-5 right-5 z-20 rounded-full text-neutral-300 opacity-50 transition hover:opacity-80 focus-visible:opacity-80 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white active:outline-offset-0"
                aria-label="pause carousel"
                x-on:click="(isPaused = !isPaused), setAutoplayInterval(autoplayIntervalTime)"
                x-bind:aria-pressed="isPaused">
                <svg x-cloak x-show="isPaused" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                    fill="currentColor" aria-hidden="true" class="size-7">
                    <path fill-rule="evenodd"
                        d="M2 10a8 8 0 1 1 16 0 8 8 0 0 1-16 0Zm6.39-2.908a.75.75 0 0 1 .766.027l3.5 2.25a.75.75 0 0 1 0 1.262l-3.5 2.25A.75.75 0 0 1 8 12.25v-4.5a.75.75 0 0 1 .39-.658Z"
                        clip-rule="evenodd">
                </svg>
                <svg x-cloak x-show="!isPaused" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                    fill="currentColor" aria-hidden="true" class="size-7">
                    <path fill-rule="evenodd"
                        d="M2 10a8 8 0 1 1 16 0 8 8 0 0 1-16 0Zm5-2.25A.75.75 0 0 1 7.75 7h.5a.75.75 0 0 1 .75.75v4.5a.75.75 0 0 1-.75.75h-.5a.75.75 0 0 1-.75-.75v-4.5Zm4 0a.75.75 0 0 1 .75-.75h.5a.75.75 0 0 1 .75.75v4.5a.75.75 0 0 1-.75.75h-.5a.75.75 0 0 1-.75-.75v-4.5Z"
                        clip-rule="evenodd">
                </svg>
            </button>

            <!-- Indicators -->
            <div class="absolute rounded-md bottom-3 md:bottom-5 left-1/2 z-20 flex -translate-x-1/2 gap-4 md:gap-3 px-1.5 py-1 md:px-2"
                role="group" aria-label="slides">
                <template x-for="(slide, index) in slides">
                    <button class="size-2 cursor-pointer rounded-full transition"
                        x-on:click="(currentSlideIndex = index + 1), setAutoplayInterval(autoplayIntervalTime)"
                        x-bind:class="[currentSlideIndex === index + 1 ? 'bg-neutral-300' : 'bg-neutral-300/50']"
                        x-bind:aria-label="'slide ' + (index + 1)"></button>
                </template>
            </div>
        </div>
    </div>

    {{-- Categories Product --}}
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Kategori Produk</h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Peralatan Ganesha</p>
            </div>

            <div class="flex flex-wrap -m-4 pr-10 pl-10">
                {{-- @foreach ($products as $product) --}}
                <div class="lg:w-1/3 sm:w-1/2 p-4">
                    <div
                        class="flex relative rounded-lg overflow-hidden shadow-md transform transition duration-300 hover:scale-100 hover:shadow-lg">
                        <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
                            src="{{ asset('build/assets/kursi.jpg') }}">
                        <div
                            class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100 transition duration-300 ease-in-out rounded-lg">
                            <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">Kategori
                            </h2>
                            <h1 class="title-font text-lg font-medium text-gray-900 mb-3">Kursi</h1>
                            <p class="leading-relaxed">Perlengkapan kursi untuk mulai dari Tamu dan Pengantin</p>
                        </div>
                    </div>
                </div>
                <div class="lg:w-1/3 sm:w-1/2 p-4">
                    <div
                        class="flex relative rounded-lg overflow-hidden shadow-md transform transition duration-300 hover:scale-100 hover:shadow-lg">
                        <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
                            src="{{ asset('build/assets/kursi.jpg') }}">
                        <div
                            class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100 transition duration-300 ease-in-out rounded-lg">
                            <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">Kategori
                            </h2>
                            <h1 class="title-font text-lg font-medium text-gray-900 mb-3">Panggung & Tenda</h1>
                            <p class="leading-relaxed">Perlengkapan Tenda dan Panggung dengan harga terjangkau</p>
                        </div>
                    </div>
                </div>
                <div class="lg:w-1/3 sm:w-1/2 p-4">
                    <div
                        class="flex relative rounded-lg overflow-hidden shadow-md transform transition duration-300 hover:scale-100 hover:shadow-lg">
                        <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
                            src="{{ asset('build/assets/kursi.jpg') }}">
                        <div
                            class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100 transition duration-300 ease-in-out rounded-lg">
                            <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">Kategori
                            </h2>
                            <h1 class="title-font text-lg font-medium text-gray-900 mb-3">Lainnya</h1>
                            <p class="leading-relaxed">Berbagai macam perlengkapan hiasan pesta lainnya dengan harga
                                terjangkau</p>
                        </div>
                    </div>
                </div>
                {{-- @endforeach --}}
            </div>
        </div>
    </section>

    {{-- Massage Owner --}}
    <div>
        <section class="text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto flex flex-col">
                <div class="lg:w-4/6 mx-auto">
                    <div class="rounded-lg h-64 overflow-hidden">
                        <img alt="content" class="object-cover object-center h-full w-full pr-10 pl-10"
                            src="https://dummyimage.com/1200x500">
                    </div>
                    <div class="flex flex-col sm:flex-row mt-10">
                        <div class="sm:w-1/3 text-center sm:pr-8 sm:py-8">
                            <div
                                class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-gray-200 text-gray-400">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" class="w-10 h-10" viewBox="0 0 24 24">
                                    <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </div>
                            <div class="flex flex-col items-center text-center justify-center">
                                <h2 class="font-medium title-font mt-4 text-gray-900 text-lg">Ngadimin</h2>
                                <div class="w-12 h-1 bg-indigo-500 rounded mt-2 mb-4"></div>
                                <p class="text-base">Pemilik Rental</p>
                            </div>
                        </div>
                        <div
                            class="sm:w-2/3 sm:pl-8 sm:py-8 sm:border-l border-gray-200 sm:border-t-0 border-t mt-4 pt-4 sm:mt-0 text-center sm:text-left">
                            <p class="leading-relaxed text-lg mb-4">Meggings portland fingerstache lyft, post-ironic
                                fixie man bun banh mi umami everyday carry hexagon locavore direct trade art party.
                                Locavore small batch listicle gastropub farm-to-table lumbersexual salvia messenger bag.
                                Coloring book flannel truffaut craft beer drinking vinegar sartorial, disrupt fashion
                                axe normcore meh butcher. Portland 90's scenester vexillologist forage post-ironic
                                asymmetrical, chartreuse disrupt butcher paleo intelligentsia pabst before they sold out
                                four loko. 3 wolf moon brooklyn.</p>
                            <a class="text-indigo-500 inline-flex items-center">Lihat Produk
                                <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2"
                                    viewBox="0 0 24 24">
                                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- Footer --}}
    <footer class="bg-white dark:bg-gray-900 pl-10 lg:pl-0">
        <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
            <div class="md:flex md:justify-between">
                <div class="mb-6 md:mb-0">
                    <a href="https://flowbite.com/" class="flex items-center">
                        <svg width="115" height="19" viewBox="0 0 115 19" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.496 10.032V9.456H16.568V15.984C15.832 16.72 14.928 17.296 13.856 17.712C12.8 18.128 11.616 18.336 10.304 18.336C8.96 18.336 7.72 18.12 6.584 17.688C5.448 17.24 4.456 16.624 3.608 15.84C2.76 15.04 2.096 14.112 1.616 13.056C1.152 12 0.92 10.848 0.92 9.6C0.92 8.352 1.152 7.2 1.616 6.144C2.096 5.088 2.76 4.168 3.608 3.384C4.456 2.584 5.448 1.968 6.584 1.536C7.72 1.088 8.96 0.863999 10.304 0.863999C10.88 0.863999 11.504 0.903999 12.176 0.983999C12.864 1.064 13.52 1.176 14.144 1.32C14.768 1.448 15.296 1.608 15.728 1.8L15.608 3.144H15.464C14.824 2.584 14.056 2.16 13.16 1.872C12.264 1.584 11.312 1.44 10.304 1.44C8.8 1.44 7.48 1.784 6.344 2.472C5.208 3.144 4.32 4.096 3.68 5.328C3.056 6.544 2.744 7.968 2.744 9.6C2.744 11.232 3.056 12.664 3.68 13.896C4.32 15.112 5.208 16.064 6.344 16.752C7.48 17.424 8.8 17.76 10.304 17.76C11.232 17.76 12.088 17.632 12.872 17.376C13.672 17.12 14.36 16.752 14.936 16.272V10.032H10.496ZM19.5928 18L26.0488 1.2H27.5368L33.9928 18H32.2408L29.2648 10.128H23.8168L21.3448 18H19.5928ZM26.2168 2.448L23.9848 9.552H29.0488L26.3608 2.448H26.2168ZM37.5256 18L38.1256 0.863999H38.4136L50.4856 15.456H50.6296L50.1016 1.2H51.7336L51.1336 18.336H50.8456L38.7736 3.744H38.6296L39.1576 18H37.5256ZM57.62 18V1.2H64.94V2.376L60.74 1.824C60.004 1.728 59.508 1.68 59.252 1.68V9C59.46 9 59.956 8.976 60.74 8.928L64.676 8.688V9.792L60.74 9.552C59.956 9.504 59.46 9.48 59.252 9.48V17.52C59.54 17.52 60.044 17.472 60.764 17.376L65.012 16.824V18H57.62ZM68.5779 17.472L68.7219 16.032H68.8659C69.4899 16.576 70.1939 17 70.9779 17.304C71.7619 17.608 72.5379 17.76 73.3059 17.76C74.3939 17.76 75.2739 17.464 75.9459 16.872C76.6179 16.264 76.9539 15.456 76.9539 14.448C76.9539 13.888 76.8259 13.368 76.5699 12.888C76.3299 12.408 75.9219 11.92 75.3459 11.424C74.7859 10.928 74.0099 10.392 73.0179 9.816C72.3299 9.416 71.6739 9 71.0499 8.568C70.4259 8.12 69.9139 7.608 69.5139 7.032C69.1139 6.44 68.9139 5.736 68.9139 4.92C68.9139 3.704 69.3539 2.728 70.2339 1.992C71.1139 1.24 72.2739 0.863999 73.7139 0.863999C74.3539 0.863999 75.0419 0.935999 75.7779 1.08C76.5139 1.208 77.0819 1.376 77.4819 1.584L77.3619 2.928H77.2179C76.3059 1.936 75.1379 1.44 73.7139 1.44C72.6899 1.44 71.8659 1.704 71.2419 2.232C70.6179 2.744 70.3059 3.44 70.3059 4.32C70.3059 4.976 70.4739 5.544 70.8099 6.024C71.1619 6.488 71.6099 6.912 72.1539 7.296C72.6979 7.664 73.2819 8.024 73.9059 8.376C74.6259 8.792 75.3219 9.232 75.9939 9.696C76.6819 10.16 77.2419 10.72 77.6739 11.376C78.1219 12.016 78.3459 12.824 78.3459 13.8C78.3459 14.696 78.1379 15.488 77.7219 16.176C77.3059 16.848 76.7139 17.376 75.9459 17.76C75.1939 18.144 74.3139 18.336 73.3059 18.336C72.6659 18.336 71.9139 18.256 71.0499 18.096C70.1859 17.936 69.3619 17.728 68.5779 17.472ZM83.0731 18V1.2H84.7051V8.976H94.7851V1.2H96.4171V18H94.7851V9.552H84.7051V18H83.0731ZM100.171 18L106.627 1.2H108.115L114.571 18H112.819L109.843 10.128H104.395L101.923 18H100.171ZM106.795 2.448L104.563 9.552H109.627L106.939 2.448H106.795Z"
                                fill="#252525" />
                        </svg>
                        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"></span>
                    </a>
                </div>
                <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Kategori</h2>
                        <ul class="text-gray-500 dark:text-gray-400 font-medium">
                            <li class="mb-4">
                                <a href="https://flowbite.com/" class="hover:underline">Kursi</a>
                            </li>
                            <li class="mb-4">
                                <a href="https://tailwindcss.com/" class="hover:underline">Meja</a>
                            </li>
                            <li class="mb-4">
                                <a href="https://tailwindcss.com/" class="hover:underline">Panggung</a>
                            </li>
                            <li>
                                <a href="https://tailwindcss.com/" class="hover:underline">Lainnya</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Daftar Isi</h2>
                        <ul class="text-gray-500 dark:text-gray-400 font-medium">
                            <li class="mb-4">
                                <a href="{{ url('dashboard') }}" class="hover:underline ">Dashboard</a>
                            </li>
                            <li class="mb-4">
                                <a href="{{ url('product') }}" class="hover:underline">Produk</a>
                            </li>
                            <li class="mb-4">
                                <a href="{{ url('rent') }}" class="hover:underline">Pesanan</a>
                            </li>
                            <li class="mb-4">
                                <a href="{{ url('contact') }}" class="hover:underline">Hubungi</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Legal</h2>
                        <ul class="text-gray-500 dark:text-gray-400 font-medium">
                            <li class="mb-4">
                                <a href="#" class="hover:underline">Privacy Policy</a>
                            </li>
                            <li>
                                <a href="#" class="hover:underline">Terms &amp; Conditions</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
            <div class="sm:flex sm:items-center sm:justify-between">
                <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2025 <a
                        href="https://flowbite.com/" class="hover:underline">Ganesha</a>. All Rights
                    Reserved.</span>
                <div class="flex mt-4 sm:justify-center sm:mt-0">
                    <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 8 19">
                            <path fill-rule="evenodd"
                                d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Facebook page</span>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 21 16">
                            <path
                                d="M16.942 1.556a16.3 16.3 0 0 0-4.126-1.3 12.04 12.04 0 0 0-.529 1.1 15.175 15.175 0 0 0-4.573 0 11.585 11.585 0 0 0-.535-1.1 16.274 16.274 0 0 0-4.129 1.3A17.392 17.392 0 0 0 .182 13.218a15.785 15.785 0 0 0 4.963 2.521c.41-.564.773-1.16 1.084-1.785a10.63 10.63 0 0 1-1.706-.83c.143-.106.283-.217.418-.33a11.664 11.664 0 0 0 10.118 0c.137.113.277.224.418.33-.544.328-1.116.606-1.71.832a12.52 12.52 0 0 0 1.084 1.785 16.46 16.46 0 0 0 5.064-2.595 17.286 17.286 0 0 0-2.973-11.59ZM6.678 10.813a1.941 1.941 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.919 1.919 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Zm6.644 0a1.94 1.94 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.918 1.918 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Z" />
                        </svg>
                        <span class="sr-only">Discord community</span>
                    </a>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
