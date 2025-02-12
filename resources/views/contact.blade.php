@extends('layouts.app')

@section('content')
    {{-- Product_Detail --}}
    <div class="min-h-screen">
        <div class="h-full">
            <section class="text-gray-600 body-font relative h-screen">
                <div
                    class="container py-24 mx-auto flex sm:flex-nowrap flex-wrap justify-center items-center w-full h-full pl-10">
                    <div
                        class="w-full h-full bg-gray-300 rounded-lg overflow-hidden sm:mr-10 p-10 flex items-end justify-start relative">
                        <iframe class="absolute inset-0 w-full h-full" frameborder="0" title="map" marginheight="0"
                            marginwidth="0" scrolling="no"
                            src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d247.52740590802492!2d110.41764777243893!3d-6.957508587082106!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1737632394022!5m2!1sid!2sid"
                            style="filter: grayscale(1) contrast(1.2) opacity(0.4);" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                        <div class="bg-white relative flex flex-wrap py-6 rounded shadow-md">
                            <div class="lg:w-1/2 px-6">
                                <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">Alamat</h2>
                                <p class="mt-1">Jl. Cumi-cumi II, Kelurahan Bandarharjo, Kecamatan Semarang Utara</p>
                            </div>
                            <div class="lg:w-1/2 px-6 mt-4 lg:mt-0">
                                <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">EMAIL</h2>
                                <a class="text-indigo-500 leading-relaxed">example@email.com</a>
                                <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs mt-4">Telepon
                                </h2>
                                <p class="leading-relaxed">+62 878-1272-1423</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Footer --}}
                @include('components.footer')
            </section>
        </div>
    </div>
@endsection
