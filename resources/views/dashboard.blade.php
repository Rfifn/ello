@extends('layouts.app')

@section('content')
    {{-- Content --}}
    <section class="text-gray-600 body-font">
        <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
            <img class="lg:w-2/6 md:w-3/6 w-5/6 mb-10 p-10 object-cover object-center rounded" alt="hero"
                src="{{ asset('build/assets/ganeshabl.svg') }}">
            <div class="text-center lg:w-2/3 ">
                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Penyewaan Alat Pesta Dengan
                    Harga Terjangkau</h1>
                <p class="mb-8 leading-relaxed">Kami menyediakan berbagai kebutuhan pesta, mulai dari dekorasi mewah,
                    meja dan kursi elegan, hingga pencahayaan yang kami sediakan. Dengan layanan lengkap, mudah, dan
                    hemat, kami hadir untuk membuat acara Anda lebih spesial tanpa repot. Yuk, wujudkan momen tak
                    terlupakan bersama Ganesha!</p>
                <div class="flex justify-center">
                    <a href="{{ url('product') }}">
                        <button
                            class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Lihat
                            Produk</button>
                </div>
                </a>
            </div>
        </div>
    </section>

    {{-- Carousel --}}
    @include('components.carousel')

    {{-- Categories Product --}}
    @include('components.categories')

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
                            class="sm:w-2/3 sm:pl-8 sm:py-8 sm:border-l border-gray-200 sm:border-t-0 border-t mt-4 pt-16 sm:mt-0 text-center sm:text-left">
                            <p class="leading-relaxed text-lg mb-4">Di Rental Ganesha kami menyediakan berbagai
                                perlengkapan alat pesta dan pernikahan pada umumnya, seperti Tenda, panggung kursi dan
                                meja para tamu serta pengantin yang lengkap dengan dekornya.</p>
                            <a class="text-indigo-500 inline-flex items-center" href="{{ url('product') }}">Lihat
                                Produk
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
    @include('components.footer')
    
@endsection
