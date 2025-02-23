{{-- Detail --}}

<div class=" pt-28">
    <div class="max-w-7xl m-8 mx-auto px-4 sm:px-6 lg:px-8 py-8 bg-white rounded-lg">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
            {{-- Product Image --}}
            <div class="relative">
                <div class="aspect-square w-full max-w-md mx-auto overflow-hidden rounded-lg shadow-md">
                    @if(isset($product->images))
                        <img src="{{ asset('storage/' . $product->images) }}" 
                            alt="{{ $product->name }}"
                            class="w-full h-full object-cover hover:scale-105 transition-transform duration-300 ease-in-out"
                        >
                    @else
                        <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-400">No image available</span>
                        </div>
                    @endif
                </div>
            </div>
    
            {{-- Product Info --}}
            <div class="flex flex-col space-y-6">
                {{-- Title and Price --}}
                <div class="space-y-4">
                    <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 dark:text-white">
                        {{ $product->name }}
                    </h1>
                    <div class="flex items-center">
                        <span class="text-2xl sm:text-3xl font-bold text-indigo-600 dark:text-indigo-400">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </span>
                    </div>
                </div>
    
                {{-- Action Button --}}
                <div class="flex flex-wrap gap-4">
                    @if($product->status == 0)
                    <a href="{{ route('rentals.create') }}" class="pr-4">
                        <button type="button" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
                            Sewa sekarang
                        </button>
                    </a>
                    @else
                    <a href="#" class="pr-4">
                        <button type="button" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-gray-400 hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 transition-colors duration-200 cursor-not-allowed" disabled>
                            Sewa sekarang
                        </button>
                    </a>
                    @endif
                </div>
    
                {{-- Description --}}
                <div class="pt-6 border-t border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">
                        Deskripsi Produk
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 text-base leading-relaxed">
                        {{ $product->description }}
                    </p>
                </div>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('product') }}" class="pr-4">
                        <button type="button" class="inline-flex items-center justify-center border border-transparent text-base font-medium rounded-md text-gray-700">
                            Kembali
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>