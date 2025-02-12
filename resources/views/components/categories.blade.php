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