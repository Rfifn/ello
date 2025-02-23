{{-- ProductContent --}}

<section class="bg-gray-50 py-8 antialiased dark:bg-gray-900 md:py-12">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
        <div class="mb-4 items-end justify-between space-y-4 sm:flex sm:space-y-0 md:mb-8">
            <h2 class="pt-20 mt-3 text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Produk
            </h2>
        </div>
        <div class="flex items-center space-x-4 pb-10">
            <button data-modal-toggle="filterModal" data-modal-target="filterModal" type="button"
                class="flex w-full items-center justify-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 sm:w-auto">
                <svg class="-ms-0.5 me-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                        d="M18.796 4H5.204a1 1 0 0 0-.753 1.659l5.302 6.058a1 1 0 0 1 .247.659v4.874a.5.5 0 0 0 .2.4l3 2.25a.5.5 0 0 0 .8-.4v-7.124a1 1 0 0 1 .247-.659l5.302-6.059c.566-.646.106-1.658-.753-1.658Z" />
                </svg>
                Filter
                <svg class="-me-0.5 ms-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 9-7 7-7-7" />
                </svg>
            </button>
        </div>
        <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
            @if (count($products) > 0)
                @foreach ($products as $product)
                    <div
                        class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <div class="h-56 w-full">
                            <a href="{{ route('rentals.create') }}">
                                @if ($product->images)
                                    <img class="mx-auto h-full dark:hidden"
                                        src="{{ url('storage/' . $product->images) }}" alt="{{ $product->name }}" />
                                @else
                                    <img class="mx-auto h-full dark:hidden"
                                        {{-- src="{{ asset('default-product-image.jpg') }}"  --}} alt="No image available" />
                                @endif
                            </a>
                        </div>
                        <div class="pt-6">
                            <div class="mb-4 flex items-center justify-between gap-4">
                                <div class="flex items-center justify-end gap-1">
                                    <span
                                        class="px-2 py-1 text-white text-sm font-semibold rounded {{ $product->status == 0 ? 'bg-green-400' : 'bg-red-400' }}">
                                        {{ $product->status == 0 ? 'Tersedia' : 'Tidak Tersedia' }}
                                    </span>
                                </div>
                            </div>

                            <p
                                class="text-lg font-semibold leading-tight text-gray-900 hover:underline dark:text-white">
                                Rp {{ number_format($product->price, 0, '', '.') }}
                            </p>
                            <p
                                class="text-sm font-semibold leading-tight text-gray-500 hover:underline dark:text-white">
                                Stok barang {{ $product->stock }}
                            </p>
                            <div class="mt-4 flex items-center justify-between gap-4 pb-5">
                                <p class="text-2xl font-extrabold leading-tight text-gray-900 dark:text-white">
                                    {{ $product->name }}
                                </p>

                                <button type="button"
                                    class="inline-flex items-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                    <svg class="-ms-2 me-2 h-5 w-5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                                    </svg>
                                    Add to cart
                                </button>
                            </div>

                            @if ($product->status == 0)
                                <a href="{{ route('rentals.create') }}" class="pr-4">
                                    <button type="button"
                                        class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-sm">
                                        Sewa sekarang
                                    </button>
                                </a>
                            @else
                                <button type="button"
                                    class="inline-flex text-white bg-gray-400 border-0 py-2 px-6 rounded text-sm cursor-not-allowed mr-4"
                                    disabled>
                                    Sewa sekarang
                                </button>
                            @endif

                            <a href="{{ route('detail', $product) }}">
                                <button type="button"
                                    class="inline-flex text-gray bg-transparent border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 hover:text-black rounded text-sm">
                                    Lihat Detail
                                </button>
                            </a>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-span-full text-center py-8 pt-20">
                    <p class="text-lg text-gray-600 dark:text-gray-400 pb-[197px]">Barang tidak tersedia</p>
                </div>
            @endif
            <form action="#" method="get" id="filterModal" tabindex="-1" aria-hidden="true"
                class="fixed left-0 right-0 top-0 z-50 hidden h-modal w-full overflow-y-auto overflow-x-hidden p-4 md:inset-0 md:h-full">
                <div class="relative h-full w-full max-w-xl md:h-auto">
                    <div class="relative rounded-lg bg-white shadow dark:bg-gray-800 ">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between rounded-t p-4 md:p-5">
                            <h3 class="text-lg font-normal text-gray-500 dark:text-gray-400">Filter</h3>
                            <button type="button"
                                class="ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-100 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-toggle="filterModal">
                                <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                                </svg>
                                <span class="sr-only">Tutup</span>
                            </button>
                        </div>

                        <!-- Modal body -->
                        <div class="px-4 md:px-5 pb-5">
                            <div class="grid grid-cols-1 gap-6" id="filter-options" role="tabpanel">
                                <!-- Category Filter Section -->
                                <div class="space-y-2">
                                    <h4 class="font-medium text-gray-900 dark:text-white mb-3">Kategori</h4>
                                    <div class="space-y-2">
                                        <div class="flex items-center pb-2">
                                            <input id="all-categories" name="category_id" type="radio"
                                                value=""
                                                class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600"
                                                {{ !request('category_id') ? 'checked' : '' }} />
                                            <label for="all-categories"
                                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                                Semua Kategori
                                            </label>
                                        </div>
                                        @foreach ($categories as $category)
                                            <div class="flex items-center pb-2">
                                                <input id="category-{{ $category->id }}" name="category_id"
                                                    type="radio" value="{{ $category->id }}"
                                                    {{ request('category_id') == $category->id ? 'checked' : '' }}
                                                    class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                                                <label for="category-{{ $category->id }}"
                                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                                    {{ $category->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Availability Filter Section -->
                                <div class="space-y-2">
                                    <h4 class="font-medium text-gray-900 dark:text-white mb-3">Status Ketersediaan</h4>
                                    <div class="space-y-2">
                                        <div class="flex items-center pb-2">
                                            <input id="all-status" name="status" type="radio" value=""
                                                class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600"
                                                {{ !request('status') ? 'checked' : '' }} />
                                            <label for="all-status"
                                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                                Semua Status
                                            </label>
                                        </div>
                                        <div class="flex items-center pb-2">
                                            <input id="available" name="status" type="radio" value="0"
                                                {{ request('status') === '0' ? 'checked' : '' }}
                                                class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                                            <label for="available"
                                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                                Tersedia
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="pt-4">
                                    <button type="submit"
                                        class="w-full inline-flex justify-center text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-sm">
                                        Terapkan Filter
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
